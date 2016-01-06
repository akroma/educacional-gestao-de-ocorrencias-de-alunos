<?php
/**
* 
*/
class OcorrenciaController extends BaseController
{
	
	public function index()
	{
		
	}


	public function create()
	{
		$model = new Ocorrencia;
		
		return View::make('ocorrencia.create', ['model'=>$model]);
	}

	public function store()
	{
		$post = Input::all();
		if (isset($post['id']) && $post['id'] !== '') 
			$model = Ocorrencia::find($post['id']);
		else
			$model = new Ocorrencia;

		$model->aluno_id = Aluno::whereNome($post['aluno_id'])->first()->matricula;
		$model->descricao = $post['descricao'];
		$model->usuario_id = Auth::user()->ni;

		if ($model->save()) 
			return Redirect::to('/aluno/'.$model->aluno_id)->withSuccess('Ocorrência cadastrada com sucesso!');

	}



	public function edit($id)
	{
		$model = Ocorrencia::find($id);
		if ($model->usuario_id !== Auth::user()->ni) 
			return Redirect::to('/aluno/'.$model->aluno_id)->withDanger('Somente o autor pode editar esta mensagem!');

		$model->aluno_id = $model->aluno->nome;
		return View::make('ocorrencia.create', ['model'=>$model]);


	}



	public function getDelete($id)
	{
		$model = Ocorrencia::find($id);
		if ($model->usuario_id !== Auth::user()->ni) 
			return Redirect::to('/aluno/'.$model->aluno_id)->withDanger('Somente o autor pode excluir esta mensagem!');

		if (Ocorrencia::find($id)->delete())
			return Redirect::to('/aluno/'.$model->aluno_id)->withSuccess('Ocorrência deletada com sucesso!');
	}
}