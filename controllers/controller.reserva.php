<?php

require_once("../models/model.reserva.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $reserva->values[] = $_POST["idr"];
    

    if ($tipo == 'nuevo') {
        //$db->debug();
        $reserva->insert();
        //die();
        header("location:../?page=adm-usuario");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $reserva->update($id);
        //die();
        header("location:../?page=adm-usuario");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $reserva->deleteOne($id);
        //die();
        header("location:../?page=adm-usuario");
    }
}

?>