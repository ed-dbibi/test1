<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php
    include_once "connection.php";
    
    // Assurez-vous que $id est défini avant d'exécuter la requête
    if(isset($_GET['id_bloc'])){
        $id_bloc = $_GET['id_bloc'];
        $req = mysqli_query($conn , "SELECT * FROM bloc WHERE id_bloc = $id_bloc");
        $row = mysqli_fetch_assoc($req);
    } else {
        // Gérer le cas où $id n'est pas défini
        $row = array('nom' => '', 'superficie' => '', 'rendement' => '', 'id' => '');
    }

    $message = ""; // Initialisez la variable $message à une chaîne vide

    if(isset($_POST['button'])){
        extract($_POST);

        // Utilisez des requêtes préparées pour éviter les problèmes de sécurité et d'insertion
        $stmt = mysqli_prepare($conn, "UPDATE bloc SET nom = ?, superficie = ?, rendement = ?, id = ? WHERE id_bloc = ?");
        mysqli_stmt_bind_param($stmt, "ssssi", $nom, $superficie, $rendement, $id, $id_bloc);

        if(mysqli_stmt_execute($stmt)){
            header("Location:bloc.php");
            exit;
        } else {
            $message = "Aucune modification";
        }

        mysqli_stmt_close($stmt);
    }
    ?>

    <div class="form">
        <a href="bloc.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Modifier</h2>
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
            
            <label>superficie</label>
            <input type="text" name="superficie" value="<?= $row['superficie'] ?>">
            <label>rendement</label>
            <input type="text" name="rendement" value="<?= $row['rendement'] ?>">
            
            <label>ferme</label>
            <input type="text" name="id" value="<?= $row['id'] ?>">
            <!-- Ajoutez un champ caché pour transmettre l'ID -->
            <input type="hidden" name="id_bloc" value="<?= $id_bloc ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>

</body>
</html>