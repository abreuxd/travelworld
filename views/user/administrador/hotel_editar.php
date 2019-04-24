<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

    include $base_dir . "/models/model.hotel.php";
    $id = $_GET['id'];
    $hotel->getOne($id);

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
                        <form action="controllers/controller.hotel.php" method="post">
                        <div class="form-group">
                            <label>Nombre del hotel </label>
                            <input class="form-control" type="text" name='nom' value='<?=$hotel->data->nombreHotel?>'/>
                        </div>
                        <div class="form-group">
                                <label>Estrellas </label>
                                <input type="text" class="form-control" name="est" value="<?=$hotel->data->estrellas?>">       
                        </div>
                        <div class="form-group">
                                <label>Precio Hotel</label>
                                <input type="text" class="form-control" name="pre" value="<?=$hotel->data->precioHotel?>">
                        </div>
                        <input type="hidden" name="id" value="<?= $id ?>">
                                <?php
                                if($id) {
                                    echo "<input type='hidden' name='tipo' value='actualizar'>";
                                } else {
                                    echo "<input type='hidden' name='tipo' value='nuevo'>";
                                }
                                ?>
                            
                            <a href="?page=hoteles" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

<?php include $templates_footer_adm ?>