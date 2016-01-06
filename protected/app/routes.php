<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
	if (Auth::user() !== null)
		return Redirect::to('/home');
	return View::make('usuario.login');
});


Route::any('/aluno/fotos', 'AlunoController@fotos');
Route::any('/aluno/csv', 'AlunoController@csv');

// LOGIN 
Route::post('/usuario/login', 'UsuarioController@login');
Route::get('/login', function() {
	if (Auth::user() !== NULL)
			return Redirect::to('/aluno');
	return View::make('usuario.login');
});
Route::get('/usuario/login', function() {
	return View::make('usuario.login');
});

// LOGOUT
Route::get('/usuario/logout', function ()
{
	Auth::logout();
	return Redirect::to('/');
});



Route::get('/ocorrencia/create/{id}', function ($id)
{
	$model = new Ocorrencia;
	$model->aluno_id = Aluno::find($id)->nome;
	$model->turma = Aluno::find($id)->turma->sigla;
	$model->curso = Aluno::find($id)->turma->curso->nome;
	
	return View::make('ocorrencia.create', ['model'=>$model]);
});

Route::filter('auth', function ()
{
	if (Auth::user() == null )
		return Redirect::to('/login');
});


Route::resource('/home', 'HomeController');

Route::group(['before'=>'auth'], function ()
{
	Route::any('/usuario/senha', 'UsuarioController@senha');


	Route::post('/usuario/logout', 'UsuarioController@logout');

	Route::resource('/usuario', 'UsuarioController');
	Route::controller('/usuario', 'UsuarioController');
	Route::get('/aluno/search', 'AlunoController@getSearch');
	Route::resource('/ocorrencia/update', 'OcorrenciaController@update');
	Route::resource('/ocorrencia', 'OcorrenciaController');
	Route::controller('/ocorrencia', 'OcorrenciaController');


	// Route::controller('/aluno', 'AlunoController');
	Route::any('/aluno/index', 'AlunoController@index');
	Route::resource('/aluno', 'AlunoController');
	Route::controller('/aluno', 'AlunoController');


	Route::resource('/turma', 'TurmaController');
	Route::controller('/turma', 'TurmaController');

	Route::resource('/curso', 'CursoController');
	Route::controller('/curso', 'CursoController');
});





// Ajax
Route::get('/getalunos', function ()
{
	
	$term = Request::all('term')['term'];
	$alunos = Aluno::where('nome', 'LIKE', '%'.$term.'%')->get();

	$result = array_pluck($alunos, 'nome', 'matricula');
	return Response::json($result);

});

Route::get('/search', function ()
{
	
	$term = Request::all()['term'];
	
	$alunos = Aluno::where('nome', 'LIKE', '%'.$term.'%')
	->with(['turma'=>function ($query) use ($term)
	{
		$query->where('sigla', 'LIKE', '%'.$term.'%')->orWhere('descricao', 'LIKE', $term);
	}])
	->get();

	return Response::json($alunos);
});