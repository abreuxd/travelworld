<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

    include $base_dir . "/models/model.ficha.php";
    include $base_dir . "/models/model.lugar.php";
    include $base_dir . "/models/model.transporte.php";
    include $base_dir . "/models/model.tarifa.php";
    include $base_dir . "/models/model.reserva.php";

    $id = $_GET['id'];
    $ficha->getOne($id);

?>

<?php include $templates_header_adm?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/controller.ficha.php" method="post">
                        <div class="form-group">
                            <label>Nombre Usuario </label>
                            <input class="form-control" type="text" name='idu' value='<?=$ficha->data->nombreUsuario?>'/>
                        </div>
                        <div class="form-group">
                                <label>Precio Tarifa </label>
                                <?php
                                $tarifa->select($ficha->data->idTarifa);
                                ?>       
                        </div>
                        <div class="form-group">
                                <label>Lugar del Origen</label>
                                <?php
                                $lugar->selectOrigen($ficha->data->idLugar);
                                ?>
                        </div>
                        <div class="form-group">
                                <label>Lugar del Destino</label>
                                <?php
                                $lugar->selectDestino($ficha->data->idLugar);
                                ?>
                        </div>
                        <div class="form-group">
                                <label>Fecha  Viaje</label>
                                <input type="date" class="form-control" name="fev" value="<?=$ficha->data->fechaViaje?>">
                        </div>
                        <div class="form-group">
                                <label>Tipo Transporte</label>
                                <?php
                                $transporte->select($ficha->data->idTransporte);
                                ?>
                        </div>
                        
                        <div class="form-group">
                                <label>Reserva</label>
                                <?php
                                $reserva->select($ficha->data->idReserva);
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
                            
                            <a href="?page=adm-clientes" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

<?php include $templates_footer_adm ?>