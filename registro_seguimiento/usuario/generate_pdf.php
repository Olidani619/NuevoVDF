<?php
require '../vendor/autoload.php'; // Asegúrate de que la ruta sea correcta
use Dompdf\Dompdf;
include('../conexion.php');


$value= $_POST['btnpdf'];
// Crear una instancia de Dompdf
$dompdf = new Dompdf();

// Cargar el contenido de content.php
ob_start();
include "$value"; // Asegúrate de que este archivo genere HTML válido
$html = ob_get_clean();

// Cargar el HTML en Dompdf

$dompdf->loadHtml($html);

// (Opcional) Configurar el tamaño y la orientación del papel
$dompdf->setPaper('A4', 'landscape');

// Renderizar el HTML como PDF
$dompdf->render();

// Salida del PDF al navegador
$dompdf->stream("documento.pdf", array("Attachment" => false)); // Cambia a true para forzar la descarga

?>