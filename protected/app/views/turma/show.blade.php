@extends('layouts.main')

@section('content')
	<div class="turma col-lg-12 ">
		<h2>Turma <?php echo $turma->sigla ?> | <?php echo $turma->curso->nome ?></h2>


		<?php 
		if(count($turma->alunos) <= 0):
			?>
			<h4>Esta turma ainda não tem nenhum aluno. </h4>
			<?php 
		endif;
		 ?>	
		 <div class="row">
		 	<div class="col-lg-3">
		 		<a href="<?php echo URL::to('/') ?>" class="btn btn-primary btn-lg btn-lg"><i class="glyphicon glyphicon-chevron-left"></i> Voltar </a>
		 		<a href="#" class="btn btn-primary btn-lg" onclick="window.print()"> <i class="glyphicon glyphicon-print"></i> Imprimir</a>
		 	</div>
		 </div>
		<div class="row">
			<?php foreach ($turma->alunos as $aluno): ?>
				<div class="col-lg-3 panel">
					<div class="img-wrapper ">
						<?php echo HTML::image('/uploads/'.$aluno->foto, 'Foto do aluno', ['class'=>'img-aluno']) ?>
					</div>
					<!-- <p><?php echo $aluno->matricula ?></p> -->
					<h3><a href="<?php echo URL::to('/') ?>/aluno/<?php echo $aluno->matricula ?>" class="btn btn-flat btn-default"><?php echo $aluno->nome ?> <div class="ripple-wrapper"></div> </a></h3>
				</div>
			<?php endforeach ?>
		</div>

	</div>
@stop