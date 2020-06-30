<?php 
if(isset($_POST["id"]))
{
	$output = '';
	$connect = mysqli_connect("localhost", "root", "", "yamangbukiddb");
	$query = "SELECT * FROM products WHERE id = '".$_POST["id"]."'";
	$result = mysqli_query($connect, $query);
	$output .=
	'
		<div class = "table-responsive">
			<table class = "table table-bordered">';
		while($row = mysqli_fetch_array($result))
		{
			$output .= '
				<tr>
					<td width = "40%"><label><strong>Item Name</strong></label></td>
					<td width = "60%">'.$row["items"].'</td>
				</tr>
				<tr>
					<td width = "40%"><label><strong>Item Code</strong></label></td>
					<td width = "60%">'.$row["itemCode"].'</td>
				</tr>
			';
		}

		$output .="</table></div>";
		echo $output;
}
?>