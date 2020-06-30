<?php require_once('functions.php');

	$yUname = "";
	$yPassword = "";
	$errors = array();

	//connect to the db
	$db = mysqli_connect('localhost', 'root', '' , 'yamangbukiddb');

	//login from login page
		if (isset($_POST['login'])) {

			$yUname = ($_POST['username']);
			$_SESSION["yUname"] = $yUname;

			$yPassword = ($_POST['password']);

			// make sure form is filled properly
			if (empty($yUname)) {
				array_push($errors, "Username is required");
			}
			if (empty($yPassword)) {
				array_push($errors, "Password is required!");
			}

			// attempt login if no errors on form
			if (count($errors) == 0) {
				$yPassword = md5($yPassword);

				$query = "SELECT * FROM admin WHERE ybUsername ='$yUname' AND ybPassword ='$yPassword'";
				$results = mysqli_query($db, $query);

				if (mysqli_num_rows($results) == 1) {
			  	  header('location: primary_admin/index.php');
			  	}else {
			  		array_push($errors, "Wrong Username or Password. Please try again!");
			  	}
			}
		}
?>