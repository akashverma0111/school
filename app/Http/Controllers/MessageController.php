<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function adminmessage(){
        $user = User::get();
        //dd($user);
        return view('admin.message', ['users' => $user]);
    }
    public function showadminmessage(){
        return "yes";
    }
    public function addadminmessage(Request $request){
        $email = Auth::user()->email;
        $id = User::where('email', $email)->first('id');
        //dd($id->id);
        message::insert([
            'sender_id' => $id->id,
            'reciever_id' => $request->reciever_id,
            'type' => $request->type,
            'message' => $request->message,
            'operation' => 'send',
        ]);
        session()->put('msg', 'message send successfully....');
        return redirect()->back();
    }
    public function usermessage(){
        $user = User::get();
        //dd($user);
        return view('student.message', ['users' => $user]);
    }
    public function showusermessage(){
        $user = User::get();
        //dd($user);
        return view('student.showmessage', ['users' => $user]);
    }
    public function showuserallmessage(Request $request){
        dd(auth()->id());
        $message = message::where('sender_id', $request->id)->orWhere('reciever_id', $request->id)->orderBy('created_at', 'desc')->get();
        //dd($user);
        return compact('message');
    }
    public function addusermessage(Request $request){
        $email = Auth::user()->email;
        $id = User::where('email', $email)->first('id');
        //dd($id->id);
        message::insert([
            'sender_id' => $id->id,
            'reciever_id' => $request->reciever_id,
            'message' => $request->message,
            'operation' => 'recieve',
        ]);
        session()->put('msg', 'message send successfully....');
        return redirect()->back();
    }
}
