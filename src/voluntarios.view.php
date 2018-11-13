<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

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
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Listar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="landing-page.php">Registar</a>
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
        <div class="voluntarios-content">
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
            <h3>Voluntários Registados</h3>
            <?= displayTableVoluntarios($voluntarios, $tiposRegisto); ?>
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Nome</th>
                        <th class="mdl-data-table__cell--non-numeric">Email</th>
                        <th>Idade</th>
                        <th class="mdl-data-table__cell--non-numeric">Localidade</th>
                        <th class="mdl-data-table__cell--non-numeric">Tipo de Registo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Ana Monteiro</td>
                        <td class="mdl-data-table__cell--non-numeric">a25monteiro@hotmail.com</td>
                        <td>25</td>
                        <td class="mdl-data-table__cell--non-numeric">Palmela</td>
                        <td class="mdl-data-table__cell--non-numeric">Formulário</td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Cristina Ramos</td>
                        <td class="mdl-data-table__cell--non-numeric">crisramos53@gmail.com</td>
                        <td>50</td>
                        <td class="mdl-data-table__cell--non-numeric">Setúbal</td>
                        <td class="mdl-data-table__cell--non-numeric">Importação</td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Diogo Silva</td>
                        <td class="mdl-data-table__cell--non-numeric">diogofs@hotmail.com</td>
                        <td>16</td>
                        <td class="mdl-data-table__cell--non-numeric">Lisboa</td>
                        <td class="mdl-data-table__cell--non-numeric">Importação</td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Helena Rodrigues</td>
                        <td class="mdl-data-table__cell--non-numeric">helrodriguez44@hotmail.com</td>
                        <td>54</td>
                        <td class="mdl-data-table__cell--non-numeric">Setúbal</td>
                        <td class="mdl-data-table__cell--non-numeric">Importação</td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Jorge Almeida</td>
                        <td class="mdl-data-table__cell--non-numeric">jalmeida@gmail.com</td>
                        <td>71</td>
                        <td class="mdl-data-table__cell--non-numeric">Lisboa</td>
                        <td class="mdl-data-table__cell--non-numeric">Importação</td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Maria Valente</td>
                        <td class="mdl-data-table__cell--non-numeric">mvale86@gmail.com</td>
                        <td>32</td>
                        <td class="mdl-data-table__cell--non-numeric">Azeitão</td>
                        <td class="mdl-data-table__cell--non-numeric">Formulário</td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Pedro Cereja</td>
                        <td class="mdl-data-table__cell--non-numeric">petercereja@gmail.com</td>
                        <td>28</td>
                        <td class="mdl-data-table__cell--non-numeric">Quinta do Conde</td>
                        <td class="mdl-data-table__cell--non-numeric">Formulário</td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Rafaela Correia</td>
                        <td class="mdl-data-table__cell--non-numeric">rafaelacorr@gmail.com</td>
                        <td>16</td>
                        <td class="mdl-data-table__cell--non-numeric">Palmela</td>
                        <td class="mdl-data-table__cell--non-numeric">Formulário</td>
                    </tr>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">Tatiana Ramos</td>
                        <td class="mdl-data-table__cell--non-numeric">tatyzitaramos@sapo.pt</td>
                        <td>30</td>
                        <td class="mdl-data-table__cell--non-numeric">Sesimbra</td>
                        <td class="mdl-data-table__cell--non-numeric">Importação</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
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