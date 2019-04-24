<?php
require_once("model.base.php");

class Reserva extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function select($value) {
        $this->getAll("idReserva");
        echo "<select name='idr' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->idReserva==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->idReserva' {$sel}>$row->costoReserva </option>";
        }
        echo "</select>";
    }
    
}

$reserva = new Reserva($db);
$reserva->setView ("reservas");
$reserva->setTable("reservas");

// campos de la tabla
$reserva->setKey  ("idReserva");
$reserva->addField("costoReserva");
$reserva->addField("fechaReserva");
$reserva->addField("idHotel");
$reserva->addField("idUsuario");





$reserva->newRecord();
?>