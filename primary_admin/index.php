<?php include ('../functions/destroysession.php'); ?>
<?php include ('../functions/primary_admin.php'); ?>
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
    <a class="navbar-brand" href="index.php" ><strong class="text-secondary">Yamang Bukid Inventory</strong></a>
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
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <div class="row">
        <div class="col-lg-12">
          <a class="btn btn-info" href="#" id="toggleNavColor"><strong>CHANGE BACKGROUND</strong></a>
        </div>
      </div><br>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-tv"></i>&nbsp <strong>YAMANG BUKID (Theme Song) Music Video</strong></div>
        <div class="card-body">
          <video width="100%" controls>
            <source src="img/yamang_bukid.mp4" type="video/mp4">
          </video>
        </div>
        <div class="card-footer small text-muted">Yamang Bukid Theme Song</div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-info"></i>&nbsp <strong>INFOGRAPHIC DASHBOARD</strong></div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-7 my-auto">
                  <img src="img/yamang_bukid.jpg">
                </div>
                <div class="col-sm-5 text-center my-auto">
                  <div class="h4 mb-0 text-primary alert alert-dark">BRANCH ACCOUNTS</div><br>
                  <div class="h5 text-muted alert alert-warning">*View Account List</div>
                  <div class="h5 text-muted alert alert-warning">*Add Account</div>
                  <hr>
                  <div class="h4 mb-0 text-primary alert alert-dark">MONITORING</div>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">INFOGRAPHIC BUSINESS</div>
          </div>

          <!-- Card Columns Example Social Feed-->
          <div class="mb-0 mt-4">
            <i class="fa fa-map"></i>&nbsp <strong>YAMANG BUKID LOCATION</strong></div>
          <hr class="mt-2">
          <div class="row">
              <div class="col-lg-12">
                  <div id = "map" style="width: 100%; height: 300px;">
                          <script>
                                // Initialize and add the map
                                function initMap() {
                                  // The location of Uluru
                                  var location = {lat:  16.4130167, lng: 120.606678};
                                  // The map, centered at Uluru
                                  var map = new google.maps.Map(
                                      document.getElementById('map'), {zoom: 4, center: location});
                                  // The marker, positioned at Uluru
                                  var marker = new google.maps.Marker({position: location, map: map});
                                }
                          </script>
                          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVEMzAWTXyjN9qCwMw90c8Sbvj7SKEnmA&libraries=places&callback=initMap" async defer></script>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-search"></i>&nbsp <strong>Yamang Bukid - Overview</strong></div>
            <div class="card-body">
              <blockquote  style="text-indent: 30px; text-align: justify;">
                <cite>Baguio City-based Yamang Bukid Food Products, the manufacturer of the multi-awarded  Turmeric 10 in 1 Tea, a multi-awarded Best Detoxifying Herbal Tea has finally had an official home in the world wide web.
                This website precisely gives information you need to know about our products every customer need to know. Acquiring turmeric tea is so convenient through our shopping cart.
                Doing business with a heart is what Yamang Bukid Food Products is all about. Browse our website to know more about the benefits of drinking our Termeric tea.</cite>
              </blockquote>
            </div>
            <div class="card-footer small text-muted">Yamang Bukid - Overview</div>
          </div>
          <!-- Example Notifications Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-trophy"></i>&nbsp <strong>Awards</strong></div>
            <div class="list-group list-group-flush small">
                <div class="media">
                  <div class="media-body">
                    <img src="img/yb_award.jpg" width="100%">
                    <blockquote>
                      <cite style="text-align: justify;">
                        <strong>Most Trusted Turmeric Tea Brand</strong>
                        <p style="text-indent: 30px;">Another national award for Yamang Bukid Food Products' Turmeric 10 in 1 Tea as the "Most Trusted Turmeric Tea Brand" in the Philippines was received by Bel, Camille and Harold during the Philippine Social Media Awards Night at the plush Shangrila Hotel!</p>
                      </cite>
                    </blockquote>
                  </div>
                </div>
              </a>
            </div>
            <div class="card-footer small text-muted">Yamang Bukid - Awards</div>
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
    <script>
    $('#toggleNavPosition').click(function() {
      $('body').toggleClass('fixed-nav');
      $('nav').toggleClass('fixed-top static-top');
    });
    </script>
    <!-- Toggle between dark and light navbar-->
    <script>
    $('#toggleNavColor').click(function() {
      $('nav').toggleClass('navbar-dark navbar-light');
      $('nav').toggleClass('bg-dark bg-light');
      $('body').toggleClass('bg-dark bg-light');
    });

    </script>
    <script type = "text/javascript" >
      function preventBack() { window.history.forward(1); }
      setTimeout("preventBack()", 0);
      window.onunload = function () { null };
    </script>
</body>

</html>
