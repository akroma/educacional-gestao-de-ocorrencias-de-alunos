@extends('layouts.main')


@section('content')
	{{ Form::model($model, ['url'=>'/aluno', 'method'=>'post', 'files'=>true]) }}
		<fieldset class="">
			<h1>Cadastrar Aluno</h1>

			<div class="form-group">
				{{ Form::label('matricula', 'Matricula', ['class'=>'control-label']) }}
				<div class="form-control-wrapper">
					{{ Form::text('matricula', null, ['class'=>'form-control', 'placeholder'=>'Numero da matricula', 'required'=>true, $model->matricula !== null ? 'readonly' : '' =>'']) }}
					<span class="material-input"></span>
				</div>
			</div>


			<div class="form-group">
				{{ Form::label('nome', 'Nome', ['class'=>'control-label']) }}
				<div class="form-control-wrapper">
					{{ Form::text('nome', null, ['class'=>'form-control', 'placeholder'=>'Nome do usuário', 'required'=>true]) }}
					<span class="material-input"></span>
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('turma_id', 'Turma', ['class'=>'control-label']) }}
				<div class="form-control-wrapper">
					{{ Form::select('turma_id', array_pluck($turmas, 'sigla', 'id'), null,['class'=>'form-control', 'placeholder'=>'Curso da turma']) }}
					<span class="material-input"></span>
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('foto', 'Foto', ['class'=>'control-label']) }}

				<div class="form-control-wrapper fileinput">
					<div class="floating-label">Browse...</div>
					<input type="text" readonly="" class="form-control empty" value="Selecione uma foto">
					{{ Form::file('foto') }}
					<span class="material-input"></span>
					<script type="text/javascript">
					window.onload = function() {
						$('input[type="file"]').change(function (e) {
							$(this).siblings('input').val($(this).val());
						})
					};
					</script>

					<!-- <input type="text" readonly="" class="form-control floating-label" placeholder="Browse...">
                	<input type="file" id="inputFile" multiple=""> -->



					<!-- <input type="text" readonly="" class="form-control" placeholder="Escolha uma foto .jpg ou .png"> -->
					<!-- {{ Form::file('foto', []) }} -->
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
	{{ Form::close() }}
@stop