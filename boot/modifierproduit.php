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
    if(isset($_GET['id_produit'])){
        $id_produit = $_GET['id_produit'];
        $req = mysqli_query($conn , "SELECT * FROM produit WHERE id_produit = $id_produit");
        $row = mysqli_fetch_assoc($req);
    } else {
        // Gérer le cas où $id n'est pas défini
        $row = array('nom_commercial' => '', 'prix' => '', 'unite' => '', 'doses' => '');
    }

    $message = ""; // Initialisez la variable $message à une chaîne vide

    if(isset($_POST['button'])){
        extract($_POST);

        // Utilisez des requêtes préparées pour éviter les problèmes de sécurité et d'insertion
        $stmt = mysqli_prepare($conn, "UPDATE produit SET nom_commercial = ?, prix = ?, unite = ?, doses = ? WHERE id_produit = ?");
        mysqli_stmt_bind_param($stmt, "ssssi", $nom_commercial, $prix, $unite, $doses, $id_produit);

        if(mysqli_stmt_execute($stmt)){
            header("Location: produit.php");
            exit;
        } else {
            $message = "Aucune modification";
        }

        mysqli_stmt_close($stmt);
    }
    ?>

    <div class="form">
        <a href="produit.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Modifier une</h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form method="post">
            <label>Nom commercial</label>
            <input type="text" name="nom_commercial" value="<?= $row['nom_commercial'] ?>">
            <label>prix</label>
            <input type="text" name="prix" value="<?= $row['prix'] ?>">
            <label>unite</label>
            <input type="text" name="unite" value="<?= $row['unite'] ?>">
            <label>doses</label>
            <input type="text" name="doses" value="<?= $row['doses'] ?>">
            <label>id_produit</label>
            <input type="text" name="id_produit" value="<?= $row['id_produit'] ?>">
            <!-- Ajoutez un champ caché pour transmettre l'ID -->
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>

</body>
</html>
