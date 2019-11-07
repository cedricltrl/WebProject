<!DOCTYPE html>
<html lang="fr">
    <head>
        
        <title>Vos informations</title>

    </head>
    <body>
        <?php
         include("AccerBDD.php");
         $idcom=connexobjet("web","myparam");
            $nom_utilisateur=$idcom->escape_string($_POST['surname']);
            $prenom_utilisateur=$idcom->escape_string($_POST['name']);
            $date=$idcom->escape_string($_POST['date']);
            $centre_cesi=$idcom->escape_string($_POST['location']);
            $couriel=$idcom->escape_string($_POST['mail']);
            $mpd=$idcom->escape_string($_POST['psw']);            
            $requete="INSERT INTO utilisateur VALUES(NULL, '$nom_utilisateur', '$prenom_utilisateur', '$couriel', NULL, '$centre_cesi', NULL, '$mpd')";
            $result=$idcom->query($requete); 
                if(!$result){
                    echo $idcom->errno;
                    echo $idcom->error;
                    echo "<script type=\"text/javascript\">
                    alert('Erreur : ".$idcom->error."')</script>";
                }
                else{
                    echo"<script type \"text/javascript\">
                    alert('Vous êtes enregistré.')</script>";
                    $idcom->close();
                }
        
        ?>
    </body>
</html>