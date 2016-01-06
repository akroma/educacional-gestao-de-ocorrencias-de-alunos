@extends('layouts.main')


@section('content')
	<!-- {{ Form::model($model, ['url'=>'/ocorrencia'<?php echo $model !== null ? '/update' : '' ?>,  'method'=>'post']) }} -->
	<?php echo Form::model($model, ['url'=> $model !== null ? '/ocorrencia' : '/ocorrencia',   'method'=>'post']) ?>
		<fieldset class="">	
			<h1 class="title">Cadastrar ocorrência</h1>
			<div class="form-group col-lg-6">
				{{ Form::hidden('id', null) }}
				{{ Form::label('aluno_id', 'Aluno', ['class'=>'control-label', ]) }}
				<div class="form-control-wrapper">
					{{ Form::text('aluno_id', null , ['class'=>'form-control', 'placeholder'=>'Nome do Aluno', 'required'=>true, 'readonly'=>true]) }}
					<span class="material-input"></span>
				</div>
			</div>

			<div class="form-group col-lg-2">
				{{ Form::label('turma', 'Turma', ['class'=>'control-label', ]) }}
				<div class="form-control-wrapper">
					{{ Form::text('turma', null, ['class'=>'form-control', 'placeholder'=>'Turma do aluno', 'required'=>true, 'disabled'=>true]) }}
					<span class="material-input"></span>
				</div>
			</div>

			<div class="form-group col-lg-4">
				{{ Form::label('curso', 'Curso', ['class'=>'control-label', ]) }}
				<div class="form-control-wrapper">
					{{ Form::text('curso', null, ['class'=>'form-control', 'placeholder'=>'Turma do aluno', 'required'=>true, 'disabled'=>true]) }}
					<span class="material-input"></span>
				</div>
			</div>



			<div class="form-group">
				{{ Form::label('descricao', 'Descrição', ['class'=>'control-label']) }}
				<div class="form-control-wrapper">
					{{ Form::textarea('descricao', null, ['class'=>'form-control', 'placeholder'=>'Descrição da ocorrência', 'required'=>true]) }}
					<span class="material-input"></span>
				</div>
			</div>

			<div class="form-group">
                <div class="col-lg-10 ">
                    <button type="submit" class="btn btn-success">Cadastrar<div class="ripple-wrapper"></div></button>
                    <a href="<?php echo URL::to('/') ?>/aluno" class="btn btn-default">Cancelar</a>
                </div>
            </div>

            <script type="text/javascript">
            window.onload = function() {
            	$('#aluno').autocomplete({
            		source: '<?php echo URL::to("/") ?>/getalunos',
            		minLength: 1,
            		selected: function (e, ui) {
            			console.log('adaw');
            		}
            	});


            	$('form').submit(function (e) {

            		var template ='<div class="alert alert-dismissable alert-danger col-lg-4 col-center">\
									<button type="button" class="close" data-dismiss="alert">×</button>\
									<strong>Ops!</strong> O campo descrição precisa ter no minimo 10 caracteres\
								</div>; '

            		if ($(descricao).val().length < 10) 
            		{
            			$('body > header').after(template);
            			return false;
            		}
            	})
            };
            </script>

		</fieldset>
	{{ Form::close() }} 

@stop
		