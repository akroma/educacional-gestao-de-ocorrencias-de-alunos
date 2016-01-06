<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}


	public function show($id)
	{
		$model = str_replace('Controller', '', get_class($this));
		$model = new $model;
		$model = $model::find($id);
		if (isset($model->senha))
			unset($model->senha);

		return View::make('show', ['model'=>$model]);
	}

}
