<?php

require_once("../models/model.transporte.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $transporte->values[] = $_POST["trans"];
    

    if ($tipo == 'nuevo') {
        //$db->debug();
        $transporte->insert();
        //die();
        header("location:../?page=adm-usuario");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $transporte->update($id);
        //die();
        header("location:../?page=adm-usuario");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $transporte->deleteOne($id);
        //die();
        header("location:../?page=adm-usuario");
    }
}

?>