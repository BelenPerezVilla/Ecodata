<?php
if (!empty($_GET['id'])) {
    include "conexion.php";
    $id = $_GET['id'];
    require('./fpdf.php');

    class PDF extends FPDF
    {
        
        // Cabecera de página
        function Header()
        {
            global $id;
            // Arial bold 15
            $this->SetFont('Arial','B',16);
            // Movernos a la derecha
            $this->Cell(90);
            // Título
            $this->Cell(70,10,'Reporte Venta de ID:' . $id,0,0,'C');
            // Salto de línea
            $this->Ln(20);
    
            // Encabezados de tabla
            $this->SetFont('Arial','B',8);
            $this->Cell(15,7,'IdVentas',1,0,'C',0);
            $this->Cell(20,7,'IdClientes',1,0,'C',0);
            $this->Cell(20,7,'IdInventarioP',1,0,'C',0);
            $this->Cell(20,7,'IdProducto',1,0,'C',0);
            $this->Cell(25,7,'CantidadProducto',1,0,'C',0);
            $this->Cell(20,7,'Monto',1,0,'C',0);
            $this->Cell(25,7,'FechaVenta',1,0,'C',0);
            $this->Cell(20,7,'EstadoVenta',1,0,'C',0);
            $this->Cell(25,7,'MetodoPago',1,1,'C',0);
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
    
    // Verificar si se ha pasado un ID como parámetro
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        // Preparar la consulta
        $consulta = "SELECT * FROM Ventas WHERE IdVentas = ?";
        $stmt = $conexion->prepare($consulta);
    
        if ($stmt === false) {
            die('Error en la preparación de la consulta: ' . $conexion->error);
        }
    
        // Vincular parámetros
        $stmt->bind_param("s", $id);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Obtener el resultado
        $resultado = $stmt->get_result();
    
        if ($resultado->num_rows > 0) {
            $pdf = new PDF('L', 'mm', 'A4');  // 'L' para orientación horizontal, 'A4' para tamaño de papel
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial','',8);
    
            while ($row = $resultado->fetch_assoc()) {
                $pdf->Cell(15,7,$row['IdVentas'],1,0,'C',0);
                $pdf->Cell(20,7,$row['IdClientes'],1,0,'C',0);
                $pdf->Cell(20,7,$row['IdInventarioP'],1,0,'C',0);
                $pdf->Cell(20,7,$row['IdProducto'],1,0,'C',0);
                $pdf->Cell(25,7,$row['CantidadProducto'],1,0,'C',0);
                $pdf->Cell(20,7,$row['Monto'],1,0,'C',0);
                $pdf->Cell(25,7,$row['FechaVenta'],1,0,'C',0);
                $pdf->Cell(20,7,$row['EstadoVenta'],1,0,'C',0);
                $pdf->Cell(25,7,$row['MetodoPago'],1,1,'C',0);
            }
    
            $pdf->Output('Reporte_Datos_Venta_ID.pdf', 'I');
        } else {
            echo "No se encontraron datos para el ID especificado.";
        }
    
        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "ID no especificado.";
    }
    
    // Cerrar la conexión
    $conexion->close();
}
?>
