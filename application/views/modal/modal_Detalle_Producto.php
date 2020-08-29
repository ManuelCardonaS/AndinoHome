<div id="modal_Detalle_Producto" class="modal modal-fixed-footer" style="height: 90%; width: 80%;">
    <div class="modal-content">
        <h4>Detalle del producto</h4>
        <p>En este espacio podrá visualizar la información detallada del producto.</p>

        <div class="section"></div>
        <?php echo form_open_multipart('administracion/Inicio/actualizar_Producto'); ?>

        <div class="row">
            <div class="col s12">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab col s4"><a class="active" href="#datos_Producto_Detalle">DATOS PRODUCTO</a></li>
                    <li class="tab col s4"><a href="#caracteristicas_Producto_Detalle">CARACTERÍSTICAS</a></li>
                    <li class="tab col s4"><a href="#fotos_Producto_Detalle">FOTOS</a></li>
                </ul>
            </div>

            <div id="datos_Producto_Detalle" class="col s12">
                <div class="section">
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="txt_Nombre_Producto_Detalle" name="txt_Nombre_Producto_Detalle" type="text" class="center validate">
                            <label for="txt_Nombre_Producto_Detalle">Nombre del producto <b class="red-text">*</b></label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input id="txt_Precio_Producto_Detalle" name="txt_Precio_Producto_Detalle" type="number" class="center validate">
                            <label for="txt_Precio_Producto_Detalle">Precio del producto <b class="red-text">*</b></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="txt_Descripcion_Producto_Detalle" name="txt_Descripcion_Producto_Detalle" class="materialize-textarea"></textarea>
                            <label for="txt_Descripcion_Producto_Detalle">Descripción del producto <b class="red-text">*</b></label>
                        </div>
                    </div>
                </div>
            </div>
            <div id="caracteristicas_Producto_Detalle" class="col s12">
                <div class="section">
                    <div class="row">
                        <div class="col s12 center">
                            <span class="flow-text">Indique las características corresponden al producto</span>
                        </div>
                    </div>
                    <br>
                    <div id="div_Caracteristicas_Detalle" class="row">
                        
                    </div>
                </div>
            </div>
            <div id="fotos_Producto_Detalle" class="col s12">
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
        <a id="btn_Actualizar_Producto" href="#!" class="waves-effect waves-green btn btn-small green">Actualizar</a>
        <a href="#!" class="waves-effect waves-green btn btn-small red">Cancelar</a>
        <a href="#!" class="modal-close cancelar_Modal waves-effect waves-green btn btn-small right">Cerrar</a>
    </div>
</div>