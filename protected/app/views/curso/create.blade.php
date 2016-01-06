@extends('layouts.main')


@section('content')

	{{ Form::model($model, ['url'=>'curso', 'method'=>'post']) }}
		<fieldset class="">
			<h1>Cadastrar Curso</h1>
			{{ Form::hidden('id', null) }}
			<div class="form-group">
				{{ Form::label('nome', 'Nome', ['class'=>'control-label']) }}
				<div class="form-control-wrapper">
					{{ Form::text('nome', null, ['class'=>'form-control', 'placeholder'=>'Nome do curso', 'required'=>true]) }}
					<span class="material-input"></span>
				</div>
			</div>


			<div class="form-group">
				{{ Form::label('tipo', 'Tipo do Curso', ['class'=>'control-label']) }}
				<div class="radio radio-primary">
					<label>
						{{ Form::radio('tipo', 'fic', ['required'=>true]) }} FIC 
						<span class="circle"></span>
						<span class="check"></span>
					</label>

					<label>
						{{ Form::radio('tipo', 'tecnico', ['required'=>true]) }}  Técnico
						<span class="circle"></span>
						<span class="check"></span>
					</label>

					<label>
						{{ Form::radio('tipo', 'faculdade', ['required'=>true]) }}  Faculdade
						<span class="circle"></span>
						<span class="check"></span>
					</label>


					<label>
						{{ Form::radio('tipo', 'cai', ['required'=>true]) }}  CAI
						<span class="circle"></span>
						<span class="check"></span>
					</label>
				</div>
			</div>


			<div class="form-group">
                <div class="col-lg-4 ">
                    <button type="submit" class="btn btn-success">Cadastrar<div class="ripple-wrapper"></div></button>
                    <button type="reset" class="btn btn-default">Cancelar</button>
                </div>
            </div>
			
		</fieldset>

	{{ Form::close() }}


@stop