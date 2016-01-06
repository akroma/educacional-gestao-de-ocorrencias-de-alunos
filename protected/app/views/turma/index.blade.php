@extends('layouts.main')


@section('content')
			
	<h1 class="title">Lista de Turmas</h1>
	<table class="table table-striped">
		<thead>
			<tr>
				<td>#</td>
				<td>Sigla</td>
				<td>Descrição</td>
				<td>Curso</td>
				<?php if (Auth::user() !== null && auth::user()->acesso == 'adm'): ?>
					<td>Ações</td>
				<?php endif; ?>

			</tr>
		</thead>
		<tbody>
			<?php foreach (array_chunk($turmas->getCollection()->all(), 3) as $row): ?>
			<?php foreach ($row as $key => $value): ?>
				
				<tr>
					<td><?php echo  $key + 1 ?> </td>
					<td><?php echo  $value['sigla'] ?> </td>
					<td> <?php echo $value['descricao']  ?> </td>
					<td> <?php echo $value->curso->nome  ?> </td>
					<?php if (Auth::user() !== null && auth::user()->acesso == 'adm'): ?>
						<td> 
							<a href="<?php echo URL::to('/') ?>/turma/<?php echo $value['id'] ?>/edit" class="btn btn-xs btn-primary">
								<i class="glyphicon glyphicon-pencil"></i> Editar <span class="ripple-wrapper"></span>
							</a>

							 <a href="<?php echo URL::to('/turma/delete/'.$value['id']) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Tem certeza que quer excluir esta turma?')">
							 	<i class="glyphicon glyphicon-trash"></i> Excluir <span class="ripple-wrapper"></span>
							</a>
						 </td>
					 <?php endif; ?>
				</tr>
				<?php endforeach ?>
			<?php endforeach ?>
		</tbody>
	</table>
	{{ $turmas->links() }}
@stop