<?php

class Turma extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'turma';

	private $rules = [
		'sigla'=>'required|min:2',
		'descricao'=>'required',
		'curso_id'=>'required',
		'data_inicio'=>'required',
	];

	public $errors = [];

	public function validate($data)
	{
		$validator = Validator::make($data, $this->rules);

		if ($validator->fails()) {
			$this->errors = $validator->messages()->toArray();
			return false;
		}
		return true;
	}

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded = [];


	public function alunos()
	
	{
		return $this->hasMany('Aluno')->orderBy('nome');
	}

	public function curso()
	{
		return $this->belongsTo('Curso');
	}

}
