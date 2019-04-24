<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
    include $base_dir . "/models/model.usuario.php";
    include $base_dir . "/models/model.tipousuario.php";
    $id = $_GET['id'];
    $usuario->getOne($id);
?>
    <?php include $templates_header_adm ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/controller.usuario.php" method="post" id="form">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="<?= $usuario->data->Nombre?>">

                            </div>
                            <div class="form-group">
                                <label>Paterno</label>
                                <input type="text" class="form-control" name="apellidopat" value="<?= $usuario->data->ApellidoPat?>">
                            </div>
                            <div class="form-group">
                                <label>Materno</label>
                                <input type="text" class="form-control" name="apellidomat" value="<?= $usuario->data->ApellidoMat?>">
                            </div>
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="email" class="form-control" name="correo" value="<?= $usuario->data->Correo?>">

                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" name="password" value="<?= $usuario->data->Contrasena?>">
                            </div>
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="tel" class="form-control" name="telefono" value="<?= $usuario->data->Telefono?>">
                            </div>
                            <div class="form-group">
                                <label>Domicilio</label>
                                <input type="text" class="form-control" name="domicilio" value="<?= $usuario->data->Domicilio?>">
                            </div>

                            <div class="form-group">
                                <label>Tipo de usuario</label>
                                <?php
                                    $tipousuario->select($usuario->data->IdTipoUsuario);
                                ?>

                            </div>
                            <br>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <?php
                                if($id) {
                                    echo "<input type='hidden' name='tipo' value='actualizar'>";
                                } else {
                                    echo "<input type='hidden' name='tipo' value='nuevo'>";
                                }
                            ?>                            <a href="?page=adm-usuario" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

<?php include $templates_footer_adm ?>