<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\course;
use App\Models\trainer;

class WelcomeController extends Controller
{
    //
    public function index(){

        $course = DB::table('courses')
            ->join('trainers', 'courses.trainer', '=', 'trainers.trainer_name')
            ->select('trainers.*', 'courses.*')->orderBy('courses.created_at', 'desc')->take(3)->get();

        $trainer = trainer::orderBy('created_at', 'desc')->take(3)->get();
        //dd($trainer);
        return view('welcome', ['courses' => $course, 'trainers' => $trainer]);
    }
    public function coursedetail(Request $request){
          $course = DB::table('courses')->find($request->id);
          return view('coursedetail', ['course' => $course]);
    }
    public function trainer(Request $request){
          $trainer = trainer::orderBy('created_at', 'desc')->take(3)->get();
          return view('trainer', ['trainers' => $trainer]);
    }
    public function course(Request $request){
         $course = DB::table('courses')
            ->join('trainers', 'courses.trainer', '=', 'trainers.trainer_name')
            ->select('trainers.*', 'courses.*')->orderBy('courses.created_at', 'desc')->take(3)->get();
          return view('course', ['courses' => $course]);
    }
    public function event(Request $request){
          $event = course::orderBy('created_at', 'desc')->take(2)->get();
          return view('event', ['events' => $event]);
    }


}
