@extends('layouts.app')

@section('content')
<div class="fond_add"></div>
<section class="home">
    <!-- <div class="carrousel">
        <div>vente de particulier à particulier sans frais</div>
    </div> -->

    <section class="message">
        <div>
            <div class="message_window">
        
            </div>
            <form method="POST" action="/message">
            @csrf
                <input type="text" name="message"/>
                @foreach($receiver_annonces as $annonce)
                <input type="hidden" name="id_receiver" value="<?php echo $annonce->id ;?>" />
                @endforeach
                <label for="send"><i class="fas fa-paper-plane"></i></label>
                <input type="submit" id="send" style="display:none;"/>
            </form>
        </div>

       <div class="receiver_info">
            @foreach($receiver_name as $receiver_info)
                <?php $receiver_picture= $receiver_info->profile_picture; ?>
                <div class="profile_picture" style='background-image: url({{asset("images/profile_picture/$receiver_picture")}});'></div>
                
                <p class="name_receiver">{{ $receiver_info->name}}</p>
           @endforeach


           <div class="annonces">
               <h5>ses annonces</h5>
               <div class="all_annonces">
               @foreach($receiver_annonces as $annonce)
                    <?php $picture_annonce = $annonce->picture1; $link = $annonce->id_annonce;?>
                    
                    <a href="/annonce/<?php echo $link; ?>">
                        <div class="annonce" style='background-image: url({{asset("images/annonce/$picture_annonce")}});'>
                        </div>
                    </a>
               @endforeach
               </div>
           </div>
       </div>
    </section>

</section>
@endsection