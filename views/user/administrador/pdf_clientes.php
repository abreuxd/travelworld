<?php

require_once('vendor/tcpdf/tcpdf.php');
require_once('models/model.cliente.php');
$cliente->getAll();

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// add a page
$pdf->AddPage();

// create some HTML content


$html = '<h2>Listado de clientes:</h2>
<table border="1" cellspacing="3" cellpadding="4">


	<tr>
		<th>nombre usuario</th>
		<th>apellido paterno</th>
		<th>apellido materno</th>
		
	</tr>'; 
	//Insertar registro de la base de datos //
while($row=$cliente->next()){

	$html .= "<tr>";
	$html .= "<th>{$row->nombreUsuario}</th>";
	$html .= "<th>{$row->apellidoPaterno}</th>";
	$html .= "<th>{$row->apellidoMaterno}</th>";
		
	$html .= "</tr>";
}
	//Cerrar la tabla
$html .='</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+