<?php
session_start();
echo "<br /> Voici le compte connecté :",$_SESSION['username'];
echo "<br /> Etat de la connection :",$_SESSION['connected'];

?>