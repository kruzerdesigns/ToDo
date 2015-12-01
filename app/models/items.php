<?php


class items extends Eloquent{

	protected $table = 'list';

	protected $fillable = array('name, dueDate');


	public function complete(){
		$this->completed = $this->completed ? false : true;
		$this->save();
	}
	
}