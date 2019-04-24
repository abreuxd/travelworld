<?php
require_once("model.base.php");

class TipoUsuario extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function select($value) {
        $this->getAll("idTipoUsuario");
        echo "<select name='itu' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->idTipoUsuario==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->idTipoUsuario' {$sel}>$row->tipoUsuario</option>";
        }
        echo "</select>";
    }
}

$tipousuario = new TipoUsuario($db);
$tipousuario->setView ("tipousuario");
$tipousuario->setTable("tipousuario");

// campos de la tabla
$tipousuario->setKey  ("idTipoUsuario");
$tipousuario->addField("tipoUsuario");

$tipousuario->newRecord();
?>