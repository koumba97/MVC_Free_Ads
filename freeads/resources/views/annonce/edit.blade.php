@extends('layouts.app')
@section('content')




<div class="container">
   <section class="annonce_show">
        @foreach ($edit_annonces as $data)
            @if($data->id_vendor == auth()->id())
                <?php
                    $annonce_picture1 = $data->picture1 ;
                    $annonce_picture2 = $data->picture2 ;
                    $annonce_picture3 = $data->picture3 ;
                    $annonce_picture4 = $data->picture4 ;
                ?>
                <div class="gallery">
                    <div class="small_pictures">
                        <div class="small_picture pic1" onclick="changePictureEdit('<?php echo $annonce_picture1; ?>')" style='background-image: url({{asset("images/annonce/$annonce_picture1")}});'></div>
                        <div class="small_picture pic2" onclick="changePictureEdit('<?php echo $annonce_picture2; ?>')" style='background-image: url({{asset("images/annonce/$annonce_picture2")}});'></div>
                        <div class="small_picture pic3" onclick="changePictureEdit('<?php echo $annonce_picture3; ?>')" style='background-image: url({{asset("images/annonce/$annonce_picture3")}});'></div>
                        <div class="small_picture pic4" onclick="changePictureEdit('<?php echo $annonce_picture4; ?>')" style='background-image: url({{asset("images/annonce/$annonce_picture4")}});'></div>
                    </div>

                    <div class="show" style='background-image: url({{asset("images/annonce/$annonce_picture1")}});'></div>
                </div>

                <form class="info" method="post" enctype="multipart/form-data" action="../../annonce/update/<?php echo $data->id_annonce; ?>">
                @csrf
                    <div style="height:200px;">
                        <input type="text" class="title_edit" name="title" value="{{$data->title}}"/>
                        <div>
                            <div style="float:right;"><input type="text" value="{{ $data->price }}" class="price_edit" name="price"><h4 class="euro"> €</h4></div>
                            <p>publié le {{ $data->created_at }}<br>
                                par {{ $data->name }}
                            </p>
                        </div>

                        <select name="type">
                            <option value="accessoire">accessoires</option>
                            <option value="vetement">vêtements</option>
                            <option value="chaussures">chaussures</option>
                            <option value="beaute">beauté</option>
                            <option value="contenant">contenant</option>
                            <option value="meuble">meubles</option>
                            <option value="bijoux">bijoux</option>
                            <option value="livre">livres</option>
                            <option value="vetement">jeux</option>
                            <option value="electronique">életroniques</option>
                            <option value="autre">autre</option>
                        </select>
                    </div>

                    <textarea class="description_edit" name="description">{{ $data->description }}</textarea>

                    <div class="boutons">
                        <a href="../../annonce/delete/<?php echo $data->id_annonce; ?>"><div class="bouton_delete">supprimer</div></a>
                        <input class="bouton_edit" type="submit" value="éditer"/>
                    </div>
                </form>


            @else
            vous ne pouvez pas editer cette annonce

            @endif
       @endforeach
    </section>
</div>
@endsection