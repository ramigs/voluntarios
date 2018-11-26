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
            <h3 class="text-center card-title">Participação do Voluntário</h3>
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
                            <button type="button" name="btnPDF" class="btn btn-danger btn-simple btn-xs">
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