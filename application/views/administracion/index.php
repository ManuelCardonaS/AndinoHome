<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Bienvenido</title>
    <?php $this->load->view('base/head_Base_Admin', NULL, FALSE); ?>
    <script src="<?= base_url(); ?>js/gestion_Productos.js" type="application/javascript"></script>
</head>

<body>

    <?php
    $this->load->view('base/menu_Base_Admin', NULL, FALSE);
    $this->load->view('modal/modal_Crear_Producto', NULL, FALSE);

    ?>

    <main>
        <div style="padding: 10px;">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <form method="post" accept-charset="utf-8" action="">
                            <div class="col input-field">
                                <select name="ckb_Categorias" id="ckb_Categorias">
                                    <?php if (isset($categorias) && count($categorias) > 0) {
                                        foreach ($categorias as $key => $value) { ?>
                                            <option <?= $categoria_Seleccionada == $value->CAT_Categoria ? 'selected' : '' ?> value="<?= $value->CAT_Categoria ?>"><?= $value->CAT_Nombre ?></option>
                                        <?php }
                                    } else { ?>
                                        <option value="0" disabled>No se encuentran categorías</option>
                                    <?php } ?>
                                </select>
                                <label for="ckb_Categorias">Categorías</label>
                            </div>

                            <div class="col input-field">
                                <select name="ckb_Subcategorias" id="ckb_Subcategorias">
                                    <option selected value="-1">SELECCIONE:</option>
                                    <?php if (isset($SubCategorias) && count($SubCategorias) > 0) {
                                        foreach ($SubCategorias as $key => $value) { ?>
                                            <option <?= $subcategoria_Seleccionada == $value->SUB_Subcategoria ? 'selected' : '' ?> value="<?= $value->SUB_Subcategoria ?>"><?= $value->SUB_Nombre ?></option>
                                        <?php }
                                    } else { ?>
                                        <option disabled>No se encuentran subcategorías</option>
                                    <?php } ?>
                                </select>
                                <label for="ckb_Subcategorias">Subcategorías</label>
                            </div>

                            <div class="col input-field">
                                <select name="ckb_Estado">
                                    <option value="1" <?= $Estado_Activo ?>>ACTIVO</option>
                                    <option value="0" <?= $Estado_Inactivo ?>>INACTIVO</option>
                                </select>
                                <label for="ckb_Estado">Estado del producto</label>
                            </div>

                            <div class="col input-field">
                                <button class="btn-small waves-effect waves-light" type="submit" name="action">Buscar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="row">

                        <?php if ($subcategoria_Seleccionada != -1 && $Estado_Activo == "selected") { ?>
                            <div class="col input-field s12">
                                <button class="btn-small waves-effect waves-light modal-trigger" href="#modal_Crear_Producto" name="action">Añadir producto
                                    <i class="material-icons right">add</i>
                                </button>
                            </div>
                        <?php } ?>

                        <div class="col m12">
                            <?php if ($productos != NULL && count($productos) > 0) {
                                foreach ($productos as $key => $value) {
                                    $foto = $value->FOT_Ruta == NULL ? base_url() . "recursos/imagenes/nofoto.png" : base_url() . "recursos/imagenes/productos/" . $value->FOT_Ruta ?>
                                    <div class="col s12 m4 l3">
                                        <div class="card">
                                            <div class="card-image responsive-img">
                                                <img src="<?= $foto ?> ">
                                                <a id="<?= $value->PRO_Producto ?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title truncate"><?= $value->PRO_Nombre ?></span>
                                                <p class="truncate"><?= $value->PRO_Descripcion ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } else if ($subcategoria_Seleccionada != -1) { ?>
                                <span class="bold-text">No se encuentran productos</span>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

<?php $this->load->view('base/footer_Base', NULL, FALSE); ?>

</html>

<script type="application/javascript">
    var base_url = "<?= base_url(); ?>index.php/";
    var categoria_Seleccionada = <?= $categoria_Seleccionada ?>;
    var subcategoria_Seleccionada = <?= $subcategoria_Seleccionada ?>
</script>