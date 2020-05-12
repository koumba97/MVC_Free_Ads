@extends('layouts.app')

@section('content')
<div class="fond_add"></div>
<section class="home">
    <div class="carrousel">
        <div>vente de particulier à particulier sans frais</div>
    </div>


    @guest
        @if (Route::has('register'))
        
        @endif

        @else
        <div class="add_annonce"><i class="fas fa-plus"></i> ajouter</div>
    @endguest
    <section class="annonces">

        @foreach ($annonces as $annonce)

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

<form class="popup_add" method="POST" action="create_annonce" enctype="multipart/form-data">
@csrf
    <div class="top"><div class="popin-dismiss">&times;</div></div>
    <input type="text" name="title" class="title" required="required" placeholder="nom de l'article"/>
    
    <div style="position:relative; bottom:60px; right:120px;">
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

    <textarea name="description" required="required"></textarea>

    <div style="display:flex; justify-content:space-between;">
    
    <div class="pictures">
       <label for="file1" class="picture file1"><i class="fas fa-camera"></i></label>
       <label for="file2" class="picture file2"><i class="fas fa-camera"></i></label>
       <label for="file3" class="picture file3"><i class="fas fa-camera"></i></label>
       <label for="file4" class="picture file4"><i class="fas fa-camera"></i></label>

       <p>PRIX <input class="price" name="price" required="required"/> €</p>
   </div>

   <input id="file1" style="display:none;" name="profil_file1" type="file"/>
   <input id="file2" style="display:none;" name="profil_file2" type="file"/>
   <input id="file3" style="display:none;" name="profil_file3" type="file"/>
   <input id="file4" style="display:none;" name="profil_file4" type="file"/>

    <input type="submit" value="poster"/>
</div>

</form>
@endsection
