@extends('layouts.app')

@section('content')
<div class="fond_add"></div>
<section class="home">
    <div class="carrousel">
        <div>vente de particulier à particulier sans frais</div>
    </div>

    <div class="nav_result">
        <p>resultat(s) pour <b>"{{ $_GET['search']}}"</b></p>
    </div>
    <section class="annonces">
        @foreach ($search_annonces as $annonce)

            <?php $annonce_picture= $annonce->picture1 ;?>
            
            <div class="annonce">
                <div class="photo" style='background-image: url({{asset("images/annonce/$annonce_picture")}});'></div>
                <a href="{{ route('annonce.show', $annonce->id_annonce) }}">
                    <div class="details_annonce">
                        <p class="nom">{{ $annonce->title }}</p>
                        <p>par {{ $annonce->name }}</p>
                        <p class="prix">{{ $annonce->price }} €</p>
                    </div>
                </a>
                
            </div>
            
        @endforeach
    </section>

</section>
@endsection