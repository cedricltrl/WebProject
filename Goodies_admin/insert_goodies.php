<?php
include('db_goodies.php');
include('function_goodies.php');
$goodies_name = isset($_POST['goodies_name'])?$_POST['goodies_name']:'';
$goodies_description  = isset($_POST['goodies_description'])?$_POST['goodies_description']:'';
$goodies_in_stock			= isset($_POST['goodies_in_stock'])?$_POST['goodies_in_stock']:'';
$goodies_category			= isset($_POST['goodies_category'])?$_POST['goodies_category']:'';
$order_number			= isset($_POST['order_number'])?$_POST['order_number']:'';
$goodies_cost		= isset($_POST['goodies_cost'])?$_POST['goodies_cost']:'';
$id 				= isset($_POST['id_goodies'])?$_POST['id_goodies']:'';
$id2 				=isset($_POST['goodies_id'])?$_POST['goodies_id']:'';

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $connection->prepare('
			INSERT INTO goodies (goodies_id, goodies_name, goodies_description, goodies_in_stock, goodies_category, order_number, goodies_photo, goodies_cost)
			VALUES (NULL, :goodies_name, :goodies_description, :goodies_in_stock, :goodies_category, :order_number, :goodies_photo, :goodies_cost )
		');
		$result = $statement->execute(
			array(
				'goodies_name'	=> $goodies_name,
				'goodies_description'	=> $goodies_description,
				'goodies_in_stock'      => $goodies_in_stock,
		    'goodies_category'     => $goodies_category,
		    'order_number'     => $order_number,
		    'goodies_cost'    => $goodies_cost,
				':goodies_photo'  =>&image
		if(!empty($result))
		{
			echo 'Data Inserted';
		}

	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["goodies_photo"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_goodies_photo"];
    }
		$statement = $connection->prepare(
			'UPDATE goodies
			SET goodies_name = :goodies_name, goodies_description = :goodies_description, goodies_in_stock = :goodies_in_stock , goodies_category = :goodies_category, order_number = :order_number, goodies_photo = :goodies_photo, goodies_cost = :goodies_cost
			WHERE goodies_id = :goodies_id
			'
		);
		$result = $statement->execute(
			array(
				':goodies_name'	=> $goodies_name,
				':goodies_description'	=> $goodies_description,
				':goodies_in_stock'      => $goodies_in_stock,
		    ':goodies_category'     => $goodies_category,
		    ':order_number'     => $order_number,
				':goodies_photo'   =>$image
		    ':goodies_cost'    => $goodies_cost,
				':goodies_id'         => $id)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>
