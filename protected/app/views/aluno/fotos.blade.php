@extends('layouts.main')

@section('content')
	<h1>Fotos dos Alunos</h1>
	{{ Form::open(['url'=>'/aluno/fotos', 'files'=>true]) }}
		<div class="form-group">
			<label> Fotos da turma </label>
			{{ Form::file('fotos') }}
		</div>

		{{ Form::submit('Salvar', ['class'=>'btn btn-success']) }}
	{{ Form::close() }}
@stop