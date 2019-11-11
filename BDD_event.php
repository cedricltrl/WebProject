<?php

    include_once("AccerBDD.php");
    $bdd = connexobject("web", "myparam");
    $name_activity = $_POST['name_activity'];
    $date_activity = $_POST['date_activity'];
    $description_activity = $_POST['description_activity'];
    $length_activity = $_POST['length_activity'];
    $activity_price = $_POST['activity_price'];

    $req = $bdd->prepare('INSERT INTO activite (NOM_ACTIVITE, DATE_ACTIVITE, DESCRIPTION_ACTIVITE, TEMPS_ACTIVITE, PRIX_ACTIVITE) VALUES(?, ?, ?, ?, ?)');
    $req->execute(array($name_activity, $date_activity, $description_activity, $length_activity, $activity_price));

?>