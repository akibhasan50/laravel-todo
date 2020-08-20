<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.todo_insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $todo = new Todo;
        $todo->name = $request->name;

        $todo->save();
        $request->session()->flash('msg','data inserted');

        return redirect('show/todo/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)

    { 
        $data = Todo::all();
       return view('crud.todo_show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo,$id)
    {
          $student= Todo::Find($id);
        return view('crud.todo_edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo,$id)
    {
       
        $todo = new Todo;
        $todo->name = $request->name;

        $todo->save();
        $request->session()->flash('msg','data updated');

        return redirect('show/todo/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo,$id)
    {
        $work = Todo::Find($id);
        $work->delete();
        return redirect()->back();
        $todo->session()->flash('msg','data deleted');
        //dd($todo);
    }
}
