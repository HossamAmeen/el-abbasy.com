<?php

namespace App\Http\Controllers;
use App\Models\{Course,CourseReservation};

use Illuminate\Http\Request;

class CourseController extends Controller
{
    function index($course_id = null){
        if($course_id){
            $course = Course::findOrFail($course_id);
            $courses = Course::where('course_type', 'course')->where("id", "!=",$course_id)->limit(3)->get();
            return view('course_detail', compact('course', 'courses'));
        }
       
        $courses = Course::where('course_type', 'course');
        $trainings = Course::where('course_type', 'training');
        if(request('name')){
            // return ":"
            $courses = $courses->where('course_name','like', '%'. request('name') .'%' );
            $trainings = $trainings->where('specialty','like', '%'. request('name') .'%' );
        }
        if(request('specialty')){
            $courses = $courses->where('specialty','like', '%'. request('specialty') .'%' );
            $trainings = $trainings->where('specialty','like', '%'. request('specialty') .'%' );
        }
        $courses = $courses->get();    
        $trainings = $trainings->get();
        return view('courses', compact("courses",'trainings'));
    }

    public function reservation(Request $request, $course_id=0)
    {
        $courses = Course::get();
        if (request()->isMethod('post')) {
            CourseReservation::create($request->all());
            $success = 1;
            return view("course_reservation", compact('courses','courses', 'success','course_id'));
        }
        
        return view("course_reservation", compact('courses', 'course_id'));
    
    }
}
