<?php

namespace App\Http\Controllers;

use App\project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
    	$projects = project::all();
    	return view('projects.index', compact('projects'));
    }

    public function create()
    {
    	return view('projects.create');
    }

    public function show(project $project)
    {
    	return view('projects.show', compact('project'));
    }

    public function store()
    {
    	$attributes = request()->validate([
    		'title' => ['required', 'min:3'],
    		'description' => 'required|min:5|max:100'
    	]);
 
    	project::create($attributes);

    	// project::create([
    	// 	'title' => request('title'),
    	// 	'description' => request('description')
    	// ]);

    	// $project = new project();
    	// $project->title = request('title');
    	// $project->description = request('description');
    	// $project->save();

    	return redirect('/projects');
    }

    public function edit(project $project)
    {
    	return view('projects.edit', compact('project'));
    }

    public function update(project $project)
    {
    	$project->update(request(['title', 'description']));

    	// $project->title = request('title');
    	// $project->description = request('description');
    	// $project->save();

    	return redirect('/projects');
    }

    public function destroy(project $project)
    {
    	$project->delete();

    	// $project = project::find($id);
    	// $project->delete();
    	
    	return redirect('/projects');
    }
}