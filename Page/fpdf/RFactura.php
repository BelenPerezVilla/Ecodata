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
        $this->Cell(70,10,'Reporte de Factura' ,0,0,'C');
        // Salto de línea
        $this->Ln(20);

        // Encabezados de tabla
        $this->SetFont('Arial','B',8);
        $this->Cell(20,7,'ID',1,0,'C',0);
        $this->Cell(20,7,'Tipo',1,0,'C',0);
        $this->Cell(30,7,'RFC',1,0,'C',0);
        $this->Cell(30,7,'Emision',1,0,'C',0);
        $this->Cell(30,7,'Vencimiento',1,0,'C',0);
        $this->Cell(30,7,'Estado',1,0,'C',0);
        $this->Cell(20,7,'Ventas',1,0,'C',0);
        $this->Cell(20,7,'Compra',1,0,'C',0);
        $this->Cell(20,7,'Clientes',1,1,'C',0);
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
$consulta = "SELECT * FROM Factura";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF('L', 'mm', 'A4');  // 'L' para orientación horizontal, 'A4' para tamaño de papel
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(20,7,$row['IdFactura'],1,0,'C',0);
    $pdf->Cell(20,7,$row['Tipo'],1,0,'C',0);
    $pdf->Cell(30,7,$row['RFC'],1,0,'C',0);
    $pdf->Cell(30,7,$row['FechaEmision'],1,0,'C',0);
    $pdf->Cell(30,7,$row['VencimientoFactura'],1,0,'C',0);
    $pdf->Cell(30,7,$row['EstadoFactura'],1,0,'C',0);
    $pdf->Cell(20,7,$row['IdVentas'],1,0,'C',0);
    $pdf->Cell(20,7,$row['IdCompra'],1,0,'C',0);
    $pdf->Cell(20,7,$row['IdClientes'],1,1,'C',0);
}

$pdf->Output('Reporte_Datos_Factura.pdf', 'I');
?>
