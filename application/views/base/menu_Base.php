<div class="navbar-fixed">
    <nav class=" nav-extended">
        <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

            <ul class="left hide-on-med-and-down">
                <li><a href="<?= base_url() ?>index.php/index">Inicio</a></li>
                <li><a href="<?= base_url() ?>index.php/index">Sobre nosotros</a></li>
            </ul>
            <img height="100%" src="<?= base_url() ?>/recursos/imagenes/logo.jpg" class="logo hide-on-med-and-down center brand-logo">
            <ul class="right">
                <li><a href="<?= base_url() ?>index.php/index"><img height="24px" src="<?= base_url() ?>recursos/imagenes/redes/facebook.png" alt=""></a></li>
                <li><a href="<?= base_url() ?>index.php/index"><img height="24px" src="<?= base_url() ?>recursos/imagenes/redes/instagram.png" alt=""></a></li>
            </ul>
        </div>
        <div class="nav-content right hide-on-med-and-down">
            <ul class="">
                <?php if (count($categorias) > 0) {
                    foreach ($categorias as $key => $value) { ?>
                        <li><a href="<?= base_url() ?>index.php/categoria/index/<?= ucfirst(strtolower($value->CAT_Nombre)) ?>" class="<?= isset($id_Categoria) && $value->CAT_Categoria == $id_Categoria ? "active" : "" ?>"><?= ucfirst(strtolower($value->CAT_Nombre)) ?></a></li>
                <?php }
                } ?>
            </ul>
        </div>
    </nav>
</div>

<ul id="slide-out" class="sidenav">
    <li>
        <div class="user-view">
            <a href="#user"><img width="100%" src="<?= base_url() ?>/recursos/imagenes/logo.jpg"></a>
        </div>
    </li>

    <li><a href="<?= base_url() ?>index.php/index"><i class="material-icons">home</i>Inicio</a></li>
    <li><a href="<?= base_url() ?>index.php/index">Sobre nosotros</a></li>
    <li>
        <div class="divider"></div>
    </li>

    <?php if (count($categorias) > 0) {
        foreach ($categorias as $key => $value) { ?>
            <li><a href="<?= base_url() ?>index.php/categoria/<?= ucfirst(strtolower($value->CAT_Nombre)) ?>" class="grey-text text-darken-3 lighten-3"><i class="material-icons">arrow_forward</i><?= ucfirst(strtolower($value->CAT_Nombre)) ?></a></li>
    <?php }
    } ?>
</ul>