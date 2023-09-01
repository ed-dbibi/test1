<?php
// Assurez-vous que vous avez inclus votre fichier de connexion à la base de données
include_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_appareil = $_POST['id_appareil'];
    $droit_dacces = $_POST['droit_dacces'];

    // Recherchez l'ID de la permission choisie
    $query = "SELECT id_permission FROM permission WHERE nom = ?";
    $stmt = $conn->prepare($query); // Utilisez $conn au lieu de $pdo
    $stmt->bind_param("s", $droit_dacces); // Liez le paramètre de la requête
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_permission = $row['id_permission'];

        // Insérez l'utilisateur dans la table utilisateur avec l'ID de permission
        $query = "INSERT INTO utilisateur (nom, prenom, username, password, id_appareil, droit_dacces) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query); // Utilisez $conn au lieu de $pdo
        $stmt->bind_param("ssssii", $nom, $prenom, $username, $password, $id_appareil, $id_permission); // Liez les paramètres de la requête
        $stmt->execute();

        // Redirigez l'utilisateur vers une page de confirmation ou une autre page appropriée
        header("Location: confirmation_creation_utilisateur.php");
        exit();
    } else {
        // Si aucune permission correspondante n'a été trouvée, vous pouvez gérer cette situation ici
        echo "Permission introuvable";
    }
} else {
    // Si la méthode de requête n'est pas POST, redirigez l'utilisateur vers une page d'erreur ou une autre page appropriée
    header("Location: erreur.php");
    exit();
}
?>
