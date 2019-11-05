<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO users (first_name, last_name)
			VALUES (:first_name, :last_name)
		");
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':email' => $_POST["email"],
		    ':docket' => $_POST["docket"],
		    ':campus' => $_POST["campus"],
		    ':bascket' => $_POST["bascket"],
		    ':password' => $_POST["password"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{

		$statement = $connection->prepare(
			"UPDATE user
			SET first_name = :first_name, last_name = :last_name, email = :email , docket = :docket, campus = :campus, bascket = :bascket, password = :password
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':email' => $_POST["email"],
	      ':docket' => $_POST["docket"],
	      ':campus' => $_POST["campus"],
	      ':bascket' => $_POST["bascket"],
	      ':password' => $_POST["password"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>
