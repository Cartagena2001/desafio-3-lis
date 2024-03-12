<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Control Finanzas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="#">Reportes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" onclick="logout()">Cerrar session</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php echo $this->section('scripts') ?>
<script src="<?php echo base_url('assets/js/custom/login/logout.js') ?>"></script>
<?php echo $this->endSection() ?>