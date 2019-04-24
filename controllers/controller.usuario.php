<?php

require_once("../models/model.usuario.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $usuario->values[] = $_POST["nombre"];
    $usuario->values[] = $_POST["apellidopat"];
    $usuario->values[] = $_POST["apellidomat"];
    $usuario->values[] = $_POST['correo'];
    $usuario->values[] = $_POST['password'];
    $usuario->values[] = $_POST['telefono'];
    $usuario->values[] = $_POST['domicilio'];
    $usuario->values[] = $_POST['idtipo'];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $usuario->insert();
        //die();
        header("location:../?page=adm-usuario");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $usuario->update($id);
        //die();
        header("location:../?page=adm-usuario");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $usuario->deleteOne($id);
        //die();
        header("location:../?page=adm-usuario");
    }
}

?>