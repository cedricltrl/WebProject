<?php
function connexobjet(){
    include_once("myparam.inc.php");
    $idcom = new mysqli (HOST,USER,PASS,BASE);
    if (!$idcom){
      echo "<script type=text/javascript>";
      echo "alert ('Connexion inpossible à la BDD')</script>";
      exit();
  }
  return $idcom;
}
 ?>
