<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<table class="table striped highlight centered tablesorter-dark">
    <thead>
        <tr>
            <th>Id venta</th>
            <th>Nombre producto</th>
            <th>Cantidad</th>
            <th>Valor total</th>
            <th>Tipo de venta</th>
            <th>Descripción</th>
            <th>Fecha venta</th>
        </tr>
    </thead>

    <tbody>
        <?php if (isset($ventas) && count($ventas) > 0) {
            foreach ($ventas as $key => $value) { ?>
                <tr id="<?= $value->VEN_Venta ?>" class="pointer producto">
                    <td><?= $value->VEN_Venta ?></td>
                    <td><?= $value->PRO_Nombre ?></td>
                    <td><?= $value->DEV_Cantidad ?></td>
                    <td>$<?= number_format($value->VEN_Valor_Total, 0, ',', '.') ?></td>
                    <td><?= $value->TIP_Nombre ?></td>
                    <td><?= $value->VEN_Descripción ?></td>
                    <td><?= date('Y-m-d h:i A', strtotime($value->VEN_Fecha_Venta)); ?></td>
                </tr>
        <?php }
        } ?>
    </tbody>
</table>