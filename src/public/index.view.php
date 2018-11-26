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
                <!-- Alerta Sucesso - Registo Completo -->
                <div class="alert alert-success" style="display:block;">
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
            <?php if (isset($deletedVoluntarioId) && $deletedVoluntarioId != '0') : ?>
                <!-- Alerta Sucesso - Voluntário Apagado -->
                <div class="alert alert-success" style="display:block;">
                    <div class="container-fluid">
                        <div class="alert-icon">
                            <i class="material-icons">check</i>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                        </button>
                        <b>Operação Completa:</b> Voluntário apagado com sucesso!
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['deleted']) && $_GET['deleted'] == 'error') : ?>
                <!-- Alerta Erro - Erro ao Apagar Voluntário -->
                <div class="alert alert-danger" style="display:block;">
                    <div class="container-fluid">
                        <div class="alert-icon">
                            <i class="material-icons">error_outline</i>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                        </button>
                        <b>Erro Apagar:</b> Voluntário a apagar não existe na base de dados</strong>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['emailSent']) && $_GET['emailSent'] == 'success') : ?>
                <!-- Alerta Sucesso - Sucesso ao Apagar Voluntário -->
                <div class="alert alert-success" style="display:block;">
                    <div class="container-fluid">
                        <div class="alert-icon">
                            <i class="material-icons">check</i>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                        </button>
                        <b>Email Sucesso:</b> Email Declaração de Remoção de Dados enviado</strong>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['emailSent']) && $_GET['emailSent'] == 'skip') : ?>
                <!-- Alerta Aviso - Configurações de email não encontradas: email não enviado! -->
                <div class="alert alert-warning" style="display:block;">
                    <div class="container-fluid">
                        <div class="alert-icon">
                            <i class="material-icons">warning</i>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                        </button>
                        <b>Erro Configurações de Email:</b> Email não enviado ao Voluntário
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['emailSent']) && $_GET['emailSent'] == 'error') : ?>
                <!-- Alerta Erro - Erro ao Enviar Email ao Voluntário -->
                <div class="alert alert-warning" style="display:block;">
                    <div class="container-fluid">
                        <div class="alert-icon">
                            <i class="material-icons">error_outline</i>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                        </button>
                        <b>Erro Envio de Email:</b> Ocorreu um erro no Envio de Email para o Voluntário</strong>
                    </div>
                </div>
            <?php endif; ?>
            <h3 class="text-center card-title">Voluntários Registados</h3>
            <p class="text-right"><strong><?= count($voluntarios); ?></strong> voluntários registados à data de <?= date("d/m/Y"); ?></p>
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
                        <td class="text-right"><?= htmlspecialchars(Helper::calculateAgeFromDateOfBirth($voluntario->data_nascimento)); ?></td>
                        <td><?= htmlspecialchars($voluntario->email1); ?></td>
                        <td><?= htmlspecialchars($voluntario->localidade); ?></td>
                        <td><?= htmlspecialchars(Helper::decodeTipoRegisto($tiposRegisto, $voluntario->tipo_registo)); ?></td>
                        <td class="text-right">
                            <form action="participacoes.php" method="post">
                                <input type="hidden" name="voluntarioId" value="<?= htmlspecialchars($voluntario->id); ?>">
                                <button type="submit" rel="tooltip" title="Ver Participações" class="btn btn-info btn-fab btn-fab-mini">
                                    <i class="fa fa-user"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-fab btn-fab-mini"
                                        data-toggle="modal" data-target="#exampleModal<?= htmlspecialchars($voluntario->id); ?>">
                                    <i class="material-icons">close</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>
    <?php foreach ($voluntarios as $voluntario) : ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?= htmlspecialchars($voluntario->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?= htmlspecialchars($voluntario->id); ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel<?= htmlspecialchars($voluntario->id); ?>">Apagar Voluntário</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <p>Tem a certeza que deseja apagar este voluntário?</p>
                        <small>Será enviado email de confirmação para o voluntário.</small>
                    </div>
                    <div class="modal-footer">
                        <form action="deleteVoluntario.php" method="post">
                            <input type="hidden" name="voluntarioId" value="<?= htmlspecialchars($voluntario->id); ?>">
                            <input type="hidden" name="voluntarioEmail" value="<?= htmlspecialchars($voluntario->email1); ?>">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="submit-delete" class="btn btn-primary">Apagar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    
    <!--removeIf(production)-->
    <script src="scripts/form.js"></script>
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