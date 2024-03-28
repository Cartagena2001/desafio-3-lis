<?php echo $this->extend('layouts/dashboard') ?>
<?php echo $this->section('title') ?>report <?php echo $this->endSection() ?>
<?php echo $this->section('content-dash') ?>
<div class="container-fluid ps-md-0">
  <div class="container mt-5">
    <div id="reporte">
      <?php echo $this->include("partials/reports") ?>
      <?php echo $this->include("partials/pie-chart") ?>
    </div>
  </div>
  <div class="container mt-5 mb-5">
    <form id="make_pdf" method="post" action="<?php echo base_url('api/reports/report/makePDF') ?>">
      <input type="hidden" name="hidden_html" id="hidden_html" />
      <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">Generar PDF</button>
    </form>
  </div>
</div>
<?php echo $this->endSection() ?>
<?php echo $this->section('scripts') ?>
<script>
  $(document).ready(function() {
    $('#create_pdf').click(function() {
      $('#hidden_html').val($('#reporte').html());
      $('#make_pdf').submit();
    });
  });
</script>
<?php echo $this->endSection() ?>