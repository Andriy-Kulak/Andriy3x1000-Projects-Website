<?php namespace App\Http\Controllers;

use App\Http\Requests\PrepareProjectRequest;
use App\ProjectType;
use App\ProjectsList;

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


	public function confirm(PrepareProjectRequest $request)
	{
		return $request->all();
	}

	public function store(PrepareProjectRequest $request)
	{

		// dd($request->requester_name);
		// die($request->requester_name);


// dd(\Auth::user()->id);
// Mass assignment. This should not be used to reference important information such as user_id because people can enter a userID using PostMan
		$ProjectsList = new ProjectsList([
			'requester_name' => $request->requester_name,
			'requester_email' => $request->requester_email,
			'requester_phone' => $request->requester_phone,
			'brief_description' => $request->brief_description
		]);
//when referencing User_id, Project Type - this is the best way to go. You are making laravale reference users and project types that exist
		$ProjectsList->project_type()->associate(ProjectType::findOrFail($request->project_type));
		$ProjectsList->user()->associate(\Auth::user());


		$ProjectsList->save();

	return \Redirect::route('/')
    ->with('message', 'Thanks for contacting us!');
	}
}
