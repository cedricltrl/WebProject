<?php
include('db_picture.php');
include('function_picture.php');
$picture_name = isset($_POST['picture_name'])?$_POST['picture_name']:'';
$picture_description  = isset($_POST['picture_description'])?$_POST['picture_description']:'';
$likes			= isset($_POST['likes'])?$_POST['likes']:'';

$id 				= isset($_POST['id_picture'])?$_POST['id_picture']:'';
$id2 				=isset($_POST['picture_id'])?$_POST['picture_id']:'';

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $connection->prepare('
			INSERT INTO picture (picture_id, id, picture_name, picture_description, likes)
			VALUES (NULL, NULL, :picture_name, :picture_description, :likes )
		');
		$result = $statement->execute(
			array(
				'picture_name'	=> $picture_name,
				'picture_description'	=> $picture_description,
				'likes'      => $likes,
		if(!empty($result))
		{
			echo 'Data Inserted';
		}

	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			'UPDATE picture
			SET picture_name = :picture_name, picture_description = :picture_description, likes = :likes
			WHERE picture_id = :picture_id
			'
		);
		$result = $statement->execute(
			array(
				':picture_name'	=> $picture_name,
				':picture_description'	=> $picture_description,
				':likes'      => $likes,
				':picture_id'         => $id)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>
