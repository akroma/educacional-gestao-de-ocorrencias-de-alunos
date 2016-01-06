@extends('layouts.main')

@section('content')
	{{ Form::open(['url'=>'aluno/csv', 'method'=>'post', 'enctype'=>'multipart/form-data']) }}
		<h2>Escolha o arquivo</h2>
		{{ Form::file('csv', ['class'=>'form-group']) }}
		<!-- <p class="tooltip">O arquivo deve ter a extenção .csv</p> -->
		{{ Form::submit('Registar em lote', [ 'class'=>'btn btn-success']) }}
	{{ Form::close() }}
@stop