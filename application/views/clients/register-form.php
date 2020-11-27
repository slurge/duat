
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 py-5">
            <form action="<?= site_url('clients/signup') ?>" method="post" class="py-4">
                <h2>Crear cuenta en Duauth</h2>
                <div class="form-group">
                    <label for="mail">Correo electrónico</label>
                    <?php $v = form_error('mail') ? ' is-invalid' : ''; ?> 
                    <input required type="email" class="form-control <?= $v ?>" id="mail" name="mail" value="<?= set_value('mail'); ?>" placeholder="nombre@ejemplo.com"> 
                    <?= form_error('mail'); ?>
                </div>
                <div class="form-group">
                    <label for="mail2">Repetir correo electrónico</label>
                    <?php $v = form_error('mail2') ? ' is-invalid' : ''; ?>
                    <input required type="email" class="form-control <?= $v ?>" id="mail2" name="mail2" value="<?= set_value('mail2'); ?>" placeholder="nombre@ejemplo.com">
                    <?= form_error('mail2'); ?>
                </div>
                <div class="form-group">
                    <label for="pass">Contraseña</label>
                    <?php $v = form_error('pass') ? ' is-invalid' : ''; ?>
                    <input required type="password" class="form-control <?= $v ?>" id="pass" name="pass" value="<?= set_value('pass'); ?>" placeholder="8 caracteres mínimo">
                    <?= form_error('pass'); ?>
                </div>
                <div class="form-group">
                    <label for="pass2">Repetir contraseña</label>
                    <?php $v = form_error('pass2') ? ' is-invalid' : ''; ?>
                    <input required type="password" class="form-control <?= $v ?>" id="pass2" name="pass2" value="<?= set_value('pass2'); ?>" >
                    <?= form_error('pass2'); ?>
                </div>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <?php $v = form_error('name') ? ' is-invalid' : ''; ?>
                    <input required type="text" class="form-control <?= $v ?>" id="name" name="name" value="<?= set_value('name'); ?>" placeholder="Escriba su nombre completo">
                    <?= form_error('name'); ?>
                </div>
                <div class="form-group form-check">
                    <input required type="checkbox" class="form-check-input" id="policyagree" name="policyagree">
                    <label class="form-check-label" for="policyagree">He leído y acepto el <a href="<?= site_url('privacy') ?>" class="color-orange">aviso de privacidad</a></label>
                    <?= form_error('policyagree'); ?>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</div>

