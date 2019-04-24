<?php

require_once("../models/model.ficha.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    print_r($_POST);
    //die();

    // guardar los datos recibidos del formulario en el objeto del modelo
    $ficha->values[] = $_POST["idu"];
    $ficha->values[] = $_POST["idt"];
    $ficha->values[] = $_POST["ilo"];
    $ficha->values[] = $_POST["ild"];
    $ficha->values[] = $_POST["fev"];
    $ficha->values[] = $_POST["idtr"];
    $ficha->values[] = $_POST["idr"];
    

    if ($tipo == 'nuevo') {
        //$db->debug();
        $ficha->insert();
        //die();
        header("location:../?page=adm-fichas");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $ficha->update($id);
        //die();
        header("location:../?page=adm-fichas");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $ficha->deleteOne($id);
        //die();
        header("location:../?page=adm-fichas");
    }
}

?>