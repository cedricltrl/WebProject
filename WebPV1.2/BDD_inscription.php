<!DOCTYPE html>
<html lang="fr">
    <head>
        
        <title>Vos informations</title>

    </head>
    <body>
        <?php
                    include_once("AccerBDD.php");
                    $bdd=connexobject("web","myparam");
                    $surname=$_POST['surname'];
                    $name=$_POST['name'];
                    $location=$_POST['location'];
                    $mail=$_POST['mail'];
                    $psw=$_POST['psw'];

                    $req = $bdd->prepare('INSERT INTO utilisateur (NOM_UTILISATEUR, PRENOM_UTILISATEUR, CENTRE_CESI, COURIEL, MPD) VALUES(?, ?, ?, ?, ?)');
                    $req->execute(array($surname, $name,$location, $mail, $psw)); 
                    
                    echo"<script type=\"text/javascript\">
                    alert(\"The request returned : $name, $surname, $mail\")
                    window.location='main.php';
                    </script>"; 
      
        ?>
    </body>
</html>