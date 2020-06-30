<?php require('connection.php');

if(isset($_GET['id']))
{
     $sql = "DELETE FROM sub_products WHERE id=".$_GET['id'];
     $con->query($sql);
	 echo 'Deleted successfully.';
}


?>