<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>

    <style>
        form{

           
            margin-top:5%;
            width: 30%;
            margin-left: 34%;
            background-color: #fff;
            box-shadow:3px 3px 7px gray;
            padding: 30px;
            position: relative;
            border: 1px solid gray;
            border-radius:10px;
            max-width:100%;
        
        }

        @media(max-width:1000px) {
            form{
               
                width: 40%;
                margin-left: 30%;
            }
        }

        @media(max-width:700px) {
            form{
               
                width: 50%;
                margin-left: 25%;
            }
        }

        @media(max-width:500px) {
            form{
               
                width: 100%;
                margin-left: 0%;
                max-width: 100%;
            }
        }

        .title{
           
            font-size: 19px;
            margin-bottom: 15px;
            text-align: center;
            font-weight: bold;

        }

        label{
            margin-top: 25px;
            display: block;
            font-size: 17px;
            margin-bottom: 5px;

        }

        input{
            display: block;
            outline:none;
            height:30px;
            width: 100%;
        }

        .valide{
            display: block;
            height:40px;
            width: 30%;
            margin-left: 35%;
            outline:none;
            border:none;
            text-align:center;
            background-color: rgb(0, 120, 150);
            color:white;
            margin-top: 25px;
            padding: 10px;
            font-size: 17px;
            border-radius:10px;

        }

        .err{
            display: block;
            color:red;
            text-align:center;
        }
    </style>
</head>
<body>
    <p class="form">
        

        <form action="{{Route('password.confirm')}}" method="post">
        @csrf
            @if($existe)

                <p class="title">{{__("Vous avez reçu le code de réinitialisation par email !")}}</p>

                <label for="confirm">{{__("Code de réinitialisation (verifiez votre boite mail)")}}</label>
                <input type="text" name="confirm" id="confirm" required>

                @if(isset($errconfirm))

                    <span class="err" id="errconfirm">Le code de confirmation est incorrect</span>

                @endif

                <label for="newpass">{{__("Entrez un nouveau mot de passe")}}</label>
                <input type="text" name="newpass" id="newpass" required min="5">

                <label for="newpassconfirm">{{__("Confirmez le nouveau mot de passe")}}</label>
                <input type="text" name="newpassconfirm" id="newpassconfirm" min="5" required>

                @if(isset($errpass))

                    <span class="err" id="errpass">Les mots de passe sont differents</span>

                @endif

                <input class="valide" type="submit" value="Valider" >

            @else
                <p class="title">{{__("Nous n'avons trouvé aucun utilisateur avec cette adresse Email !")}}</p>

                <a href="/login" class="valide">{{__("Retour")}}</a>

            @endif

        </form>
    </p>
</body>
</html>