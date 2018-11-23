document.addEventListener('DOMContentLoaded', function (evt) {
    let buttonsPDF = document.getElementsByName('btnPDF');

    if (buttonsPDF.length > 0) {

        buttonsPDF.forEach(function (btn) {

            btn.addEventListener('click', (evt) => {

                let parent = btn.parentElement;

                let volNome = parent.querySelector('input[name="voluntarioNome"]').value;
                let volApelido = parent.querySelector('input[name="voluntarioApelido"]').value;
                let volNIF = parent.querySelector('input[name="voluntarioNIF"]').value;

                let acaoNome = parent.querySelector('input[name="acaoNome"]').value;
                let acaoLocal = parent.querySelector('input[name="acaoLocal"]').value;
                let acaoData = parent.querySelector('input[name="acaoData"]').value;

                $.ajax({
                    type: 'POST',
                    data: {
                        'voluntarioNome': volNome,
                        'voluntarioApelido': volApelido,
                        'voluntarioNIF': volNIF,
                        'acaoNome': acaoNome,
                        'acaoLocal': acaoLocal,
                        'acaoData': acaoData,
                    },
                    url: 'generatePDF.php',
                    success: function (resp) {
                        //alert(resp);

                        let dlink = document.createElement("a");

                        dlink.href = resp;

                        dlink.setAttribute("download", "");
                        
                        document.body.appendChild(dlink);

                        dlink.click();

                        document.body.removeChild(dlink);
                    }
                });
            });
        });

    }

});