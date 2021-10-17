<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\subscribe;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function add(Request $request){
        contact::insert([
            'name' =>$request->name,
            'email' =>$request->email,
            'subject' =>$request->subject,
            'message' =>$request->message,
        ]);

        return "your contact-us successfully and we are response within 2 days. Thank you";

    }
    public function show(){
        $contact = contact::get();
        return view('admin.showcontact', ['contacts' => $contact]);
    }

    public function delete(Request $request){
        DB::table('contacts')->where('id', $request->id)->delete();
        session()->put('msg', 'course deleted successfully....');
        return redirect()->back();
    }
    public function sub(Request $request){
        $check = subscribe::where('email', $request->email)->first();
        if($check == null){
        $sub = new subscribe;
        $sub->email = $request->email;
        $sub->save();
        session()->put('msg', 'subscribe successfully....');
        return redirect()->back();
        }
        session()->put('msg', 'you are already subscribe');
        return redirect()->back();
    }

    public function showsub(){
        $subscribe = subscribe::get();
        return view('admin.showsubscribe', ['subscribes' => $subscribe]);
    }

    public function deletesub(Request $request){
        //dd($request->id);
        DB::table('subscribes')->where('id', $request->id)->delete();
        session()->put('msg', 'subscribe deleted successfully....');
        return redirect()->back();
    }



}
