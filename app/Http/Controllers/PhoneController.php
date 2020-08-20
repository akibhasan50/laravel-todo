<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\phone;

class PhoneController extends Controller
{
    public function index()
    {
 
    $user=phone::all();
        
       return view('page.student',compact('user'));
    }
}
