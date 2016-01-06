<?php
/**
* 
*/
class CursoController extends BaseController
{
	
	public function index()
	{
		$cursos = Curso::paginate(5);
		return View::make('curso.index', ['cursos'=>$cursos]);
	}


	public function create()
	{
		$model = new Curso;
		return View::make('curso.create', ['model'=>$model]);
	}

	public function edit($id)
	{
		$model = Curso::find($id);
		return View::make('curso.create', ['model'=>$model]);
	}

/*	public function show($id)
	{
		$model = Curso::find($id);
		return View::make('show', ['model'=>$model]);
	}*/


	public function store()
	{
		$post = Input::all();
		unset($post['_token']);


		if (isset($post['id']) && $post['id'] !== '') 
			$model = Curso::find($post['id']);
		else
			$model = new Curso;


		if( !$model->validate($post) ) :
	        return Redirect::to('curso/create')->withInput($post)->withErrors($model->errors);
		else:

			$model->tipo = $post['tipo'];
			$model->nome = $post['nome'];


			if ($model->save()) {
				Session::flash('success', 'Curso cadastrado com sucesso!');
				return Redirect::to('curso/'.$model->id);
			}

		endif;
	}

	public function getDelete($id)
	{
		if (Curso::whereId($id)->delete()) 
			Session::flash('success', 'Usuário deleteado com sucesso!');
		else
			Session::flash('danger', 'Curso não pode ser deletado!');
		return Redirect::to('/curso');
	}



}