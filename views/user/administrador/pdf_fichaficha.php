<?php

$id = $_GET["id"];

// Include the main TCPDF library (search for installation path).
require_once('vendor/tcpdf/tcpdf.php');
require_once('models/model.ficha.php');
$ficha->getOne($id);

// create new PDF document
$pdf = new TCPDF("portrait", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// add a page
$pdf->AddPage();

$pdf->Image("resources/img/ficha_ficha.jpg",10,15,200,150);

$pdf->SetXY(130,97); $pdf->Cell(10,10,$ficha->data->nombreUsuario);
$pdf->SetXY(130,104); $pdf->Cell(10,10,$ficha->data->apellidoMaterno);
$pdf->SetXY(130,110); $pdf->Cell(10,10,$ficha->data->precioTarifa);
$pdf->SetXY(130,116); $pdf->Cell(10,10,$ficha->data->costoReserva);
$pdf->SetXY(130,123); $pdf->Cell(10,10,$ficha->data->nombreOrigen);
$pdf->SetXY(130,130); $pdf->Cell(10,10,$ficha->data->nombreDestino);
$pdf->SetXY(130,136); $pdf->Cell(10,10,$ficha->data->tipoTransporte);
$pdf->SetXY(130,142); $pdf->Cell(10,10,$ficha->data->fechaViaje);


//$pdf->Image("resources/img/" . $cliente->data->numero .".jpg",60,170,80,80);

//Close and output PDF document
$pdf->Output('Fichaficha.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
