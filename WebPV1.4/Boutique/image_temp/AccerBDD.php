<?php
function connexobject($base,$param){
    include_once($param.".inc.php");
    $dsn = "mysql:host=".HOST.";dbname=".$base;
    $user = USER;
    $pass = PASS;
    try{
      $bdd = new PDO ($dsn,$user,$pass);
      return $bdd;
    }
    catch(PDOException $except){
      echo "echec de connexion",$except->getMessage();
      return false;
      exit();
    }

  
  
}
 ?>
