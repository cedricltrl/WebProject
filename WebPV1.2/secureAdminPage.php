<?php
session_start();

if($_SESSION['connected']!=="yes")
{
    echo"<script type=\"text/javascript\">
            alert(\"You are not connected, you can't visit this part of the website without beeing a member. Please connect your account $_SESSION[connected]\")
            window.location='connexion.php';
            </script>"; 
}

?>