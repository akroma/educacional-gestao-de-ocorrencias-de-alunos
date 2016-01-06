<?php

class Aluno extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'aluno';
	protected $primaryKey = 'matricula';

	private $rules = [
		'matricula'=>'required|integer|unique:aluno',
		'nome'=>'required|min:3',
		'turma_id'=>'required',
		'foto'=>'max:2000',
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


	public function turma()
	{
		return $this->belongsTo('Turma');
	}

	// public function ocorrencias()
	// {
	// 	return $this->hasMany('Ocorrencia', 'aluno_id', 'matricula');
	// }
}
