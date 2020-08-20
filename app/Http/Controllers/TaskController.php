<?php

namespace App\Http\Controllers;

use App\Task;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task.task');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.addtask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();

        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $task->title = $request->title;
        $task->description = $request->description;

        $task->save();

        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $showtask = Task::orderBy('id','desc')->get();
        return view('task.task',compact('showtask'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task,$id)
    {
       $edittask = Task::Find($id);
       return view('task.edittask',compact('edittask'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task,$id)
    {
      

        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        
        $task = Task::Find($id);
        $task->title = $request->title;
        $task->description = $request->description;

        $task->save();
        return redirect('/tasks'); 

       
    }
    public function updatestatus(Request $request, Task $task,$id)
    {

        $task = Task::Find($id);
        $stat = $task->status;
        if($stat == 0)
        {
           DB::table('tasks')->
           where('id',$id)
           ->update(['status'=>'1']);
           return redirect('/tasks'); 
        }else{
            DB::table('tasks')->
           where('id',$id)
           ->update(['status'=>'0']);
           return redirect('/tasks'); 
        }
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task,$id)
    {
        $del = Task::destroy($id);
        return redirect('/tasks'); 
    }
}
