<?php
/**
* 
*/
class TurmaController extends BaseController
{
	
	public function index()
	{
		$turmas = Turma::paginate(5);
		return View::make('turma.index', ['turmas'=>$turmas]);
	}

	public function show($id)
	{
		$turma = Turma::find($id);
		return View::make('turma.show', ['turma'=>$turma]);
	}


	public function create()
	{
		$model = new Turma;
		return View::make('turma.create', ['model'=>$model,'cursos'=>Curso::all()]);
	}



	public function edit($id)
	{
		$model = Turma::find($id);
		$model->data_inicio = date('d/m/Y', strtotime($model->turma));
		return View::make('turma.create', ['model'=>$model, 'cursos'=>Curso::all()]);
	}


	public function store()
	{
		$post = Input::all();
		unset($post['_token']);

		if(isset($post['id']) && $post['id'] !== '')
			$model = Turma::find($post['id']);
		else
			$model = new Turma;
		
		if( !$model->validate($post) ) :
	        return Redirect::to('turma/create')->withInput($post)->withErrors($model->errors);
		else:
			$model->sigla = $post['sigla'];
			$model->descricao = $post['descricao'];
			$model->descricao = $post['descricao'];
			$model->curso_id = $post['curso_id'];
			$model->data_inicio = date('Y-m-d', strtotime(str_replace('/', '-', $post['data_inicio'])));

			if ($model->save()) {
				Session::flash('success', 'Turma Cadastrada com sucesso!');
				return Redirect::to('/turma/'.$model->id);
			}
		endif;
	}


	public function getDelete($id)
	{
		if (Turma::whereId($id)->delete()) 
			Session::flash('success', 'Usuário deletado com sucesso!');
		else
			Session::flash('danger', 'Usuário não pode ser deletado!');

		return Redirect::to('/turma');
	}


}