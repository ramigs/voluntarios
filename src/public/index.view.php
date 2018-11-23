<?php include("../resources/config.php"); ?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include("../resources/templates/head-tag-contents.tpl.php");?>
</head>

<body>
    <header>
        <?php include("../resources/templates/navigation.tpl.php"); ?>
    </header>

    <main class="main">
        <div class="voluntarios-content">
            <?php if (isset($newVoluntarioId)) : ?>
            <!-- Alerta Sucesso -->
            <div class="alert alert-success">
                <div class="container-fluid">
                    <div class="alert-icon">
                        <i class="material-icons">check</i>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                    </button>
                    <b>Registo Completo:</b> Voluntário <strong><?= $newVoluntarioNome . ' ' .  $newVoluntarioApelido; ?></strong> registado com sucesso!
                </div>
            </div>
            <?php endif; ?>
            <h3 class="text-center">Voluntários Registados</h3>
            <p class="text-right"><strong><?= count($voluntarios); ?></strong> voluntários registados à data de <?= date("d/m/Y"); ?></p>
            <!-- <?php echo $CURRENT_PAGE ?>
            <?php echo $_SERVER["SCRIPT_NAME"]; ?>
            <?php echo $_SERVER["PHP_SELF"]; ?>
            <?php echo $_SERVER["DOCUMENT_ROOT"]; ?>
            <?php echo realpath(dirname(__FILE__)); ?> -->
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th class="text-right">Idade</th>
                        <th>Email</th>
                        <th>Localidade</th>
                        <th>Tipo de Registo</th>
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>
                <?php foreach ($voluntarios as $voluntario) : ?>
                    <tr>
                        <td><?= htmlspecialchars($voluntario->nome) . ' ' . htmlspecialchars($voluntario->apelido); ?></td>
                        <td class="text-right"><?= htmlspecialchars(calculateAgeFromDateOfBirth($voluntario->data_nascimento)); ?></td>
                        <td><?= htmlspecialchars($voluntario->email1); ?></td>
                        <td><?= htmlspecialchars($voluntario->localidade); ?></td>
                        <td><?= htmlspecialchars(decodeTipoRegisto($tiposRegisto, $voluntario->tipo_registo)); ?></td>
                        <td class="text-right">
                            <form action="participacoes.php" method="post">
                                <input type="hidden" name="voluntarioId" value="<?= htmlspecialchars($voluntario->id); ?>">
                                <button type="submit" rel="tooltip" title="Ver Participações" class="btn btn-info btn-fab btn-fab-mini">
                                    <i class="fa fa-user"></i>
                                </button>
                                <button type="button" rel="tooltip" title="Apagar Voluntário" class="btn btn-danger btn-fab btn-fab-mini">
                                    <i class="material-icons">close</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <!-- <?= displayTableVoluntarios($voluntarios, $tiposRegisto); ?> -->
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