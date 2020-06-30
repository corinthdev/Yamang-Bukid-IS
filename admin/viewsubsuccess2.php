<?php include ('../functions/destroysession.php'); ?>
<?php include ('add_product2.php'); ?>

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
        <li class="breadcrumb-item active">
          <a href = "sub_branches.php">Sub Branches</a>
        </li>
        <li class="breadcrumb-item active">Update List of Products in Sub Branch:</li>
      </ol>
      <a href="sub_branches.php" class="btn btn-success"><i class="fa fa-arrow-left">&nbsp&nbsp<strong>BACK</strong></i></a><br><br>
      <h2 class="alert alert-success" align="center">UPDATING OF THE PRODUCTS TO SUB BRANCH IS SUCCESSFUL</h2>
      
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
    <!-- Add Modal-->
    <div class="modal fade" id="add_data_Modal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Products</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="viewsub.php" enctype="multipart/form-data">
                <!-- validation errors here -->
                <?php include('../functions/errors.php');?>
                <label><strong>Select Product Image</strong></label>
                <input type="hidden" name="size" value="1000000">
                <input type="file" name="image" class="form-control">
                <label><strong>Item Name</strong></label>
                <input type="text" name="item"  class="form-control" /><br>
                <label><strong>Item Code</strong></label>
                <input type="text" name="item_code" class="form-control" /><br>
                <label><strong>Beginning Stocks</strong></label>
                <input type="number" name="beginning_stocks" class="form-control amount"  /><br> 
                <label><strong>Ending Stocks</strong></label>
                <input type="number" name="ending_stocks"  class="form-control amount"  /><br>    
                <label><strong>Additional Stocks</strong></label>
                <input type="number" name="additional_stocks" class="form-control"  /><br>  
                <label><strong>Pull Out</strong></label>
                <input type="number" name="pull_out" class="form-control"  /><br>   
                <label><strong>Item Sold</strong></label>
                <input type="number" name="item_sold"  class="form-control amount"/><br>       
                <label><strong>Branch Name</strong></label>
                <input type="text" name="branchname" class="form-control" value="<?php echo $showsub;?>" readonly /><br>
                <input type="submit" name="insert" id="insert" value="ADD PRODUCTS TO SUB BRANCH" class="btn btn-success" onclick="alert();" /><br>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal View Account-->
    <div class="modal fade" id="dataModal">
      <div class="modal-dialog"><br><br>
        <div class="modal-content bg-light">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Products</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="employee_detail">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
     <!-- Modal View Account-->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Products</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="form-group">
                  <label><strong>Item Name</strong></label>
                    <input class="form-control" type="text" id="items">                  
                </div>
                <div class="form-group">
                  <label><strong>Item Code</strong></label>
                    <input class="form-control" type="text" id="itemCode">                  
                </div>
                <div class="form-group">
                  <label><strong>Beginning Stocks</strong></label>
                    <input class="form-control" type="text" id="beginningStocks">                  
                </div>

                 <div class="form-group">
                  <label><strong>Ending Stocks</strong></label>
                    <input class="form-control" type="text" id="endingStocks">                  
                </div>


                <div class="form-group">
                  <label><strong>Additional Stocks</strong></label>
                    <input class="form-control" type="text" id="additionalStocks">                  
                </div>

                <div class="form-group">
                  <label><strong>Pull Out</strong></label>
                    <input class="form-control" type="text" id="pullOut">                  
                </div>

                <div class="form-group">
                  <label><strong>Item Sold</strong></label>
                    <input class="form-control" type="text" id="itemSold">                  
                </div>
                
                <input type="hidden" id="productsId" class="form-control">
                <div class="form-group">
                  <a href = "#" id="save" class="btn btn-success form-control"><i class="fa fa-save">&nbsp<strong>Save</strong></i></a>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
    <script type="text/javascript" src="delete_button.js"></script>
    <script type="text/javascript" src="update.js"></script>
    <script type="text/javascript" src="ajax/view_button.js"></script>
    <script type = "text/javascript" >
      function preventBack() { window.history.forward(1); }
      setTimeout("preventBack()", 0);
      window.onunload = function () { null };
    </script>
  </div>
</body>

</html>
