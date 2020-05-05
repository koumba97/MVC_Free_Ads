<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @push('style')
        <link rel="stylesheet"  href="{{ asset('assets/style.css') }}">
        <title>Laravel</title>
        
    </head>
    
    
    <body>


        <h1>login</h1>
        <form method="POST" action="" class="form_login">
            <h2>Connexion</h2>
            <p>email : <input type="email" name="email"></p>
            <p> mot de passe : <input type="password" name="password"></p>
            <div>
                <input type="submit" value="VALIDER"/>
            </div>

            <p class="p2">Pas de compte ?</p>
            <p><a href="/register">Inscris-toi</a></p>
        </form>
 
    </body>
</html>
