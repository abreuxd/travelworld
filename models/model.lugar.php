<?php
require_once("model.base.php");

class Lugar extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function selectOrigen($value) {
        $this->getAll("idLugar");
        echo "<select name='ilo' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->idLugar==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->idLugar' {$sel}>$row->nombreLugar </option>";
        }
        echo "</select>";
    }
    public function selectDestino($value) {
        $this->getAll("idLugar");
        echo "<select name='ild' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->idLugar==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->idLugar' {$sel}>$row->nombreLugar </option>";
        }
        echo "</select>";
    }
}

$lugar = new Lugar($db);
$lugar->setView ("lugares");
$lugar->setTable("lugares");

// campos de la tabla
$lugar->setKey  ("idLugar");
$lugar->addField("nombreLugar");



$lugar->newRecord();
?>