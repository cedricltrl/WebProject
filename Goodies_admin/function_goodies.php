<?php
function upload_image()
{
	if(isset($_FILES["goodies_photo"]))
	{
		$extension = explode('.', $_FILES['goodies_photo']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['goodies_photo']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($id_goodies)
{
	include('db_goodies.php');
	$statement = $connection->prepare("SELECT goodies_photo FROM goodies WHERE goodies_id = '$id_goodies'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["goodies_photo"];
	}
}


function get_total_all_records()
{
	include('db_goodies.php');
	$statement = $connection->prepare("SELECT * FROM goodies");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>
