<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectsList extends Model {

	//A project is submitted by a unique User

	public function user()
	{
		return $this->belongsTo('App\User');
	}


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function project_type()
	{
		return $this->belongsTo('App\ProjectType');
	}


	protected $fillable =
	[
	//'id', (For safety reasons, you should not have User_ids fillable)
	//'user_id', (For safety reasons, you should not have User_ids fillable)
	'project_type',
	'requester_name',
	'requester_email',
	'requester_phone',
	'brief_description'
	];

}
