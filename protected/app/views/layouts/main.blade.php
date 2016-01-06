<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gerenciador de Ocorrencias</title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL::to('/') ?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo URL::to('/') ?>/css/material.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo URL::to('/') ?>/css/ripples.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo URL::to('/') ?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo URL::to('/') ?>/css/jquery-ui.css" />

</head>
<body>

	<?php if (Auth::user() !== null): ?>

		<header class="navbar navbar-danger">
			<div class="nav-wrapper">
				<div class="navbar-header">
					<a href="<?php echo URL::to('/') ?>" class="navbar-brand">Gerenciador de Ocorrencias</a>
				</div>

				<div class="navbar-collapse">
					<ul class="nav navbar-nav">
						<?php 
						 ?>
						<?php if (Auth::user() !== null && Auth::user()->acesso === 'adm'): ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-plus"></i> Cadastrar <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo URL::to('/') ?>/usuario/create">Usuários</a></li>
									<li><a href="<?php echo URL::to('/') ?>/curso/create">Curso</a></li>
									<li><a href="<?php echo URL::to('/') ?>/turma/create">Turma</a></li>
									<li><a href="<?php echo URL::to('/') ?>/aluno/create">Aluno</a></li>
									<li><a href="<?php echo URL::to('/aluno/csv') ?>">Alunos em lote</a></li>
									<li><a href="<?php echo URL::to('/aluno/fotos') ?>">Foto dos Alunos</a></li>
								</ul>
							</li>
						


							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-list"></i> Listar <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo URL::to('/') ?>/usuario">Usuários</a></li>
									<li><a href="<?php echo URL::to('/') ?>/curso">Cursos</a></li>
									<li><a href="<?php echo URL::to('/') ?>/turma">Turmas</a></li>
								</ul>
							</li>
						<?php endif ?>

						<li>
							<a href="<?php echo URL::to('/') ?>/aluno"> <i class="glyphicon glyphicon-user"></i> Alunos</a>
						</li>
					</ul>


					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php print_r(Auth::user()->nome) ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo URL::to('/') ?>/usuario/senha"><i class="glyphicon glyphicon-wrench"></i>Mudar senha</a></li>
								<li><a href="<?php echo URL::to('/') ?>/usuario/logout"><i class="glyphicon glyphicon-off"></i>Logout</a></li>
							</ul>
						</li>
					</ul>

					{{ Form::open(['url'=>'/aluno/search', 'method'=>'get', 'class'=>'navbar-form navbar-left pull-right']) }}
						<div class="form-control-wrapper">
							<input type="text" name="term" class="form-control col-lg-8 empty term" placeholder="Pesquisar Alunos (nome, turma)" style="width: 300px">
							<span class="material-input"></span>

							<button type="submit" class="nobg"><i class="glyphicon glyphicon-search"></i></button>
						</div>
						<script type="text/javascript">
						window.onload = function() {
							$('.term').autocomplete({
								
								source: function (request, response) {
									$.ajax({
										url: '<?php echo URL::to("/") ?>/aluno/search',
										dataType: 'jsonp',
										data: {
											term: request.term
										},
										success: function(data) {
											response(data);
											console.log(data);
										}
									})
								},
								minLength: 2
							}).autocomplete('instance')._renderItem = function (ul, item) {
								return $('<li>').append('<a>'+'hue br</a>').appendTo(ul);
							}
						};
						</script>
					{{ Form::close() }}

					<?php if (Auth::check()): ?>
						
					
					

					<?php endif ?>
				</div>
			</div>
		</header>
	<?php endif ?>

	<?php if (Session::has('success')): ?>
			
		<div class="alert alert-dismissable alert-success col-lg-4 col-center">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Tudo pronto!</strong> {{ Session::get('success') }}
		</div>
	<?php endif ?>


	<?php if (Session::has('danger')): ?>
		<div class="alert alert-dismissable alert-danger col-lg-4 col-center">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Ops!</strong> {{ Session::get('danger') }} 
		</div>
	<?php endif ?>


	<?php if (Session::has('info')): ?>
		<div class="alert alert-dismissable alert-info col-lg-4 col-center">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Ops!</strong> {{ Session::get('info') }} 
		</div>
	<?php endif ?>

	<section class="content col-center col-lg-8">	
		<?php 
		if (Session::has('errors')) {
			?>
				<div class="alert alert-dismissable alert-danger col-lg-12 col-center">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<?php foreach (Session::get('errors')->toArray() as $key => $error) : ?>
						{{$error[0]}} <br>
					<?php endforeach; ?>
				</div>
			<?php  
		}
		 ?>
	</section>

	

	<section class="content col-center col-lg-8">
		<div class="<?php echo Auth::user() !== null ? 'bs-component well' : '' ?>">
			@yield('content')
		</div>
	</section>



	<div class="overlay"></div>



	<script type="text/javascript" src="<?php echo URL::to('/') ?>/js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="<?php echo URL::to('/') ?>/js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo URL::to('/') ?>/js/material.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::to('/') ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::to('/') ?>/js/ripples.min.js"></script>

	<script type="text/javascript">
		$('.img-aluno').click(function(e) {
			$(this).addClass('active-overlay');
			$(this).css({
				marginLeft: -$(this).width()/2+'px',
				marginTop: -$(this).height()/2+'px',
			});
			$('.overlay').fadeIn('slow');
		});

		$('.overlay,.btn-close').click(function (e) {
			$('.active-overlay').removeClass('active-overlay').removeAttr('style');
			$(this).fadeOut('slow');
		});	


		$.material.init();
		$.material.ripples();
		$.material.input();
		$.material.checkbox();
		$.material.radio();
	</script>
</body>
</html>