<?php
require_once("model.base.php");

class Cliente extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function select($value) {
        $this->getAll("idUsuario");
        echo "<select name='idu' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->idUsuario==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->idUsuario' {$sel}>$row->nombreUsuario </option>";
        }
        echo "</select>";
    }
}

$cliente = new Cliente($db);
$cliente->setView ("vwusuarios");
$cliente->setTable("usuarios");

// campos de la tabla
$cliente->setKey  ("idUsuario");
$cliente->addField("nombreUsuario");
$cliente->addField("apellidoPaterno");
$cliente->addField("apellidoMaterno");
$cliente->addField("telefono");
$cliente->addField("email");
$cliente->addField("contraseña");
$cliente->addField("idHotel");
$cliente->addField("idTipoUsuario");
$cliente->addField("idSexo");



$cliente->newRecord();
?>