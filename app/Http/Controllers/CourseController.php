<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function table()
    {
        $courses = Course::all();
        return view('course.table', compact('courses'));
    }

    public function create()
    {
        return view('course.create');
    }


    public function save(Request $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->price = $request->price;
        $course->description = $request->description;
        $img = $request->image;
        if ($img) {
            $file_name = time() . "." . $img->getClientOriginalExtension(); //12345.png
            $img->move("images/", $file_name);
            $course->image = "images/$file_name";
        }
        $course->save();
        toast("Course created successfully", "success");
        return redirect()->back();
    }

    public function edit($id)
    {
        $course = Course::find($id);
        return view('course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course->name = $request->name;
        $course->price = $request->price;
        $course->description = $request->description;
        $img = $request->image;
        if ($img) {
            $file_name = time() . "." . $img->getClientOriginalExtension(); //12345.png
            $img->move("images/", $file_name);
            $course->image = "images/$file_name";
        }
        $course->save();
        toast("Course updated successfully", "success");
        return redirect('/course');
    }
}
