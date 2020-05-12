<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       //echo $request;
       $title = $request->input('title');
       $description = $request->input('description');
       $type = $request->input('type');
       $price = $request->input('price');
       $picture1 = $_FILES['profil_file1']['name'];
       $picture2 = $_FILES['profil_file2']['name'];
       $picture3 = $_FILES['profil_file3']['name'];
       $picture4 = $_FILES['profil_file4']['name'];

       $id_vendor=auth()->user()->id;
  
       foreach ($_FILES as $image){
            $imageName=$image['name'];
            move_uploaded_file($image["tmp_name"],"images/annonce/".$image['name']);
        }
      

       $insert= new \App\AnnoncesModel;
       $insert->insert($title, $description, $price, $type, $picture1, $picture2, $picture3, $picture4, $id_vendor);

    }

    public function store(Request $request)
    {
        //
    }

    public function show($id_annonce)
    {
        $annonce = \DB::table('annonces')
        ->where('id_annonce', $id_annonce)
        ->orderBy('id_annonce', 'desc')
        ->join('users', 'users.id', '=', 'annonces.id_vendor')
        ->get();
        return view('annonce.annonce', ['annonce' => $annonce]);
        return view('annonce.annonce');
    }

    public function mesAnnonces($id_user){

        $mes_annonces = \DB::table('annonces')
        ->where('id_vendor', $id_user)
        ->orderBy('id_annonce', 'desc')
        ->join('users', 'users.id', '=', 'annonces.id_vendor')
        ->get();
        return $mes_annonces;

    }
    public function edit($id_annonce)
    {
        $edit_annonce = \DB::table('annonces')
        ->where('id_annonce', $id_annonce)
        ->join('users', 'users.id', '=', 'annonces.id_vendor')
        ->get();

        return view('annonce.edit', ['edit_annonces' => $edit_annonce]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_annonce)
    {

        $title = $request->title;
        $description = $request->description;
        $price = $request->price;
        $type = $request->type;

        $id_user= auth()->id();

        \DB::table('annonces')
        ->where('id_annonce', $id_annonce)
        ->update(['title'=>$title, 'description'=>$description, 'price'=>$price, 'type'=>$type]);

        redirect()->to("profile/$id_user")->send();

    }

    public function search(Request $request)
    {
        $search = $request->search;
        $search_annonces = \DB::table('annonces')
        ->where('title', 'like', '%'. $search .'%')
        ->orderBy('id_annonce', 'desc')
        ->join('users', 'users.id', '=', 'annonces.id_vendor')
        ->get();
        ///return $search_annonces;
        return view('annonce.search', ['search_annonces' => $search_annonces]);
    }

    
    public function delete($id_annonce)
    {
        \DB::table('annonces')
        ->where('id_annonce', $id_annonce)
        ->delete();

        $id_user= auth()->id();
        redirect()->to("profile/$id_user")->send();
    }
}
