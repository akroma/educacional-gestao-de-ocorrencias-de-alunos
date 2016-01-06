<?php

class Periodo extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'periodo';



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

	// public function ocorrencias()
	// {
	// 	return $this->hasMany('Ocorrencia', 'aluno_id', 'matricula');
	// }


}
