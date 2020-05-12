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

        $id_user= auth()->id();
        $mes_annonces= new AnnoncesController();
        $mes_annonces->mesAnnonces($id_user);


        $mes_annonces = \DB::table('annonces')
        ->where('id_vendor', $id_user)
        ->orderBy('id_annonce', 'desc')
        ->join('users', 'users.id', '=', 'annonces.id_vendor')
        ->get();
        return view('profile.profile', ['mes_annonces' => $mes_annonces]);
        
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
        //$email = $request->input('email');
        $picture_name = $request->input('picture_name');

        //$request->file('profil_file');
        //print_r($_FILES);
       
        foreach ($_FILES as $image){
            $imageName=$image['name'];
            move_uploaded_file($image["tmp_name"],"images/profile_picture/".$image['name']);
        }
        $update= new \App\ProfileModel;
        $update->updateProfile($id, $name, $picture_name);

        
    }

    public function destroy($id)
    {
        //
    }
}
