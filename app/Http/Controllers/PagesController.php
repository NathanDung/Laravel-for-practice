<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
	    	return view('first',[
			'tasks' => [
				'Go to the store',
				'Go to the market',
				'Go to work',
				'Go to the concert'
			],
			'foo' => request('inputbyyourself')
		]); 
    }

    public function second() {
    	return view('second');
    }

    public function about() {
    	return view('about');
    }
}
