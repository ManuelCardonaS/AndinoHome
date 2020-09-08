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
        <div class="section white">
            <div class="row">
                <div class="col s12 m12 l7">
                    <div class="carousel carousel-slider">
                        <?php if (isset($imagenes) && count($imagenes) > 0) {
                            foreach ($imagenes as $key => $value) { ?>
                                <a class="carousel-item" href="#<?= $value->FOT_Fotoproducto ?>!">
                                    <img class="" src="<?= base_url() ?>recursos/imagenes/productos/<?= $value->FOT_Ruta ?>">
                                </a>
                        <?php }
                        } ?>
                    </div>
                </div>

                <div class="col s12 m12 l5">

                    <h4 class="center"><?= $producto[0]->PRO_Nombre ?></h4>

                    <p id="descripción_Producto" class="flow-text"><?= $producto[0]->PRO_Descripcion ?></p>
                </div>
            </div>

            <div class="container">

                <div class="col s12">
                    <h3 class="center">Características del producto</h3>
                </div>

                <div class="col s12">
                    <ul class="collection">
                        <?php if (isset($caracteristicas) && count($caracteristicas) > 0) {
                            foreach ($caracteristicas as $key => $value) { ?>
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col m3">
                                            <span class="bold-text"><?= $value->ATR_Nombre ?></span>
                                        </div>
                                        <div class="col m9">
                                            <span><?= $value->ATP_Descripcion ?></span>
                                        </div>
                                    </div>
                                </li>
                            <?php }
                        } else { ?>
                            <li class="collection-item">
                                <div class="row center">
                                    <span class="bold-text">No se han indicado características</span>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
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