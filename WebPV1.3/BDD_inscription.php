<!DOCTYPE html>
<html lang="fr">
    <head>

        <title>Vos informations</title>

    </head>
    <body>
        <?php
                    include_once("AccerBDD.php");
                    $bdd=connexobject("webproject","myparam");
                    $surname=$_POST['surname'];
                    $name=$_POST['name'];
                    $location=$_POST['location'];
                    $mail=$_POST['mail'];
                    $role=$_POST['role'];
                    $psw=$_POST['psw'];


                    $req = $bdd->prepare('INSERT INTO user (id,first_name, last_name, email, role, campus, cart, password) VALUES(NULL,?, ?, ?, ?, ?,NULL, ?)');
                    $req->execute(array($surname, $name, $mail,$role,$location, $psw));

                    echo"<script type=\"text/javascript\">
                    alert(\"The request returned : $name, $surname, $mail, $role\")
                    window.location='main.php';
                    </script>";

        ?>
    </body>
</html>
