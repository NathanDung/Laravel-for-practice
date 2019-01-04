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

    public function show($id)
    {
    	$project = project::findOrFail($id);
    	return view('projects.show', compact('project'));
    }

    public function store()
    {
    	$project = new project();
    	$project->title = request('title');
    	$project->description = request('description');
    	$project->save();
    	return redirect('/projects');
    }

    public function edit($id)
    {
    	$project = project::findOrFail($id);

    	return view('projects.edit', compact('project'));
    }

    public function update($id)
    {
    	$project = project::findOrFail($id);
    	$project->title = request('title');
    	$project->description = request('description');
    	$project->save();
    	return redirect('/projects');
    }

    public function destroy($id)
    {
    	project::findOrFail($id)->delete();
    	// $project = project::find($id);
    	// $project->delete();
    	return redirect('/projects');
    }
}