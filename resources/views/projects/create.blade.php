@extends('app')

@section('content')

	<h1 class="page-heading">Post a New Project</h1>

	{!! Form::open(['method' => 'POST', 'action' => 'ProjectsController@store']) !!}

	<div class="form-group">
		{!! Form::label('project_type', 'Project/Inquiry Type:') !!}
		{!! Form::select('project_type', $projects , null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('requester_name', 'First and Last Name:') !!}
		{!! Form::text('requester_name', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('requester_email', 'Email we can reach you at:') !!}
		{!! Form::text('requester_email', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('requester_phone', 'Phone number we can reach you at:') !!}
		{!! Form::text('requester_phone', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('brief_description', 'Brief Description (feel free to include any links and samples):') !!}
		{!! Form::textarea('brief_description', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Submit Project to Andriy!', ['class' =>'btn btn-primary form-control']) !!}
	</div>

	{!! Form::close() !!}

	@include ('errors.list')



@endsection