<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Categorías</title>
    <?php $this->load->view('base/head_Base_Admin', NULL, FALSE); ?>
    <script src="<?= base_url(); ?>js/gestion_Categorias.js" type="application/javascript"></script>
</head>

<body>

    <?php
    $this->load->view('base/menu_Base_Admin', NULL, FALSE);
    $this->load->view('modal/modal_Categoria', NULL, FALSE);
    ?>

    <main>
        <div style="padding: 10px;">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12 m12 l3">
                            <ul class="collection with-header">
                                <li class="collection-header center">
                                    <h4>Categorías</h4>
                                    <a class="waves-effect waves-light btn-small modal-trigger" href="#modal_Categoria">Añadir categoría</a>

                                </li>
                                <?php if (count($categorias) > 0) {
                                    foreach ($categorias as $key => $value) { ?>
                                        <li class="collection-item <?= $id_Categoria_Seleccionada == $value->CAT_Categoria ? "active" : "" ?>">
                                            <div><?= $value->CAT_Nombre ?><a id="<?= $value->CAT_Categoria ?>" href="<?= base_url() ?>index.php/administracion/Categoria/index/<?= $value->CAT_Categoria ?>" class="secondary-content"><i class="material-icons">send</i></a></div>
                                        </li>
                                    <?php }
                                } else { ?>
                                    <li class="collection-item center">
                                        <div class="bold-text">No hay categorías<a href="#!" class="secondary-content"></a></div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col s12 m12 l3">
                            <ul class="collection with-header">
                                <li class="collection-header center">
                                    <h4>Subcategorias</h4>
                                    <a href="#" class="waves-effect waves-light btn-small">Añadir subcategoría</a>
                                </li>
                                <?php if (count($subCategorias) > 0) {
                                    foreach ($subCategorias as $key => $value) { ?>
                                        <li class="collection-item"><?= $value->SUB_Nombre ?></li>
                                    <?php }
                                } else { ?>
                                    <li class="collection-item">No hay subcategorías</li>
                                <?php } ?>

                            </ul>
                        </div>
                        <?php if (isset($ruta_Imagen_Categoria) && isset($mensaje_Categoria)) { ?>
                            <div class="col s12 m12 l6">
                                <div class="col s12 m12 l12">
                                    <div class="card">
                                        <div class="card-image">
                                            <img src="<?= base_url() ?>recursos/imagenes/categoria/<?= $ruta_Imagen_Categoria ?>">
                                        </div>
                                        <div class="card-content">
                                            <p><?= $mensaje_Categoria ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

<?php $this->load->view('base/footer_Base', NULL, FALSE); ?>

</html>

<script type="application/javascript">
    var base_url = "<?= base_url(); ?>";
    var id_Categoria_Seleccionada = <?= $id_Categoria_Seleccionada ?>;
</script>