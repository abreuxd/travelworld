<?php
require_once("model.base.php");

class Hotel extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function select($value) {
        $this->getAll("idHotel");
        echo "<select name='idh' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->idHotel==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->idHotel' {$sel}>$row->nombreHotel </option>";
        }
        echo "</select>";
    }
}

$hotel = new Hotel($db);
$hotel->setView ("hoteles");
$hotel->setTable("hoteles");

// campos de la tabla
$hotel->setKey  ("idHotel");
$hotel->addField("nombreHotel");
$hotel->addField("estrellas");
$hotel->addField("precioHotel");

$hotel->newRecord();
?>