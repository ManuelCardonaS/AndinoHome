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

    $(document).on("click", ".cancelar_Modal", function() {
        window.location.reload();
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
            url: base_url + "index.php/administracion/Inicio/guardar_Producto",
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

    $(document).on("click", ".abrir_Producto", function() {

        let id = $(this).closest(".col").attr("id");

        $("#id_Producto_Detalle").val(id);
        $("#txt_Nombre_Producto_Detalle").val("");
        $("#txt_Precio_Producto_Detalle").val("");
        $("#txt_Descripcion_Producto_Detalle").val("");
        $.each($("#div_Caracteristicas_Detalle :input"), function(indexInArray, input) {
            $(input).val("");
        });
        $("#div_Imagenes_Detalle").empty();

        $.ajax({
            type: 'POST',
            datatype: "json",
            url: base_url + "index.php/administracion/Inicio/get_Producto_Detalle",
            data: { id_Producto: id },
            success: function(datos) {

                let producto = JSON.parse(datos)['producto'][0];
                let caracteristicas = JSON.parse(datos)['caracteristicas'];
                let fotos = JSON.parse(datos)['imagenes'];

                let divPrincipal = $("#div_Caracteristicas_Detalle");

                $("#txt_Nombre_Producto_Detalle").val(producto['PRO_Nombre']);
                $("#txt_Precio_Producto_Detalle").val(producto['PRO_Precio']);
                $("#txt_Descripcion_Producto_Detalle").val(producto['PRO_Descripcion']);

                $.each(caracteristicas, function(index, Item_Caracteristica) {
                    $.each($("#div_Caracteristicas_Detalle :input"), function(indexInArray, input) {
                        if ($(input).attr("id_Atributo") == Item_Caracteristica['ATP_ATR_Atributo']) {
                            $(input).attr("id_Atributo_Producto", Item_Caracteristica['ATP_ID']);
                            $(input).val(Item_Caracteristica['ATP_Descripcion']);
                        }
                    });
                });

                $.each(fotos, function(index, foto) {

                    let divImg = $("<div class='col m4 s12'><a id_Imagen_Detalle='" + foto['FOT_Fotoproducto'] + "' class='btn-floating waves-effect waves-light eliminar_Imagen red'><i class='material-icons'>remove</i></a></div>");
                    let img = $("<img class='img_Crear_Producto'>");
                    img.attr('src', base_url + "recursos/imagenes/productos/" + foto['FOT_Ruta']);
                    divImg.append(img);
                    $("#div_Imagenes_Detalle").append(divImg);

                });

                M.updateTextFields();
                $("#modal_Detalle_Producto").modal('open');
            },
            error: function() {
                mensaje('Error en la consulta', colorError, null);
            }

        });
    });

    $(document).on("change", ".estado_Producto_Detalle", function() {

        let boton = $(this);
        let id_Producto = boton.closest(".col").attr("id");
        let estado, mensaje_Estado, mensaje_Cambio;

        if (boton.is(":checked")) {
            estado = 1;
            mensaje_Estado = "¿ Desea habilitar el producto ?";
            mensaje_Cambio = "Producto habilitado correctamente";
        } else {
            mensaje_Estado = "¿ Desea inhabilitar el producto ?";
            mensaje_Cambio = "Producto inhabilitado correctamente";
            estado = 0;
        }

        var opcion = confirm(mensaje_Estado);
        if (opcion == true) {

            $.ajax({
                type: 'POST',
                url: base_url + "index.php/administracion/Inicio/cambiar_Estado_Producto",
                dataType: 'json',
                data: { id_Producto: id_Producto, estado: estado },
                success: function(datos, status) {

                    if (datos) {
                        mensaje(mensaje_Cambio, colorCorrecto, null);
                        boton.closest(".col").remove();
                    } else {
                        mensaje("El estado del producto no ha cambiado", colorError, null);
                    }

                },
                error: function(datos, status) {
                    mensaje('Ha ocurrido un problema.', colorError, null);
                }

            });

        } else {
            if (boton.is(":checked")) {
                boton.prop("checked", false);
                estado = 0;
            } else {
                estado = 1;
                boton.prop("checked", true);
            }
        }

    });

    $(document).on("click", ".eliminar_Imagen", function(param) {
        event.preventDefault();

        let boton = $(this);
        let id_Imagen = boton.attr("id_Imagen_Detalle");

        var opcion = confirm("¿ Desea inhabilitar la imagen ?");
        if (opcion == true) {
            $.ajax({
                type: 'POST',
                url: base_url + "index.php/administracion/Inicio/inhabilitar_Imagen",
                dataType: 'json',
                data: { id: id_Imagen },
                success: function(datos, status) {

                    if (datos) {
                        mensaje("Imagen inhabilitada exitosamente", colorCorrecto, null);
                        boton.closest("div").remove();
                    } else {
                        mensaje("El estado de la imagen no ha cambiado", colorError, null);
                    }

                },
                error: function(datos, status) {

                    mensaje('Ha ocurrido un problema.', colorError, null);


                }

            });

        } else {
            mensaje = "Cancelar";
        }

    });

    $("#fil_Imagenes_Producto_Detalle").change(function() {

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
                $("#div_Imagenes_Detalle").append(divImg);

            } else {
                console.log('File Is not an image!');
            }
        }
    });

    $(document).on("click", "#btn_Actualizar_Producto", function() {

        let id_Producto = $("#id_Producto_Detalle").val();
        let nombre_Producto = $("#txt_Nombre_Producto_Detalle").val().trim();
        let precio_Producto = $("#txt_Precio_Producto_Detalle").val();
        let descripcion_Producto = $("#txt_Descripcion_Producto_Detalle").val().trim();

        if (nombre_Producto == '' || precio_Producto == '' || descripcion_Producto == '') {
            mensaje("Debe ingresar todos los datos del producto.", colorError, null);
            return;
        }

        let arrayCaracteristicas = [];

        $("#div_Caracteristicas_Detalle").find('input:text').each(function() {

            let id_Atributo_Producto = $(this).attr("id_Atributo_Producto") == null ? "-1" : $(this).attr("id_Atributo_Producto");
            let id = $(this).attr("id_Atributo");
            let valor = $(this).val().trim();
            if (valor != "") {
                arrayCaracteristicas.push({
                    caracteristica: { id_Atributo_Producto, id, valor }
                });
            }

        });

        console.log(arrayCaracteristicas);

        var form_data = new FormData();
        let cantidad_Imagenes = 0;
        let imagen = $('#fil_Imagenes_Producto_Detalle').prop('files');

        $.each(imagen, function(indexInArray, file) {
            cantidad_Imagenes++;
            form_data.append('file[]', file);
        });

        if (arrayCaracteristicas.length == 0) {
            mensaje("Debe diligenciar al menos una característica.", colorError, null);
            return;
        }

        form_data.append('id_Producto', id_Producto);
        form_data.append('subcategoria', subcategoria);
        form_data.append('nombre_Producto', nombre_Producto);
        form_data.append('precio_Producto', precio_Producto);
        form_data.append('descripcion_Producto', descripcion_Producto);
        form_data.append('caracteristicas', JSON.stringify(arrayCaracteristicas));

        $.ajax({
            type: 'POST',
            url: base_url + "index.php/administracion/Inicio/actualizar_Producto",
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