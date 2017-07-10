<?php
	require 'connect-to-db.php';
	$db = new Db();

	//Adds new item
	if(isset($_POST['addEntry'])){
		$query = "INSERT INTO todo VALUES('', ?, ?)";

		if($stmt = $db->mysql->prepare($query)){
			$stmt->bind_param('ss', $_POST['title'], $_POST['description']);
			$stmt->execute();
			header("location: my-to-do-list-final.php");
		} else die($db->mysql->error);
	}
?>

