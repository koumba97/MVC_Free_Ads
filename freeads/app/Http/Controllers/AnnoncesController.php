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
       $insert->insert($title, $description, $price, $picture1, $picture2, $picture3, $picture4, $id_vendor);

    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_annonce)
    {
        return view('annonce.annonce');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
