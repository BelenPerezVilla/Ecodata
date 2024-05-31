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
            $this->Cell(70,10,'Reporte Aarea del ID:' . $id,0,0,'C');
            // Salto de líneal
            $this->Ln(20);
    
            // Encabezados de tabla
            $this->SetFont('Arial','B',10);
            $this->Cell(40,10,'Tipo',1,0,'C',0);
            
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
        $consulta = "SELECT * FROM Areas WHERE IdArea = ?";
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
            $pdf->SetFont('Arial','',10);
            
            while ($row = $resultado->fetch_assoc()) {
                $pdf->Cell(40,10,$row['Tipo'],1,0,'C',0);
                
            }
    
            $pdf->Output('Reporte_Datos_Areas_ID.pdf', 'I');
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