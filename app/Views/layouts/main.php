<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/datatables/dataTables.dataTables.min.css') ?>">
    <link rel="icon" href="<?= base_url('assets/media/images/favicon.png') ?>">
</head>

<body>
    <script>
        var hostUrl = "<?php echo base_url() ?>";
    </script>
    <?= $this->renderSection('content') ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/dataTables.min.js') ?>"></script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>