<?php

namespace App\Http\Controllers;

use App\project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {
    	$projects = project::all();
    	//return compact('projects');
    	return view('projects.index', compact('projects'));
    }
}