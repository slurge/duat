<?php $v = isset($login_error) ? ' is-invalid' : '' ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 py-5">
            <form action="<?= site_url('clients/login') ?>" method="post" class="login-form py-5">

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text <?= $v ?>"><i class="fas fa-user"></i></span>
                    </div>
                    <input required type="email" class="form-control <?= $v ?>" id="mail" name="mail" placeholder="Correo electrónico" value="<?= set_value('mail'); ?>">
                </div>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text <?= $v ?>"><i class="fas fa-key"></i></span>
                    </div>
                    <input required type="password" class="form-control <?= $v ?>" id="pass" name="pass" placeholder="Contraseña">
                </div>
<?php if ( isset($login_error) ): ?>
                <div class="color-blood text-center mb-4"><?= $login_error['desc']; ?> <i class="fas fa-exclamation-circle"></i></div>
<?php endif; ?>
                <div class="d-flex justify-content-between">
                    <div class="align-items-center d-flex">
                        <a href="<?= site_url('clients/signup') ?>">Registrarse <i class="fas fa-user-plus"></i></a>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesión <i class="fas fa-sign-in-alt"></i></button>
                </div>
            </form>

        </div>
    </div>
</div>