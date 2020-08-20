<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = post::all();
        // $posts = DB::table('posts')
        // ->join('students','posts.student_id','students.id')
        // ->join('catagories','posts.catagory_id','catagories.id')
        // ->get();

        return view('page.post',compact('posts'));
    }
    public function post()
    {
        $posts = post::where('student_id',2)->get();
        // $posts = DB::table('posts')
        // ->join('students','posts.student_id','students.id')
        // ->join('catagories','posts.catagory_id','catagories.id')
        // ->where('student_id',2)
        // ->get();

        return view('page.hasmany',compact('posts'));
    }
}
