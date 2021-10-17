<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\course;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //
    public function insert(Request $request){
        
        $file = $request->file('file');
        if($file != null){
            

        $destinationPath = 'uploads';
        //$request->mypicture->storeAs($destinationPath, $user->filename);
        //$file->move($destinationPath,'a.'.$file->getClientOriginalExtension());
//$h=$file->hashName();
//dd($request->coursename);
        $file->store('uploads');
        $course = course::insert([
            'trainer' => $request->trainername,
            'fee' => $request->fee,
            'schedule' => $request->schedule,
            'sheet' => $request->sheet,
            'course_name' => $request->coursename,
            'about_course' => $request->aboutcourse,
            'image' => $request->file('file')->hashName(),
        ]);
        session()->put('msg', 'course insert successfully....');
        //dd(session('a'));
        return redirect()->back();
        }
        session()->put('msg', 'please add image');
        return redirect()->back();
        //return redirect()->back()->with('succcess','successfully insert');
    }

    public function show(){
        $course = DB::table('courses')->get();
        return view('admin.showcourse',['courses' => $course]);
    }


    public function delete(Request $request){
       // dd($request->id);
        DB::table('courses')->where('id', $request->id)->delete();
        session()->put('msg', 'course insert successfully....');
        //dd(session('a'));
        return redirect()->back();
    }
    public function edit(Request $request){
        //$course = course::findOrFail(7);

        $course = course::find($request->id);
        $course = DB::table('courses')->find($course->id);
        //dd($course);
        
        return view('admin.editcourse',['course' => $course]);
    }
    public function update(Request $request){
        //dd($request);
        $u=explode('/', url()->previous());
        $id = end($u);
        $file = $request->file('file');
        if($file != null){
            $image = $request->file('file')->hashName();
            $file->store('uploads');
        }else{
            $image = DB::table('courses')->where('id', $id)->get('image');
            $image = $image[0]->image;
        }
        //dd($image);
        $destinationPath = 'uploads';
        $course = course::where('id', $id)->update([
            'trainer' => $request->trainername,
            'fee' => $request->fee,
            'schedule' => $request->schedule,
            'sheet' => $request->sheet,
            'course_name' => $request->coursename,
            'about_course' => $request->aboutcourse,
            'image' => $image,
        ]);
        session()->put('msg', 'course update successfully....');
        return redirect()->back();

    }


}
