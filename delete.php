<?php

include('database connection.php');
include('function.php');

if(isset($_POST["course_id"]))
{
	$statement = $connection->prepare(
		"DELETE FROM salesorder1 WHERE id = :id"
	);
	$result = $statement->execute(

		array(':id'	=>	$_POST["course_id"])
		
	    );
}

?>