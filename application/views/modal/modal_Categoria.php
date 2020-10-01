<div id="modal_Categoria" class="modal modal-fixed-footer" style="height: 90%;">
    <div class="modal-content">
        <h4>Crear Categoría</h4>
        <p>Para crear una categoría debe indicar el nombre, una imagen representativa y una descripción.</p>

        <div class="section"></div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="txt_Nombre_Categoria" name="txt_Nombre_Categoria" type="text" class="validate">
                <label for="txt_Nombre_Categoria">Nombre de la categoría</label>
            </div>
        </div>

        <div class="row">
            <div class="row">
                <div class="input-field col s12 m12">
                    <textarea id="txt_Descripcion" class="materialize-textarea"></textarea>
                    <label for="txt_Descripcion">Mensaje para la categoría</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="file-field input-field">
                <div class="btn-small">
                    <span>Abrir</span>
                    <input id="fil_Imagen_Categoria" type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card">
                <div id="div_Imagen_Seleccionada" class="card-image">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a id="btn_Crear_Categoria" href="#!" class="waves-effect waves-green btn btn-small green">Guardar</a>
        <a href="#!" class="cancelar_Modal waves-effect waves-green btn btn-small red">Cancelar</a>
        <a href="#!" class="modal-close cancelar_Modal waves-effect waves-green btn btn-small right">Cerrar</a>
    </div>
</div>