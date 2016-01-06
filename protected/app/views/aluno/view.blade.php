@extends('layouts.main')

@section('content')
	<div class="aluno-view">

		<div class="col-lg-2">
			{{ HTML::image( 'uploads/'.$aluno->foto, 'Foto do aluno', ['class'=>'img-rounded'] ) }}
			<p> 
				<b>Matricula:</b> 
				<?php print_r($aluno->matricula) ?></p>
			<p>
				<b>Nome:</b>
				<?php print_r($aluno->nome) ?>
			</p>

			<p>
				<b>Turma:</b>
				<?php print_r($aluno->turma->sigla) ?>
			</p>
			
			<?php if (Auth::user() !== null && Auth::user()->acesso == 'adm'): ?>
				<a href="<?php echo URL::to('/') ?>/aluno/<?php echo $aluno->matricula ?>/edit" class="btn btn-xs btn-primary">
					<i class="glyphicon glyphicon-pencil"></i> Editar <span class="ripple-wrapper"></span>
				</a>

				 <a href="<?php echo URL::to('/aluno/delete/'.$aluno->matricula) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Tem certeza que quer excluir a ocorrência?')">
				 	<i class="glyphicon glyphicon-trash"></i> Excluir <span class="ripple-wrapper"></span>
				</a>
			<?php endif ?>

			<a href="<?php echo URL::to('/ocorrencia/create/'.$aluno->matricula) ?>" class="btn btn-xs btn-success">
			 	<i class="glyphicon glyphicon-floppy-disk"></i> Criar Ocorrência <span class="ripple-wrapper"></span>
		</a>
		</div>


		<div class="col-lg-10">
			<?php 
			if (count($ocorrencias) <= 0) :
				?>
				<h3>{{$aluno->nome}} não tem nenhuma ocorrência :)</h3>
				<?php
			endif;
			 ?>
			<?php foreach ($ocorrencias as $key => $value): ?>
				<div class="col-lg-12">
					<div class="panel panel-default">
		                <div class="panel-body">
		                	<div class="col-lg-10">
		                    <?php echo $value->descricao ?>
		                	</div>


		                    <div class="panel-info col-lg-2 left-separator pull-right">
		                		<a href="<?php echo URL::to('/') ?>/ocorrencia/<?php echo $value->id ?>/edit" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>Editar</a>
		                		<a href="<?php echo URL::to('/') ?>/ocorrencia/delete/<?php echo $value->id ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que quer excluir a ocorrência?')"><i class="glyphicon glyphicon-trash"></i>Excluir</a>
		                    </div>
		                </div>
		                <div class="panel-heading footer">
		                	<?php echo $value->professor->nome,' | Criada em: ',date('d/m/Y', strtotime($value->created_at)) ?>
		                </div>
		            </div>
				</div>
			<?php endforeach ?>
			
			<hr class="clearfix"></hr>
			<div class="col-lg-10">
			{{ $ocorrencias->links() }}
			</div>
		</div>

	</div>
@stop