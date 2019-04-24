<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="?page=adm-inicio">TRAVELWORLD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item">
                <a class="nav-link" href="?page=adm-materia">Ayuda</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catalogos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="views/user/administrador/registro-actividades-uno.html">Clientes</a>
          <a class="dropdown-item" href="listado-hoteles.html">Hoteles</a>
          <a class="dropdown-item" href="listado-fichaviaje.html">Ficha de los viajes</a>
        </div>
            </li> -->

        </ul>
        <span class="navbar-text">Bienvenido <?= $_SESSION['usuario']->Nombre ?></span>
        <a href="?page=cli-inicio" class="btn btn-danger ml-2">Regresar</a>
    </div>
</nav>