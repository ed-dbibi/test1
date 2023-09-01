<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un traitement chimique</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php
    include_once "connection.php";
    
    // Ensure that $id_tc is defined before executing the query
    if(isset($_GET['id_tc'])){
        $id_tc = $_GET['id_tc'];
        $query = "SELECT * FROM traitement_chimique WHERE id_tc = $id_tc";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            // Handle the case where no record is found
            $row = array('type' => '', 'date' => '', 'quantite_eau' => '', 'bouillie' => '', 'unite_bouillie' => '', 'heuredebut' => '', 'heurefin' => '');
        }
    } else {
        // Handle the case where $id_tc is not defined
        $row = array('type' => '', 'date' => '', 'quantite_eau' => '', 'bouillie' => '', 'unite_bouillie' => '', 'heuredebut' => '', 'heurefin' => '');
    }

    $message = ""; // Initialize the $message variable as an empty string

    if(isset($_POST['button'])){
        extract($_POST);

        // Use prepared statements to avoid security and insertion issues
        $query = "UPDATE traitement_chimique SET type = ?, date = ?, quantite_eau = ?, bouillie = ?, unite_bouillie = ?, heuredebut = ?, heurefin = ? WHERE id_tc = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssssssi", $type, $date, $quantite_eau, $bouillie, $unite_bouillie, $heuredebut, $heurefin, $id_tc);

        if(mysqli_stmt_execute($stmt)){
            header("Location: traitementchimique.php");
            exit;
        } else {
            $message = "Aucune modification effectuée";
        }

        mysqli_stmt_close($stmt);
    }
    ?>

    <div class="form">
        <a href="traitementchimique.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Modifier</h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form method="post">
            <label>Type</label>
            <input type="text" name="type" value="<?= $row['type'] ?>">
            
            <label>Date</label>
            <input type="date" name="date" value="<?= $row['date'] ?>">
            <label>Quantité d'eau</label>
            <input type="text" name="quantite_eau" value="<?= $row['quantite_eau'] ?>">
            <label>Bouillie</label>
            <input type="text" name="bouillie" value="<?= $row['bouillie'] ?>">
            <label>Unité de bouillie</label>
            <input type="text" name="unite_bouillie" value="<?= $row['unite_bouillie'] ?>">
            <label>Heure de début</label>
            <input type="time" name="heuredebut" value="<?= $row['heuredebut'] ?>">
            <label>Heure de fin</label>
            <input type="time" name="heurefin" value="<?= $row['heurefin'] ?>">
            
            <input type="hidden" name="id_tc" value="<?= $id_tc ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>

</body>
</html>
