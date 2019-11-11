<?php
 session_start();

//Define the state to false to block the unconnected users
 $state=false;
 $_SESSION['connected']="$state";


//include the connection requirements for the database
 include_once("AccerBDD.php");

//starting the connection with the bdd named webproject with the config informations in the file "myparam".inc.php
 $bdd=connexobject("webproject","myparam");

//prepared statement to select the password from the database to compare with the typed password
 $req2 = $bdd->prepare('SELECT password FROM user WHERE email = ?');
 $uname=($_POST['uname']);

//execute the statement to select the password by the email/account name
 $req2->execute(array($uname));
 $ligne=$req2->fetch();
 $mdp = $ligne[0];
 
//Select the psw typed in the form
 $mdp_ecrit = $_POST['psw'];



//check if psw wrong
    if($mdp !== $mdp_ecrit){
        echo"<script type=\"text/javascript\">
        alert(\"Wrong password or error\")
        window.location='connexion.php';
        </script>";
    }    
    
    else{
//if psw is good check the role of the user to redirect him to the adapted homepage
        $req2 = $bdd->prepare('SELECT role FROM user WHERE email = ?');
        $req2->execute(array($uname));
        $ligne=$req2->fetch();
        $role = $ligne[0];
        echo"$role";

/*starting a session
saving the username ,set the $_SESSION[connected] variable to "yes", and define the $_SESSION[role] to the role found in the database
*/
        $_SESSION['username'] = $uname;
        $_SESSION['connected']="yes";

        $_SESSION['role']=$role;

        echo"<script type=\"text/javascript\">
        alert(\"You are connected as : $uname\")
        window.location='main.php';
        </script>"; 
        //Mettre config sessions et cookies 
    }
    
?>