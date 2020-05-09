@extends('layouts.app')

@section('content')
<div class="container">
   <section class="profil">
        <div class="profil_info">
            <div style="display:flex;">

                <div>
                    <div class="profil_picture"></div>
                    <a href="{{ route('profile.edit', auth()->id()) }}"><div class="button">éditer mon profil</div></a>
                </div>

                <div class="info">
                    {{ Auth::user()->name }}<br>
                    {{ Auth::user()->email }}<br>
                    membre depuis le {{ Auth::user()->created_at }}<br>
                    XX annonces publiées
                </div>
            </div>

            <div class="dernieres_annonces">
            </div>
        </div>

        <div class="profil_annonces">
            <h1>mes annonces</h1>
            <div class="mes_annonces">
      
            </div>
        </div>
   </section>
</div>
@endsection