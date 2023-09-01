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

$pdf = new PDF();
$pdf->AddPage();

// Inclure votre code pour extraire les données de la base de données et les afficher dans le PDF
include_once "../connection.php"; // Inclure votre fichier de connexion à la base de données

// Exemple de requête SQL pour récupérer les données des employés
$sql = "SELECT * FROM cutlture";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    

    // Créer l'en-tête du tableau
    $pdf->SetFont('Arial', 'B', 15); // Police en gras
    
    $pdf->Cell(35, 10, 'Nom', 1);
    
    
    $pdf->Cell(40, 10, 'Description', 1);
    $pdf->Ln(); // Aller à la ligne suivante

    // Remplir le tableau avec les données de la base de données
    $pdf->SetFont('Arial', '', 10); // Remettre la police normale
    while ($row = mysqli_fetch_assoc($result)) {
     
        $pdf->Cell(35, 10, $row['nom'], 1);
      
        
        $pdf->Cell(40, 10, $row['Description'], 1);
      
        $pdf->Ln(); // Aller à la ligne suivante
    }
} else {
    $pdf->Cell(190, 10, 'Aucune donnée de fesrme disponible.', 1, 0, 'C');
}

$pdf->Output(); // Afficher ou télécharger le PDF

?>
