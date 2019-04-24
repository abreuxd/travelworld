<?php
require_once("model.base.php");

class Transporte extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function select($value) {
        $this->getAll("idTransporte");
        echo "<select name='idtr' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->idTransporte==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->idTransporte' {$sel}>$row->tipoTransporte </option>";
        }
        echo "</select>";
    }
}

$transporte = new Transporte($db);
$transporte->setView ("transporte");
$transporte->setTable("transporte");

// campos de la tabla
$transporte->setKey  ("idTransporte");
$transporte->addField("tipoTransporte");



$transporte->newRecord();
?>