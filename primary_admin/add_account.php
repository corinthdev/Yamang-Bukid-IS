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
        <li class="breadcrumb-item active">Branch Accounts</li>
        <li class="breadcrumb-item active">Add Account</li>
      </ol>
      <h2>Register Account</h2>
      <hr>
      <div class="card card-register mx-auto mt-5 bg-light">
        <div class="card-header alert alert-primary alert-link">Registration Form:</div>
          <div class="card-body">
            <form role = "form" method="POST" action="add_account.php">
              <!-- validation errors here -->
                <?php include('../functions/errors.php');?>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label><b>Administrator Name:</b></label>
                    <input class="form-control" name="xAdminname" type="text" placeholder="e.g. (Jan Paulo Paz)" required>
                  </div>
                  <div class="col-md-6">
                    <label><b>Username:</b></label>
                    <input class="form-control" name="xUsername" type="text" placeholder="e.g. (Paulo)" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label><b>Password:</b></label>
                    <input class="form-control" name="xPassword" type="password" placeholder="Password" required>
                  </div>
                  <div class="col-md-6">
                    <label><b>Confirm Password:</b></label>
                    <input class="form-control" name="xConfirmpassword" type="password" placeholder="Confirm Password" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-4">
                      <label><b>Branch Code:</b></label>
                      <input class="form-control" name="xBcode" type="text" placeholder="e.g. ###" required>
                  </div>
                  <div class="col-md-4">
                      <label><b>Branch Name:</b></label>
                      <input class="form-control" name="xBname" type="text" placeholder="e.g. (Lucena Branch)" required>
                  </div>
                  <div class="col-md-4">
                      <label><b>Branch Location:</b></label>
                      <input class="form-control" name="xBlocation" type="text" placeholder="e.g. (Lucena)" required>
                  </div>
              </div><br>
              <button class="btn btn-danger btn-block" name="register">Register</button>
            </form>
          </div>
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
