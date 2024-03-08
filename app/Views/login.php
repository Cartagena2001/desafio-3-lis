<?php echo $this->extend('layouts/main') ?>
<?php echo $this->section('title') ?>Iniciar sesion<?php echo $this->endSection() ?>
<?php echo $this->section('content') ?>
<div class="container-fluid ps-md-0">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Bienvenido al control de finanzas</h3>
                            <form id="login-form" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="name@example.com">
                                    <label for="floatingInput">Correo electronico</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="contra" name="contra" placeholder="Password">
                                    <label for="floatingPassword">Contraseña</label>
                                </div>
                                <div id="form-error" class="alert alert-warning" role="alert"></div>
                                <div class="d-grid">
                                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" id="submit-btn">Iniciar sesion</button>
                                    <div class="text-center">
                                        <a class="small" href="#">Olvide mi contraseña?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .login {
        min-height: 100vh;
    }

    .bg-image {
        background-image: url('https://images.pexels.com/photos/5466785/pexels-photo-5466785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-size: cover;
        background-position: center;
    }

    .login-heading {
        font-weight: 300;
    }

    .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
    }
</style>
<?php echo $this->endSection() ?>
<?php echo $this->section('scripts') ?>
<script src="<?= base_url('assets/js/custom/login/login.js') ?>"></script>
<?php echo $this->endSection() ?>