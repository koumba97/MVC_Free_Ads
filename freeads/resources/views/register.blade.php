<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    
    <body>
      
        <h1>Register</h1>
        
        <form method="POST" action="userAdd" class="form_login">
            <h2>Inscription</h2>
            <p>nom : <input type="text" name="name"></p>
            <p>prenom : <input type="text" name="surname"></p>

            <p>email : <input type="email" name="email"></p>
            <p> mot de passe : <input type="password" name="password"></p>
            
            <div style="width:100%; text-align:center;">
                <input type="submit" value="VALIDER"/>
            </div>
        </form>
   
    </body>
</html>
