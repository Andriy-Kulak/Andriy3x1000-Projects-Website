<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model {

/*
	* No Timestamps for a project type
	*/
	public $timestamps = false;
	
	/*
	* fillable fields for a project type
	*/
	protected $fillable = 
	[
	'name'
	];
}
