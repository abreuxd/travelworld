<?php

require_once("../models/model.cliente.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos recibidos del formulario en el objeto del modelo
    $cliente->values[] = $_POST["nom"];
    $cliente->values[] = $_POST["app"];
    $cliente->values[] = $_POST["apm"];
    $cliente->values[] = $_POST["tel"];
    $cliente->values[] = $_POST["ema"];
    $cliente->values[] = $_POST["con"];
    $cliente->values[] = $_POST["idh"];
    $cliente->values[] = $_POST["itu"];
    $cliente->values[] = $_POST["sex"];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $cliente->insert();
        //die();
        header("location:../?page=adm-clientes");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $cliente->update($id);
        //die();
        header("location:../?page=adm-clientes");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $cliente->deleteOne($id);
        //die();
        header("location:../?page=adm-clientes");
    }
}

?>