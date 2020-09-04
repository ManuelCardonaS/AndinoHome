<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Andino Home</title>
    <?php $this->load->view('base/head_Base', NULL, FALSE); ?>
</head>

<body>

    <main>
        <?php $this->load->view('base/menu_Base', NULL, FALSE); ?>
        <div class="slider">
            <ul class="slides">
                <li>
                    <img src="<?= base_url() ?>recursos/imagenes/slideIndex/slide1.jpg">
                    <div class="caption left-align">
                        <h3>TÍTULO!</h3>
                        <h5 class="light grey-text text-lighten-3">Mensaje corto.</h5>
                    </div>
                </li>
                <li>
                    <img src="<?= base_url() ?>recursos/imagenes/slideIndex/slide2.jpg">
                    <div class="caption right-align">
                        <h3>TÍTULO</h3>
                        <h5 class="light grey-text text-lighten-3">Mensaje corto.</h5>
                    </div>
                </li>
                <li>
                    <img src="<?= base_url() ?>recursos/imagenes/slideIndex/slide3.jpg">
                    <div class="caption center-align">
                        <h3>TÍTULO</h3>
                        <h5 class="light grey-text text-lighten-3">Mensaje corto.</h5>
                    </div>
                </li>
                <li>
                    <img src="<?= base_url() ?>recursos/imagenes/slideIndex/slide4.jpg">
                    <div class="caption center-align">
                        <h3>TÍTULO!</h3>
                        <h5 class="light grey-text text-lighten-3">Mensaje corto.</h5>
                    </div>
                </li>
            </ul>
        </div>
        <div class="section white">
            <div class="row container">
                <h2 class="header">Título de algo</h2>
                <p class="grey-text text-darken-3 lighten-3">Un texto antes de un efecto parallax.</p>
            </div>
        </div>
        <div class="parallax-container">
            <div class="parallax"><img src="<?= base_url() ?>recursos/imagenes/index/parallax1.jpg"></div>
        </div>
        <div class="section white">
            <div class="row container">
                <h2 class="header">Otra sección</h2>
                <p class="grey-text text-darken-3 lighten-3">Un texto después de un efecto parallax.</p>
            </div>
        </div>
    </main>

</body>

<?php $this->load->view('base/footer_Base', NULL, FALSE); ?>

</html>

<script type="application/javascript">
    var base_url = "<?= base_url(); ?>index.php/";
    var json_Autocomplete = <?= $json_Autocomplete ?>;
</script>