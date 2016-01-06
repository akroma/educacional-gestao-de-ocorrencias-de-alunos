@extends('layouts.main')

@section('content')
	<div class="aluno-view">
		<?php $modelName = strtolower(get_class($model)) ?>

		<div class="col-lg-10">
			<?php 
			$attributes = $model->getAttributes();
			unset($attributes['created_at']);
			unset($attributes['updated_at']);
			?>
			 <div class="show">
				 <h1 class="title"><?php echo $modelName ?></h1>
				 <?php foreach ($attributes as $key => $value): ?>
				 	<h3><?php echo str_replace('_', ' ', $key) ?></h3>
				 	<p><?php echo $value ?></p>
				 <?php endforeach ?>
			 </div>
		</div>
	</div>


	<div class="col-lg-2">	
			<?php if (Auth::user()->acesso): ?>
				<h2>Ações</h2>
				<a href="<?php echo URL::to('/') ?>/<?php echo $modelName ?>/<?php echo $model->getKey() ?>/edit" class="btn btn-xs btn-primary">
					<i class="glyphicon glyphicon-pencil"></i> Editar <span class="ripple-wrapper"></span>
				</a>

				 <a href="<?php echo URL::to('/') ?>/<?php echo $modelName ?>/delete/<?php echo $model->getKey() ?>) ?>" class="btn btn-xs btn-danger">
				 	<i class="glyphicon glyphicon-trash"></i> Excluir <span class="ripple-wrapper"></span>
				</a>
			<?php endif ?>
		</a>
	</div>
@stop