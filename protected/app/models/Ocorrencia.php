<?php

class Ocorrencia extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ocorrencia';


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded = [];


	public function aluno()
	{
		return $this->belongsTo('Aluno', 'aluno_id', 'matricula');
	}

	public function professor()
	{
		return $this->belongsTo('Usuario', 'usuario_id','ni');
	}

}



