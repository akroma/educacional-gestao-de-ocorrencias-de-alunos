<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuario';

	protected $primaryKey = 'ni';


	private $rules = [
		'ni'=>'required|numeric',
		'nome'=>'required|min:3',
		'acesso'=>'required'
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



	public function getRememberToken()
	{
		return null;
	}
	public function setRememberToken($value){
		return null;
	}


	/*public function errors()
	{
		return $this->errors->toArray();
	}*/


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded = [];


/*	public function acesso()
	{
		return $this->belongsTo('Acesso');
	}*/

}
