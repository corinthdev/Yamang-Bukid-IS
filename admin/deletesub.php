<?php

$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'yamangbukiddb'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM sub_branches WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: sub_branches.php");
?>