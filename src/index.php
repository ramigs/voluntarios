<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->
    <link rel="stylesheet" href="styles/bundle.css">

    <title>Banco Alimentar Setúbal - Registo de Voluntários</title>

</head>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">LOGO</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="voluntarios.php">Listar</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Registar</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">face</i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <main class="main">
        <div class="info">
            <!-- Alerta Sucesso -->
            <div class="alert alert-success">
                <div class="container-fluid">
                    <div class="alert-icon">
                        <i class="material-icons">check</i>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                    </button>
                    <b>Registo Completo:</b> Yuhuuu!
                </div>
            </div>
            <h2>Novo Voluntário</h2>
            <form class="contact-form" id="novo-voluntario-form" action="form_handler.php" method="post">
                <!-- Primeiro Nome -->
                <div class="form-group bmd-form-group" data-error="invalid-nome-group">
                    <label class="bmd-label-floating">Primeiro Nome*</label>
                    <input type="text" class="form-control" name="nome" maxlength="32">
                    <span class="material-icons form-control-feedback" data-error="invalid-nome-icon">clear</span>
                    <small class="form-text text-muted" data-error="invalid-nome-text">
                        Campo de preenchimento obrigatório
                    </small>
                </div>
                <!-- Apelido -->
                <div class="form-group bmd-form-group" data-error="invalid-apelido-group">
                    <label class="bmd-label-floating">Apelido*</label>
                    <input type="text" class="form-control" name="apelido" maxlength="64">
                    <span class="material-icons form-control-feedback" data-error="invalid-apelido-icon">clear</span>
                    <small class="form-text text-muted" data-error="invalid-apelido-text">
                        Campo de preenchimento obrigatório
                    </small>
                </div>
                <br>
                <!-- Data de Nascimento -->
                <div class="form-group" data-error="invalid-dt-group">
                    <label class="label-control">Data de Nascimento*</label>
                    <input type="text" class="form-control datetimepicker" name="data-nascimento" maxlength="10">
                    <span class="material-icons form-control-feedback" data-error="invalid-dt-icon">clear</span>
                    <small class="form-text text-muted" data-error="invalid-dt-text">
                        Campo de preenchimento obrigatório
                    </small>
                </div>
                <br>
                <!-- Tipo de Contato -->
                <div class="form-group">
                    <label for="tipo-contato">Tipo de Contato*</label>
                    <select class="form-control selectpicker" data-style="btn btn-link" id="tipo-contato" name="tipo-contato">
                        <option value="S">Simples</option>
                        <option value="IC">Informação Corrente</option>
                        <option value="P">Peditório</option>
                    </select>
                </div>
                <!-- Email1 -->
                <div class="form-group bmd-form-group" data-error="invalid-email1-group">
                    <label class="bmd-label-floating" for="email1">Email*</label>
                    <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" name="email1"
                        maxlength="254">
                    <span class="material-icons form-control-feedback" data-error="invalid-email1-icon">clear</span>
                    <small id="email1Help" class="form-text text-muted" data-error="invalid-email1-text">
                        Campo de preenchimento obrigatório
                    </small>
                </div>
                <!-- Email2 -->
                <div class="form-group bmd-form-group" data-error="invalid-email2-group">
                    <label class="bmd-label-floating" for="email2">Email Secundário</label>
                    <input type="email" class="form-control" id="email2" aria-describedby="emailHelp2" name="email2"
                        maxlength="254">
                        <small id="email2Help" class="form-text text-muted" data-error="invalid-email2-text">
                            Endereço de email inválido
                        </small>
                </div>
                <!-- Contato Telefónico -->
                <div class="form-group bmd-form-group" data-error="invalid-tlf-group">
                    <label class="bmd-label-floating">Contato Telefónico*</label>
                    <input type="text" class="form-control" name="tlf" maxlength="16">
                    <span class="material-icons form-control-feedback" data-error="invalid-tlf-icon">clear</span>
                    <small class="form-text text-muted" data-error="invalid-tlf-text">
                        Campo de preenchimento obrigatório
                    </small>
                </div>
                <br>
                <!-- Género -->
                <div class="form-check form-check-radio form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="genero" id="inlineRadio1" value="M" checked="checked">
                        M
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check form-check-radio form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="genero" id="inlineRadio2" value="F">
                        F
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <br>
                <!-- NIF -->
                <div class="form-group bmd-form-group" data-error="invalid-nif-group">
                    <label class="bmd-label-floating">NIF</label>
                    <input type="text" class="form-control" name="nif" maxlength="9">
                    <span class="material-icons form-control-feedback" data-error="invalid-nif-icon">clear</span>
                    <small class="form-text text-muted" data-error="invalid-nif-text">
                        NIF inválido
                    </small>
                </div>
                <!-- Localidade -->
                <div class="form-group bmd-form-group" data-error="invalid-localidade-group">
                    <label class="bmd-label-floating">Localidade</label>
                    <input type="text" class="form-control" name="localidade" maxlength="25">
                    <span class="material-icons form-control-feedback" data-error="invalid-localidade-icon">clear</span>
                    <small class="form-text text-muted" data-error="invalid-localidade-text">
                        Localidade contém carateres inválidos
                    </small>
                </div>
                <!-- Código Postal -->
                <div class="form-group bmd-form-group" data-error="invalid-cp-group">
                    <label class="bmd-label-floating">Código Postal</label>
                    <input type="text" class="form-control" name="codigo-postal" maxlength="8">
                    <span class="material-icons form-control-feedback" data-error="invalid-cp-icon">clear</span>
                    <small class="form-text text-muted" data-error="invalid-cp-text" name="cp-small-text">
                        Formato: 0000-000
                    </small>
                </div>
                <br>
                <!-- Consentimento contato fins promocionais -->
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="consente-promocoes">
                        Aceita ser contatado para fins promocionais
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <br>
                <!-- Consentimento contato avisos campanhas -->
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="consente-campanhas">
                        Aceita ser contatado para avisos sobre campanhas e peditórios
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Registar</button>
            </form>
        </div>
    </main>
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