@extends('layouts.app')

@section('content')
<section class="profil">
    <form method="post" class="form_edit" action="update_user" enctype="multipart/form-data">
        @csrf
        <?php $picture= auth()->user()->profile_picture;?>
        <div class="div_picture_content">
            <div class="profil_picture_edit" style='background-image: url({{asset("images/profile_picture/$picture")}});'></div>
        </div>
        <label for="profil_file_input">
            <i class="fas fa-camera"></i>
        </label>
       
        <input type="hidden" name="picture_name" id="picture_name"  value="{{ Auth::user()->profile_picture }}" />
        <input id="profil_file_input" style="display:none;" name="profil_file" type="file"/>

        <p>nom : <input type="text" name="name"  value="{{ Auth::user()->name }}" /></p>
        <br>
        <!-- <p>e-mail : <input type="email" name="email"  value="{{ Auth::user()->email }}" /></p> -->
        <br>
        <p>mot de passe : <input type="password" name="password" /></p>
        <br>
        <p>confirmation : <input type="password" name="password_confirmation" /></a>
        <br>
        <button type="submit">Send</button>
    </form>
</section>
@endsection