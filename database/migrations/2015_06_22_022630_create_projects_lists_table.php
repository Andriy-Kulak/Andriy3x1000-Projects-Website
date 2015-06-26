<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects_lists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			//when a user profile is deleted, below will delete all associated projects
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('project_type');
			$table->string('requester_name');
			$table->string('requester_email');
			$table->string('requester_phone');
			$table->string('brief_description');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects_lists');
	}

}
