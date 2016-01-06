@extends('layouts.main')

@section('content')

<h1 class="title">Lista de Usuários</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<td>NI</td>
			<td>Nome</td>
			<td>Acesso</td>
			<?php if (Auth::user() !== null && auth::user()->acesso == 'adm'): ?>
				<td>Ações</td>
			<?php endif; ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach (array_chunk($usuarios->getCollection()->all(), 3) as $row): ?>

		<?php foreach ($row as $value): ?>
			
			<tr>
				<td><?php echo  $value['ni'] ?> </td>
				<td><?php echo  $value['nome'] ?> </td>
				<td> <?php echo $value['acesso']  ?> </td>

				<?php if (Auth::user() !== null && auth::user()->acesso == 'adm'): ?>
						
					<td> 
						<a href="<?php echo URL::to('/') ?>/usuario/<?php echo $value['ni'] ?>/edit" class="btn btn-xs btn-primary" >
							<i class="glyphicon glyphicon-pencil"></i> Editar <span class="ripple-wrapper"></span>
						</a>

						 <a href="<?php echo URL::to('/usuario/delete/'.$value['ni']) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Tem certeza que quer excluir este usuário?')">
						 	<i class="glyphicon glyphicon-trash"></i> Excluir <span class="ripple-wrapper"></span>
						</a>

					 </td>
				<?php endif ?>
			</tr>
			<?php endforeach ?>
		<?php endforeach ?>
	</tbody>
</table>

 {{ $usuarios->links() }}



@stop