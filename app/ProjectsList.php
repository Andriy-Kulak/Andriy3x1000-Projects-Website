<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectsList extends Model {


	//A project is submitted by a unique User

	public function user()
	{
		return $this->belongsTo('App\User');
	}	


	protected $fillable =
	[
	//'id', (was told in video it is not required)
	//'user_id', (was told in video it is not required)
	'project_type',
	'requester_name',
	'requester_email',
	'requester_phone',
	'brief_description'
	];

}
