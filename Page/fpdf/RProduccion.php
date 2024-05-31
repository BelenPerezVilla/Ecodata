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
        $this->Cell(70,10,'Reporte de Produccion' ,0,0,'C');
        // Salto de línea
        $this->Ln(20);

        // Encabezados de tabla
        $this->SetFont('Arial','B',8);
        $this->Cell(15,7,'IdPro',1,0,'C',0);
        $this->Cell(20,7,'IdProduccion',1,0,'C',0);
        $this->Cell(20,7,'IdProceso',1,0,'C',0);
        $this->Cell(30,7,'TipoProceso',1,0,'C',0);
        $this->Cell(45,7,'MaterialesUtilizados',1,0,'C',0);
        $this->Cell(25,7,'ResultadoProceso',1,0,'C',0);
        $this->Cell(25,7,'CostoProceso',1,1,'C',0);
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
$consulta = "SELECT * FROM Produccion";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF('L', 'mm', 'A4');  // 'L' para orientación horizontal, 'A4' para tamaño de papel
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(15,7,$row['IdPro'],1,0,'C',0);
    $pdf->Cell(20,7,$row['IdProduccion'],1,0,'C',0);
    $pdf->Cell(20,7,$row['IdProceso'],1,0,'C',0);
    $pdf->Cell(30,7,$row['TipoProceso'],1,0,'C',0);
    $pdf->Cell(45,7,$row['MaterialesUtilizados'],1,0,'C',0);
    $pdf->Cell(25,7,$row['ResultadoProceso'],1,0,'C',0);
    $pdf->Cell(25,7,$row['CostoProceso'],1,1,'C',0);
}

$pdf->Output('Reporte_Datos_Produccion.pdf', 'I');
?>
