window.addEventListener('load', initEventos);
const $ = id => document.getElementById(id);



function initEventos() {

    $('formulario').addEventListener('submit', function (e) {
        e.preventDefault();


        if ($('formulario').checkValidity()) {


            //habrá que comparar las 2 password antes de enviar, el resto de los campos con pattern
            $('formulario').submit();
        }
    })

}

