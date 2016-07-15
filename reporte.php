<?php
require('../../includes/libs/fpdf.php');
include('../../includes/libs/Smarty.class.php');
//require('../php/conexion.php');
$template= new Smarty(0);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
//$pdf->Image('../recursos/tienda.gif' , 10 ,8, 10 , 13,'GIF');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(120, 10, 'Reporte', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 1);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'REPORTE DEL PRODUCTO', 0);
$pdf->Ln(23);
//$x=$_GET['vec'];
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(35, 8, 'Nombre', 1);
$pdf->Cell(25, 8, 'Familia', 1);
$pdf->Cell(20, 8, 'Precio', 1);
$pdf->Cell(20, 8, 'Estado', 1);
$pdf->Cell(20, 8, 'Cantidad', 1);
$pdf->Cell(40, 8, 'Descripcion', 1);
$pdf->Cell(25, 8, 'Existencia Total', 1);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(35, 8, $_POST['nombre'], 0);
$pdf->Cell(25, 8, $_POST['familia'], 0);
$pdf->Cell(20, 8, $_POST['precio'], 0);
$pdf->Cell(20, 8, $_POST['estado'], 0);
$pdf->Cell(20, 8, $_POST['cantidad'], 0);
$pdf->Cell(40, 8, $_POST['descripcion'], 0);
$pdf->Cell(25, 8, $_POST['total'], 0);
/*$pdf->Cell(35, 8, $x[0], 0);
$pdf->Cell(25, 8, $x[4], 0);
$pdf->Cell(20, 8, $x[1], 0);
$pdf->Cell(20, 8, $x[2], 0);
$pdf->Cell(20, 8, $x[3], 0);
$pdf->Cell(40, 8, $x[5], 0);
$pdf->Cell(25, 8, $x[6], 0);*/
$pdf->Ln(8);
$pdf->Ln(8);


$pdf->Output();
?>
