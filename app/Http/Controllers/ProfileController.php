<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use IIluminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profiles.profile');
    }

    public function addProfile(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
        ]);

        $profiles =new Profile;
        $profiles-> name = $request->input('name');
        $profiles-> user_id= Auth::user()->id;
        $profiles-> designation = $request->input('designation');
        if($request->hasFile('profile_pic'))
        {
            $request->validate([
                'profile_pic' => 'required|image'
            ]);

            $file= request()->file('profile_pic');
            $file->move(public_path() . '/uploads/',$file->getClientOriginalName());
            $url = URL::to("/").'/uploads/'.$file->getClientOriginalName();
        }
        $profiles->profile_pic = $url;
        $profiles->save();
        return redirect('/home')->with('response','Profile Added Successfully');
        
    }
}
