<?php

    include_once("AccerBDD.php");
    $bdd=connexobject("web","myparam");

    $req2 = $bdd->prepare('SELECT MPD FROM utilisateur WHERE NOM_UTILISATEUR = ?');
    $req2->execute(array($_POST['uname']));
    $ligne=$req2->fetch();
    $mdp = $ligne[0];
    
    $mdp_ecrit = $_POST['psw'];
    
    if( $mdp_ecrit !== $mdp )
    {
        echo "<h1>mauvais mot de passe</h1>";
    }
    else
    {
        //ouverture session
        session_start();
        //on enregistre le login en session
        $_SESSION['surname'] = $_POST['uname'];
        //on redirige vers le fichier main.php
        header('Location:http://localhost/webproject-master/WebP/main.php');
        exit();
    }
?>