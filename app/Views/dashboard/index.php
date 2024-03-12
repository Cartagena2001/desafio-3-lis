<?php echo $this->extend('layouts/dashboard') ?>
<?php echo $this->section('title') ?>Dashboard <?php echo $this->endSection() ?>
<?php echo $this->section('content-dash') ?>
<div class="container-fluid ps-md-0">
  <div class="container mt-5">
    <div class="mb-5">
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#entrada" data-bs-whatever="@mdo">Agregar Registro</button>
    </div>
    <?php echo $this->include("partials/registroTables") ?>
    <?php echo $this->include("partials/entrada/agregarReporte") ?>
  </div>
</div>
<?php echo $this->endSection() ?>
<?php echo $this->section('scripts') ?>
<script>
</script>
<?php echo $this->endSection() ?>