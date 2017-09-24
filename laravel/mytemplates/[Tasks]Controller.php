<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\[Task];

class TasksController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
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
        [Task]::create([
                'title'        	= $request->title,
                'description'  	= $request->description,
	]);

        return redirect('[tasks]');

//        // validate
//        // read more on validation at http://laravel.com/docs/validation
//        $rules = array(
//            'name'       => 'required',
//            'email'      => 'required|email',
//            'nerd_level' => 'required|numeric'
//        );
//        $validator = Validator::make(Input::all(), $rules);
//
//        // process the login
//        if ($validator->fails()) {
//            return Redirect::to('nerds/create')
//                ->withErrors($validator)
//                ->withInput(Input::except('password'));
//        } else {
//            // store
//            $nerd = new Nerd;
//            $nerd->name       = Input::get('name');
//            $nerd->email      = Input::get('email');
//            $nerd->nerd_level = Input::get('nerd_level');
//            $nerd->save();
//
//            // redirect
//            Session::flash('message', 'Successfully created nerd!');
//            return Redirect::to('nerds');
//        }
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
        [$task]->fill([
                'title'        	= $request->title,
                'description'  	= $request->description,
	]);

        return redirect('[tasks]');
    }

    public function destroy([Task] [$task])
    {
        [$task]->delete();

//        Session::flash('message', 'Successfully deleted!');

        return redirect('[tasks]');
    }
}
