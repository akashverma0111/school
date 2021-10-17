<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile(Request $request){
        $user = User::find(Crypt::decrypt($request->id));
        return view('student.profile', ['user' => $user]);

    }
    public function edit(Request $request){
        $user = User::find(Crypt::decrypt($request->id));
        return view('student.updateprofile', ['user' => $user]);

    }
    public function update(Request $request){
        
        
        $u=explode('/', url()->previous());
        
        $id = Crypt::decrypt(end($u));
        $file = $request->file('file');
        if($file != null){
            $image = $request->file('file')->hashName();
            $file->store('uploads');
        }else{
            $image = DB::table('users')->where('id', $id)->get('user_image');
           // dd($image);
            $image = $image[0]->user_image;
        }
        $user = User::where('id', $id)->update([
            'user_name' => $request->username,
            'mobile' => $request->mobile,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'user_image' => $image,
        ]);
        session()->put('msg', 'profile update successfully....');

        $user = User::find($id);
        return view('student.profile', ['user' => $user]);
    }
    public function changepassword(Request $request){

        
        $u=explode('/', url()->previous());
        
        $id = Crypt::decrypt(end($u));
        //dd($id);
        $dbpass = User::find($id)->password;
        //
        if(Hash::check($request->opass, $dbpass)){
    if ($request->npass != $request->opass) {
        if ($request->npass == $request->cpass) {
            $pass = Hash::make($request->npass);
            dd($pass);
        }else{

        session()->put('cpass', 'your confirm password must be same to new password');
            return redirect()->back();
        }
    }else{

        session()->put('npass', 'your new password can not be old password');
            return redirect()->back();
    }

        }else{

        session()->put('opass', 'your old password is wrong');
            return redirect()->back();
        }
    }
}
