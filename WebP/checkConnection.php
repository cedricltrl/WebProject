<?php
    $state=false;



    include_once("AccerBDD.php");
    $bdd=connexobject("web","myparam");
    $req2 = $bdd->prepare('SELECT MPD FROM utilisateur WHERE COURIEL = ?');
    $uname=($_POST['uname']);
    $req2->execute(array($uname));
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
            //on enregistre le nom d'utilisateur en session
            $_SESSION['username'] = $uname;
            $_SESSION['connected']=!$state;

            //Mettre config sessions et cookies 











            //on redirige vers le fichier main.php
            echo"<script type=\"text/javascript\">
            alert(\"You are connected as : $uname\")
            window.location='test.php';
            </script>"; 
        }
?>