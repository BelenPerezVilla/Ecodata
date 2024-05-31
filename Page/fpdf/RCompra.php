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
        $this->Cell(70,10,'Reporte de Compra' ,0,0,'C');
        // Salto de línea
        $this->Ln(20);

        // Encabezados de tabla
        $this->SetFont('Arial','B',8);
        $this->Cell(20,7,'IdCompra',1,0,'C',0);
        $this->Cell(20,7,'IdProveedor',1,0,'C',0);
        $this->Cell(20,7,'IdFierro',1,0,'C',0);
        $this->Cell(30,7,'FechaCompra',1,0,'C',0);
        $this->Cell(30,7,'Cantidad',1,0,'C',0);
        $this->Cell(30,7,'PrecioUnitario',1,0,'C',0);
        $this->Cell(30,7,'Total',1,0,'C',0);
        // Aumento el ancho de la celda para la columna Descripcion
        $this->Cell(60,7,'Descripcion',1,1,'C',0);
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
$consulta = "SELECT * FROM Compra";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF('L', 'mm', 'A4');  // 'L' para orientación horizontal, 'A4' para tamaño de papel
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(20,7,$row['IdCompra'],1,0,'C',0);
    $pdf->Cell(20,7,$row['IdProveedor'],1,0,'C',0);
    $pdf->Cell(20,7,$row['IdFierro'],1,0,'C',0);
    $pdf->Cell(30,7,$row['FechaCompra'],1,0,'C',0);
    $pdf->Cell(30,7,$row['Cantidad'],1,0,'C',0);
    $pdf->Cell(30,7,$row['PrecioUnitario'],1,0,'C',0);
    $pdf->Cell(30,7,$row['Total'],1,0,'C',0);
    // Aumento el ancho de la celda para la columna Descripcion
    $pdf->MultiCell(60,7,$row['Descripcion'],1,'C',0);
}

$pdf->Output('Reporte_Datos_Compra.pdf', 'I');
?>
