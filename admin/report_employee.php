<?php include ('../functions/destroysession.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Yamang Bukid (Food Products) - Admin</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!--icon logo-->
  <link rel="shortcut icon" type="image/x-icon" href="../img/bukidbg.png" />
</head>
<body><br>
	<div class="row">
		<div class="col-lg-12">
			<a class="btn btn-warning btn-lg text-dark" href="export_list_of_employees.php">
				<i class="fa fa-arrow-left">&nbsp<strong>BACK</strong></i>
			</a>
			<a class="btn btn-primary btn-lg text-white" onclick="PrintDiv();">
				<i class="fa fa-print">&nbsp<strong>PRINT</strong></i>
			</a>
		</div>
	</div>
	<div id="divToPrint">
	<form method="POST">
		<table border = "2 "width="100%" cellspacing="0">
	      <thead>
			<th colspan="10"><center><h1>Employee Records</h1></center></th>
	        <tr class="bg-light text-center">
	          <th>Administrator Name</th>
	          <th>Username</th>
	          <th>Branch Code</th>
	          <th>Branch Name</th>
	          <th>Branch Location</th>
	        </tr>
	      </thead>
	      <tfoot>
	        <tr class="bg-light text-center">
	          <th>Administrator Name</th>
	          <th>Username</th>
	          <th>Branch Code</th>
	          <th>Branch Name</th>
	          <th>Branch Location</th>
	        </tr>
	      </tfoot>
	      <tbody>
	          <?php
	            $connect = mysqli_connect("localhost", "root", "", "yamangbukiddb");   
	            $query = "SELECT * FROM users";
	            $result = mysqli_query($connect, $query);
	            while ($row = mysqli_fetch_array($result)){ ?>
	            <tr>
	              <td><?php echo $row["ybAdminname"];?></td>
	              <td><?php echo $row["ybUsername"];?></td>
	              <td><?php echo $row["ybBranchcode"];?></td>
	              <td><?php echo $row["ybBranchname"];?></td>
	              <td><?php echo $row["ybBranchlocation"];?></td>
	            </tr>
	         <?php } ?>  
	      </tbody>
	    </table>
	</form>
</body>
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=1000,height=700');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
</script>
<script type = "text/javascript" >
      function preventBack() { window.history.forward(1); }
      setTimeout("preventBack()", 0);
      window.onunload = function () { null };
    </script>
</html>