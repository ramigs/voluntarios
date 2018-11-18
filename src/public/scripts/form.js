document.addEventListener('DOMContentLoaded', function (evt) {

    let form = document.getElementById('novo-voluntario-form');

    if (form != undefined) {

        // Reset Código Postal small text when the input field gets focus
        form['codigo-postal'].addEventListener('focus', function() {
            form.querySelector('small[name="cp-small-text"]').innerHTML = 'Formato: 0000-000';
        });
        // Reset Data de Nascimento small text when the input field gets focus
        form['data-nascimento'].addEventListener('focus', function() {
            form.querySelector('small[name="dt-small-text"]').innerHTML = 'AAAA/MM/DD';
        });


        // Set visibility for small text elements that are informative
        form.querySelector('small[name="cp-small-text"]').style.display = 'block';
        form.querySelector('small[name="dt-small-text"]').style.display = 'block';

        form.addEventListener('submit', (evt) => {

            // Reset form
            removeHasDangerClass();
            hideErrorXIcons();
            hideFormTextMessages();
            
            form.querySelector('[data-error="invalid-cp-text"]').style.display = 'block';
            form.querySelector('[data-error="invalid-cp-text"]').innerHTML = 'Formato: 0000-000'

            form.querySelector('[data-error="invalid-dt-text"]').style.display = 'block';
            form.querySelector('[data-error="invalid-dt-text"]').innerHTML = 'AAAA/MM/DD'

            // Collect all data
            let nome              = form['nome'].value;
            let apelido           = form['apelido'].value;
            let dataNascimento    = form['data-nascimento'].value;
            let tipoContato       = form['tipo-contato'].value;
            let email1            = form['email1'].value;
            let email2            = form['email2'].value;
            let tlf               = form['tlf'].value;
            let genero            = form['genero'].value;
            let nif               = form['nif'].value;
            let localidade        = form['localidade'].value;
            let codigoPostal      = form['codigo-postal'].value;
            let consentePromocoes = form['consente-promocoes'].checked;
            let consenteCampanhas = form['consente-campanhas'].checked;

            // Validate
            let isFormDataValid = true;

            // Must only contain letters and whitespace
            if (!nome || !validateName(nome)) {

                isFormDataValid = false;

                // First thing: div needs to have 'has-danger' class
                form.querySelector('[data-error="invalid-nome-group"]').classList.add('has-danger');

                // Now we can affect the display of both the icon and the small text.
                // This means setting the display to its default value.
                form.querySelector('[data-error="invalid-nome-icon"]').style.display = 'inline-block';
                form.querySelector('[data-error="invalid-nome-text"]').style.display = 'block';

                if (nome && !validateName(nome)) {
                    form.querySelector('[data-error="invalid-nome-text"]').innerHTML = 'Nome contém carateres inválidos'
                }

                if (!nome) {
                    form.querySelector('[data-error="invalid-nome-text"]').innerHTML = 'Campo de preenchimento obrigatório'
                }

            }

            if (!apelido || !validateName(apelido)) {

                isFormDataValid = false;

                form.querySelector('[data-error="invalid-apelido-group"]').classList.add('has-danger');
                form.querySelector('[data-error="invalid-apelido-icon"]').style.display = 'inline-block';
                form.querySelector('[data-error="invalid-apelido-text"]').style.display = 'block';

                if (apelido && !validateName(apelido)) {
                    form.querySelector('[data-error="invalid-apelido-text"]').innerHTML = 'Apelido contém carateres inválidos'
                }

                if (!apelido) {
                    form.querySelector('[data-error="invalid-apelido-text"]').innerHTML = 'Campo de preenchimento obrigatório'
                }

            }

            if (!dataNascimento || !validateDate(dataNascimento)) {

                isFormDataValid = false;

                form.querySelector('[data-error="invalid-dt-group"]').classList.add('has-danger');
                form.querySelector('[data-error="invalid-dt-icon"]').style.display = 'inline-block';
                form.querySelector('[data-error="invalid-dt-text"]').style.display = 'block';

                if (dataNascimento && !validateDate(dataNascimento)) {
                    form.querySelector('[data-error="invalid-dt-text"]').innerHTML = 'Formato de data inválido'
                }

                if (!dataNascimento) {
                    form.querySelector('[data-error="invalid-dt-text"]').innerHTML = 'Campo de preenchimento obrigatório'
                }

            }

            if (!email1  || !validateEmail(email1)) {

                isFormDataValid = false;

                form.querySelector('[data-error="invalid-email1-group"]').classList.add('has-danger');
                form.querySelector('[data-error="invalid-email1-icon"]').style.display = 'inline-block';
                form.querySelector('[data-error="invalid-email1-text"]').style.display = 'block';

                if (email1 && !validateDate(email1)) {
                    form.querySelector('[data-error="invalid-email1-text"]').innerHTML = 'Endereço de email inválido'
                }

                if (!email1) {
                    form.querySelector('[data-error="invalid-email1-text"]').innerHTML = 'Campo de preenchimento obrigatório'
                }

            }

            if (email2  && !validateEmail(email2)) {

                isFormDataValid = false;

                form.querySelector('[data-error="invalid-email2-group"]').classList.add('has-danger');
                form.querySelector('[data-error="invalid-email2-icon"]').style.display = 'inline-block';
                form.querySelector('[data-error="invalid-email2-text"]').style.display = 'block';

            }

            if (!tlf  || !validateTlf(tlf)) {

                isFormDataValid = false;

                form.querySelector('[data-error="invalid-tlf-group"]').classList.add('has-danger');
                form.querySelector('[data-error="invalid-tlf-icon"]').style.display = 'inline-block';
                form.querySelector('[data-error="invalid-tlf-text"]').style.display = 'block';

                if (tlf && !validateTlf(tlf)) {
                    form.querySelector('[data-error="invalid-tlf-text"]').innerHTML = 'Contato Telefónico inválido'
                }

                if (!tlf) {
                    form.querySelector('[data-error="invalid-tlf-text"]').innerHTML = 'Campo de preenchimento obrigatório'
                }

            }

            if (nif  && !validateNIF(nif)) {

                isFormDataValid = false;

                form.querySelector('[data-error="invalid-nif-group"]').classList.add('has-danger');
                form.querySelector('[data-error="invalid-nif-icon"]').style.display = 'inline-block';
                form.querySelector('[data-error="invalid-nif-text"]').style.display = 'block';

            }

            if (localidade  && !validateName(localidade)) {

                isFormDataValid = false;

                form.querySelector('[data-error="invalid-localidade-group"]').classList.add('has-danger');
                form.querySelector('[data-error="invalid-localidade-icon"]').style.display = 'inline-block';
                form.querySelector('[data-error="invalid-localidade-text"]').style.display = 'block';

            }

            if (codigoPostal  && !validateCodigoPostal(codigoPostal)) {

                isFormDataValid = false;

                form.querySelector('[data-error="invalid-cp-group"]').classList.add('has-danger');
                form.querySelector('[data-error="invalid-cp-icon"]').style.display = 'inline-block';
                form.querySelector('[data-error="invalid-cp-text"]').innerHTML = 
                    'Código Postal inválido';
            }
            
            if (!isFormDataValid) {
                //alert(dataNascimento);
                evt.preventDefault();
            }

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

// Here is a longer regx. It looks for a-z in all languages latin etc.. 
// you can also write hyphen, apostrophe, dot, ª, º, as well as space
function validateName(n) {
    let reg = /^[a-zA-Z-'.ªº\s{1}\u00C6\u00D0\u018E\u018F\u0190\u0194\u0132\u014A\u0152\u1E9E\u00DE\u01F7\u021C\u00E6\u00F0\u01DD\u0259\u025B\u0263\u0133\u014B\u0153\u0138\u017F\u00DF\u00FE\u01BF\u021D\u0104\u0181\u00C7\u0110\u018A\u0118\u0126\u012E\u0198\u0141\u00D8\u01A0\u015E\u0218\u0162\u021A\u0166\u0172\u01AFY\u0328\u01B3\u0105\u0253\u00E7\u0111\u0257\u0119\u0127\u012F\u0199\u0142\u00F8\u01A1\u015F\u0219\u0163\u021B\u0167\u0173\u01B0y\u0328\u01B4\u00C1\u00C0\u00C2\u00C4\u01CD\u0102\u0100\u00C3\u00C5\u01FA\u0104\u00C6\u01FC\u01E2\u0181\u0106\u010A\u0108\u010C\u00C7\u010E\u1E0C\u0110\u018A\u00D0\u00C9\u00C8\u0116\u00CA\u00CB\u011A\u0114\u0112\u0118\u1EB8\u018E\u018F\u0190\u0120\u011C\u01E6\u011E\u0122\u0194\u00E1\u00E0\u00E2\u00E4\u01CE\u0103\u0101\u00E3\u00E5\u01FB\u0105\u00E6\u01FD\u01E3\u0253\u0107\u010B\u0109\u010D\u00E7\u010F\u1E0D\u0111\u0257\u00F0\u00E9\u00E8\u0117\u00EA\u00EB\u011B\u0115\u0113\u0119\u1EB9\u01DD\u0259\u025B\u0121\u011D\u01E7\u011F\u0123\u0263\u0124\u1E24\u0126I\u00CD\u00CC\u0130\u00CE\u00CF\u01CF\u012C\u012A\u0128\u012E\u1ECA\u0132\u0134\u0136\u0198\u0139\u013B\u0141\u013D\u013F\u02BCN\u0143N\u0308\u0147\u00D1\u0145\u014A\u00D3\u00D2\u00D4\u00D6\u01D1\u014E\u014C\u00D5\u0150\u1ECC\u00D8\u01FE\u01A0\u0152\u0125\u1E25\u0127\u0131\u00ED\u00ECi\u00EE\u00EF\u01D0\u012D\u012B\u0129\u012F\u1ECB\u0133\u0135\u0137\u0199\u0138\u013A\u013C\u0142\u013E\u0140\u0149\u0144n\u0308\u0148\u00F1\u0146\u014B\u00F3\u00F2\u00F4\u00F6\u01D2\u014F\u014D\u00F5\u0151\u1ECD\u00F8\u01FF\u01A1\u0153\u0154\u0158\u0156\u015A\u015C\u0160\u015E\u0218\u1E62\u1E9E\u0164\u0162\u1E6C\u0166\u00DE\u00DA\u00D9\u00DB\u00DC\u01D3\u016C\u016A\u0168\u0170\u016E\u0172\u1EE4\u01AF\u1E82\u1E80\u0174\u1E84\u01F7\u00DD\u1EF2\u0176\u0178\u0232\u1EF8\u01B3\u0179\u017B\u017D\u1E92\u0155\u0159\u0157\u017F\u015B\u015D\u0161\u015F\u0219\u1E63\u00DF\u0165\u0163\u1E6D\u0167\u00FE\u00FA\u00F9\u00FB\u00FC\u01D4\u016D\u016B\u0169\u0171\u016F\u0173\u1EE5\u01B0\u1E83\u1E81\u0175\u1E85\u01BF\u00FD\u1EF3\u0177\u00FF\u0233\u1EF9\u01B4\u017A\u017C\u017E\u1E93]+$/;
    return reg.test(n);

}

function validateDate(dateString) {
    return moment(dateString, 'YYYY/MM/DD', true).isValid();
  }

function validateEmail(email) {
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validateTlf(t) {
    let patt = /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i;
    return patt.test(t);
}

function validateNIF(nif) {
    if (!['1', '2', '3', '5', '6', '8'].includes(nif.substr(0, 1)) &&
        !['45', '70', '71', '72', '77', '79', '90', '91', '98', '99'].includes(nif.substr(0, 2)))
        return false;

    let total = nif[0] * 9 + nif[1] * 8 + nif[2] * 7 + nif[3] * 6 + nif[4] * 5 + nif[5] * 4 + nif[6] * 3 + nif[7] * 2;

    let modulo11 = total - parseInt(total / 11) * 11;

    if (modulo11 == 1 || modulo11 == 0)
        comparador = 0;
    else
        comparador = 11 - modulo11;

    if (nif[8] != comparador)
        return false;

    return true;
}

function validateCodigoPostal(cp) {
    // or [1-9][0-9]{3}-[0-9]{3} ??
    let patt = /^\d{4}-\d{3}?$/;
    return patt.test(cp);
}