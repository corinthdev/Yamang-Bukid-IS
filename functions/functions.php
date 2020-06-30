<?php 
		
		session_start();
		$errors = array();
		$conn = new mysqli('localhost', 'root', '', 'yamangbukiddb');


		if($conn->connect_errno){
		  echo $db->connect_error;
		}

		  if (isset($_POST['register'])) {
		    
		    $yAdminname = $_POST['xAdminname'];
		    $yUname = $_POST['xUsername'];
		    $yPassword = $_POST['xPassword'];
		    $yConfirmpassword = $_POST['xConfirmpassword'];
		    $yBcode = $_POST['xBcode'];
		    $yBname = $_POST['xBname'];
		    $yBlocation = $_POST['xBlocation'];

		    //ensure that from fields are filled properly
			if (empty($yUname)) {
				array_push($errors, "Username is required");
			}
			if (empty($yPassword)) {
				array_push($errors, "Password is required");
			}
			if (empty($yAdminname)) {
				array_push($errors, "Admin Name is required");
			}

			if ($yPassword != $yConfirmpassword) {
				array_push($errors, "The password doesn't match!");
			}

			if (count($errors) == 0) {
			    $sql = "INSERT INTO users (ybAdminname, ybUsername, ybPassword, ybConfirmpassword, ybBranchcode, ybBranchname, ybBranchlocation)
			    VALUES ('$yAdminname', '$yUname', '$yPassword', '$yConfirmpassword', '$yBcode', '$yBname', '$yBlocation')";
			    $query = mysqli_query($conn, $sql);
				$_SESSION['xAdminname'] = $yAdminname;
				$_SESSION['success'] = "Successfully Registered!";
				header('location: ../primary_admin/success_registration.php'); //redirect to homepage
			}
			mysqli_close($conn);
		  }

		//login from login page
		if (isset($_POST['login'])) {

			
			$yUname = ($_POST['username']);
			$yPassword = ($_POST['password']);

			// make sure form is filled properly
			if (empty($yUname)) {
				array_push($errors, "Username is required!");
			}
			if (empty($yPassword)) {
				array_push($errors, "Password is required!");
			}

			// attempt login if no errors on form
			if (count($errors) == 0) {

				$query = "SELECT * FROM users WHERE ybUsername ='$yUname' AND ybPassword ='$yPassword'";
				$results = mysqli_query($conn, $query);

				if (mysqli_num_rows($results) == 1) {
			  	  header('location: admin/index.php');
			  	}else {
			  		array_push($errors, "Wrong Username or Password. Please try again!");
			  	}
			}
		}

?>