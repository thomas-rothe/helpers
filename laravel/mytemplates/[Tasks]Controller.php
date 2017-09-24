<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\[Task];

class TasksController extends Controller
{
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

    public function store(Store[Task] $request)
    {	
        [Task]::create( $request()->all() );
		
        return redirect('[tasks]');
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

    public function update([Task] [$task], Store[Task] $request)
    {	
	[$task]->fill( $request()->all() );
		
	return redirect('[tasks]');
    }

    public function destroy([Task] [$task])
    {
        [$task]->delete();

        return redirect('[tasks]');
    }
}
