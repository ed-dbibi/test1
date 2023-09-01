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
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $req = mysqli_query($conn , "SELECT * FROM ferme WHERE id = $id");
        $row = mysqli_fetch_assoc($req);
    } else {
        // Gérer le cas où $id n'est pas défini
        $row = array('nom' => '', 'adresse' => '', 'nature_de_sole' => '', 'Description' => '');
    }

    $message = ""; // Initialisez la variable $message à une chaîne vide

    if(isset($_POST['button'])){
        extract($_POST);

        // Utilisez des requêtes préparées pour éviter les problèmes de sécurité et d'insertion
        $stmt = mysqli_prepare($conn, "UPDATE ferme SET nom = ?, adresse = ?, nature_de_sole = ?, Description = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "ssssi", $nom, $adresse, $nature_de_sol, $Description, $id);

        if(mysqli_stmt_execute($stmt)){
            header("Location: ferme.php");
            exit;
        } else {
            $message = "Aucune modification";
        }

        mysqli_stmt_close($stmt);
    }
    ?>

    <div class="form">
        <a href="ferme.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Modifier une ferme</h2>
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
            <label>Adresse</label>
            <input type="text" name="adresse" value="<?= $row['adresse'] ?>">
            <label>Nature de sol</label>
            <input type="text" name="nature_de_sol" value="<?= $row['nature_de_sole'] ?>">
            <label>Description</label>
            <input type="text" name="Description" value="<?= $row['Description'] ?>">
            <!-- Ajoutez un champ caché pour transmettre l'ID -->
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>

</body>
</html>
