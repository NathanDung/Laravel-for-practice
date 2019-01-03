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

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}