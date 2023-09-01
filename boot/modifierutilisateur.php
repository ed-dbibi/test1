<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion des ferme</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php
    include_once "connection.php";
    
    // Assurez-vous que $id est défini avant d'exécuter la requête
    if(isset($_GET['id_utilisateur'])){
        $id_utilisateur = $_GET['id_utilisateur'];
        $req = mysqli_query($conn , "SELECT * FROM utilisateur WHERE id_utilisateur = $id_utilisateur");
        $row = mysqli_fetch_assoc($req);
    } else {
        // Gérer le cas où $id n'est pas défini
        $row = array('nom' => '', 'prenom' => '', 'username' => '', 'password' => '', 'droit_dacces' => '', 'id_appareil' => '');
    }

    $message = ""; // Initialisez la variable $message à une chaîne vide

    if(isset($_POST['button'])){
        extract($_POST);

        // Utilisez des requêtes préparées pour éviter les problèmes de sécurité et d'insertion
        $stmt = mysqli_prepare($conn, "UPDATE utilisateur SET nom = ?, prenom = ?, username = ?, password = ?, droit_dacces = ?, id_appareil = ? WHERE id_utilisateur = ?");
        mysqli_stmt_bind_param($stmt, "ssssssi", $nom, $prenom, $username, $password, $droit_dacces, $id_appareil, $id_utilisateur);

        if(mysqli_stmt_execute($stmt)){
            header("Location: utilisateur.php");
            exit;
        } else {
            $message = "Aucune modification";
        }

        mysqli_stmt_close($stmt);
    }
    ?>

    <div class="form">
        <a href="utilisateur.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Modifier </h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form method="post">
            <label>Nom</label>
            <input type="text" name="nom" value="<?= $row['nom'] ?>">
            <label>prenom</label>
            <input type="text" name="prenom" value="<?= $row['prenom'] ?>">
            <label>username</label>
            <input type="text" name="username" value="<?= $row['username'] ?>">
            <label>password</label>
            <input type="password" name="password" value="<?= $row['password'] ?>">
            <label>droit d'acces</label>
            <input type="text" name="droit_dacces" value="<?= $row['droit_dacces'] ?>">
            <label>appareil</label>
            <input type="text" name="id_appareil" value="<?= $row['id_appareil'] ?>">
            <!-- Ajoutez un champ caché pour transmettre l'ID -->
            <input type="hidden" name="id_utilisateur" value="<?= $id_utilisateur ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>

</body>
</html>