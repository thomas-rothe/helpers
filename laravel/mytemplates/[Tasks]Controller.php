<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\[Task];

class TasksController extends Controller
{
    const VALIDATION_RULES = [
        'title'		=>'required|min:5',
        'description'	=>'required|max:500',
    ];

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        [$task] = [Task]::all();
        return view('[tasks].index', compact(
            '[task]'
        ));
    }

    public function create()
    {
        return view('[tasks].create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), self::VALIDATION_RULES);
	
	if ($validator->fails()) {
                return redirect('tasks.create')
                    ->withErrors($validator)
                    ->withInput(/*Input::except('password')*/);
	} else {
                [Task]::create($request([
                    'title',
                    'description',
                ]));
		
                // Session::flash('message', 'Successfully created!');
		
                return redirect('[tasks]');
	}
    }

    public function show([Task] [$task])
    {
        return view('[tasks].show', compact(
            '[task]'
        ));
    }

    public function edit([Task] [$task])
    {
        return view('[tasks].edit', compact(
            '[task]'
        ));
    }

    public function update([Task] [$task], Request $request)
    {
        $this->validate(request(), self::VALIDATION_RULES);
	
	if ($validator->fails()) {
                return redirect('tasks.edit')
                    ->withErrors($validator)
                    ->withInput(/*Input::except('password')*/);
	} else {
		[$task]->fill($request([
			'title',
			'description',
		]));
		
		// Session::flash('message', 'Successfully created!');
		
		return redirect('[tasks]');
	}
    }

    public function destroy([Task] [$task])
    {
        [$task]->delete();

	// Session::flash('message', 'Successfully deleted!');

        return redirect('[tasks]');
    }
}
