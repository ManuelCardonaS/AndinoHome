<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <ul>

                <li class="bold-text">
                    <a class="waves-effect waves-light btn-small modal-trigger" href="<?= base_url() ?>index.php/administracion/inicio">
                        Inicio
                    </a>
                </li>

                <li class="bold-text">
                    <a class="waves-effect waves-light btn-small modal-trigger" href="<?= base_url() ?>index.php/administracion/Historial/compras">
                        Historial compras
                    </a>
                </li>

                <li class="bold-text">
                    <a class="waves-effect waves-light btn-small modal-trigger" href="<?= base_url() ?>index.php/administracion/Historial/ventas">
                        Historial ventas
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>