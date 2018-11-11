<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Registo de Voluntários
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link rel="stylesheet" href="styles/bundle.css">
</head>

<body class="landing-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html">
          Material Kit </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">apps</i> Components
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="../index.html" class="dropdown-item">
                <i class="material-icons">layers</i> All Components
              </a>
              <a href="https://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html" class="dropdown-item">
                <i class="material-icons">content_paste</i> Documentation
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
              <i class="material-icons">cloud_download</i> Download
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on Twitter">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on Facebook">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Follow us on Instagram">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background: linear-gradient(#2969b0, #202e3d);">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Your Story Starts With Us.</h1>
          <h4>Every landing page needs a small description after the big bold title, that&apos;s why we added this text here. Add here all the information that can make you or your product create the first impression.</h4>
          <br>
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> Watch video
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Let&apos;s talk product</h2>
            <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                  <i class="material-icons">chat</i>
                </div>
                <h4 class="info-title">Free Chat</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                  <i class="material-icons">verified_user</i>
                </div>
                <h4 class="info-title">Verified Users</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">Fingerprint</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">Quero ser Voluntário</h2>
            <h4 class="text-center description">Os Centros de Ajuda promovem mais uma Campanha de Recolha de Vestuário a nível nacional no fim-de-semana de 1 e 2 de Dezembro. Inscreva-se e participe.</h4>
            <form class="contact-form" id="novo-voluntario-form" action="form_handler.php" method="post">
              <div class="row">
                <div class="col-md-6">
                  <!-- Primeiro Nome -->
                  <div class="form-group bmd-form-group" data-error="invalid-nome-group">
                    <label class="bmd-label-floating">Primeiro Nome*</label>
                    <input type="text" class="form-control" name="nome" maxlength="32">
                    <span class="material-icons form-control-feedback" data-error="invalid-nome-icon">clear</span>
                    <small class="form-text text-muted" data-error="invalid-nome-text">
                        Campo de preenchimento obrigatório
                    </small>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- Apelido -->
                  <div class="form-group bmd-form-group" data-error="invalid-apelido-group">
                    <label class="bmd-label-floating">Apelido*</label>
                    <input type="text" class="form-control" name="apelido" maxlength="64">
                    <span class="material-icons form-control-feedback" data-error="invalid-apelido-icon">clear</span>
                    <small class="form-text text-muted" data-error="invalid-apelido-text">
                        Campo de preenchimento obrigatório
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
                    <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <!-- Data de Nascimento -->
                  <div class="form-group" data-error="invalid-dt-group">
                    <label class="label-control">Data de Nascimento*</label>
                    <input type="text" class="form-control datetimepicker" name="data-nascimento" maxlength="10">
                    <span class="material-icons form-control-feedback" data-error="invalid-dt-icon">clear</span>
                    <small class="form-text text-muted" data-error="invalid-dt-text">
                        Campo de preenchimento obrigatório
                    </small>
                  </div>
                </div>
                <div class="col-md-6">
                <!-- NIF -->
                <div class="form-group bmd-form-group" data-error="invalid-nif-group">
                    <label class="bmd-label-floating">Contribuinte</label>
                    <input type="text" class="form-control" name="nif" maxlength="9">
                    <span class="material-icons form-control-feedback" data-error="invalid-nif-icon">clear</span>
                    <small class="form-text text-muted" data-error="invalid-nif-text">
                        NIF inválido
                    </small>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <button class="btn btn-primary btn-raised">
                    Enviar
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://creative-tim.com/presentation">
              About Us
            </a>
          </li>
          <li>
            <a href="http://blog.creative-tim.com">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
      </div>
    </div>
  </footer>
  <!-- build:js scripts/main.js -->
  <script src="scripts/form.js"></script>
  <!-- Core Material Kit JS Files -->
  <script src="scripts/material-kit/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="scripts/material-kit/js/core/popper.min.js" type="text/javascript"></script>
  <script src="scripts/material-kit/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="scripts/material-kit/js/plugins/moment.min.js"></script>
  <!-- Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="scripts/material-kit/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="scripts/material-kit/js/material-kit.min.js" type="text/javascript"></script>
  <!-- Material Design Lite JS -->
  <script src="scripts/material.min.js"></script>
  <!-- endbuild -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script type="text/javascript">
        $('.datetimepicker').datetimepicker({
            format: 'YYYY/MM/DD',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
    </script>
</body>

</html>