@extends('layouts.main')


@section('content')

		{{ Form::model($model, ['url'=>'/usuario', 'method'=>'post']) }}
				<h2 class="title">Cadastrar Usuário</h2>
			<fieldset class="">

				<div class="form-group">
					{{ Form::label('ni', 'NI', ['class'=>'control-label']) }}
					<div class="form-control-wrapper">
						{{ Form::text('ni', null, ['class'=>'form-control', 'placeholder'=>'Numero ', $model->ni !== null ? 'readonly' : '' =>'', 'required'=>true]) }}
						<span class="material-input"></span>
					</div>
				</div>


				<div class="form-group">
					{{ Form::label('senha', 'Senha', ['class'=>'control-label']) }}
					<div class="form-control-wrapper">
						{{ Form::password('senha', ['class'=>'form-control', 'placeholder'=>'Nova Senha']) }}
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
					{{ Form::label('acesso', 'Tipo Acesso', ['class'=>'control-label']) }}
					<div class="radio radio-primary">
						<label>
							{{ Form::radio('acesso', 'adm', ['required'=>true]) }} Administrador |
							<span class="circle"></span>
							<span class="check"></span>
						</label>

						<label>
							{{ Form::radio('acesso', 'prof', ['required'=>true]) }}  Professor
							<span class="circle"></span>
							<span class="check"></span>
						</label>
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