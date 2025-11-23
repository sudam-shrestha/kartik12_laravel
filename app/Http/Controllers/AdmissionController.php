<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Course;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function table()
    {
        $admissions = Admission::all();
        return view('admission.table', compact('admissions'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('admission.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $admission = new Admission();
        $admission->name = $request->name;
        $admission->email = $request->email;
        $admission->phone = $request->phone;
        $admission->course_id = $request->course_id;
        $admission->save();
        toast("Admission created successfully", "success");
        return redirect()->back();
    }

    public function delete($id)
    {
        $admission = Admission::find($id);
        $admission->delete();
        toast("Admission delete successfully", "success");
        return redirect()->back();
    }

    public function edit($id)
    {
        $admission = Admission::find($id);
        $courses = Course::all();
        return view('admission.edit', compact('admission', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $admission = Admission::find($id);
        $admission->name = $request->name;
        $admission->email = $request->email;
        $admission->phone = $request->phone;
        $admission->course_id = $request->course_id;
        $admission->save();
        toast("Admission updated successfully", "success");
        return redirect()->back();
    }
}
