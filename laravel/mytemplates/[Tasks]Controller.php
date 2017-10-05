<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth');		// attach middleware 'auth' to all methods of the controller
        $this->middleware('admin-auth')		// attach middleware 'admin-auth' to the method 'admin'
            ->only('admin');
        $this->middleware('team-member')	// attach middleware 'team-member' to all methods except 'admin'
            ->except('admin');
    } */

    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact(
            'tasks'
        ));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTask $request)
    {	
        Task::create( $request()->all() );
		
        return redirect([tasks');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact(
            'task'
        ));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact(
            'task'
        ));
    }

    public function update(Task $task, StoreTask $request)
    {	
	$task->fill( $request()->all() );
		
	return redirect('tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('tasks');
    }
}
