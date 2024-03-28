<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/') ?>">Control Finanzas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/reports') ?>">Reportes</a>
                </li>
            </ul>
            <span class="navbar-text">
                <button class="btn btn-primary" aria-current="page" onclick="logout()">Cerrar session</button>
            </span>
        </div>
    </div>
</nav>
<?php echo $this->section('scripts') ?>
<script src="<?php echo base_url('assets/js/custom/login/logout.js') ?>"></script>
<?php echo $this->endSection() ?>