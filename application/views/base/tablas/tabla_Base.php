<?php defined('BASEPATH') or exit('No direct script access allowed');
if (isset($VARIABLE) && count($VARIABLE) > 0) { ?>

    <table class="table striped highlight centered tablesorter-dark">
        <thead>
            <tr>
                <th>ENCABEZADO</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($ventas as $key => $value) { ?>
                <tr id="<?= $value->VEN_Venta ?>" class="pointer producto">
                    <td><?= $value->CADENA ?></td>
                    <td>$<?= number_format($value->VALOR_PRECIO, 0, ',', '.') ?></td>
                    <td><?= date('Y-m-d h:i A', strtotime($value->FECHA)); ?></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
<?php } ?>