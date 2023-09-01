<?php
require('fpdf.php'); // Inclure le fichier FPDF

// Créer une instance de FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Hello, World!');
$pdf->Output(); // Afficher ou enregistrer le PDF
?>
