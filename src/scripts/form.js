document.addEventListener('DOMContentLoaded', function (evt) {

    let form = document.getElementById('novo-voluntario-form');

    if (form != undefined) {
        form.addEventListener('submit', (evt) => {

            // Reset form
            removeHasDangerClass();
            hideErrorXIcons();
            hideFormTextMessages();

            // Collect all data

            let nome = form['nome'].value;
            let apelido = form['apelido'].value;
            let email1 = form['email1'].value;
            let email2 = form['email2'].value;
            let contatoTelefonico = form['tlf'].value;
            let genero = form['genero'].value;
            let nif = form['nif'].value;
            // PROBLEM in datetimepicker if name attribute is set
            //let dataNascimento = form['data-nascimento'].value;
            let localidade = form['localidade'].value;
            let codigoPostal = form['codigo-postal'].value;
            let consentePromocoes = form['consente-promocoes'].checked;
            //let consenteCampanhas = form['consente-campanhas'].checked;

            if (nome == "") {
                alert(consentePromocoes);
                evt.preventDefault();
            }

            // Validate

            let isFormDataValid = false;

            // 1. Mandatory fields
            // 2. Input validation

            // Styles

            if (!isFormDataValid) {
                evt.preventDefault();
            }

        })
    }

});

// Remove class 'has-danger' from every 'form-group' div
function removeHasDangerClass() {
    document.querySelectorAll('.form-group').forEach(field => {
        field.classList.remove('has-danger');
    });
}

// Hide all input error feedback icons
function hideErrorXIcons() {
    document.querySelectorAll('.form-control-feedback').forEach(field => {
        field.style.display = "none";
    });
}

// Hide all field form text messages
function hideFormTextMessages() {
    document.querySelectorAll('.form-text').forEach(field => {
        field.style.display = "none";
    });
}