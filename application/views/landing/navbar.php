<style>
    .modal-content {
        /* border-radius: 0.6em; */
        border: none !important;
        padding: 1em;
    }
    .modal-header {
        border: none;
    }
    .modal-footer {
        border: none;
    }
    
</style>

<!--login modal-->

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Acceder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="<?= site_url('clients/login') ?>" method="post" class="login-form">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="email" class="form-control" id="mail" placeholder="Correo electrónico">
            </div>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" class="form-control" id="pass" placeholder="Contraseña">
            </div>
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
</div>

<!--nav bar-->

<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <a class="navbar-brand" href="<?= site_url() ?>">
        <img class="nav-logo" src="<?= $logo ?>" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Acceder  <i class="fas fa-sign-in-alt"></i></a>
            </li>
        </ul>
    </div>
</nav>

