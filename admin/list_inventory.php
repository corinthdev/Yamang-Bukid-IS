<?php include ('../functions/destroysession.php'); ?>
<?php include ('add_product.php'); ?>

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
          <a href = "menu_inventory.php">Inventory</a>
        </li>
        <li class="breadcrumb-item active">List of Products</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>&nbsp <strong>Data Table of Products</strong></div>
        <div class="card-body">
            <button class="btn btn-info" name="add" data-toggle="modal" data-target="#add_data_Modal" style="margin-left: 15px;">
              <i class="fa fa-plus"><strong>&nbspADD PRODUCTS</strong></i>
            </button><br><br>
          <div class="table-responsive" id="employee_table">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr class="alert alert-info">
                  <th>Items</th>
                  <th>Code</th>
                  <th>Beg. Inv.</th>
                  <th>Additional Stocks</th>
                  <th>Pull Out</th>
                  <th>Monday</th>
                  <th>Tuesday</th>
                  <th>Wednesday</th>
                  <th>Thursday</th>
                  <th>Friday</th>
                  <th>Saturday</th>
                  <th>Sunday</th>
                  <th>Total of (B.A)</th>
                  <th>Total Item Sold</th>
                  <th>Total Ending Stocks</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>              
              <tbody>
                  <?php require('connection.php');
                    $connect = mysqli_connect("localhost", "root", "", "yamangbukiddb");   
                    $query = "SELECT * FROM products WHERE branchName='$branchname'";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)){ ?>
                    <tr id="<?php echo $row['id'];?>">
                      <td data-target="items"><?php echo $row["items"];?></td>
                      <td data-target="itemCode"><?php echo $row["itemCode"];?></td>
                      <td data-target="beginningStocks"><?php echo $row["beginningStocks"];?></td>
                      <td data-target="addStocks"><?php echo $row["addStocks"];?></td>
                      <td data-target="pullOut"><?php echo $row["pullOut"];?></td>
                      <td data-target="additionalStocks"><?php echo $row["additionalStocks"];?></td>
                      <td data-target="additionalStocks2"><?php echo $row["additionalStocks2"];?></td>
                      <td data-target="additionalStocks3"><?php echo $row["additionalStocks3"];?></td>
                      <td data-target="additionalStocks4"><?php echo $row["additionalStocks4"];?></td>
                      <td data-target="additionalStocks5"><?php echo $row["additionalStocks5"];?></td>
                      <td data-target="additionalStocks6"><?php echo $row["additionalStocks6"];?></td>
                      <td data-target="additionalStocks7"><?php echo $row["additionalStocks7"];?></td>
                      <td class="bg-warning" data-target="totalBap"><?php echo $row["totalBap"];?></td>
                      <td class="bg-warning" data-target="itemSold"><?php echo $row["itemSold"];?></td>
                      <td class="bg-warning" data-target="endingStocks"><?php echo $row["endingStocks"];?></td>
                      <td>
                        <button name = "view" class="btn btn-success view_data" id="<?php echo $row['id']; ?>"><i class="fa fa-eye"></i></button>
                      </td>
                      <td>
                        <a href="#" role='button' class='btn btn-warning' data-role = "update" data-id="<?php echo $row['id']; ?>">
                          <i class="fa fa-edit"></i>
                        </a>
                      </td>
                      <td>
                        <button class="btn btn-danger remove"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                 <?php } ?>  
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">List of Food Products</div>
      </div>
    </div>
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
    <!-- Add Modal-->
    <div class="modal fade" id="add_data_Modal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="list_inventory.php" enctype="multipart/form-data">
                <!-- validation errors here -->
                <?php include('../functions/errors.php');?>
                <label><strong>Select Product Image</strong></label>
                <input type="hidden" name="size" value="1000000">
                <input type="file" name="image" class="form-control">
                <label><strong>Item</strong></label>
                <input type="text" name="item"  class="form-control" /><br>
                <label><strong>Code</strong></label>
                <input type="text" name="item_code" class="form-control" /><br>
                <hr class="bg-info">     
                <label><strong>Beginning Inventory</strong></label>
                <input type="text" name="beginning_stocks" id = "beg_inv" class="form-control " onkeyup="bap();"/><br>    
                <label><strong>Additional Stocks</strong></label>
                <input type="text" name="tot_stocks" id="tot_stocks" class="form-control"  onkeyup="bap();"/><br>      
                <label><strong>Pull Out</strong></label>
                <input type="text" name="pull_out" id="pull_out" class="form-control"  /><br>
                <hr class="bg-info">     
                <label><strong>Additional Stocks (Monday)</strong></label>
                <input type="text" name="additional_stocks" id = "as_mon" class="form-control"  onkeyup="sum();"/><br>
                <label><strong>Additional Stocks (Tuesday)</strong></label>
                <input type="text" name="additional_stocks2" id = "as_tue"  class="form-control"  onkeyup="sum();"/><br>  
                <label><strong>Additional Stocks (Wednesday)</strong></label>
                <input type="text" name="additional_stocks3" id = "as_wed"  class="form-control"  onkeyup="sum();"/><br>  
                <label><strong>Additional Stocks (Thursday)</strong></label>
                <input type="text" name="additional_stocks4" id = "as_thurs"  class="form-control"  onkeyup="sum();"/><br>  
                <label><strong>Additional Stocks (Friday)</strong></label>
                <input type="text" name="additional_stocks5" id = "as_fri"  class="form-control"  onkeyup="sum();"/><br>  
                <label><strong>Additional Stocks (Saturday)</strong></label>
                <input type="text" name="additional_stocks6" id = "as_sat"  class="form-control"  onkeyup="sum();"/><br>  
                <label><strong>Additional Stocks (Sunday)</strong></label>
                <input type="text" name="additional_stocks7" id = "as_sun"  class="form-control"  onkeyup="sum();"/><br> 
                <hr class="bg-info">     
                <label><strong>Total of (B.A)</strong></label>
                <input type="text" name="tot_bap" id="tot_bap" class="form-control " placeholder="Total of (Beg. Stocks, Add. Stocks)" readonly /><br>
                <input type="button" class="btn btn-warning form-control" value="Calculate Total of Ending Stocks" onclick="doCalc()" />
                <br><br>   
                <label><strong>Total Item Sold</strong></label>
                <input type="text" name="item_sold" id="addstocks_total" class="form-control " placeholder="Total Sold of Stocks (Monday-Sunday)" readonly /><br>   
                <label><strong>Ending Stocks</strong></label>
                <input type="text" name="ending_stocks" id="end_stocks"  class="form-control "  readonly /><br>      
                <label><strong>Branch Name</strong></label>
                <input type="text" name="branchname" class="form-control" value="<?php echo $branchname;?>" readonly /><br>
                <input type="submit" name="insert" id="insert" value="ADD PRODUCTS" class="btn btn-success" onclick="alert();" /><br>
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
                  <label><strong>Items</strong></label>
                    <input class="form-control" type="text" id="items">                  
                </div>
                <div class="form-group">
                  <label><strong>Code</strong></label>
                    <input class="form-control" type="text" id="itemCode">                  
                </div>
                <hr class="bg-info">
                <div class="form-group">
                  <label><strong>Beginning Inventory</strong></label>
                    <input class="form-control" type="text" id="beginningStocks" onkeyup="up();">                  
                </div>
                <div class="form-group">
                  <label><strong>Additional Stocks</strong></label>
                    <input class="form-control" type="text" id="addStocks" onkeyup="up();">                  
                </div>
                <div class="form-group">
                  <label><strong>Pull Out</strong></label>
                    <input class="form-control" type="text" id="pullOut">                  
                </div>
                <hr class="bg-info">
                <div class="form-group">
                  <label><strong>Additional Stocks (Monday)</strong></label>
                    <input class="form-control" type="text" id="additionalStocks" onkeyup="add();">                  
                </div>
                  <div class="form-group">
                  <label><strong>Additional Stocks (Tuesday)</strong></label>
                    <input class="form-control" type="text" id="additionalStocks2" onkeyup="add();">                  
                </div>
                <div class="form-group">
                  <label><strong>Additional Stocks (Wednesday)</strong></label>
                    <input class="form-control" type="text" id="additionalStocks3" onkeyup="add();">                  
                </div>
                <div class="form-group">
                  <label><strong>Additional Stocks (Thursday)</strong></label>
                    <input class="form-control" type="text" id="additionalStocks4" onkeyup="add();">                  
                </div>
                <div class="form-group">
                  <label><strong>Additional Stocks (Friday)</strong></label>
                    <input class="form-control" type="text" id="additionalStocks5" onkeyup="add();">                  
                </div>
                <div class="form-group">
                  <label><strong>Additional Stocks (Satuday)</strong></label>
                    <input class="form-control" type="text" id="additionalStocks6" onkeyup="add();">                  
                </div>
                <div class="form-group">
                  <label><strong>Additional Stocks (Sunday)</strong></label>
                    <input class="form-control" type="text" id="additionalStocks7" onkeyup="add();">                  
                </div>
                <div class="form-group">
                  <label><strong>Total of (B.A)</strong></label>
                    <input class="form-control" type="text" id="totalBap" readonly>                  
                </div>
                <input type="button" class="btn btn-warning form-control" value="Calculate Total of Ending Stocks" onclick="doCalculate()" />
                <br><br>
                <div class="form-group">
                  <label><strong>Total Item Sold</strong></label>
                    <input class="form-control" type="text" id="itemSold" readonly>                  
                </div>
                <div class="form-group">
                  <label><strong>Ending Stocks</strong></label>
                    <input class="form-control" type="text" id="endingStocks" readonly>                  
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
    <script type="text/javascript" src="update_list.js"></script>
    <script type="text/javascript" src="ajax/view_button.js"></script>
    <script type="text/javascript" src="auto_funct.js"></script>
    <script type = "text/javascript" >
      function preventBack() { window.history.forward(1); }
      setTimeout("preventBack()", 0);
      window.onunload = function () { null };
    </script>
  </div>
</body>

</html>
