    <?php
//include the database connection requirements
    include_once("AccerBDD.php");
//start the database connection with the good db name and the good param file name        
    $bdd=connexobject("webproject","myparam");
//record the form answer in variable
    $surname=$_POST['surname'];
    $name=$_POST['name'];
    $location=$_POST['location'];
    $mail=$_POST['mail'];
    $role=$_POST['role'];
    $psw=$_POST['psw'];
//prepared statement then execute statement
    $req = $bdd->prepare('INSERT INTO user (id,first_name, last_name, email, role, campus, cart, password) VALUES(NULL,?, ?, ?, ?, ?,NULL, ?)');
    $req->execute(array($surname, $name, $mail,$role,$location, $psw));
//test : show the return of the variable included in the database
    echo"<script type=\"text/javascript\">
    alert(\"The request returned : $name, $surname, $mail, $role\")
    window.location='main.php';
    </script>";
    ?>

