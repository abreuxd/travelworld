<?php
require_once("model.base.php");

class Tarifa extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function select($value) {
        $this->getAll("idTarifa");
        echo "<select name='idt' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->idTarifa==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->idTarifa' {$sel}>$row->precioTarifa </option>";
        }
        echo "</select>";
    }
    
}

$tarifa = new Tarifa($db);
$tarifa->setView ("tarifas");
$tarifa->setTable("tarifas");

// campos de la tabla
$tarifa->setKey  ("idTarifa");
$tarifa->addField("precioTarifa");



$tarifa->newRecord();
?>