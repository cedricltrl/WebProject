<!DOCTOTYPE html>
<html lang="fr" >
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title>Lecture de la table utilisateur</title>
    <style type="text/css">
      table {border-style:double;border-width: 3px;border-color: red;background-color: green;}
    </style>
  </head>
  <body>
    <?php
    
    include("AccerBDD.php");
    $idcom=connexobjet("web","myparam");
    $requete="SELECT * FROM utilisateur ";
    $result=$idcom->query($requete);
    if(!$result){
      echo "Lecture impossible";
    }
    else
    {
      $nbart=$result->num_rows;
      echo"<h3>Tous nos utilisateur par role </h3>";
      echo"<h4>Il y a $nbart utilisateur inscript</h4>";
      echo"<table border=\"1\">";
      echo"<tr><th>code utilisateur</th><th>Nom</th><th>Prenom</th><th>Couriel</th><th>Role</th><th>Centre Cesi</th><th>Panier</th><th>Mot de Passe</th></tr>";
      while($ligne=$result->fetch_array(MYSQLI_NUM)){
        echo"<tr>";
        foreach($ligne as $valeur){
          echo"<td> $valeur </td>";
          }
          echo"</tr>";
        }
        echo"</table>";
      }

    
    $result->free();
    $idcom->close();
    ?>
  </body>
</html>