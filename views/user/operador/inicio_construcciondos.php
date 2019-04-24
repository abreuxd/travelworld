<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php include $templates_header_pro ?>
    <body>
<?php include $templates_navbar_dos ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Sitio en construcción <?= $_SESSION['usuario']->Nombre ?></h1>
                <h2>Elige una opcion de la barra de navegacion que se encuentra arriba</h2>
            </div>
        </div>
    </div>
<br>
    <center><img src="resources/img/sitio-en-construcción.jpg" width="400" height="400"></center>
<?php include $templates_footer_adm ?>