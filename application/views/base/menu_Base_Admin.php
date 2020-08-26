<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
        <div class="user-view">
            <a href="#user"><img class="circle" src="<?= base_url() ?>recursos/imagenes/usuarios/user.png"></a>
            <a><span class="white-text name">Manuel Felipe Cardona Suárez</span></a>
            <a><span class="white-text bold-text pointer waves-effect">Cerrar Sesión</span></a>
        </div>
    </li>
    <li>
        <div class="divider"></div>
    </li>

    <li><a class="waves-effect" href="<?= base_url() ?>index.php/administracion/Inicio"><i class="material-icons">arrow_forward</i>Productos</a></li>
</ul>

<nav>
    <div class="nav-wrapper">
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="left">
            <li><a id="Titulo_Nav"><?= $Titulo_Nav ?></a></li>
        </ul>
    </div>
</nav>