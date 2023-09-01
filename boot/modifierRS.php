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
    if(isset($_GET['id_rs'])){
        $id_rs = $_GET['id_rs'];
        $req = mysqli_query($conn , "SELECT * FROM rendement_desserre WHERE id_rs = $id_rs");
        $row = mysqli_fetch_assoc($req);
    } else {
        // Gérer le cas où $id n'est pas défini
        $row = array('nom' => '', 'prenom' => '', 'nbrdemployer' => '', 'idemp' => '', 'id_ferme' => '', 'id_serre' => '', 'date' => '', 'quantite' => '');
    }

    $message = ""; // Initialisez la variable $message à une chaîne vide

    if(isset($_POST['button'])){
        extract($_POST);

        // Utilisez des requêtes préparées pour éviter les problèmes de sécurité et d'insertion
        $stmt = mysqli_prepare($conn, "UPDATE rendement_desserre SET  nom = ?, prenom = ?, nbrdemployer = ?, idemp = ?, id_ferme = ?, id_serre = ?, date = ?, quantite = ?  WHERE id_rs = ?");
        mysqli_stmt_bind_param($stmt, "ssssssssi",  $nom, $prenom,  $nbrdemployer, $idemp, $id_ferme, $id_serre, $date, $quantite, $id_rs);

        if(mysqli_stmt_execute($stmt)){
            header("Location:rendementserre.php");
            exit;
        } else {
            $message = "Aucune modification";
        }

        mysqli_stmt_close($stmt);
    }
    ?>

    <div class="form">
        <a href="rendementserre.php" class="back_btn"> <img src="images/retour.png"> </a>
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
            <label>nombre d'employe</label>
            <input type="text" name="nbrdemployer" value="<?= $row['nbrdemployer'] ?>">
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
            <input type="hidden" name="id_rs" value="<?= $id_rs ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>

</body>
</html>