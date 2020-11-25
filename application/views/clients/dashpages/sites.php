<div class="p-2">
    <!--a href="<?= site_url('clients/sitessignup') ?>">Registrar sitio</a-->
    <div class="p-5">
        <ul class="list-group">

            <li class="list-group-item w-100 sites-list-header p-4">
                    <h4>Agregar un sitio</h3>
                    <form action="<?= site_url('clients/sitessignup') ?>" method="post" class=" w-100">
                        <div class="row">
                            <div class="col-md-5">
                                <input required type="sitionombre" class="form-control" id="sitename" name="sitename" value="<?= set_value('sitename'); ?>" placeholder="Nombre del sitio">
                            </div>
                            <div class="col-md-5">
                                <input required type="siteurl" class="form-control" id="url" name="url" value="<?= set_value('url'); ?>" placeholder="http://ejemplo.com"> 
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Agregar sitio <i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </form>

            </li>

<?php if($sites):?>
<?php foreach($sites as $site): ?>
                
            <li class="list-group-item">
                <div class="site-list d-flex justify-content-between">
                    <h4><strong><?= $site->name; ?></strong></h4>
                    <div class="buttons">
                        <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </div>

                </div>
            </li>

<?php endforeach; ?>
<?php else: ?>
            <li class="list-group-item">No hay sitios agragados</li>
<?php endif; ?>
            
        </ul>
    </div>
</div>