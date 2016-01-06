@extends('layouts.main')

@section('content')

	{{ Form::model($model, ['url'=>'turma', 'method'=>'post']) }}
		<fieldset >
			<h1>Cadastrar Turma</h1>

			{{ Form::hidden('id', null) }}
			<div class="form-group">
				{{ Form::label('sigla', 'Sigla', ['class'=>'control-label']) }}
				<div class="form-control-wrapper">
					{{ Form::text('sigla', null, ['class'=>'form-control', 'placeholder'=>'Sigla da Turma ', 'required'=>true]) }}
					<span class="material-input"></span>
				</div>
			</div>


			<div class="form-group">
				{{ Form::label('descricao', 'Descrição', ['class'=>'control-label']) }}
				<div class="form-control-wrapper">
					{{ Form::text('descricao', null, ['class'=>'form-control', 'placeholder'=>'Descrição da turma ', 'required'=>true]) }}
					<span class="material-input"></span>
				</div>
			</div>


			<div class="form-group">
				{{ Form::label('curso_id', 'Curso', ['class'=>'control-label']) }}
				<div class="form-control-wrapper">
					{{ Form::select('curso_id', array_pluck($cursos, 'nome', 'id'), '',['class'=>'form-control', 'placeholder'=>'Curso da turma']) }}
					<span class="material-input"></span>
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('data_inicio', 'Data de Inicio', ['class'=>'control-label']) }}
				<div class="form-control-wrapper">
					{{ Form::text('data_inicio', null, ['class'=>'form-control', 'placeholder'=>'Data de Incio da turma', 'required'=>true]) }}
					<span class="material-input"></span>
				</div>
			</div>

			<div class="form-group">
                <div class="col-lg-10">
                    <button type="submit" class="btn btn-success">Cadastrar<div class="ripple-wrapper"></div></button>
                    <button type="reset" class="btn btn-default">Cancelar</button>
                </div>
            </div>
		</fieldset>
		<script type="text/javascript">
		window.onload = function() {
			
			$(data_inicio).datepicker();
		};
		</script>

	{{ Form::close() }}


@stop