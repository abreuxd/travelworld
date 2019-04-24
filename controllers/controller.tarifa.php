<?php

require_once("../models/model.tarifa.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $tarifa->values[] = $_POST["idt"];
    

    if ($tipo == 'nuevo') {
        //$db->debug();
        $tarifa->insert();
        //die();
        header("location:../?page=adm-usuario");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $tarifa->update($id);
        //die();
        header("location:../?page=adm-usuario");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $tarifa->deleteOne($id);
        //die();
        header("location:../?page=adm-usuario");
    }
}

?>