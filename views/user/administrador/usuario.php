<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->idTipoUsuario<>1) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.usuario.php";?>
<?php include $templates_header_adm ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <a class="btn btn-sm btn-primary" href='?page=adm-usuario-editar'>Nuevo</a>
                        <a href="?page=adm-usuario&filtro=alumnos" class="btn btn-sm btn-info">Alumnos</a>
                        <a href="?page=adm-usuario&filtro=maestros" class="btn btn-sm btn-info">Maestros</a>
                        <a href="?page=adm-usuario&filtro=admins" class="btn btn-sm btn-info">Administradores</a>
                        <a href="?page=adm-usuario" class="btn btn-sm btn-info">Todos</a>

                    </div>
                    <div class="card-body">
                        <h5>Usuarios</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Domicilio</th>
                                <th>Tipo usuario</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $filtro= $_GET["filtro"];

                            if($filtro) {
                                if($filtro=="alumnos")  $usuario->getAlumnos();
                                if($filtro=="maestros") $usuario->getMaestros();
                                if($filtro=="admins")   $usuario->getAdministradores();
                            } else {
                                $usuario->getAll();
                            }
                            while ($row = $usuario->next()) {
                                echo "<tr>";
                                echo "<td>" . $row->Nombre . " ". $row->ApellidoPat . " " . $row->ApellidoMat . "</td>";
                                echo "<td>" . $row->Correo . "</td>";
                                echo "<td>" . $row->Telefono . "</td>";
                                echo "<td>" . $row->Domicilio . "</td>";
                                echo "<td>" . $row->TipoUsuario . "</td>";
                                echo "<td>
                                    <a href='?page=adm-usuario-editar&id=$row->IdUsuario'>Editar</a>
                                    <a href='$row->IdUsuario' data-toggle='modal' data-target='#deleteModal' class='linkborrar'>Borrar</a>
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
        <br>
        <!-- borrar -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.usuario.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar este usuario?</h3>
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
    </div>

<?php include $templates_footer_adm ?>