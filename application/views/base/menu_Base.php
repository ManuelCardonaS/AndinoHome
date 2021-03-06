<div class="navbar-fixed">
    <nav class="">
        <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

            <ul class="left hide-on-med-and-down">
                <li class="<?= $menu == "index" ? "active" : "" ?>"><a href="<?= base_url() ?>index.php/index">Inicio</a></li>
                <li class="<?= $menu == "nosotros" ? "active" : "" ?>"><a href="<?= base_url() ?>index.php/nosotros">Nosotros</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="drop_Categorias">Productos<i class="material-icons right">arrow_drop_down</i></a></li>

            </ul>
            <img height="100%" src="<?= base_url() ?>/recursos/imagenes/logo.jpg" class="logo hide-on-med-and-down center brand-logo">
            <ul class="right">
                <li><a href="<?= base_url() ?>index.php/index"><img height="24px" src="<?= base_url() ?>recursos/imagenes/redes/facebook.png" alt=""></a></li>
                <li><a href="<?= base_url() ?>index.php/index"><img height="24px" src="<?= base_url() ?>recursos/imagenes/redes/instagram.png" alt=""></a></li>
            </ul>
        </div>
    </nav>
</div>

<ul id="drop_Categorias" class="dropdown-content">
    <?php if (count($categorias) > 0) {
        foreach ($categorias as $key => $value) { ?>
            <li class="<?= isset($id_Categoria) && $value->CAT_Categoria == $id_Categoria ? "active" : "" ?>"><a class="center" href="<?= base_url() ?>index.php/categoria/index/<?= ucfirst(strtolower($value->CAT_Categoria)) ?>"><?= ucfirst(strtolower($value->CAT_Nombre)) ?></a></li>
    <?php }
    } ?>
</ul>

<ul id="slide-out" class="sidenav">
    <li id="cabecera">
        <div class="user-view">
            <a href="#user"><img width="100%" src="<?= base_url() ?>/recursos/imagenes/logo.jpg"></a>
        </div>
    </li>

    <li class="<?= $menu == "index" ? "active" : "" ?>"><a href="<?= base_url() ?>index.php/index"><i class="material-icons">home</i>Inicio</a></li>
    <li class="<?= $menu == "nosotros" ? "active" : "" ?>"><a href="<?= base_url() ?>index.php/nosotros"><i class="material-icons">group</i>Nosotros</a></li>
    <li>
        <div class="divider"></div>
    </li>
    <li><a class="subheader">Categorías</a></li>
    <?php if (count($categorias) > 0) {
        foreach ($categorias as $key => $value) { ?>
            <li><a href="<?= base_url() ?>index.php/categoria/index/<?= $value->CAT_Categoria ?>" class="grey-text text-darken-3 lighten-3"><i class="material-icons">arrow_forward</i><?= ucfirst(strtolower($value->CAT_Nombre)) ?></a></li>
    <?php }
    } ?>
</ul>

<div class="fixed-action-btn direction-top active">
    <a id="volver_Arriba" class="btn btn-floating btn-medium color-Principal ">
        <i class="material-icons">arrow_upward</i>
    </a>
</div>