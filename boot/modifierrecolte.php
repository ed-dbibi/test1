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
    if(isset($_GET['id_recolte'])){
        $id_recolte = $_GET['id_recolte'];
        $req = mysqli_query($conn , "SELECT * FROM récolte WHERE id_recolte = $id_recolte");
        $row = mysqli_fetch_assoc($req);
    } else {
        // Gérer le cas où $id n'est pas défini
        $row = array('quantite' => '', 'type_de_recolte' => '', 'id_serre' => '', 'id' => '');
    }

    $message = ""; // Initialisez la variable $message à une chaîne vide

    if(isset($_POST['button'])){
        extract($_POST);
       

        // Utilisez des requêtes préparées pour éviter les problèmes de sécurité et d'insertion
        $stmt = mysqli_prepare($conn, "UPDATE récolte SET quantite = ?, type_de_recolte = ?, id_serre = ?, id = ? WHERE id_recolte = ?");
        mysqli_stmt_bind_param($stmt, "ssssi", $quantite, $type_de_recolte, $id_serre, $id, $id_recolte);

        if(mysqli_stmt_execute($stmt)){
            header("Location:recolte.php");
            exit;
        } else {
            $message = "Aucune modification";
        }

        mysqli_stmt_close($stmt);
    }
    ?>

    <div class="form">
        <a href="recolte.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Modifier</h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form method="post">
            <label>quantite</label>
            <input type="text" name="quantite" value="<?= $row['quantite'] ?>">
            
            <label>type_de_recolte</label>
            <input type="text" name="type_de_recolte" value="<?= $row['type_de_recolte'] ?>">
            <label>serre</label>
            <input type="text" name="id_serre" value="<?= $row['id_serre'] ?>">
            
            <label>ferme</label>
            <input type="text" name="id" value="<?= $row['id'] ?>">
            <!-- Ajoutez un champ caché pour transmettre l'ID -->
            <input type="hidden" name="id_recolte" value="<?= $id_recolte ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>

</body>
</html>