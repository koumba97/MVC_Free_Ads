@extends('layouts.app')
@section('content')




<div class="container">
   <section class="annonce_show">
        @foreach ($annonce as $data)

            <?php
                $annonce_picture1 = $data->picture1 ;
                $annonce_picture2 = $data->picture2 ;
                $annonce_picture3 = $data->picture3 ;
                $annonce_picture4 = $data->picture4 ;
            ?>
            <div class="gallery">
                <div class="small_pictures">
                    <div class="small_picture pic1" onclick="changePicture('<?php echo $annonce_picture1; ?>')" style='background-image: url({{asset("images/annonce/$annonce_picture1")}});'></div>
                    <div class="small_picture pic2" onclick="changePicture('<?php echo $annonce_picture2; ?>')" style='background-image: url({{asset("images/annonce/$annonce_picture2")}});'></div>
                    <div class="small_picture pic3" onclick="changePicture('<?php echo $annonce_picture3; ?>')" style='background-image: url({{asset("images/annonce/$annonce_picture3")}});'></div>
                    <div class="small_picture pic4" onclick="changePicture('<?php echo $annonce_picture4; ?>')" style='background-image: url({{asset("images/annonce/$annonce_picture4")}});'></div>
                </div>

                <div class="show" style='background-image: url({{asset("images/annonce/$annonce_picture1")}});'></div>
            </div>

            <div class="info">

                <div style="height:100px;">
                    <h1>{{ $data->title }}</h1>
                    <h4 class="price">{{ $data->price }} €</h4>
                    <p>publié le {{ $data->created_at }}<br>
                        par {{ $data->name }}
                    </p>
                </div>

                <div class="description">
                    {{ $data->description }}
                </div>
            </div>
       @endforeach
    </section>
</div>
@endsection