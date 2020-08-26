<!DOCTYPE html><?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
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
        WEB USUARIOS
    </main>

</body>

<?php $this->load->view('base/footer_Base', NULL, FALSE); ?>

</html>

<script type="application/javascript">
    var base_url = "<?= base_url(); ?>index.php/";
    var json_Autocomplete = <?= $json_Autocomplete ?>;
</script>