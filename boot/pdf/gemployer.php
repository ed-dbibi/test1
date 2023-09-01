<?php
require('../../fpdf/fpdf.php'); // Inclure FPDF

class PDF extends FPDF {
    function Header() {
        // En-tête du PDF
        // Vous pouvez personnaliser l'en-tête ici
    }
    
    function Footer() {
        // Pied de page du PDF
        // Vous pouvez personnaliser le pied de page ici
    }
}

$pdf = new PDF('L', 'mm', 'A4');
$pdf->AddPage();

// Inclure votre code pour extraire les données de la base de données et les afficher dans le PDF
include_once "../connection.php"; // Inclure votre fichier de connexion à la base de données

// Exemple de requête SQL pour récupérer les données des employés
$sql = "SELECT * FROM employe";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Créer l'en-tête du tableau
    $pdf->SetFont('Arial', 'B', 10); // Police en gras
    $pdf->Cell(20, 10, 'CIN', 1);
    $pdf->Cell(30, 10, 'Nom', 1);
    $pdf->Cell(30, 10, 'Prenom', 1);
    $pdf->Cell(35, 10, 'Date dembauche', 1);
    $pdf->Cell(25, 10, 'Telephone', 1);
    $pdf->Cell(35, 10, 'Adresse', 1);
    $pdf->Cell(35, 10, 'Date de naissance', 1);
    $pdf->Cell(25, 10, 'Role', 1);
    $pdf->Cell(25, 10, 'Rendement', 1);
    $pdf->Cell(20, 10, 'serre', 1);
    $pdf->Ln(); // Aller à la ligne suivante

    // Remplir le tableau avec les données de la base de données
    $pdf->SetFont('Arial', '', 10); // Remettre la police normale
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(20, 10, $row['cin'], 1);
        $pdf->Cell(30, 10, $row['nom'], 1);
        $pdf->Cell(30, 10, $row['prenom'], 1);
        $pdf->Cell(35, 10, $row['date_embauche'], 1);
        $pdf->Cell(25, 10, $row['tel'], 1);
        $pdf->Cell(35, 10, $row['adresse'], 1);
        $pdf->Cell(35, 10, $row['date_naissance'], 1);
        $pdf->Cell(25, 10, $row['role'], 1);
        $pdf->Cell(25, 10, $row['rendement'], 1);
        $pdf->Cell(20, 10, $row['id_serre'], 1);
        $pdf->Ln(); // Aller à la ligne suivante
    }
} else {
    $pdf->Cell(190, 10, 'Aucune donnée d\'employé disponible.', 1, 0, 'C');
}

$pdf->Output(); // Afficher ou télécharger le PDF

?>
