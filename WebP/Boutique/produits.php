<?php
    $bdd = new PDO('mysql:host=localhost;dbname=projet_web;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $id=$_GET['id'];
    $requete =$bdd->query("SELECT goodies_name,goodies_photo,goodies_cost,goodies_category,goodies_description FROM goodies WHERE goodies_id=$id");

    $data=$requete->fetch(PDO::FETCH_ASSOC);
        echo "<div class='produit_seul'>
                <div class='flottant'>
                    <img src='image_temp/".$data['goodies_photo']."' class='image_p' alt='photo produit'/>
                </div>
                <div class='info_p'>
                    <div class='price'>".$data['goodies_cost']."€ </div>
                    <div class='name'>".$data['goodies_name']."</div>
                    <div class='catégorie'>".$data['goodies_category']."
                    </div>
                    <div class='description'>".$data['goodies_description']."</div>
                </div>
            </div>";
    
    
    $requete->closeCursor();

?>