<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 py-5">
            <form action="<?= site_url('clients/sitessignup') ?>" method="post" class="py-5">
                <div class="form-group">
                    <label for="url">Url del sitio</label>
                    <?php $v = form_error('url') ? ' is-invalid' : ''; ?> 
                    <input required type="siteurl" class="form-control <?= $v ?>" id="url" name="url" value="<?= set_value('url'); ?>" placeholder="dblsflv.com"> 
                    <?= form_error('url'); ?>
                </div>
                <div class="form-group">
                    <label for="sitename">Nombre del sitio</label>
                    <?php $v = form_error('sitename') ? ' is-invalid' : ''; ?>
                    <input required type="sitionombre" class="form-control <?= $v ?>" id="sitename" name="sitename" value="<?= set_value('sitename'); ?>" placeholder="Dabanet">
                    <?= form_error('sitename'); ?>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
            </form>

        </div>
    </div>
</div>