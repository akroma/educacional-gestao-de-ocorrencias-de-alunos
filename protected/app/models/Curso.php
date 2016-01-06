<?php

class Curso extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'curso';


	private $rules = [
		'nome'=>'required|min:3',
		'tipo'=>'required'
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


	public function turmas()
	{
		return $this->hasMany('Turma');
	}


}
