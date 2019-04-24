<?php

$id = $_GET["id"];

// Include the main TCPDF library (search for installation path).
require_once('vendor/tcpdf/tcpdf.php');
require_once('models/model.cliente.php');
$cliente->getOne($id);

// create new PDF document
$pdf = new TCPDF("portrait", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// add a page
$pdf->AddPage();

$pdf->Image("resources/img/ficha_clientes.jpg",10,10,200,150);

$pdf->SetXY(130,93); $pdf->Cell(10,10,$cliente->data->nombreUsuario);
$pdf->SetXY(130,100); $pdf->Cell(10,10,$cliente->data->apellidoPaterno);
$pdf->SetXY(130,106); $pdf->Cell(10,10,$cliente->data->apellidoMaterno);
//$pdf->SetXY(165,128); $pdf->Cell(10,10,$cliente->data->raza);

//$pdf->Image("resources/img/" . $cliente->data->numero .".jpg",60,170,80,80);

//Close and output PDF document
$pdf->Output('Fichacliente.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
