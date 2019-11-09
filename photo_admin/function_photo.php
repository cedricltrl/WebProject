<?php
function upload_image()
{
	if(isset($_FILES["picture_photo"]))
	{
		$extension = explode('.', $_FILES['picture_photo']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['picture_photo']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($id_picture)
{
	include('db_picture.php');
	$statement = $connection->prepare("SELECT picture_photo FROM picture WHERE picture_id = '$id_picture'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["picture_photo"];
	}
}


function get_total_all_records()
{
	include('db_picture.php');
	$statement = $connection->prepare("SELECT * FROM picture");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>
