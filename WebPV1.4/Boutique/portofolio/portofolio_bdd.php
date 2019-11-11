<div id="myBtnContainer">
<button class="btn active" onclick="filterSelection('all')"> Show all</button>
<?php
    $bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $requete =$bdd->query("SELECT goodies_category FROM goodies GROUP BY goodies_category");
    while($data=$requete->fetch(PDO::FETCH_ASSOC)){
        echo "<div>
        <button class='btn' onclick='filterSelection(".$data['goodies_category'].")'>".$data['goodies_category']."</button>
        </div>";
    }
 
?>
</div>

<!-- Portfolio Gallery Grid -->
<div class="row">

<?php
    $bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $requete =$bdd->query("SELECT goodies_id,goodies_name,goodies_photo,goodies_cost,goodies_category FROM goodies WHERE goodies_in_stock>0");

    while($data=$requete->fetch(PDO::FETCH_ASSOC)){
        echo "<div class='column " .$data['goodies_category']."'>
                <a href='template_produit.php?id=".$data['goodies_id']."'>
                    <div class='content'>
                        <img src='image_temp/".$data['goodies_photo']."' alt='".$data['goodies_name']."' style='width:100%'>
                        <h4>".$data['goodies_name']."</h4>
                        <p>".$data['goodies_cost']."‎€</p>
                    </div>
                </a>
                </div>";
    }
?>
</div>