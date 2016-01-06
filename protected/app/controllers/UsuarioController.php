<?php
/**
* 
*/
class UsuarioController extends BaseController
{
	public function login()
	{
		
		$post = Input::all();
		$senha = md5($post['senha']);

		$usuario = Usuario::whereNi($post['ni'])->first();

		if (!isset($usuario) || $senha !== $usuario->senha) {
			Session::flash('danger', 'Usuário e/ou senha incorretos');
			return Redirect::to('/login');
		}

		Auth::login($usuario);

		return Redirect::to('/aluno');
	}



	public function index()
	{
		$usuarios = Usuario::paginate(5);
		return View::make('usuario.index', ['usuarios'=>$usuarios ]);
	}

	public function create()
	{
		$model = new Usuario;
		return View::make('usuario.create', ['model'=>$model]);
	}


	public function senha()
	{
		$model = Usuario::find(Auth::user()->ni);

		if (isset($_POST['senha'])) :
			$post = Input::all();
			$model->senha = md5($post['senha']);

			if ($model->save()) :
				Session::flash('success', 'Senha alterada com sucesso!');
				return Redirect::to('/aluno');
			endif;

		endif;

		return View::make('usuario.senha', ['model'=>$model]);
	}


	public function store()
	{
		$post = Input::all();

		if(Usuario::find($post['ni']))
			$model = Usuario::find($post['ni']);
		else
			$model = new Usuario;


		if (isset($post['senha']) && $post['senha'] !== '') 
			$senha = md5($post['senha']);
		else
			$senha = md5(123);
		
		$validator = $model->validate(Input::all());

		if( !$validator ) :
	        return Redirect::to('usuario/create')->withInput($post)->withErrors($model->errors);
		else:

			$model->ni = $post['ni'];
			$model->nome = $post['nome'];
			$model->senha = $senha;
			$model->acesso = $post['acesso'];
			
			$id = $model->ni;
			if($model->save()):
				Session::flash('success', 'Usuário cadastrado com sucesso!');
				return Redirect::to('/usuario/'.$id);
			endif;

		endif;
	}



	public function edit($ni)
	{
		$model = Usuario::find($ni);
		return View::make('usuario.create', ['model'=>$model]);
	}


	public function postEditar($id)
	{
		$post = Input::all();
		$model = Usuario::find($id);
		$model->nome = $post['nome'];
		$model->acesso = $post['acesso'];

		if ($model->save()) {
			Session::flash('success', 'Usuário editado com sucess!');
			return Redirect::to('/usuario');
		}
		print_r($post);
	}



	public function getDelete($id)
	{
		if (Usuario::whereNi($id)->delete()) {
			Session::flash('success', 'Usuário deleteado com sucesso!');
			return Redirect::to('/usuario');
		}
	}

}