<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProjectsList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller {

	public function home()
	{
		$projects = ProjectsList::whereUserId(Auth::user()->id)->get();


		return view('pages.home')->with('projects', $projects);
	}

}
