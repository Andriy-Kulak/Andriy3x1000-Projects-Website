<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PrepareProjectRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'project_type' => 'required',
			'requester_name' => 'required',
			'requester_email' => 'required',
			'requester_phone' => 'required',
			'brief_description' => 'required',
		];
	}

}
