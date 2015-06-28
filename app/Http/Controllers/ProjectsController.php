<?php namespace App\Http\Controllers;

use App\Http\Requests\PrepareProjectRequest;
use App\ProjectType;
use App\ProjectsList;

/**
 * Class ProjectsController
 *
 * @package App\Http\Controllers
 */
class ProjectsController extends Controller {

	//create a new projects instance

	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * @return string
	 */
	//Show all notices
	//@return string

	public function index()
	{
		return 'all projects';
	}

	//show a page to create a new project request

	/**
	 * Returns a form view that allows you to create a Project List
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		//get list of type of projects
		$projects = ProjectType::lists('name', 'id');

		//load a view to create a new project
		return view('projects.create', compact('projects'));
	}

	/**
	 *
	 *
	 * @param PrepareProjectRequest $request
	 *
	 * @return array
	 */
	public function confirm(PrepareProjectRequest $request)
	{
		return $request->all();
	}

	public function store(PrepareProjectRequest $request)
	{
		// Mass assignment. This should not be used to reference important
		// information such as user_id because people can enter a userID
		// using PostMan
		$ProjectsList = new ProjectsList([
			'requester_name' => $request->requester_name,
			'requester_email' => $request->requester_email,
			'requester_phone' => $request->requester_phone,
			'brief_description' => $request->brief_description
		]);

		// When referencing User_id, Project Type - this is the best way to go.
		// You are making laravale reference users and project types that exist
		$ProjectsList->project_type()->associate(ProjectType::findOrFail($request->project_type));
		$ProjectsList->user()->associate(\Auth::user());
		$ProjectsList->save();

		return \Redirect::action('\App\Http\Controllers\PagesController@home')
			->with('message', 'Thanks for posting a project to Andriy! Someone will get back to you shortly!');
	}
}
