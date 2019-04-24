<?php
$email = $_POST['email'];
$pass  = $_POST['pass'];


 include '../resources/class/class.connection.php';
include '../models/model.usuario.php';

try {
    session_start();
    $db->debug();

    $sql = "SELECT * FROM usuarios WHERE email=? and contraseña=?";
   
    $usuario->get($sql,array($email,$pass));
    //die();

    if ($usuario->data->email==$email) {

        $_SESSION['usuario'] = $usuario->data;

        switch ($usuario->data->idTipoUsuario) {
            case 3:
                header("location:../?page=cli-inicio");
                break;
            case 2:
                header("location:../?page=ope-inicio");
                break;
            case 1:
                header("location:../?page=adm-inicio");
                break;
        }
    } else {
        $_SESSION['error'] = true;
        header('location:../?page=login');
    }

} catch (Exception $e) {

}
