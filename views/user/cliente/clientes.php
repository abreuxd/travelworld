<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario<>3) {
    header('location:?page=login');
}
$id = $_SESSION['usuario']->id;


?>
<?php include $templates_header_cli ?>
<body>
<?php include $templates_navbar_cli ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Cliente: <?= $_SESSION['usuario']->nombreUsuario . " " . $_SESSION['usuario']->apellidoPaterno . " " . $_SESSION['usuario']->apellidoMaterno ?></h1>
                    <div class="media">
                        <img class="d-flex mr-3"
                             src="https://image.freepik.com/iconos-gratis/nerd-perfil-masculino-avatar_318-68813.jpg"
                             alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">Datos</h5>
                            <!--<p><?= $_SESSION['usuario']->tipoUsuario ?></p>-->
                            <p><?= $_SESSION['usuario']->telefono ?></p>
                            <p><?= $_SESSION['usuario']->email ?></p>
                        </div>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
    <br>
    <footer>
        <p>TRAVELWORLD</p>
    </footer>
</div>

<?php include $templates_footer_adm ?>