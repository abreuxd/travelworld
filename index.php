<?php
include "directorios.php";
include 'resources/class/class.connection.php';

//error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ERROR);

if (isset($_GET["page"])) {
    switch ($_GET['page']) {
        # pagina principal
        case 'nosotros':
            include 'views/home/nosotros.php';
            break;
        case 'contacto':
            include 'views/home/contacto.php';
            break;
        case 'login':
            include 'views/home/login.php';
            break;
        # perfiles
        
        case 'ope-inicio':
            include 'views/user/operador/inicio.php';
            break;
        # administrador
        case 'adm-inicio':
            include 'views/user/administrador/inicio.php';
            break;
        case 'adm-materia':
            include 'views/user/administrador/materia.php';
            break;
        case 'adm-materia-editar':
            include 'views/user/administrador/materia_editar.php';
            break;
        case 'adm-usuario':
            include 'views/user/administrador/usuario.php';
            break;
        case 'adm-usuario-editar':
            include 'views/user/administrador/usuario_editar.php';
            break;
        #Agregare un apartadito de Construcción es decir, que luego loo borraré
        case 'hoteles':
            include 'views/user/administrador/hoteles.php';
            break;
        case 'adm-hotel-editar':
            include 'views/user/administrador/hotel_editar.php';
            break;
        case 'adm-clientes':
            include 'views/user/administrador/clientes.php';
            break;
        case 'adm-cliente-editar':
            include 'views/user/administrador/clientes_editar.php';
            break;
        case 'adm-fichas':
            include 'views/user/administrador/fichas.php';
            break;
        case 'adm-fichas-editar':
            include 'views/user/administrador/fichas_editar.php';
            break;
        case 'construccion-dos':
            include 'views/user/operador/inicio_construcciondos.php';
            break;
        case 'construccion-tres':
            include 'views/user/cliente/inicio_construcciontres.php';
            break;
        case 'ope-clientes':
            include 'views/user/operador/clientes.php';
            break;
        case 'ope-cliente-editar':
            include 'views/user/operador/clientes_editar.php';
            break;
        case 'cli-inicio':
            include 'views/user/cliente/clientes.php';
            break;
            #PDFS en el operador
        case 'adm-pdf-clientes':
            include 'views/user/administrador/pdf_clientes.php';
            break;
        case 'adm-pdf-fichacliente':
            include 'views/user/administrador/pdf_fichacliente.php';
            break;
        case 'adm-pdf-fichaficha':
            include 'views/user/administrador/pdf_fichaficha.php';
            break;
            ################




    }
} else {
    include 'views/home/inicio.php';
}
