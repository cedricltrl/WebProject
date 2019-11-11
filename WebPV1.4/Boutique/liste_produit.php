<!-- ###########################################
Affichage basé sur la BDD (antoine cahard)
###########################################-->
<?php
    $bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $requete =$bdd->query("SELECT goodies_id,goodies_name,goodies_photo,goodies_cost,goodies_category FROM goodies WHERE goodies_in_stock>0");

    while($data=$requete->fetch(PDO::FETCH_ASSOC)){
        echo "<a href='template_produit.php?id=".$data['goodies_id']."'>
                <div class='displayprod'>
                    <img src='Boutique/image_temp/".$data['goodies_photo']."' class='prodpic'  alt='photo produit'/>
                    <div class='price'>".$data['goodies_cost']."€ </div>
                    <div class='name'> ".$data['goodies_name']."</div>
                    <div class='catégorie'> 
                        ".$data['goodies_category']."
                    </div>
                </div>
            </a>";
    }
    
    
    $requete->closeCursor();

?>
