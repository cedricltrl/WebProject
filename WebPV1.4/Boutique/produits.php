<?php
    $bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $id=$_GET['id'];
    $requete =$bdd->query("SELECT goodies_name,goodies_photo,goodies_cost,goodies_category,goodies_description FROM goodies WHERE goodies_id=$id");

    $data=$requete->fetch(PDO::FETCH_ASSOC);
        echo "<div class='produit_seul'>
                <div class='flottant'>
                    <img src='Boutique/image_temp/".$data['goodies_photo']."' class='image_p' alt='photo produit'/>
                </div>
                <div class='info_p'>
                    
                    <div class='name'> <strong>".$data['goodies_name']."</strong></div>
                    <div class='prix'> Prix: ".$data['goodies_cost']."€ </div>
                    <div class='catégorie'> Catégorie: ".$data['goodies_category']."
                    </div>
                    <div class='description'> Description: </br>".$data['goodies_description']."</div>
                </div>
                   
            </div>";
    
    
    $requete->closeCursor();

?>