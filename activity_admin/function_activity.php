<?php
function get_total_all_records()
{
	include('db_activity.php');
	$statement = $connection->prepare("SELECT * FROM activity");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>
