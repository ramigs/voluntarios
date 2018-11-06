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
            
            // Validate
            let isFormDataValid = true;

            // Must only contain letters and whitespace
            if (!nome) {
                // First thing: div needs to have 'has-danger' class
                form.querySelector('[data-error="invalid-nome-group"]').classList.add('has-danger');

                // Now we can affect the display of both the icon and the small text.
                // This means setting the display to its default value.
                form.querySelector('[data-error="invalid-nome-icon"]').style.display = 'inline-block';
                form.querySelector('[data-error="invalid-nome-text"]').style.display = 'block';

                isFormDataValid = false;
            }

            if (!apelido) {
                
                form.querySelector('[data-error="invalid-apelido-group"]').classList.add('has-danger');
                form.querySelector('[data-error="invalid-apelido-icon"]').style.display = 'inline-block';
                form.querySelector('[data-error="invalid-apelido-text"]').style.display = 'block';

                isFormDataValid = false;
            }

            if (!email1) {
                
                form.querySelector('[data-error="invalid-email1-group"]').classList.add('has-danger');
                form.querySelector('[data-error="invalid-email1-icon"]').style.display = 'inline-block';
                form.querySelector('[data-error="invalid-email1-text"]').style.display = 'block';

                isFormDataValid = false;

            } else if (!validateEmail(email1)) {
                
                form.querySelector('[data-error="invalid-email1-group"]').classList.add('has-danger');
                form.querySelector('[data-error="invalid-email1-icon"]').style.display = 'inline-block';
                form.querySelector('[data-error="invalid-email1-text"]').style.display = 'block';
                form.querySelector('[data-error="invalid-email1-text"]').innerHTML= 'Endereço de email inválido'
                
                isFormDataValid = false;
            }

            /* if (!isFormDataValid) {
                evt.preventDefault();
            } */



        })
    }

});

// Remove class 'has-danger' from every 'form-group' div
function removeHasDangerClass() {
    // Should it be refactored to query the form instead of the document?
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

function validateEmail(email) {
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}