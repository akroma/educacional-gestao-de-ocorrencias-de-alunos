@extends('layouts.main')

@section('content')
	<div class="login col-lg-6" style="float: none; margin: auto">
		<div class="well bs-component">
			{{ Form::open(['url'=>'usuario/login', 'method'=>'post', 'class'=>'form-horizontal']) }}
			
				<h1 class="center title">Login</h1>

				<div class="form-group">
					{{ Form::label('ni', 'NI', ['class'=>'col-lg-2 control-label']) }}
					<div class="col-lg-10">
						<div class="form-control-wrapper">
							{{ Form::text('ni', '', ['class'=>'form-control', 'placeholder'=>'Numero ']) }}
							<span class="material-input"></span>
						</div>
					</div>
				</div>


				<div class="form-group">
					{{ Form::label('senha', 'Senha', ['class'=>'col-lg-2 control-label']) }}
					<div class="col-lg-10">
						<div class="form-control-wrapper">
							{{ Form::password('senha', ['class'=>'form-control empty', 'placeholder'=>'Senha']) }}
							<span class="material-input"></span>
						</div>
					</div>
				</div>


				<div class="form-group">
					<div class="col-lg-4 col-lg-offset-2">
						{{ Form::submit('Logar', ['class'=>'btn btn-success']) }}
						<div class="ripple-wrapper"></div>
					</div>
				</div>


			{{ Form::close() }}
		</div>
	</div>
@stop