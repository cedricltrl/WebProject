<?php
include('db_commentary.php');
include('function_commentary.php');

$commentary_comment = isset($_POST['comment'])?$_POST['comment']:'';

$id 				= isset($_POST['id_commentary'])?$_POST['id_commentary']:'';
$id2 				=isset($_POST['commentary_id'])?$_POST['commentary_id']:'';

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $connection->prepare('
			INSERT INTO commentary (commentary_id, id, picture_id, comment)
			VALUES (NULL, NULL, NULL, :comment )
		');
		$result = $statement->execute(
			array(
				'comment'	=> $comment,
		if(!empty($result))
		{
			echo 'Data Inserted';
		}

	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			'UPDATE commentary
			SET comment = :comment
			WHERE commentary_id = :commentary_id
			'
		);
		$result = $statement->execute(
			array(
				':comment'	=> $comment,
				':commentary_id'         => $id)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>
