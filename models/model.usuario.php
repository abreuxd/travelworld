<?php
require_once("model.base.php");

class Usuario extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function getAdministradores() {
        $this->getWhere("IdTipoUsuario=3");
    }

    public function getMaestros() {
        $this->getWhere("IdTipoUsuario=2");
    }

    public function getAlumnos() {
        $this->getWhere("IdTipoUsuario=1");
    }

    public function selectMaestros($value) {
        $this->getMaestros();
        echo "<select name='idmae' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdUsuario==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdUsuario' {$sel}>$row->Nombre $row->Apellidos</option>";
        }
        echo "</select>";
    }

    public function selectAlumnos($value) {
        $this->getAlumnos();
        echo "<select name='idalu' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdAlumno==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdUsuario' {$sel}>$row->Nombre $row->Apellidos</option>";
        }
        echo "</select>";
    }



}

$usuario = new Usuario($db);
$usuario->setView ("usuarios");
$usuario->setTable("usuarios");

$usuario->setKey  ("idUsuario");
$usuario->addField("Nombre");
$usuario->addField("ApellidoPat");
$usuario->addField("ApellidoMat");
$usuario->addField("email");
$usuario->addField("contraseña");
$usuario->addField("Telefono");
$usuario->addField("Domicilio");
$usuario->addField("idTipoUsuario");
$usuario->newRecord();
?>