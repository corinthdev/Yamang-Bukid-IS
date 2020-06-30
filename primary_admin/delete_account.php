<?php require('connection.php');

if(isset($_GET['id']))
{
     $sql = "DELETE FROM users WHERE id=".$_GET['id'];
     $con->query($sql);
	 echo 'Deleted successfully.';
}


?>