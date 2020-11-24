<div class="p-2">
    <h1 class="display-1">aber los sites</h1>
    <a href="<?= site_url('clients/sitessignup') ?>">Registrar sitio</a>
    <div>
        <ul>
            <?php foreach($sites as $site); ?>
            <li><?= $site->name; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    
</div>