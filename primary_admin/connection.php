<?php 
$con = mysqli_connect("localhost", "root", "", "yamangbukiddb");

if(isset($_POST['ybAdminname'])) {

	$adminName = $_POST['ybAdminname'];
	$userName = $_POST['ybUsername'];
	$passWord = $_POST['ybPassword'];
	$confirmPassword = $_POST['ybConfirmpassword'];
	$branchCode = $_POST['ybBranchcode'];
	$branchName = $_POST['ybBranchname'];
	$branchLocation = $_POST['ybBranchlocation'];
	$id = $_POST['id'];

	//query update

	$result = mysqli_query($con, "UPDATE users SET ybAdminname='$adminName', ybUsername='$userName', ybPassword='$passWord', ybConfirmpassword='$confirmPassword', ybBranchcode='$branchCode',
				 ybBranchname = '$branchName', ybBranchlocation = '$branchLocation' WHERE id='$id'");
	if($result){
		return 'Data Updated!';
	}
}

?>