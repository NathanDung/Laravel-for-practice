@extends('layout')

@section('title')
	Index
@endsection

@section('content')

	<!-- <h1>My <?= $foo; ?> Websites!</h1> -->
	<!-- old type of PHP -->
	<h1>My {{ $foo }} Websites!</h1>
	<!-- using Laravel blade in new type of PHP -->

<!-- 	<ul>
		<?php foreach($tasks as $task) : ?>
			<li><?= $task; ?></li>
		<?php endforeach; ?>	
	</ul> --> 
	<!-- old type of PHP -->

	@foreach($tasks as $task)
		<li>{{ $task }}</li>
	@endforeach 
	<!-- using Laravel blade in new type of PHP -->

@endsection 