<?php
if($_SESSION["connected"]==true && $_POST["envoi"]=="LOGOUT"){
    echo"<script type=\"text/javascript\">
    alert(\"Connection state : $_SESSION[connected]\")
    window.location='test.php';
    </script>"; 
    include('deco.php');
}
elseif($_SESSION["connected"]==true && $_POST["envoi"]!=="LOGOUT"){
    echo"<h1> Still connected </h1>";
}
?>