<?php
require '../../vendor/autoload.php'; // Inclure PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['save_excel_data'])) {
    $filename = $_FILES['import_file']['name'];
    $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
    $allowed_ext = ['xls', 'csv', 'xlsx']; // Extensions autorisées

    if (in_array(strtolower($file_ext), $allowed_ext)) {
        $inputfilenamepath = $_FILES['import_file']['tmp_name'];

        // Charger le fichier Excel
        $spreadsheet = IOFactory::load($inputfilenamepath);
        $worksheet = $spreadsheet->getActiveSheet();
        $data = $worksheet->toArray();

        // Vous avez maintenant les données du fichier Excel dans la variable $data
        // Vous pouvez les traiter comme vous le souhaitez
        foreach ($data as $row) {

            $cin = $row[0];
            $nom = $row[1];
            $prenom = $row[2];
            $date_embauche = $row[3];
            $tel = $row[4];
            $adresse = $row[5];
            $date_naissance = $row[6];
            $role = $row[7];
            $rendement = $row[8];
            $id_serre = $row[9];
        
            // Connexion à la base de données (inclure le fichier connection.php)
            include_once "../connection.php";
        
            // Requête SQL d'insertion
            $sql = "INSERT INTO employe (cin, nom, prenom, date_embauche, tel, adresse, date_naissance, role, rendement, id_serre) VALUES ( '$cin', '$nom', '$prenom', '$date_embauche', '$tel', '$adresse', '$date_naissance', '$role', '$rendement', '$id_serre')";
            // Exécution de la requête SQL
            if (mysqli_query($conn, $sql)) {
                echo "Données insérées avec succès.<br>";
            } else {
                echo "Erreur lors de l'insertion des données : " . mysqli_error($conn) . "<br>";
            }
        }
        

        echo "Importation réussie !";
    } else {
        echo "Extension de fichier non autorisée.";
    }
}
?>
