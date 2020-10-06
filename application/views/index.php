<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Andino Home</title>
    <?php $this->load->view('base/head_Base', NULL, FALSE); ?>
</head>

<body>

    <?php $this->load->view('base/menu_Base', NULL, FALSE); ?>

    <main>

        <div id="slider-index" class="slider">
            <ul class="slides">
                <li>
                    <img src="<?= base_url() ?>recursos/imagenes/slideIndex/slide1.jpg">
                    <div class="caption left-align">
                        <h3>ELEGANCIA!</h3>
                        <h5 class="light grey-text text-lighten-3">Mensaje corto.</h5>
                    </div>
                </li>
                <li>
                    <img src="<?= base_url() ?>recursos/imagenes/slideIndex/slide2.jpg">
                    <div class="caption right-align">
                        <h3>COLORES</h3>
                        <h5 class="light grey-text text-lighten-3">Mensaje corto.</h5>
                    </div>
                </li>
                <li>
                    <img src="<?= base_url() ?>recursos/imagenes/slideIndex/slide3.jpg">
                    <div class="caption center-align">
                        <h3>TEXTURA</h3>
                        <h5 class="light grey-text text-lighten-3">Mensaje corto.</h5>
                    </div>
                </li>
                <li>
                    <img src="<?= base_url() ?>recursos/imagenes/slideIndex/slide4.jpg">
                    <div class="caption center-align">
                        <h3>DISEÑO!</h3>
                        <h5 class="light grey-text text-lighten-3">Mensaje corto.</h5>
                    </div>
                </li>
                <li>
                    <img src="<?= base_url() ?>recursos/imagenes/slideIndex/slide1.jpg">
                    <div class="caption left-align">
                        <h3>ATENCIÓN!</h3>
                        <h5 class="light grey-text text-lighten-3">Mensaje corto.</h5>
                    </div>
                </li>
                <li>
                    <img src="<?= base_url() ?>recursos/imagenes/slideIndex/slide2.jpg">
                    <div class="caption center-align">
                        <h3>VISÍTANOS!</h3>
                        <h5 class="light grey-text text-lighten-3">Mensaje corto.</h5>
                    </div>
                </li>
            </ul>
        </div>
        <div class="section grey lighten-3">
            <div class="row card_Index">
                <div class="col s12 m4" data-aos="zoom-in-right">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= base_url() ?>recursos/imagenes/index/sala.jpg">
                            <span class="card-title">SALA</span>
                        </div>
                        <div class="card-content">
                            <p>Información general y relevante sobre las salas que sea llamativa
                                para los visitantes de la página.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m4" data-aos="zoom-out">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= base_url() ?>recursos/imagenes/index/comedor.jpg">
                            <span class="card-title">COMEDOR</span>
                        </div>
                        <div class="card-content">
                            <p>Información general y relevante sobre los comedores que sea llamativa
                                para los visitantes de la página.</p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m4" data-aos="zoom-in-left">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= base_url() ?>recursos/imagenes/index/cama.jpg">
                            <span class="card-title">CAMA</span>
                        </div>
                        <div class="card-content">
                            <p>Información general y relevante sobre las camas que sea llamativa
                                para los visitantes de la página.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="parallax-container center valign-wrapper">
            <div class="container" data-aos="zoom-in-down">
                <div class="row">
                    <div class="col s12 white-text">
                        <h2 class="white-text lighten-2">ELEGANCIA</h2>
                        <h3>Mensaje en el efecto parallax para llamar la atención</h3>
                    </div>
                </div>
            </div>

            <div class="parallax"><img src="<?= base_url() ?>recursos/imagenes/index/parallax1.jpg"></div>
        </div>

        <div class="section white">
            <div class="container">
                <div class="col s12 m12" data-aos="zoom-in-down">
                    <h2 class="header">Horizontal Card</h2>
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="https://lorempixel.com/100/190/nature/6">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <p>I am a very simple card. I am good at containing small bits of information.</p>
                            </div>
                            <div class="card-action">
                                <a href="#">This is a link</a>
                            </div>
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
</script>