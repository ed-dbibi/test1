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
    if(isset($_GET['id_rd'])){
        $id_rd = $_GET['id_rd'];
        $req = mysqli_query($conn , "SELECT * FROM rendement_demployer WHERE id_rd = $id_rd");
        $row = mysqli_fetch_assoc($req);
    } else {
        // Gérer le cas où $id n'est pas défini
        $row = array('nom' => '', 'prenom' => '', 'idemp' => '', 'id_ferme' => '', 'id_serre' => '', 'date' => '', 'quantite' => '', 'typedelaquantite' => '');
    }

    $message = ""; // Initialisez la variable $message à une chaîne vide

    if(isset($_POST['button'])){
        extract($_POST);

        // Utilisez des requêtes préparées pour éviter les problèmes de sécurité et d'insertion
        $stmt = mysqli_prepare($conn, "UPDATE rendement_demployer SET  nom = ?, prenom = ?, idemp = ?, id_ferme = ?, id_serre = ?, date = ?, quantite = ?, typedelaquantite = ?  WHERE id_rd = ?");
        mysqli_stmt_bind_param($stmt, "ssssssssi",  $nom, $prenom, $idemp, $id_ferme, $id_serre, $date, $quantite,  $typedelaquantite, $id_rd);

        if(mysqli_stmt_execute($stmt)){
            header("Location:rendementemployer.php");
            exit;
        } else {
            $message = "Aucune modification";
        }

        mysqli_stmt_close($stmt);
    }
    ?>

    <div class="form">
        <a href="rendementemployer.php" class="back_btn"> <img src="retour.png"> </a>
        <h2>Modifier</h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form method="post">
            
            <label>nom</label>
            <input type="text" name="nom" value="<?= $row['nom'] ?>">
            <label>prenom</label>
            <input type="text" name="prenom" value="<?= $row['prenom'] ?>">
            <label>idemp</label>
            <input type="text" name="idemp" value="<?= $row['idemp'] ?>">
            <label>ferme</label>
            <input type="text" name="id_ferme" value="<?= $row['id_ferme'] ?>">
            <label>serre</label>
            <input type="text" name="id_serre" value="<?= $row['id_serre'] ?>">
            <label>date</label>
            <input type="date" name="date" value="<?= $row['date'] ?>">
            <label>quantite</label>
            <input type="text" name="quantite" value="<?= $row['quantite'] ?>">
            
            
            
            <label>type de la quantite</label>
            <input type="text" name="typedelaquantite" value="<?= $row['typedelaquantite'] ?>">
           
           
            <input type="hidden" name="id_rd" value="<?= $id_rd ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>

</body>
</html>