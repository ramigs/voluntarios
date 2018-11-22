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
                    <b>Registo Completo:</b> Voluntário inserido com sucesso!
                </div>
            </div>
            <?php endif; ?>
            <h3 class="text-center">Voluntários Registados</h3>
            <!-- <?php echo $CURRENT_PAGE ?>
            <?php echo $_SERVER["SCRIPT_NAME"]; ?>
            <?php echo $_SERVER["PHP_SELF"]; ?>
            <?php echo $_SERVER["DOCUMENT_ROOT"]; ?>
            <?php echo realpath(dirname(__FILE__)); ?> -->
            <?= displayTableVoluntarios($voluntarios, $tiposRegisto); ?>
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