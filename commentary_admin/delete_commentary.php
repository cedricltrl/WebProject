<?php

include('db_commentary.php');
include("function_commentary.php");

if(isset($_POST["id_commentary"]))
{
	$statement = $connection->prepare(
		"DELETE FROM commentary WHERE commentary_id = :commentary_id"
	);
	$result = $statement->execute(
		array(
			':commentary_id'	=>	$_POST["id_commentary"]
		)
	);

	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>
