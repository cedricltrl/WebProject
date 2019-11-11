<?php


if($_SESSION['connected']!=="yes")
{
    echo"<script type=\"text/javascript\">
            alert(\"You are not connected, you can't visit this part of the website without beeing a member. Please connect your account $_SESSION[connected]\")
            window.location='connexion.php';
            </script>"; 
}

else{
    echo"<script type=\"text/javascript\">
    alert(\"You are connected well done bro ! Here is your Session value : $_SESSION[connected]; $_SESSION[username];\")
    </script>"; 
}

?>