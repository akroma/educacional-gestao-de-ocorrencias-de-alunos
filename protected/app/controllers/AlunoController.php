<?php
/**
* 
*/
class AlunoController extends BaseController
{
	
	public function index()
	{
		$cursos = Curso::all();
		$periodos = Periodo::all();

		$cursos_sel = array_pluck($cursos, 'nome', 'id');
		$periodos_sel = array_pluck($periodos, 'nome', 'id');

		if (count(Input::all()) > 0) 
			$turmas = Turma::where(['curso_id'=>Input::all()['curso']])->get();
		else
			$turmas = Turma::where(['curso_id'=>array_keys($cursos_sel)[0]])->get();

		return View::make('aluno.index', ['turmas'=>$turmas, 'cursos'=>$cursos_sel, 'periodos'=>$periodos_sel, 'data'=>$cursos]);
	}



	public function fotos()
	{
		if (Input::file('fotos')) :

			$file = Input::file('fotos');
			$path = base_path().'/../uploads/';
			$zip = new ZipArchive();
			$zip->open($file->getPathname());
			$zip->extractTo($path);



			$turma = str_replace('.zip', '', $file->getClientOriginalName());
			$dir = scandir($path.$turma);

			array_shift($dir);
			array_shift($dir);
			print_r($dir);
			foreach ($dir as $key => $value) :

				$arr = explode('.', $value);
				$arr[0] = preg_replace('/(0001)$/', '', $arr[0]);

				$aluno = Aluno::find($arr[0]);
				if ($aluno) :
					$foto = implode('.', $arr);
					$aluno->foto = $turma.'/'.$value;
					print_r($path.$turma.'/'.$value);
					$aluno->save();
				endif;
				echo "<hr>";
			endforeach;


			return Redirect::to('/aluno/fotos')->withSuccess('Fotos cadastradas com sucesso!');

		endif;

		return View::make('aluno.fotos', []);
	}


	public function csv()
	{
		if (isset($_FILES['csv'])) {
			ini_set('max_execution_time', 300);

			$csv = Input::file('csv');
			$csv->move(base_path().'/../csv/', 'alunos.csv');

			if($csv->getClientOriginalExtension() !== 'csv')
				return Redirect::to('/aluno/csv')->withDanger('O arquivo deve ter a extensão .csv');
			$csv = utf8_encode(file_get_contents(base_path().'/../csv/alunos.csv'));
			$csv = explode("\n", $csv);
			
			array_shift($csv);
			array_pop($csv);

			foreach ($csv as $key => $row) :
				$row = rtrim($row, ';');
				$row = explode(';', $row);


				$matricula = $row[0];
				$nome = $row[1];
				$curso = $row[2];
				$turma = $row[3];
				$tipo_curso = rtrim($row[4]);

				// $data_inicio = $row[5] !== '' ? $row[5] : date('Y-m-d');
				$data_inicio = date('Y-m-d H:i:s');

				
				$modelCurso = Curso::whereNome($curso)->first();
				if ($modelCurso === null) :
					$modelCurso = new Curso;
					$modelCurso->nome = $curso;
					$modelCurso->tipo = $tipo_curso;
					$modelCurso->save();
				endif;



				$modelTurma = Turma::whereSigla($turma)->first();
				if ($modelTurma == null) {
					$modelTurma = new Turma;
					$modelTurma->sigla = $turma;
					$modelTurma->descricao = 'Turma do curso de'.$modelCurso->nome;
					$modelTurma->data_inicio = $data_inicio;
					$modelTurma->curso_id = $modelCurso->id;
					$modelTurma->save();
				}


				$aluno = Aluno::find($matricula);
				if ($aluno == null):
					$aluno = new Aluno;
					$aluno->matricula = $matricula;
					$aluno->nome = $nome;
					$aluno->turma_id = $modelTurma->id;
					$aluno->foto = 'placeholder.jpg';
					$aluno->save();
				endif;

			endforeach;


			return Redirect::to('/aluno')->withSuccess('Alunos registrados com sucesso!');
			die;
		}

		return View::make('aluno.csv');
	}


	public function create()
	{
		$model = new Aluno;
		return View::make('aluno.create', ['turmas'=>Turma::all(), 'model'=>$model]);
	}


	public function edit($matricula)
	{
		$model = Aluno::find($matricula);
		return View::make('aluno.create', ['model'=>$model, 'turmas'=>Turma::all()]);
	}


	public function store()
	{
		$post = Input::all();

		$aluno = Aluno::find($post['matricula']);
		if(!isset($aluno)){
			$model = new Aluno;
			$model->foto = 'placeholder.jpg';
		}
		else
			$model = $aluno;

		if( !$model->validate($post) && $aluno == null) :
	        return Redirect::to('aluno/create')->withInput($post)->withErrors($model->errors);
	    else:
			$model->nome = $post['nome'];
			$model->matricula = $post['matricula'];
			$model->turma_id = $post['turma_id'];

			if (Input::hasFile('foto')) :
				$foto = Input::file('foto');
				$type = strtolower($foto->getClientOriginalExtension());
				
				if ($type == 'jpg') 
					$img = imagecreatefromjpeg($foto);
				elseif($type == 'png')
					$img = imagecreatefrompng($foto);
				else
					return false;

				imagejpeg($img, base_path().'/../uploads/'.$model->matricula.'.jpg');
				$model->foto = $model->matricula.'.jpg';
			endif;


			$id = $post['matricula'];
			if ($model->save()) {
				Session::flash('success', 'Aluno cadastrado com sucesso!');
				return Redirect::to("/aluno/$id");
			}
		endif;

	}



	public function show($id)
	{
		$aluno = Aluno::find($id);
		$ocorrencias = Ocorrencia::where('aluno_id', $id)->orderBy('created_at', 'desc')->paginate(5);
		return View::make('aluno.view', ['aluno'=>$aluno, 'ocorrencias'=>$ocorrencias]);
	}

	public function getDelete($id)
	{
		$model = Aluno::find($id)->delete();
		if ($model)
			return Redirect::to('/aluno')->withSuccess('Aluno deletado com sucesso');
	}


	public function getSearch()
	{

		$term = Input::get('term');
		
		$alunos = Aluno::whereRaw('aluno.nome COLLATE UTF8_GENERAL_CI LIKE ?')
					->join('turma', 'turma.id', '=', 'aluno.turma_id')
					->orWhereRaw('sigla COLLATE UTF8_GENERAL_CI LIKE ?')
					->orWhereRaw('descricao COLLATE UTF8_GENERAL_CI LIKE ?')
					->setBindings(['%'.$term.'%', '%'.$term.'%', '%'.$term.'%'])
					->get();


		$turmas = Turma::whereRaw('sigla COLLATE UTF8_GENERAL_CI LIKE ?')
					->orWhereRaw('descricao COLLATE UTF8_GENERAL_CI LIKE ?')
					->setBindings(['%'.$term.'%', '%'.$term.'%'])
					->get();


		return View::make('aluno.search', ['alunos'=>$alunos]);
		
	}



}