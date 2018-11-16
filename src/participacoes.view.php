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

    <title>Banco Alimentar Setúbal - Participações do Voluntário</title>

</head>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">LOGO</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="voluntarios.php">Listar</a>
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
            <h3 class="text-center">Participações do Voluntário</h3>
            <h5 class="text-center"><?= htmlspecialchars($voluntario->nome) . ' ' . htmlspecialchars($voluntario->apelido); ?></h5>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Ação</th>
                        <th>Local</th>
                        <th>Data</th>
                        <th class="text-right">Declaração</th>
                    </tr>
                </thead>
                <?php foreach ($acoesVoluntario as $row) : ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nome']); ?></td>
                        <td><?= htmlspecialchars($row['local']); ?></td>
                        <td><?= htmlspecialchars($row['data']); ?></td>
                        <td class="text-right">
                            <input type="hidden" name="voluntarioNome" value="<?= htmlspecialchars($voluntario->nome); ?>">
                            <input type="hidden" name="voluntarioApelido" value="<?= htmlspecialchars($voluntario->apelido); ?>">
                            <input type="hidden" name="voluntarioNIF" value="<?= htmlspecialchars($voluntario->nif); ?>">
                            <input type="hidden" name="acaoNome" value="<?= htmlspecialchars($row['nome']); ?>">
                            <input type="hidden" name="acaoLocal" value="<?= htmlspecialchars($row['local']); ?>">
                            <input type="hidden" name="acaoData" value="<?= htmlspecialchars($row['data']); ?>">
                            <button type="button" name="btnPDF" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Gerar Declaração">
                                <i class="material-icons">save_alt</i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>
    <!--removeIf(production)-->
    <script src="scripts/participacoes.js"></script>
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