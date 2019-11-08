<!-- ###########################################
Affichage basé sur la BDD (antoine cahard)
###########################################-->
<?php
    $bdd = new PDO('mysql:host=localhost;dbname=projet_web;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $requete =$bdd->query("SELECT goodies_name,goodies_photo,goodies_cost,goodies_category FROM goodies WHERE goodies_id=1");

    while($data=$requete->fetch(PDO::FETCH_ASSOC)){
        echo "<div class='displayprod'>
                    <img src='image_temp/".$data['goodies_photo'].", class='prodpic' />
                    <div class='price'>".$data['goodies_cost']." </div>
                    <div class='name'> ".$data['goodies_name']."</div>
                    <div class='catégorie'> 
                        ".$data['goodies_category']."
                    </div>
                </div>";
    }
    
    
    $requete->closeCursor();

?>