<?php

require_once("../models/model.lugar.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $lugar->values[] = $_POST["lug"];
    

    if ($tipo == 'nuevo') {
        //$db->debug();
        $lugar->insert();
        //die();
        header("location:../?page=adm-usuario");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $lugar->update($id);
        //die();
        header("location:../?page=adm-usuario");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $lugar->deleteOne($id);
        //die();
        header("location:../?page=adm-usuario");
    }
}

?>