<?php 
if(isset($_POST["id"]))
{
	$output = '';
	$connect = mysqli_connect("localhost", "root", "", "yamangbukiddb");
	$query = "SELECT * FROM users WHERE id = '".$_POST["id"]."'";
	$result = mysqli_query($connect, $query);
	$output .=
	'
		<div class = "table-responsive">
			<table class = "table table-bordered">';
		while($row = mysqli_fetch_array($result))
		{
			$output .= '
				<tr>
					<td width = "40%"><label><strong>Administrator Name</strong></label></td>
					<td width = "60%">'.$row["ybAdminname"].'</td>
				</tr>
				<tr>
					<td width = "40%"><label><strong>Branch Code</strong></label></td>
					<td width = "60%">'.$row["ybBranchcode"].'</td>
				</tr>
				<tr>
					<td width = "40%"><label><strong>Branch Name</strong></label></td>
					<td width = "60%">'.$row["ybBranchname"].'</td>
				</tr>
				<tr>
					<td width = "40%"><label><strong>Branch Location</strong></label></td>
					<td width = "60%">'.$row["ybBranchlocation"].'</td>
				</tr>
			';
		}

		$output .="</table></div>";
		echo $output;
}
?>