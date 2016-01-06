@extends('layouts.main')

@section('content')
	{{ Form::model($model, ['url'=>'/usuario/senha', 'method'=>'post']) }}
		<h2 class="title text-left">Editar senha</h2>
	<fieldset class="">



		<div class="form-group">
			{{ Form::label('senha', 'Senha', ['class'=>'control-label']) }}
			<div class="form-control-wrapper">
				{{ Form::password('senha', ['class'=>'form-control', 'placeholder'=>'Nova senha', 'required'=>true]) }}
				<span class="material-input"></span>
			</div>

			<div class="form-group">
				<label>Confirmar Senha</label>
				{{ Form::password('confirm_senha', ['class'=>'form-control confirm', 'placeholder'=>'Repita a sua senha', 'required'=>true]) }}
			</div>
			<div class="alert password alert-danger alert-dismissable" style="display: none">
			    <button type="button" class="close" data-dismiss="alert">×</button>
				As senhas devem ser identênticas
			</div>
		</div>
		
		<script type="text/javascript">
		window.onload = function  () {	
			$('form').submit(function (e) {
				if ($("input[type='password']").eq(0).val() !== $("input[type='password']").eq(1).val()) {
					e.preventDefault();
					$('.alert.password').fadeIn();
				};
			});
		}
		</script>


		<div class="form-group">
            <div class="col-lg-10">
                <button type="submit" class="btn btn-success">Cadastrar<div class="ripple-wrapper"></div></button>
                <button class="btn btn-default">Cancelar</button>
            </div>
        </div>


	</fieldset>
{{ Form::close() }}
@stop