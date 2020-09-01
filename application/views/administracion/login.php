<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="<?= base_url() ?>recursos/imagenes/logo.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="<?= base_url(); ?>jquery/jquery-3.5.1.min.js" type="application/javascript"></script>
    <script src="<?= base_url(); ?>materialize/js/materialize.min.js" type="application/javascript"></script>
    <script src="<?= base_url(); ?>js/login.js" type="application/javascript"></script>
    <link href="<?= base_url() ?>materialize/css/materialize.css" rel="stylesheet">
    <link href="<?= base_url() ?>css/login.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

    <?= form_open("administracion/Login/index") ?>

    <div class="card-panel z-depth-5">

        <div class="row margin">
            <div class="col s12 m12 l12 center">
                <img id="logo" src="<?= base_url() ?>recursos/imagenes/logo.jpg" alt="" class="responsive-img">
            </div>
        </div>

        <div class="col s12 m12 l12">
            <div class="input-field">
                <i class="material-icons prefix">person</i>
                <input type="text" name="txt_Usuario" id="txt_Usuario" value="<?= $Usuario ?>" class="validate">
                <label for="txt_Usuario">Usuario</label>
            </div>
        </div>

        <div class="col m12 l12">
            <div class="input-field">
                <i class="material-icons prefix">lock</i>
                <input type="password" name="txt_Contrasena" id="txt_Contrasena" value="<?= $Contrasena ?>" class="validate">
                <label for="txt_Contrasena">Contraseña</label>
            </div>
        </div>

        <div class="center">
            <button id="submit" class="btn waves-effect waves-light" name="action">Iniciar sesión
                <i class="material-icons right">send</i>
            </button>
        </div>

        <div class="" style="font-size:14px;"><br>
            <a href="" class="right ">Olvidé mi contraseña</a>
        </div><br>
    </div>
    <?= form_close() ?>

</body>

<script type="text/javascript">
    var bienvenido = "<?= $bienvenido ?>";
</script>

</html>