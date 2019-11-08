<?php
include('db.php');
include('function.php');
$first_name = isset($_POST['first_name'])?$_POST['first_name']:'';
$last_name  = isset($_POST['last_name'])?$_POST['last_name']:'';
$email			= isset($_POST['email'])?$_POST['email']:'';
$docket			= isset($_POST['docket'])?$_POST['docket']:'';
$campus			= isset($_POST['campus'])?$_POST['campus']:'';
$bascket		= isset($_POST['bascket'])?$_POST['bascket']:'';
$password   = isset($_POST['password'])?$_POST['password']:'';
$id 				= isset($_POST['user_id'])?$_POST['user_id']:'';
$id2 				=isset($_POST['id'])?$_POST['id']:'';

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $connection->prepare('
			INSERT INTO user (id, first_name, last_name, email, docket, campus, bascket, password)
			VALUES (NULL, :first_name, :last_name, :email, :docket, :campus, :bascket , :password)
		');
		$result = $statement->execute(
			array(
				'first_name'	=> $first_name,
				'last_name'	=> $last_name,
				'email'      => $email,
		    'docket'     => $docket,
		    'campus'     => $campus,
		    'bascket'    => $bascket,
				'password'   => $password));

		if(!empty($result))
		{
			echo 'Data Inserted';
		}

	}
	if($_POST["operation"] == "Edit")
	{

		$statement = $connection->prepare(
			'UPDATE user
			SET first_name = :first_name, last_name = :last_name, email = :email , docket = :docket, campus = :campus, bascket = :bascket, password = :password
			WHERE id = :id
			'
		);
		$result = $statement->execute(
			array(
				':first_name'	=> $first_name,
				':last_name'	=> $last_name,
				':email'      => $email,
		    ':docket'     => $docket,
		    ':campus'     => $campus,
		    ':bascket'    => $bascket,
		    ':password'   => $password,
				':id'         => $id)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>
