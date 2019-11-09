<?php
function upload_image()
{
	if(isset($_FILES["commentary_photo"]))
	{
		$extension = explode('.', $_FILES['commentary_photo']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['commentary_photo']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($id_commentary)
{
	include('db_commentary.php');
	$statement = $connection->prepare("SELECT commentary_photo FROM commentary WHERE commentary_id = '$id_commentary'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["commentary_photo"];
	}
}


function get_total_all_records()
{
	include('db_commentary.php');
	$statement = $connection->prepare("SELECT * FROM commentary");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>
