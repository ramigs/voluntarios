<?php include("../resources/config.php"); ?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <?php include("../resources/templates/head-tag-contents.tpl.php");?>
</head>

<body class="landing-page sidebar-collapse">
  <header>
    <?php include("../resources/templates/navigation.tpl.php"); ?>
  </header>
  <div class="main">
    <div class="container">
      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <br>
            <h3 class="text-center">Registar Voluntário</h3>
            <div name="alert-nif-exists" class="alert alert-warning">
              <div class="container-fluid">
                <div class="alert-icon">
	                <i class="material-icons">warning</i>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                </button>
                <b>Atenção:</b> Já existe um voluntário registado com o Contribuinte introduzido!
              </div>
            </div>
            <form class="contact-form" id="novo-voluntario-form" action="registar.php" method="post">
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
              <br>
              <div class="row">
                <div class="col-md-6">
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
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                <!-- Data de Nascimento -->
                <div class="form-group bmd-form-group" data-error="invalid-dt-group">
                  <label class="bmd-label-floating">Data de Nascimento*</label>
                  <input type="text" class="form-control" name="data-nascimento" maxlength="10">
                  <span class="material-icons form-control-feedback" data-error="invalid-dt-icon">clear</span>
                  <small class="form-text text-muted" data-error="invalid-dt-text" name="dt-small-text">
                    AAAA/MM/DD
                  </small>
                </div>
                </div>
                <div class="col-md-6">
                <!-- NIF -->
                <div class="form-group bmd-form-group" data-error="invalid-nif-group">
                  <label class="bmd-label-floating">Contribuinte*</label>
                  <input type="text" class="form-control" name="nif" maxlength="9">
                  <span class="material-icons form-control-feedback" data-error="invalid-nif-icon">clear</span>
                  <small class="form-text text-muted" data-error="invalid-nif-text">
                    Campo de preenchimento obrigatório
                  </small>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                <!-- Localidade -->
                <div class="form-group bmd-form-group" data-error="invalid-localidade-group">
                  <label class="bmd-label-floating">Localidade</label>
                  <input type="text" class="form-control" name="localidade" maxlength="25">
                  <span class="material-icons form-control-feedback" data-error="invalid-localidade-icon">clear</span>
                  <small class="form-text text-muted" data-error="invalid-localidade-text">
                    Localidade contém carateres inválidos
                  </small>
                </div>
                </div>
                <div class="col-md-6">
                <!-- Código Postal -->
                <div class="form-group bmd-form-group" data-error="invalid-cp-group">
                  <label class="bmd-label-floating">Código Postal</label>
                  <input type="text" class="form-control" name="codigo-postal" maxlength="8">
                  <span class="material-icons form-control-feedback" data-error="invalid-cp-icon">clear</span>
                  <small class="form-text text-muted" data-error="invalid-cp-text" name="cp-small-text">
                    Formato: 0000-000
                  </small>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                <!-- Telefone -->
                <div class="form-group bmd-form-group" data-error="invalid-tlf-group">
                  <label class="bmd-label-floating">Telefone*</label>
                  <input type="text" class="form-control" name="tlf" maxlength="16">
                  <span class="material-icons form-control-feedback" data-error="invalid-tlf-icon">clear</span>
                  <small class="form-text text-muted" data-error="invalid-tlf-text">
                    Campo de preenchimento obrigatório
                  </small>
                </div>
                </div>
                <div class="col-md-6">
                <!-- Email1 -->
                <div class="form-group bmd-form-group" data-error="invalid-email1-group">
                    <label class="bmd-label-floating" for="email1">E-mail*</label>
                    <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" name="email1"
                        maxlength="254">
                    <span class="material-icons form-control-feedback" data-error="invalid-email1-icon">clear</span>
                    <small id="email1Help" class="form-text text-muted" data-error="invalid-email1-text">
                        Campo de preenchimento obrigatório
                    </small>
                </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                <!-- Tipo de Contato -->
                <div class="form-group">
                    <label for="tipo-contato">Tipo de Contato*</label>
                    <select class="form-control selectpicker" data-style="btn btn-link" id="tipo-contato" name="tipo-contato">
                        <option value="S">Simples</option>
                        <option value="IC">Informação Corrente</option>
                        <option value="P">Peditório</option>
                    </select>
                </div>
                </div>
                <div class="col-md-6">
                <!-- Email2 -->
                <div class="form-group bmd-form-group" data-error="invalid-email2-group">
                  <label class="bmd-label-floating" for="email2">Email Secundário</label>
                  <input type="email" class="form-control" id="email2" aria-describedby="emailHelp2" name="email2"
                    maxlength="254">
                  <small id="email2Help" class="form-text text-muted" data-error="invalid-email2-text">
                    Endereço de email inválido
                  </small>
                </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
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
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
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
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <button type="submit" class="btn btn-primary btn-raised btn-lg">
                    Registar
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- build:js public/scripts/main.js -->
  <script src="scripts/form.js"></script>
  <script src="scripts/participacoes.js"></script>
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

</body>

</html>