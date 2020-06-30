<?php include ('../functions/destroysession.php'); ?>
<?php include ('../functions/functions.php'); ?>
<?php

$searchbranch = $_SESSION["yUname"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yamangbukiddb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ybAdminname, ybBranchname, ybBranchcode, ybBranchlocation FROM users WHERE ybUsername='$searchbranch'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
       $adminname = $row['ybAdminname'];
       $branchname = $row['ybBranchname'];
       $branchcode = $row['ybBranchcode'];
       $branchlocation = $row['ybBranchlocation'];

    }
   
} else {
    $error= "0 results";
}
$conn->close();
?>



<?php

  $conn = new mysqli('localhost', 'root', '', 'yamangbukiddb');


if($conn->connect_errno){
  echo $db->connect_error;
}

  if (isset($_POST['submit'])) {
    
    $postbranchcode = $_POST['sub_branchcode'];
    $postname = $_POST['sub_branchname'];
    $postmain = $_POST['sub_main'];
    $postlocation = $_POST['sub_location'];

    $sql = "INSERT INTO sub_branches(ybSubCode,ybSubName,ybBranchName,ybSubLocation) 
    VALUES ('$postbranchcode','$postname','$postmain','$postlocation')";
    $query = mysqli_query($conn, $sql);

    if($query){
        $note= "<strong>SUCCESSFULLY ADDED ALLOCATION</strong>";
       }
       else{
        $alert= "ERROR ADDING";
       }
  }
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Yamang Bukid (Food Products) - Admin</title>
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

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"><strong class="text-secondary">Yamang Bukid Inventory</strong></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">View Menu</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="menu_inventory.php">Inventory</a>
            </li>
            <li>
              <a href="menu_employees.php">Employees</a>
            </li>
            <li>
              <a href="sub_branches.php">Sub Branches</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">&nbsp
        <button class="btn btn-dark text-warning"><strong>WELCOME,</strong>
          <input class = "bg-dark text-light border-0" type="button" value="<?php echo $adminname;?>" disabled />
        </button>
        <button class="btn btn-dark text-warning"><strong>Branch Code:</strong>
          <input class = "bg-dark text-light border-0" type="button" value="<?php echo $branchcode;?>" disabled />
        </button>
        <button class="btn btn-dark text-warning"><strong>Branch Name:</strong>
          <input class = "bg-dark text-light border-0" type="button" value="<?php echo $branchname;?>" disabled />
        </button>
        <button class="btn btn-dark text-warning"><strong>Branch Location:</strong>
          <input class = "bg-dark text-light border-0" type="button" value="<?php echo $branchlocation;?>" disabled />
        </button>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">List of Sub Branches</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>&nbsp <strong>Data Table Sub Branches</strong></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr class="alert alert-info">
                 <th>No.</th>
                  <th>Sub Branch Code</th>
                  <th>Sub Branch Name</th>
                  <th>Branch Location</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr class="alert alert-info">
                  <th>No.</th>
                  <th>Sub Branch Code</th>
                  <th>Sub Branch Name</th>
                  <th>Branch Location</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                      $con = mysqli_connect("localhost", "root", "", "yamangbukiddb");    
                      $table = mysqli_query($con, "SELECT * FROM sub_branches WHERE ybBranchName='$branchname'");
                      while($row = mysqli_fetch_array($table)) { 

                        $id=$row['id'];
                        $ybSubCode=$row['ybSubCode'];
                        $ybSubName=$row['ybSubName'];
                        $ybSubLocation=$row['ybSubLocation'];

                    ?>
                    <tr>
                       <td><?php echo $row['id']?></td> 
                       <td><?php echo $row['ybSubCode']?></td> 
                       <td><?php echo $row['ybSubName']?></td> 
                       <td><?php echo $row['ybSubLocation']?></td>
                       <td>
                          <a href="viewsub.php?id=<?php echo $row['id']?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                          <a href="deletesub.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                       </td>
                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
          <div class="row">
            <div class="col-md-6">
                <div class="box box-info border">
                    <div class="box-header with-border">
                      <h2 class="box-title bg-warning rounded"><strong><center>ADD SUB BRANCH</center></strong></h3>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" action="sub_branches.php" method="post">
                      <div class="box-body">
                        <?php if (isset($note)) {echo "<div class=\"alert alert-success\"><strong>Note: </strong>&nbsp" .$note. "</div>";}?>
                        <?php if (isset($alert)) {echo "<div class=\"alert alert-danger\"><strong>Note: </strong>" .$alert. "</div>"; }?>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-6 control-label alert alert-info"><strong>SUB BRANCH CODE</strong></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="sub_branchcode" id="inputEmail3" placeholder="(Enter Sub Branch Code)" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-6 control-label alert alert-info"><strong>SUB BRANCH NAME</strong></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="sub_branchname" id="inputEmail3" placeholder="(Enter Branch Name)" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-6 control-label alert alert-info"><strong>SUB BRANCH LOCATION</strong></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="sub_location" id="inputEmail3" placeholder="(Enter Sub Branch Location)" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-6 control-label alert alert-info"><strong>MAIN BRANCH</strong></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="sub_main" readOnly="readOnly" value="<?php echo $branchname;?>" id="inputEmail3">
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-warning pull-center"><strong>REGISTER SUB BRANCH</strong></button>
                      </div>
                      <!-- /.box-footer -->
                    </form>
                </div>
            </div>
          </div>
    </div><br>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © 2018 <strong>Yamang Bukid</strong></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to logout?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <blockquote><cite>Select "Logout" below if you are ready to end your current session.</cite></blockquote>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../functions/logout.php?logout='1'.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script type = "text/javascript" >
      function preventBack() { window.history.forward(1); }
      setTimeout("preventBack()", 0);
      window.onunload = function () { null };
    </script>
  </div>
</body>

</html>
