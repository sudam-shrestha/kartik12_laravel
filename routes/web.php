<?php

use App\Models\Company;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // toast("home page loaded", "error");
    // alert("title", "are you sure?", "warning");
    $companies = Company::all();
    return view('welcome', compact('companies'));
});

Route::get("/about", function () {
    return view('about');
});

Route::get("/contact", function () {
    return view('contact');
});

Route::get("/service", function () {
    return view('service');
});
//page,css,js,image(manually file) | command

Route::post("/save-company", function (Request $request) {
    $company = new Company();
    $company->name = $request->name;
    $company->email = $request->email;
    $company->contact = $request->contact;
    $company->address = $request->address;
    $img = $request->logo;
    if ($img) {
        $file_name = time() . "." . $img->getClientOriginalExtension(); //12345.png
        $img->move("images/", $file_name);
        $company->image = "images/$file_name";
    }
    $company->save();
    toast("Company created successfully", "success");
    return redirect("/");
});

Route::delete("/delete-company/{id}", function ($id) {
    Company::find($id)->delete();
    toast("Company deleted successfully", "success");
    return redirect()->back();
});

// Route::get("/course/{category}/{courseId}", function($cat, $id){
//     return $cat.$id;
// });

//use kabab case for url
//post create C
//get read R
//put/patch update U
//delete delete D
// ctrl+space (for option)


Route::get("/course", function () {
    $courses = Course::all();
    return view('course.table', compact('courses'));
});

Route::get("/course/create", function () {
    return view('course.create');
});

Route::post("/save-course", function (Request $request) {
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
});

Route::get("/edit-course/{id}", function ($id) {
    $course = Course::find($id);
    return view('course.edit', compact('course'));
});


Route::patch("/update-course/{id}", function (Request $request, $id) {
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
});
