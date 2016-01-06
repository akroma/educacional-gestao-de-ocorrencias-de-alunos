@extends('layouts.main')

@section('content')
	<h1 class="title">Resultados da Busca</h1>


	<ul class="alunos-list">
		<?php $term = Request::all()['term'] ?>
		<?php foreach ($alunos as $key => $aluno): ?>
			<li class="col-lg-3 panel">
				<div class="img-wrapper ">
					<?php echo HTML::image('/uploads/'.$aluno->foto, 'Foto do aluno', ['class'=>'img-aluno']) ?>
				</div>
				<h3><a href="<?php echo URL::to('/') ?>/aluno/<?php echo $aluno->matricula ?>" class="btn btn-flat btn-default"><?php echo str_ireplace($term, "<b>".$term."</b>", $aluno->nome) ?> <div class="ripple-wrapper"></div> </a></h3>				
			</li>
		<?php endforeach ?>
	</ul>
@stop
