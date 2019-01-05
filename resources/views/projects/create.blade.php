@extends('layout')

@section('content')
	<h1 class="title">Create a new projects</h1>

	<form method="POST" action="/projects">

		{{ csrf_field() }}

		<div class="field">
			<lable class="lable" for="title">Project title</lable>

			<div class="control">
				<input type="text" name="title" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" value="{{ old('title') }}">
			</div>
		</div>

		<div class="field">
			<lable class="lable" for="description">Project description</lable>

			<div class="control">
				<textarea name="description" class="textarea {{ $errors->has('title') ? 'is-danger' : ''}}">{{ old('description') }}</textarea>
			</div>
		</div>

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Create project</button>	
			</div>
		</div>

		@if ($errors->any())
			<div class="notification is-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

	</form>
@endsection