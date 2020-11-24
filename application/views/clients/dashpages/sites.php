<div class="p-2">
    <h1 class="display-1">aber los sites</h1>
    <a href="<?= site_url('clients/sitessignup') ?>">Registrar sitio</a>
    <div>
        <ul>
            <?php if($sites):?>
                <?php foreach($sites as $site): ?>
                <li><?= $site->name; ?></li>
                <?php endforeach; ?>
            <?php else: ?>
            <li>No hay sitios</li>
            <?php endif; ?>
            
        </ul>
    </div>
    
    
</div>