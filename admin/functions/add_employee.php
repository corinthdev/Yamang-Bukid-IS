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
			// Get image name
		    $image = $_FILES['image']['name'];

		    // image file directory
		    $target = "img_employee/".basename($image);

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
				$sql = "INSERT INTO users (ybAdminname, ybUsername, ybPassword, ybConfirmpassword, ybBranchcode, ybBranchname, ybBranchlocation, ybEmppic) VALUES ('$yAdminname', '$yUname', '$yPassword', '$yConfirmpassword', '$yBcode', '$yBname', '$yBlocation','$image')";
			    $query = mysqli_query($conn, $sql);
				$_SESSION['xAdminname'] = $yAdminname;
				$_SESSION['success'] = "Successfully Registered!";
				header('location: success_registration.php'); //redirect to homepage
			}
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		      $msg = "Image uploaded successfully";
		    }else{
		      $msg = "Failed to upload image";
		    }
			mysqli_close($conn);
		  }
?>