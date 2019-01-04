<?php

namespace App\Http\Controllers;

use App\project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
    	$projects = project::all();
    	//return compact('projects');
    	return view('projects.index', compact('projects'));
    }

    public function create()
    {
    	return view('projects.create');
    }

    public function show()
    {

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
    	$project = project::find($id);

    	return view('projects.edit', compact('project'));
    }

    public function update($id)
    {
    	$project = project::find($id);
    	$project->title = request('title');
    	$project->description = request('description');
    	$project->save();
    	return redirect('/projects');
    }

    public function destroy($id)
    {
    	$project = project::find($id);
    	$project->delete();
    	return redirect('/projects');
    }
}