<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario<>1) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.ficha.php";?>
<?php include $templates_header_adm ?>
    <body>

<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <a class="btn btn-sm btn-primary" href='?page=adm-fichas-editar'>Nuevo</a>
                    </div>

                    </div>
                    <?php
                    $f1=$_POST["fecha1"];
                    $f2=$_POST["fecha2"];
                    ?>
                    <br>
                    <h5>Buscador por fecha</h5>
                    <form action="?page=adm-fichas" method="post">
                    De:<input type="date" name="fecha1" value="<?=$f1?>">
                    A:<input type="date" name="fecha2"  value="<?=$f2?>">
                    <input type="submit" class="btn btn-sm btn-primary" value="buscar">
                    </form>
                    <br>
                    </div>

                    <div class="card-body">
                        <h5>Tabla de Fichas</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>id del Cliente</th>
                                <th>Nombre del usuario</th>
                                <th>Precio de la Tarifa</th>
                                <th>Lugar de Origen</th>
                                <th>Lugar de Destino</th>
                                <th>fecha viaje</th>
                                <th>Tipo del Transporte</th>
                                <th>Costo de la Reserva</th>
                                
                                
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            //$ficha->getAll();
                            if($f1 and $f2){
                                $ficha->getWhere("fechaViaje>='$f1' and fechaViaje<='$f2'","fechaViaje");
                            }  else {
                                $ficha->getAll();    
                            }
                                
                            while ($row = $ficha->next()) {
                                echo "<tr>";
                                echo "<td>$row->idFichaViaje</td>";
                                echo "<td>$row->nombreUsuario</td>";
                                echo "<td>$row->precioTarifa</td>";
                                echo "<td>$row->nombreOrigen</td>";
                                echo "<td>$row->nombreDestino</td>";
                                echo "<td>$row->fechaViaje</td>";
                                echo "<td>$row->tipoTransporte</td>";
                                echo "<td>$row->costoReserva</td>";
                                echo "<td>
                                            <a href='?page=adm-fichas-editar&id=$row->idFichaViaje'>Editar</a>
                                            <a href='?page=adm-pdf-fichaficha&id=$row->idFichaViaje'>Ficha</a>
                                            <a href='$row->idFichaViaje' data-toggle='modal' data-target='#deleteModal' class='linkborrar'>Borrar</a>
                                      </td>";
                                echo "</tr>";
                            }


                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- borrar -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Materia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.ficha.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar esta ficha?</h3>
                                <input id="inpborrar" type="hidden" name="id">
                                <input type="hidden" name="tipo" value="borrar">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" form="form2">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <footer>
            <p>Instituto Tecnológico de Villahermosa</p>
        </footer>
    </div>

<?php include $templates_footer_adm ?>