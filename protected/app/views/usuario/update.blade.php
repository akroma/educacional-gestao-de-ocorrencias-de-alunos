@extends('layouts.main')


@section('content')

	<div class="login col-lg-5" style="float: none; margin: auto">

		{{ Form::model($model, ['url'=>'usuario/editar/'.$model->ni, 'method'=>'post']) }}
				<h2 class="title">Cadastrar Usuário</h2>
			<fieldset class="">
				<div class="form-group">
					{{ Form::label('ni', 'NI', ['class'=>'control-label']) }}
					<div class="form-control-wrapper">
						{{ Form::text('ni', $model->ni, ['class'=>'form-control', 'placeholder'=>'Numero ', 'readonly'=>true]) }}
						<span class="material-input"></span>
					</div>
				</div>


				<div class="form-group">
					{{ Form::label('nome', 'Nome', ['class'=>'control-label']) }}
					<div class="form-control-wrapper">
						{{ Form::text('nome', $model->nome, ['class'=>'form-control', 'placeholder'=>'Nome do usuário']) }}
						<span class="material-input"></span>
					</div>
				</div>


				<div class="form-group">
					{{ Form::label('acesso', 'Tipo Acesso', ['class'=>'control-label']) }}
					<div class="radio radio-primary">
						<label>
							{{ Form::radio('acesso', 'adm') }} Administrador |
							<span class="circle"></span>
							<span class="check"></span>
						</label>

						<label>
							{{ Form::radio('acesso', 'prof') }}  Professor
							<span class="circle"></span>
							<span class="check"></span>
						</label>
					</div>
				</div>

				<div class="form-group">
	                <div class="col-lg-10 col-lg-offset-2">
	                    <button type="submit" class="btn btn-success">Editar<div class="ripple-wrapper"></div></button>
	                    <button class="btn btn-danger">Cancelar</button>
	                </div>
	            </div>


			</fieldset>

		{{ Form::close() }}

	</div>
@stop