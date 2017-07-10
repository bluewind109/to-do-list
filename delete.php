<?php
	require 'connect-to-db.php';
	$db = new Db();
	$response = $db->delete_by_id($_GET['id']); //get the 'id' variable from URL
	header("Location: my-to-do-list-final.php");
?>
