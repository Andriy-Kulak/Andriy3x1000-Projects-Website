<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProjectType;
use Illuminate\Http\Request;
use App;

class ProjectsController extends Controller {

	//create a new projects instance

	public function __construct()
	{
		$this->middleware('auth');
	}

	//Show all notices
	//@return string

	public function index()
	{
		return 'all projects';
	}

	//show a page to create a new project request

public function create()
	{
		//get list of type of projects
		$projects = ProjectType::lists('name', 'id');

		//load a view to create a new project
		return view('projects.create', compact('projects'));
	}
	/* We don't need a confirm function at this point

	public function confirm(Requests\PrepareProjectRequest $request)
	{
		return $request->all();
	}
	*/
	public function store()
	{
		$ProjectsList = new ProjectsList;
		$ProjectsList->save();
	}
}
