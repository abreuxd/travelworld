<?php

require_once("../models/model.sexo.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $sexo->values[] = $_POST["sex"];
    

    if ($tipo == 'nuevo') {
        //$db->debug();
        $sexo->insert();
        //die();
        header("location:../?page=adm-usuario");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $sexo->update($id);
        //die();
        header("location:../?page=adm-usuario");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $sexo->deleteOne($id);
        //die();
        header("location:../?page=adm-usuario");
    }
}

?>