<?php echo $this->extend('layouts/main') ?>
<?php echo $this->section('title') ?>Dashboard <?php echo $this->endSection() ?>
<?php echo $this->section('content') ?>
<div class="container-fluid ps-md-0">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Control Finanzas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ingresar Entrada</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ingresar Salida</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reportes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
<?php echo $this->endSection() ?>
<?php echo $this->section('scripts') ?>
<?php echo $this->endSection() ?>