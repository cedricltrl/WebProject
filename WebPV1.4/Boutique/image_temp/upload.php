
<?php
if(isset($_FILES['fileToUpload']))
{    include_once("AccerBDD.php");
    $bdd=connexobject("webproject","myparam");
            $goodies_name=$_POST['goodies_name'];
            $goodies_description=$_POST['goodies_description'];
            $goodies_stock=$_POST['stock'];
            $goodies_category=$_POST['category'];
            $goodies_cost=$_POST['goodies_cost'];
           
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $goodies_photo=$_FILES["fileToUpload"]["name"];
            $req = $bdd->prepare('INSERT INTO goodies (goodies_id,goodies_name, goodies_description, goodies_in_stock, goodies_category, order_number, goodies_photo, goodies_cost) VALUES(NULL,?, ?, ?, ?, NULL, ?, ?)');
            $req->execute(array($goodies_name, $goodies_description, $goodies_stock,$goodies_category,$goodies_photo, $goodies_cost));

    foreach($_FILES["fileToUpload"] as $cle =>$valeur){
        echo"clé: $cle valeur: $valeur <br />";
    }
    $result=move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $goodies_photo);
    if($result==TRUE){
        echo"<hr /><big>Le transfert est effectué ! $goodies_photo</big>";}

    }
    else{
        echo"<hr /> Erreur de transfert n°",$_FILES["fileToUpload"]["error"];
    }

    //start the database connection with the good db name and the good param file name        
            
       
   
?>
