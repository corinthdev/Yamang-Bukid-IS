<?php include('functions/functions.php');?>
<?php include('functions/primary_admin.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Yamang Bukid (Food Products)- Login</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!--icon logo-->
  <link rel="shortcut icon" type="image/x-icon" href="img/bukidbg.png" />
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5 bg-light">
     <div class="form-top bg-info">
          <div align="center">
              <img src="img/logo.png" class="img-rounded" alt="Cinque Terre">
              <hr>
              <h3>Inventory System</h3>
          </div>
      </div>
      <div class="card-header alert alert-secondary alert-link" align="center">Login Your Credentials</div>
      <div class="card-body">
        <form role="form" action="index.php" method="post" class="login-form">
          <!-- validation errors here -->
          <?php include('functions/errors.php');?>
          <div class="form-group">
            <label><strong>Username:</strong></label>
            <input class="form-control" type="text" name="username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"><strong>Password:</strong></label>
            <input class="form-control" type="password" name="password">
          </div>
          <div class="text-center">
            <div class="row">
              <div class="col-lg-12">
                <button type="submit" class="btn-block btn btn-danger" name="login">Login</button>
              </div>
            </div>
          </div>
        </form>
        <div class="text-center">
          <div class="row">
            <div class="col-lg-12">
              <a class="d-block small mt-3 btn btn-info" href="forgot_account.php" role = "button">Forgot Password?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><br><br>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script>
    history.pushState(null, null, document.title);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, document.title);
    });
  </script>
</body>

</html>
