@extends('layouts.app')

@section('content')
<div class="container">
   <section class="profil">
        <div class="profil_info">
            <div>

                <?php $picture= auth()->user()->profile_picture;?>
                <div>
                    <div class="profil_picture" style='background-image: url({{asset("images/profile_picture/$picture")}});'></div>
                </div>

                <div class="info">
                    <span class="name">{{ Auth::user()->name }}</span><br>
                    {{ Auth::user()->email }}<br>
                    membre depuis le {{ Auth::user()->created_at }}<br>
                    XX annonces publiées
                </div>

                <a href="{{ route('profile.edit', auth()->id()) }}"><div class="button">éditer mon profil <i class="far fa-edit"></i></div></a>
            </div>

          
        </div>

        <div class="profil_annonces">
            <div class="mes_annonces">
                <h1>mes annonces</h1>

                <div class="annonces">

                @foreach ($mes_annonces as $mon_annonce)

                <?php $mon_annonce_picture= $mon_annonce->picture1 ;?>

                    <div class="annonce">
                        <div class="photo" style='background-image: url({{asset("images/annonce/$mon_annonce_picture")}});'></div>
                        <div class="details_annonce">
                            <a href="{{ route('annonce.show', $mon_annonce->id_annonce) }}"><p class="nom">{{ $mon_annonce->title }}</p></a>
                            <p class="prix">{{ $mon_annonce->price }} €</p>
                            <a href="annonce/edit/<?php echo $mon_annonce->id_annonce; ?>"><p class="edit"><i class="far fa-edit"></i></p></a>
                        </div>
        
                        
                    </div>

                @endforeach

                  

                </div>
            </div>

            <div class="dernieres_annonces">
                <h1>dernières annonces</h1>
            </div>
            
        </div>
   </section>
</div>
@endsection