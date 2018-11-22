<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Kit by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link rel="stylesheet" href="styles/bundle.css">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
</head>

<body class="login-page sidebar-collapse">
  <div class="page-header header-filter">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="post" action="login.php">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Login</h4>
              </div>
              <?php
                if (isset($_GET['error'])) {
                  if ($_GET['error'] == "emptyfields") {
                    echo '<p class="text-center error-login">Campos de preenchimento obrigatório!</p>';
                  } else if ($_GET['error'] == "invalidlogin") {
                    echo '<p class="text-center error-login">Login inválido!</p>';
                  } else if ($_GET['error'] == "dberror") {
                    echo '<p class="text-center error-login">Erro de base de dados!</p>';
                  }
                }
              ?>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" name="username" class="form-control" 
                    placeholder="Username..." maxlength="16">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control" 
                    placeholder="Password..." maxlength="16">
                </div>
              </div>
              <div class="footer text-center">
                <button type="submit" name="login-submit" class="btn btn-primary btn-raised btn-lg">
                  Login
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
    </footer>
  </div>
  <!--removeIf(production)-->
  <!-- Core Material Kit JS Files -->
  <script src="scripts/material-kit/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="scripts/material-kit/js/core/popper.min.js" type="text/javascript"></script>
  <script src="scripts/material-kit/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="scripts/material-kit/js/plugins/moment.min.js"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="scripts/material-kit/js/material-kit.min.js" type="text/javascript"></script>
  <!-- Material Design Lite JS -->
  <script src="scripts/material.min.js"></script>
  <!--endRemoveIf(production)-->
  <!-- inject:js -->
  <!-- endinject -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>