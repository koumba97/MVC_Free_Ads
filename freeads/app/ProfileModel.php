<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    //

    protected $table="users";
    public $timestamp=false;

    public function updateProfile($id, $name, $picture_name){
        //return;
        //ProfileModel::where('id', $id);
        \DB::table('users')
        ->where('id', $id)
        ->update(['name'=>$name, 'profile_picture'=>$picture_name]);
           
        return redirect()->to("profile/$id")->send();
    }
}
