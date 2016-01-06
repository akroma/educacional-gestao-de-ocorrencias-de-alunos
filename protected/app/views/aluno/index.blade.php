@extends('layouts.main')


@section('content')		

	<h2>Escolha uma turma do curso</h2>

	<ul class="nav nav-tabs">
		<?php foreach ($data as $key => $value): ?>
	    		<li>
	    			<a href="#<?php echo $value->id ?>" data-toggle="tab">
	    			<?php 
	    			if (preg_match('/Assistente Administrativo/', $value->nome))
	    				echo str_replace('Assistente Administrativo', 'CAI', $value->nome);
	    			else if (preg_match('/Assistente CT em Tecnologia da Informação/', $value->nome))
	    				echo str_replace('Assistente CT em Tecnologia da Informação', 'CAI', $value->nome);
	    			else if (preg_match('/Superior de Tecnologia/', $value->nome)) 
	    				echo str_replace('Superior de Tecnologia', 'CST', $value->nome);
    				else
	    				echo str_replace('Técnico ', 'CT ', $value->nome);
	    			?>
	    			</a>
	    		</li>
		<?php endforeach ?>	
	</ul>

	<div id="myTabContent" class="tab-content">

		<?php foreach ($data as $key => $value): ?>
			    <div class="tab-pane fade" id="<?php echo $value->id ?>">
					<ul class="list-turmas">
						<li class="parent"><h3>Turmas</h3></li>
							<?php if (count($value->turmas) <= 0): ?>
								<h4>Este curso ainda não tem turmas</h4>
							<?php endif ?>

				    		<?php foreach ($value->turmas as $tkey => $turma): ?>
				    	<li>
				        	<a href="<?php echo URL::to('/') ?>/turma/<?php echo $turma->id ?>">Turma <?php print_r($turma->sigla) ?></a>
				    	</li>
				    	<?php endforeach ?>
					</ul>
			    </div>
		<?php endforeach ?>	
		
			    <script type="text/javascript">
			    window.onload = function() {
			    	$(".nav.nav-tabs li").first().addClass('active in');
			    	$(".tab-content .fade").first().addClass('active in');
			    };
			    </script>
	</div>


	<?php /* foreach ($turmas as $turma): ?>
		<div class="turma col-lg-12 ">
			<h2><?php echo $turma->descricao ?> | <?php echo $turma->sigla ?> </h2>


			<?php 
			if(count($turma->alunos) <= 0):
				?>
				<h4>Esta turma ainda não tem nenhum aluno. </h4>
				<?php 
			endif;
			 ?>
			<?php foreach ($turma->alunos as $aluno): ?>
				<div class="aluno col-lg-2 panel">
					<?php echo HTML::image('/uploads/'.$aluno->foto, 'Foto do aluno', ['class'=>'img-circle img-aluno']) ?>
					<!-- <p><?php echo $aluno->matricula ?></p> -->
					<h3><a href="<?php echo URL::to('/') ?>/aluno/<?php echo $aluno->matricula ?>" class="btn btn-flat btn-default"><?php echo $aluno->nome ?> <div class="ripple-wrapper"></div> </a></h3>
				</div>
			<?php endforeach ?>
		</div>

	<?php endforeach */ ?>
@stop