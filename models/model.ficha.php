<?php
require_once("model.base.php");

class Ficha extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function select($value) {
        $this->getAll("idFichaViaje");
        echo "<select name='ficha' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->idFichaViaje==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->idFichaViaje' {$sel}>$row->idUsuario $row->idTarifa</option>";
        }
        echo "</select>";
    }
}

$ficha = new Ficha($db);
$ficha->setView ("vwfichaviaje");
$ficha->setTable("fichaviaje");

// campos de la tabla
$ficha->setKey  ("idFichaViaje");
$ficha->addField("idUsuario");
$ficha->addField("idTarifa");
$ficha->addField("idLugarOrigen");
$ficha->addField("idLugarDestino");
$ficha->addField("fechaViaje");
$ficha->addField("idTransporte");
$ficha->addField("idReserva");


$ficha->newRecord();
?>