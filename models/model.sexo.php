<?php
require_once("model.base.php");

class Sexo extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function select($value) {
        $this->getAll("idSexo");
        echo "<select name='sex' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->idSexo==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->idSexo' {$sel}>$row->sexo </option>";
        }
        echo "</select>";
    }
}

$sexo = new Sexo($db);
$sexo->setView ("sexo");
$sexo->setTable("sexo");

// campos de la tabla
$sexo->setKey  ("idSexo");
$sexo->addField("sexo");



$sexo->newRecord();
?>