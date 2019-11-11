<?php
//start the session
session_start();
//is there is a username and a connected value destroy them
if(null!==($_SESSION['username'] && $_SESSION['connected'])){
    session_unset();
    session_destroy();
//when the session is destroyed prompt a message and redirect to the normal homepage
    echo"<script type=\"text/javascript\">
    alert(\"The session has been unsetted\")
    window.location.replace(\"/webproject/WebPV1.4/main.php\");
    </script>";
}
else{
//else the is an error with the sessions values prompt a message
    echo"<h1> Still connected </h1>";
}

?>