<?php

require_once("../models/model.hotel.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos recibidos del formulario en el objeto del modelo
    $hotel->values[] = $_POST["nom"];
    $hotel->values[] = $_POST["est"];
    $hotel->values[] = $_POST["pre"];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $hotel->insert();
        //die();
        header("location:../?page=hoteles");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $hotel->update($id);
        //die();
        header("location:../?page=hoteles");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $hotel->deleteOne($id);
        //die();
        header("location:../?page=hoteles");
    }
}

?>