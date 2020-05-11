<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnoncesModel extends Model
{
    protected $table="users";
    public $timestamp=false;

    public function insert($title, $description, $price, $picture1, $picture2, $picture3, $picture4, $id_vendor){
  
        \DB::table('annonces')->insert(['created_at'=>NOW(), 'title'=>$title, 'description'=>$description, 'price'=>$price, 'id_vendor'=>$id_vendor, 'picture1'=>$picture1, 'picture2'=>$picture2, 'picture3'=>$picture3, 'picture4'=>$picture4]);

        return redirect()->to("/")->send();

    }
}
