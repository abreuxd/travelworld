<?php

require_once("../models/model.tipousuario.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $tipousuario->values[] = $_POST["itu"];
    

    if ($tipo == 'nuevo') {
        //$db->debug();
        $tipousuario->insert();
        //die();
        header("location:../?page=adm-usuario");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $tipousuario->update($id);
        //die();
        header("location:../?page=adm-usuario");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $tipousuario->deleteOne($id);
        //die();
        header("location:../?page=adm-usuario");
    }
}

?>