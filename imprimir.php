
<?php
//Archivo imprimir_receta.php, donde se genera un pdf con la receta

// Se incluyen la biblioteca fpdf que permite crear archivos pdf

require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        //$this->Image('cabecera.jpg', 10, 8, 33);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(90);
        // Título
        $this->Cell(30, 10, utf8_decode('Centro Médico JOVA'), 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);
        $this->Cell(90);
        // Título
        $this->Cell(30, 10, '"Salvando Regios"', 0, 0, 'C');
        // Salto de línea
        $this->Ln(15);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
// Obtener el id_cita del parámetro GET
$id_px = $_GET['id_px'];
// Incluir el archivo de conexión
require("conexion/conexion.php");

// Consultar la receta en la base de datos
$consulta = "SELECT * FROM v_receta where id_px='" . $id_px . "'";
$resultado = mysqli_query($conexion, $consulta);

// Crear una instancia de PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Recorrer los resultados de la consulta
while ($row = $resultado->fetch_assoc()) {

    // Agregar información al PDF
    $pdf->Cell(30, 10, utf8_decode('Dirección:'), 0, 0, 'L', 0);
    $pdf->Cell(90, 10, utf8_decode("Calle Principal 123, Ciudad, País"), 0, 1, 'L', 0);

    $pdf->Cell(30, 10, utf8_decode('Teléfono:'), 0, 0, 'L', 0);
    $pdf->Cell(90, 10, "123-456-7890", 0, 1, 'L', 0);

    $pdf->Cell(180, 20, utf8_decode('Receta Médica'), 0, 0, 'L', 0);
    $pdf->Cell(10, 20, $row['id_px'], 0, 1, 'R', 0);

    $pdf->Cell(130, 10, 'Fecha:', 0, 0, 'R', 0);
    $pdf->Cell(60, 10, $row['fecha_cita'], 0, 0, 'R', 0);

    $pdf->Cell(190, 20, '', 0, 1, 'L', 0);
    $pdf->Cell(190, 20, 'Doctor:', 0, 1, 'L', 0);

    $pdf->Cell(150, 10, $row['doctor'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['telDoc'], 1, 1, 'C', 0);

    $pdf->Cell(190, 20, 'Datos Del Paciente:', 0, 1, 'L', 0);
    $pdf->Cell(150, 10, $row['paciente'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['telPa'], 1, 1, 'C', 0);


$nom_med = $row['nom_med'];
$frec_med = $row['frec_med'];
$test = $row['nom_test'];

$test_array = explode(",", $test);
$test_con_salto = ""; // Inicializar la variable test_con_salto

// Almacenar los elementos uno a uno con un salto de línea
for ($i = 0; $i < count($test_array); $i++) {
    $test_con_salto .= $test_array[$i] . "\n";
}

$frec_med_array = explode(",", $frec_med);
$nom_med_array = explode(",", $nom_med);
if (count($frec_med_array) === count($nom_med_array)) {
    // Variable para almacenar los elementos con saltos de línea
    $elementos_con_salto = "";

    // Almacenar los elementos uno a uno con un salto de línea
    for ($i = 0; $i < count($frec_med_array); $i++) {
        $elementos_con_salto .= "Medicamento: " . $nom_med_array[$i] . "\n" . "Frecuencia: " . $frec_med_array[$i] . "\n";
    }
}

    $pdf->Cell(190, 20, 'Tratamiento:', 0, 1, 'L', 0);
    $pdf->MultiCell(190, 10,utf8_decode ($elementos_con_salto), 1, 'C', 0);
   // $pdf->Cell(190, 30, $row['frec_med'], 1, 1, 'C', 0);

    $pdf->Cell(190, 20, 'Prueba a Realizar:', 0, 1, 'L', 0);
    $pdf->Cell(55);
    $pdf->MultiCell(80, 10,utf8_decode( $test_con_salto), 1, 'C', 0);
    //$pdf->Cell(40, 10, $row['tipo_prueba'], 1, 1, 'C', 0);
}

$pdf->Output();
?>