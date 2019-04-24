<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

    include $base_dir . "/models/model.cliente.php";
    include $base_dir . "/models/model.hotel.php";
    include $base_dir . "/models/model.tipousuario.php";
    include $base_dir . "/models/model.sexo.php";

    $id = $_GET['id'];
    $cliente->getOne($id);

?>

<?php include $templates_header_ope ?>
    <body>
<?php include $templates_navbar_ope ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/controller.cliente.php" method="post">
                        <div class="form-group">
                            <label>Nombre del cliente </label>
                            <input class="form-control" type="text" name='nom' value='<?=$cliente->data->nombreUsuario?>'/>
                        </div>
                        <div class="form-group">
                                <label>Apellido Paterno </label>
                                <input type="text" class="form-control" name="app" value="<?=$cliente->data->apellidoPaterno?>"/>       
                        </div>
                        <div class="form-group">
                                <label>Apellido Materno</label>
                                <input type="text" class="form-control" name="apm" value="<?=$cliente->data->apellidoMaterno?>">
                        </div>
                        <div class="form-group">
                                <label>Telefono</label>
                                <input type="text" class="form-control" name="tel" value="<?=$cliente->data->telefono?>">
                        </div>
                        <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="ema" value="<?=$cliente->data->email?>">
                        </div>
                        <div class="form-group">
                                <label>Contraseña</label>
                                <input type="text" class="form-control" name="con" value="<?=$cliente->data->contraseña?>">
                        </div>

                        <div class="form-group">
                                <label>Hoteles</label>
                                <?php
                                $hotel->select($cliente->data->idHotel);
                                ?>
                        </div>

                        <div class="form-group">
                                <label>Tipo Usuario</label>
                                <?php
                                $tipousuario->select($cliente->data->idTipoUsuario);
                                ?>
                        </div>

                        <div class="form-group">
                                <label>Sexo</label>
                                <?php
                                $sexo->select($cliente->data->idSexo);
                                ?>
                        </div>

                        <input type="hidden" name="id" value="<?= $id ?>">
                                <?php
                                if($id) {
                                    echo "<input type='hidden' name='tipo' value='actualizar'>";
                                } else {
                                    echo "<input type='hidden' name='tipo' value='nuevo'>";
                                }
                                ?>
                            
                            <a href="?page=ope-clientes" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

<?php include $templates_footer_adm ?>