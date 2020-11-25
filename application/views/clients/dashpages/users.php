<div class="p-2">
    <div class="p-5">
        <ul class="list-group">

            <li class="list-group-item w-100 sites-list-header p-4">
                    <h4>Agregar un usuario</h3>
                    <form action="<?= site_url('clients/add_user') ?>" method="post" class=" w-100">
                        <div class="row">
                            <div class="col-md-5">
                                <input required type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>" placeholder="Nombre de usuario">
                            </div>
                            <div class="col-md-5">
<?php
    $attrs = array(
        'id'    => 'site',
        'class' => 'form-control',
        'required' => ''
    );
										
echo form_dropdown('site', $sites, NULL, $attrs);
?>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Agregar user <i class="fas fa-user-plus"></i></button>
                            </div>
                        </div>
                    </form>

            </li>

<?php if($userlist):?>
<?php   foreach($userlist as $site => $users): ?>
                
            <li class="list-group-item site-header">
                <div class="site-list d-flex justify-content-between">
                    <h4><strong><?= $site; ?></strong></h4>
                </div>
            </li>

<?php       if ( $users ): ?>
<?php           foreach ( $users as $user ): ?>
            <li class="list-group-item">
                <div class="site-list d-flex justify-content-between align-items-center">
                    <h5><?= $user->username; ?></h5>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="mode" id="fit" checked> Entrenar
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="mode" id="predict"> Clasificar
                        </label>
                    </div>
                </div>
            </li>
<?php           endforeach; ?>    
<?php       endif; ?>
<?php   endforeach; ?>
<?php else: ?>
            <li class="list-group-item">No hay sitios agragados</li>
<?php endif; ?>
            
        </ul>
    </div>
</div>