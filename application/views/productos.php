<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title><?= $titulo ?></title>
    <?php $this->load->view('base/head_Base', NULL, FALSE); ?>
</head>

<body class="grey lighten-3">

    <?php $this->load->view('base/menu_Base', NULL, FALSE); ?>

    <main>
        <div class="section white">
            <div class="row">
                <div class="col m3 s12">
                    <div class="collection">
                        <h2 class="center"><?= $titulo ?></h2>
                        <?php if (isset($subcategorias)) {
                            foreach ($subcategorias as $key => $value) { ?>
                                <a href="#!" class="collection-item"><?= $value->SUB_Nombre ?></a>
                        <?php }
                        } ?>
                    </div>
                </div>
                <div class="col m9 s12">
                    ewfdijnweifw
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