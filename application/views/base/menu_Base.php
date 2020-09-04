<ul id="slide-out" class="sidenav">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="images/office.jpg">
            </div>
            <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
            <a href="#name"><span class="white-text name">John Doe</span></a>
            <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div>
    </li>

    <li><a href="<?= base_url() ?>index.php/index" class="grey-text text-darken-3 lighten-3"><i class="material-icons">home</i>Inicio</a></li>
    <li><a href="<?= base_url() ?>index.php/index" class="grey-text text-darken-3 lighten-3">Sobre nosotros</a></li>
    <li>
        <div class="divider"></div>
    </li>

    <?php if (count($categorias) > 0) {
        foreach ($categorias as $key => $value) { ?>
            <li><a href="<?= base_url() ?>index.php/productos/<?= ucfirst(strtolower($value->CAT_Nombre)) ?>" class="grey-text text-darken-3 lighten-3"><?= ucfirst(strtolower($value->CAT_Nombre)) ?></a></li>
    <?php }
    } ?>
</ul>

<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="<?= base_url() ?>index.php/index" class="grey-text text-darken-3 lighten-3">Inicio</a></li>
                <li><a href="<?= base_url() ?>index.php/index" class="grey-text text-darken-3 lighten-3">Sobre nosotros</a></li>
            </ul>
            <img src="<?= base_url() ?>/recursos/imagenes/logo.jpg" class="hide-on-med-and-down center brand-logo">
            <ul id="nav-mobile" class="right hide-on-med-and-down">

                <?php if (count($categorias) > 0) {
                    foreach ($categorias as $key => $value) { ?>
                        <li><a href="<?= base_url() ?>index.php/productos/<?= ucfirst(strtolower($value->CAT_Nombre)) ?>" class="grey-text text-darken-3 lighten-3"><?= ucfirst(strtolower($value->CAT_Nombre)) ?></a></li>
                <?php }
                } ?>
            </ul>
        </div>
    </nav>
</div>