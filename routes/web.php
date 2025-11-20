<?php

use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\CourseController;
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
})->name('about');

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


Route::get("/course", [CourseController::class, 'table'])->name('course');

Route::get("/course/create", [CourseController::class, 'create']);

Route::post("/save-course", [CourseController::class, 'save']);

Route::get("/edit-course/{id}", [CourseController::class, 'edit'])->name('edit_course');

Route::patch("/update-course/{id}", [CourseController::class, 'update']);



// Admission Route
Route::get("/admission", [AdmissionController::class, 'table']);
