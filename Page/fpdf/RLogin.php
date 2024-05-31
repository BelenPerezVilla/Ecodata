<?php
require('./fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(90);
    // Título
    $this->Cell(70,10,'Reporte de Login' ,0,0,'C');
    // Salto de línea
    $this->Ln(20);

    // Encabezados de tabla
    $this->SetFont('Arial','B',10);
    $this->Cell(40,10,'IdUsuario',1,0,'C',0);
    $this->Cell(40,10,'IdAreas',1,0,'C',0);
    $this->Cell(60,10,'Usuario',1,0,'C',0);
    $this->Cell(60,10,'Contraseña',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require ("conexion.php");
$consulta = "SELECT * FROM InicioLog";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF('L', 'mm', 'A4');  // 'L' para orientación horizontal, 'A4' para tamaño de papel
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(40,10,$row['IdUsuario'],1,0,'C',0);
    $pdf->Cell(40,10,$row['IdArea'],1,0,'C',0);
    $pdf->Cell(60,10,$row['Usuario'],1,0,'C',0);
    $pdf->Cell(60,10,$row['Contraseña'],1,1,'C',0);
}

$pdf->Output('Reporte_Datos_Login.pdf', 'I');
?>

