<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">TRAVELWORLD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="?page=ope-materia">Ayuda</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catalogos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?page=construccion-dos">Clientes</a>
          <a class="dropdown-item" href="?page=construccion-dos">Ficha de los viajes</a>
        </div>
            </li>

        </ul>
        <span class="navbar-text">Bienvenido <?= $_SESSION['usuario']->Nombre ?> </span>
        <a href="controllers/controller.logout.php" class="btn btn-danger ml-2">Salir</a>
    </div>
</nav>