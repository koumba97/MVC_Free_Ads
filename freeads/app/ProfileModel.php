<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    //

    protected $table="users";
    public $timestamp=false;

    public function updateProfile($id, $name, $email, $picture_name){

        //ProfileModel::where('id', $id)
        \DB::table('users')->update(['name'=>$name, 'email'=>$email, 'profile_picture'=>$picture_name]);

        return redirect()->to("profile/$id")->send();
    }
}
