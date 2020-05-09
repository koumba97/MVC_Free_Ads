<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        ProfileModel::where('id', $id)
        ->update(['name'=>$name, 'email'=>$email]);

        return redirect()->to("profile/$id")->send();
    }

    public function destroy($id)
    {
        //
    }
}
