$(document).ready(function() {

    var subcategoria = subcategoria_Seleccionada;

    //Mensajes Toast con colores personalizados
    const colorCorrecto = 'green';
    const colorError = 'red';

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

    function formatearValor(num) {
        if (!isNaN(num)) {
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            num = num.split('').reverse().join('').replace(/^[\.]/, '');
            return num;
        }
    }

    /*$('#txt_Nombre_Producto').autocomplete({
        data: json_Autocomplete,
        onAutocomplete: function(txt) {

            $.ajax({
                type: 'POST',
                datatype: "json",
                url: base_url + "administracion/inicio/buscar_Producto",
                data: { nombre_Producto: txt },
                success: function(datos) {

                    reiniciar_Campos_Compra();

                    let json = JSON.parse(datos);

                    id_Producto_Compra_Seleccionado = json['PRO_Producto'];

                    $("#txt_Valor_Unitario_Compra").val(json['PRO_Valor_Unitario']);
                    $("#txt_Valor_Publico_Compra").val(json['PRO_Valor_Publico']);
                    $("#txt_Valor_Por_Mayor_Compra").val(json['PRO_Valor_Por_Mayor']);
                    $("#lbl_Stock_Compra").val(json['PRO_Stock']);
                    $("#txt_Descripcion_Compra").val(json['PRO_Descripción']);
                },
                error: function() {
                    mensaje('Error en la consulta', colorError, null);
                }

            });
        },
        limit: 5,
        minLength: 2
    });*/

    $(document).on("change", "#ckb_Categorias", function(event) {
        event.preventDefault();

        $("#ckb_Subcategorias").val("-1");
        this.form.submit();
    });

    $("#fil_Imagenes_Producto").change(function() {

        $("#div_Imagenes").empty();
        for (let i = 0; i < this.files.length; i++) {
            var file = this.files[i];
            var imagetype = file.type;
            var imgtags = ['image/jpeg', 'image/pjpeg', "image/png", "image/jpg"];

            if (imgtags.indexOf(imagetype) !== -1) {

                let reader = new FileReader();

                let divImg = $("<div class='col m4 s12'></div>");
                let img = $("<img class='img_Crear_Producto'>");


                reader.onload = function(e) {
                    img.attr('src', e.target.result);
                }
                reader.readAsDataURL(file);

                divImg.append(img);
                $("#div_Imagenes").append(divImg);

            } else {
                console.log('File Is not an image!');
            }
        }
    });

    $(document).on("click", "#btn_Cancelar_Producto, #btn_Cerar_Crear_Producto", function() {

    });

    $(document).on("click", "#btn_Crear_Producto", function() {

        let nombre_Producto = $("#txt_Nombre_Producto").val().trim();
        let precio_Producto = $("#txt_Precio_Producto").val();
        let descripcion_Producto = $("#txt_Descripcion_Producto").val().trim();

        if (nombre_Producto == '' || precio_Producto == '' || descripcion_Producto == '') {
            mensaje("Debe ingresar todos los datos del producto.", colorError, null);
            return;
        }

        let arrayCaracteristicas = [];

        $("#div_Caracteristicas").find('input:text').each(function() {

            let id = $(this).attr("id");
            let valor = $(this).val().trim();
            if (valor != "") {
                arrayCaracteristicas.push({
                    caracteristica: { id, valor }
                });
            }
        });

        var form_data = new FormData();
        let cantidad_Imagenes = 0;
        let imagen = $('#fil_Imagenes_Producto').prop('files');

        $.each(imagen, function(indexInArray, file) {
            cantidad_Imagenes++;
            form_data.append('file[]', file);
        });

        if (arrayCaracteristicas.length == 0) {
            mensaje("Debe diligenciar al menos una característica.", colorError, null);
            return;
        }

        if (cantidad_Imagenes == 0) {
            mensaje("Debe seleccionar al menos una fotografía del producto.", colorError, null);
            return;
        }

        form_data.append('subcategoria', subcategoria);
        form_data.append('nombre_Producto', nombre_Producto);
        form_data.append('precio_Producto', precio_Producto);
        form_data.append('descripcion_Producto', descripcion_Producto);
        form_data.append('caracteristicas', JSON.stringify(arrayCaracteristicas));

        $.ajax({
            type: 'POST',
            url: base_url + "administracion/Inicio/guardar_Producto",
            processData: false,
            contentType: false,
            dataType: 'json',
            data: form_data,
            success: function(datos, status) {

                if (datos['estado'] == "ok") {
                    mensaje(datos['mensaje'], colorCorrecto, true);
                } else {
                    mensaje(datos['mensaje'], colorError, null);
                }

            },
            error: function(datos, status) {

                mensaje('Ha ocurrido un problema.', colorError, null);


            }

        });

    });

});