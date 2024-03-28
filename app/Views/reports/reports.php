<?php echo $this->extend('layouts/dashboard') ?>
<?php echo $this->section('title') ?>report <?php echo $this->endSection() ?>
<?php echo $this->section('content-dash') ?>
<div class="container-fluid ps-md-0">
  <div class="container mt-5">
    <?php echo $this->include("partials/pdfButton") ?>
    <?php echo $this->include("partials/reports") ?>
    <?php echo $this->include("partials/pie-chart") ?>
  </div>
</div>
<?php echo $this->endSection() ?>
<?php echo $this->section('scripts') ?>
<script>
</script>
<?php echo $this->endSection() ?>