<!DOCTYPE html>
<html lang="fr">
    <head>
        
        <title>Vos informations</title>

    </head>
    <body>
        <?php
                    include_once("AccerBDD.php");
                    $bdd=connexobject("web","myparam"); 

                    $req = $bdd->prepare('INSERT INTO utilisateur (NOM_UTILISATEUR, PRENOM_UTILISATEUR, CENTRE_CESI, COURIEL, MPD) VALUES(?, ?, ?, ?, ?)');
                    $req->execute(array($_POST['surname'], $_POST['name'], $_POST['location'], $_POST['mail'], $_POST['psw'])); 
        ?>
    </body>
</html>