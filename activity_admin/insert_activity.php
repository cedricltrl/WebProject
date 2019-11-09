<?php
include('db_activity.php');
include('function_activity.php');
$activity_name = isset($_POST['activity_name'])?$_POST['activity_name']:'';
$activity_dated  = isset($_POST['activity_dated'])?$_POST['activity_dated']:'';
$activity_description			= isset($_POST['activity_description'])?$_POST['activity_description']:'';
$activity_time			= isset($_POST['activity_time'])?$_POST['activity_time']:'';
$activity_cost			= isset($_POST['activity_cost'])?$_POST['activity_cost']:'';
$recurring		= isset($_POST['recurring'])?$_POST['recurring']:'';
$id 				= isset($_POST['id_activity'])?$_POST['id_activity']:'';
$id2 				=isset($_POST['activity_id'])?$_POST['activity_id']:'';

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $connection->prepare('
			INSERT INTO activity (activity_id, activity_name, activity_dated, activity_description, activity_time, activity_cost, recurring)
			VALUES (NULL, :activity_name, :activity_dated, :activity_description, :activity_time, :activity_cost, :recurring )
		');
		$result = $statement->execute(
			array(
				'activity_name'	=> $activity_name,
				'activity_dated'	=> $activity_dated,
				'activity_description'      => $activity_description,
		    'activity_time'     => $activity_time,
		    'activity_cost'     => $activity_cost,
		    'recurring'    => $recurring,

		if(!empty($result))
		{
			echo 'Data Inserted';
		}

	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			'UPDATE activity
			SET activity_name = :activity_name, activity_dated = :activity_dated, activity_description = :activity_description , activity_time = :activity_time, activity_cost = :activity_cost, recurring = :recurring
			WHERE activity_id = :activity_id
			'
		);
		$result = $statement->execute(
			array(
				':activity_name'	=> $activity_name,
				':activity_dated'	=> $activity_dated,
				':activity_description'      => $activity_description,
		    ':activity_time'     => $activity_time,
		    ':activity_cost'     => $activity_cost,
		    ':recurring'    => $recurring,
				':activity_id'         => $id)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>
