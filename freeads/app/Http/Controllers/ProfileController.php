<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\User;
use App\ProfileModel;

class ProfileController extends Controller
{

    public function show(User $user)
    {
        $this->authorize ('manage', $user);
        return view('profile/profile');
        //return view ('profile.edit', compact ('user'));
    }

    public function edit(User $user)
    {
        $this->authorize ('manage', $user);
        return view ('profile.edit', compact ('user'));
    }



    public function update(Request $request)
    {
        $id = auth()->id();
        $name = $request->input('name');
        $email = $request->input('email');
        $picture_name = $request->input('picture_name');

        //$request->file('profil_file');
        print_r($_FILES);
       
        foreach ($_FILES as $image){
            $imageName=$image['name'];
            move_uploaded_file($image["tmp_name"],"images/profile_picture/".$image['name']);
        }

        $update= new \App\ProfileModel;
        $update->updateProfile($id, $name, $email, $picture_name);

        
    }

    public function destroy($id)
    {
        //
    }
}
