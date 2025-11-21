<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function student()
    {
        return view('student.index');
    }

     public function course()
    {
        return view('student.course');
    }
}
