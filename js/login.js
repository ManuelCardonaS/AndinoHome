$(document).ready(function() {

    //Mensajes Toast con colores personalizados
    const colorCorrecto = 'green';
    const colorError = 'red';

    console.log(bienvenido);

    if (bienvenido != "") {
        if (bienvenido == "ok") {
            mensaje("Bienvenido", colorCorrecto, true);
        } else {
            mensaje(bienvenido, colorError, null);
        }
    }

    function mensaje(msj, color, recargar) {
        var cl = 'rounded ' + color;
        M.toast({
            html: msj,
            classes: cl,
            displayLength: 2000,
            completeCallback: function() {
                if (recargar !== null) {
                    setTimeout(window.location.reload());
                }

            }
        });
    };

});