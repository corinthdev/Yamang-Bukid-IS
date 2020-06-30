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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Yamang Bukid (Food Products) - Primary Admin</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
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
            <span class="nav-link-text">Branch Accounts</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="view_account_list.php">View Account List</a>
            </li>
            <li>
              <a href="add_account.php">Add Account</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="monitoring.php">
            <i class="fa fa-fw fa-desktop"></i>
            <span class="nav-link-text">Monitoring</span>
          </a>
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
        <li class="breadcrumb-item active">Branch Accounts</li>
        <li class="breadcrumb-item active">Add Account</li>
      </ol>
      <h2>Register Account</h2>
      <hr>
      <div class="card card-register mx-auto mt-5 bg-light">
        <div class="card-header alert alert-success alert-link">Information:</div>
          <div class="card-body">
            <div class="text-center">
              <!-- notification message -->
                <?php if (isset($_SESSION['success'])) : ?>
                  <div class="error success" >
                    <h3>
                      <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                      ?>
                    </h3>
                  </div>
                <?php endif ?>
                <!-- logged in user information -->
                <?php  if (isset($_SESSION['xAdminname'])) : ?>
                  <blockquote><cite><h3 class="alert alert-info">Administrator Name:</h3></cite></blockquote>
                  <h2 class="alert alert-info"><strong><?php echo $_SESSION['xAdminname']; ?></strong></h2>
                <?php endif ?>
              <blockquote>
                <cite>
                  Note: You have successfully add a new account.
                </cite>
              </blockquote>
            </div>
              <a class="btn btn-primary btn-block" href="add_employees.php">Back to Add Account</a>
          </div>
      </div><br>
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
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <script type = "text/javascript" >
      function preventBack() { window.history.forward(1); }
      setTimeout("preventBack()", 0);
      window.onunload = function () { null };
    </script>
  </div>
</body>

</html>
