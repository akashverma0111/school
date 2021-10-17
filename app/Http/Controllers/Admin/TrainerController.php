<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\trainer;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
{
    //
    public function insert(Request $request){
        $file = $request->file('file');
        if($file != null){
        $file->store('uploads');
        trainer::insert([
            'trainer_name' => $request->trainername,
            'mobile' => $request->trainermobile,
            'field' => $request->field,
            'about_trainer' => $request->abouttrainer,
            'image' => $request->file('file')->hashName(),
        ]);
        session()->put('msg', 'trainer insert successfully....');
        return redirect()->back();
        }
        session()->put('msg', 'please add image');
        return redirect()->back();
    }

    public function show(){
        $trainer = DB::table('trainers')->get();
        return view('admin.showtrainer',['trainers' => $trainer]);
    }


    public function delete(Request $request){
        DB::table('trainers')->where('id', $request->id)->delete();
        session()->put('msg', 'tariner delete successfully....');
        return redirect()->back();
    }
    public function edit(Request $request){
        $trainer = trainer::find($request->id);
        $trainer = DB::table('trainers')->find($trainer->id);
        return view('admin.edittrainer',['trainer' => $trainer]);
    }
    public function update(Request $request){
        $u=explode('/', url()->previous());
        $id = end($u);
        $file = $request->file('file');
        if($file != null){
            $image = $request->file('file')->hashName();
            $file->store('uploads');
        }else{
            $image = DB::table('trainers')->where('id', $id)->get('image');
            $image = $image[0]->image;
        }
        trainer::where('id', $id)->update([
            'trainer_name' => $request->trainername,
            'mobile' => $request->mobile,
            'field' => $request->field,
            'about_trainer' => $request->about_trainer,
            'image' => $image,
        ]);
        session()->put('msg', 'course update successfully....');
        return redirect()->back();

    }

}
