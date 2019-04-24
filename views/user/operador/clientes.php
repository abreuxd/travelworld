<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario<>2) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.cliente.php"; ?>
<?php include $templates_header_ope ?>
    <body>

<?php include $templates_navbar_ope ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <a class="btn btn-sm btn-primary" href='?page=ope-cliente-editar'>Nuevo</a>
                    </div>
                    <div class="card-body">
                        <h5>Tabla de Clientes</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nombre Cliente</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Contraseña</th>
                                <th>Nombre Hotel</th>
                                <th>Tipo de Usuario</th>
                                <th>Tipo de Sexo</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cliente->getAll();
                            while ($row = $cliente->next()) {
                                echo "<tr>";
                                echo "<td>$row->nombreUsuario</td>";
                                echo "<td>$row->apellidoPaterno</td>";
                                echo "<td>$row->apellidoMaterno</td>";
                                echo "<td>$row->telefono</td>";
                                echo "<td>$row->email</td>";
                                echo "<td>$row->contraseña</td>";
                                echo "<td>$row->nombreHotel</td>";
                                echo "<td>$row->tipoUsuario</td>";
                                echo "<td>$row->sexo</td>";
                                echo "<td>
                                            <!--<a href='?page=ope-cliente-editar&id=$row->idUsuario'>Editar</a>-->
                                            <a href='$row->idUsuario' data-toggle='modal' data-target='#deleteModal' class='linkborrar'>Borrar</a>
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
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.cliente.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar este cliente?</h3>
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
            <p>TRAVELWORLD</p>
        </footer>
    </div>

<?php include $templates_footer_adm ?>