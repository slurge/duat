<style>
    .head-landing{
        background-color: #B1DCFC;
        padding-top: 4em;
        padding-bottom: 4em;
    }
    .content{
        padding-top: 4em;
        padding-bottom: 4em;
    }

    .seccion-2{
        background-color: #16324F;
        color: white !important;
    }

</style>
<!-- https://coolors.co/355834-cc5f00-16324f-6b0504-b1dcfc -->


<div class="container-fluid head-landing px-5">
    <div class="row">
        <div class="col p-3 align-items-center d-flex flex-column">
            <h1 class="display-4">Blindaje para iniciar sesión en tu página web</h1>
            <div class="mt-5 w-100 text-left">
                <a href="<?= site_url('clients/signup') ?>" class="btn cta">Quiero darle seguridad a mi sitio <i class="fas fa-shield-check"></i></a>
            </div>
        </div>
        <div class="col p-3 text-center">
            <i class="fas fa-lock" style="font-size:15em;"></i>
        </div>
    </div>
</div>

<div class="container content">
    <div class="row mb-5 ">
        <div class="col-md-6 p-3 text-center">
            <i class="fas fa-users" style="font-size:10em;"></i>
        </div>
        <div class="col-md-6 p-3 align-items-center d-flex">
            <p>Duauth es un sistema de autentificacion que garantiza la seguridad e integridad de los datos de tus usuarios.</p>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-md-6 p-3 align-items-center d-flex">
            <p>Con Duauth evitaras el acceso de intrusos en las cuentas de personales de tus usuarios.</p>
        </div>
        <div class="col-md-6 p-3 text-center">
        <i class="fas fa-user-ninja" style="font-size:7em;"></i>
        <i class="fas fa-user-secret" style="font-size:7em;"></i>
        <i class="fas fa-user-robot" style="font-size:7em;"></i>
        </div>
    </div>
    
    <div class="text-center">
        <h2 class="display-4 mb-5">Cada usuario cuenta con una autenticacion unica.</h2>
        <i class="fas fa-fingerprint mt-3" style="font-size:15em;"></i>
    </div>
    <h3 class="my-5 text-center">¡Captura los datos y deja que nuestra IA lo juzgue!</h3>
    <div class="row my-5">
        <div class="col text-center">
            <i class="fas fa-search" style="font-size:7em;"></i>
        </div>
        <div class="col text-center">
            <i class="fas fa-brain" style="font-size:7em;"></i>
        </div>
        <div class="col text-center">
            <i class="fas fa-balance-scale" style="font-size:7em;"></i>
        </div>
    </div>

    <div class="text-center">
        <a href="<?= site_url('clients/signup') ?>" class="btn cta">Quiero darle seguridad a mi sitio <i class="fas fa-shield-check"></i></a>
    </div>
    
</div>

<div class="container-fluid seccion-2">
    <div class="container py-5">
        <h2 class="text-center my-5 display-4">Un sofisticado algoritmo inteligente reconoce a cada usuario por:</h2>
        <div class="row mb-5">
            <div class="col-md-2 offset-md-1 text-center">
                <i class="fas fa-keyboard" style="font-size:6em;"></i>
            </div>
            <div class="col align-items-center d-flex text-center">
                <p>El modo en el cual se escribe.</p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-2 offset-md-1 text-center">
                <i class="fas fa-browser" style="font-size:6em;"></i>
            </div>
            <div class="col align-items-center d-flex text-center">
                <p>El dispositivo con el cual navega por internet.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-1 text-center">
                <i class="fas fa-project-diagram" style="font-size:6em;"></i>
            </div>
            <div class="col align-items-center d-flex text-center">
                <p>Análisis continuo y adaptativo de tus patrones, de modo que siempre sabremos si eres tú y te alertaremos en caso de que algo sea sospechoso</p>
            </div>
        </div>
    </div>
</div>

<div class="container py-5 mt-3">
    <h2 class="display-4 text-center mb-4">Pruébalo</h2>
    <p class="text-center">Ahora mismo usted utiliza <strong><?= $ua['browser'] ?></strong> <?= $ua['version'] ?> en <strong><?= $ua['platform'] ?></strong></p>
    
    <div class="row py-5">
        <div class="col-md-6">
            <textarea class="form-control" name="abertext" id="abertext" cols="30" rows="10" placeholder="Escriba algo en este cuadro"></textarea>
        </div>
        <div class="col-md-6">
            <p>Su cadencia promedio es:</p>
        </div>
    </div>

    <p class="text-center mt-3">La seguridad no es un lujo, es una necesidad, nosotros protegeremos las credenciales de sus usuarios!</p>
    <div class="text-center py-5">
        <a href="<?= site_url('clients/signup') ?>" class="btn cta">Quiero darle seguridad a mi sitio <i class="fas fa-shield-check"></i></a>
    </div>

</div>
    

    