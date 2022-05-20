<?php

require("fpdf.php");

class PDF extends FPDF
{
//Cabecera de página
function Header()
{
    //Logo
    //$this->Image('discorigido.jpg',10,8,33);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(80);
    //Título
    $this->Cell(30,10,'Ticket',1,0,'C');
    //Salto de línea
    $this->Ln(20);
}

//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


include("../../protegidos/recursos.php");
$mostrar = $operacion->mostrarVenta();
date_default_timezone_set('America/Argentina/Cordoba');
$fecha=date('d-m-Y');
$hora=date('H:i:s');

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'Fecha:'.$fecha,0,1);
$pdf->Cell(0,10,'Hora:'.$hora,0,1);

for($i=0;$i<count($mostrar);$i++){
    $detalle = $mostrar[$i]['detalle'];
    $precio = $mostrar[$i]['precioTotal'];
    $pdf->Cell(0,10,$detalle.' $'.$precio,0,1);
}

$pdf->Output();


    
   


?>

            
