<?php
session_start();
if(null!==($_SESSION['username'] && $_SESSION['connected'])){
    session_unset();
    session_destroy();
    
   echo"<script type=\"text/javascript\">
                alert(\"The session has been unsetted\")
                window.location='main.php';
                </script>";
                
}
else{
    echo"<h1> Still connected </h1>";
}

?>