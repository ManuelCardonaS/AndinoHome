<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title><?= $titulo ?></title>
    <?php $this->load->view('base/head_Base', NULL, FALSE); ?>
</head>

<body>

    <?php $this->load->view('base/menu_Base', NULL, FALSE); ?>

    <main>
        <div class="section">
            <div class="row">
                <div id="div_Subcategorias" class="col s12 m4 l3">
                    <h4 class="center"><?= $titulo ?></h4>
                    <div class="collection">
                        <?php if (isset($subcategorias)) {
                            foreach ($subcategorias as $key => $value) { ?>
                                <a href="<?= base_url() . "index.php/categoria/index/" . $titulo . "/" . $value->SUB_Subcategoria ?>" class="collection-item center <?= $value->SUB_Subcategoria == $id_subcategoria ? "active" : "" ?>"><?= $value->SUB_Nombre ?></a>
                        <?php }
                        } ?>
                    </div>
                </div>
                <div id="div_Productos" class="col s12 m8 l9">
                    <?php if (isset($productos) && count($productos) > 0) {
                        foreach ($productos as $key => $value) { ?>
                            <div class="col s12 m6 l3">
                                <a href="<?= base_url() . "index.php/producto/index/" . $value->PRO_Producto ?>">
                                    <div class="card pointer">
                                        <div class="card-image">
                                            <img src="<?= base_url() ?>recursos/imagenes/productos/<?= $value->FOT_Ruta ?>">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title center truncate"><?= $value->PRO_Nombre ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="col s12">
                            <span>No se han asignado productos</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>

</body>

<?php $this->load->view('base/footer_Base', NULL, FALSE); ?>

</html>

<script type="application/javascript">
    var base_url = "<?= base_url(); ?>index.php/";
</script>