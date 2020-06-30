<?php include ('../functions/destroysession.php'); ?>
<?php include ('../functions/functions.php'); ?>



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
            <span class="nav-link-text">Branch Accounts</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="view_account_list.php">View Account List</a>
            </li>
            <li>
              <a href="add_account.php">Add Accounts</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="monitoring.php">
            <i class="fa fa-fw fa-desktop"></i>
            <span class="nav-link-text">Monitoring</span>
          </a>
        </li>

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="monitoringb.php">
            <i class="fa fa-fw fa-desktop"></i>
            <span class="nav-link-text">Sub Branch Monitoring</span>
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
        <button class="btn btn-dark" href="index.php" readonly = "readOnly">
          <strong class="text-light">Welcome, <?php echo $_SESSION["yUname"];?></strong>
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
          <a href = "monitoring.php">Monitoring</a>
        </li>
        <li class="breadcrumb-item active">List of Products of <?php echo $_REQUEST['branch'];?> Branch</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>&nbsp <strong>Data Table of Products of <?php echo $_REQUEST['branch'];?>  Branch</strong></div>
        <div class="card-body">
            
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
                  <th>Total of (B.A.P)</th>
                  <th>Total Item Sold</th>
                  <th>Total Ending Stocks</th>

                </tr>
              </thead>              
              <tbody>
                  <?php require('connection.php');
                    $showsub =$_REQUEST['branch'];
                    $connect = mysqli_connect("localhost", "root", "", "yamangbukiddb");   
                    $query = "SELECT * FROM products WHERE branchName = '$showsub'";
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
                      <!-- <td>
                        <button name = "view" class="btn btn-success view_data" id="<?php echo $row['id']; ?>"><i class="fa fa-eye"></i></button>
                      </td> -->
                      
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
    <!-- Modal View Produuct-->
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
    <script type="text/javascript" src="ajax/view_button.js"></script>
  </div>
</body>

</html>
