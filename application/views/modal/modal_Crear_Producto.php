<div id="modal_Crear_Producto" class="modal modal-fixed-footer" style="height: 90%; width: 80%;">
    <div class="modal-content">
        <h4>Crear nuevo producto</h4>
        <p>En este espacio podrá crear nuevos productos ingresando los datos respectivos</p>

        <div class="section"></div>
        <?php echo form_open_multipart('administracion/Inicio/guardar_Producto'); ?>

        <div class="row">
            <div class="col s12">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab col s4"><a class="active" href="#datos_Producto">DATOS PRODUCTO</a></li>
                    <li class="tab col s4"><a href="#caracteristicas_Producto">CARACTERÍSTICAS</a></li>
                    <li class="tab col s4"><a href="#fotos_Producto">FOTOS</a></li>
                </ul>
            </div>

            <div id="datos_Producto" class="col s12">
                <div class="section">
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="txt_Nombre_Producto" name="txt_Nombre_Producto" type="text" class="center validate">
                            <label for="txt_Nombre_Producto">Nombre del producto <b class="red-text">*</b></label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input id="txt_Precio_Producto" name="txt_Precio_Producto" type="number" class="center validate">
                            <label for="txt_Precio_Producto">Precio del producto <b class="red-text">*</b></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="txt_Descripcion_Producto" name="txt_Descripcion_Producto" class="materialize-textarea"></textarea>
                            <label for="txt_Descripcion_Producto">Descripción del producto <b class="red-text">*</b></label>
                        </div>
                    </div>
                </div>
            </div>
            <div id="caracteristicas_Producto" class="col s12">
                <div class="section">
                    <div class="row">
                        <div class="col s12 center">
                            <span class="flow-text">Indique las características corresponden al producto</span>
                        </div>
                    </div>

                    <div id="div_Caracteristicas" class="row">
                        <?php if (count($caracteristicas) > 0) {
                            foreach ($caracteristicas as $key => $value) { ?>
                                <div class="input-field col m3 s12">
                                    <input id="<?= $value->ATR_AtributoProducto ?>" type="text" class="validate">
                                    <label for="<?= $value->ATR_AtributoProducto ?>"><?= $value->ATR_Nombre ?></label>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="input-field col m12 s12">
                                <span class="bold-text">No tiene características almacenadas, ingrese características presionando <a href="">AQUÍ</a></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div id="fotos_Producto" class="col s12">
                <div class="section">
                    <div class="row">
                        <div class="col s12">
                            <form action="#">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Abrir</span>
                                        <input id="fil_Imagenes_Producto" name="fil_Imagenes_Producto" type="file" multiple>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Seleccione una o más imágenes">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="div_Imagenes" class="row">
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="modal-footer">
        <a id="btn_Crear_Producto" href="#!" class="waves-effect waves-green btn btn-small green">Guardar</a>
        <a href="#!" class="cancelar_Modal waves-effect waves-green btn btn-small red">Cancelar</a>
        <a href="#!" class="modal-close cancelar_Modal waves-effect waves-green btn btn-small right">Cerrar</a>
    </div>
</div>