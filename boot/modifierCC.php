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
    
    
    if(isset($_GET['id_cc'])){
        $id_cc = $_GET['id_cc'];
        $req = mysqli_query($conn , "SELECT * FROM condition_climatique WHERE id_cc = $id_cc");
        $row = mysqli_fetch_assoc($req);
    } else {
        
        $row = array('EC' => '', 'PH' => '', 'temperature_max' => '', 'temperature_min' => '', 'date' => '', 'id_serre' => '');
    }

    $message = ""; 

    if(isset($_POST['button'])){
        extract($_POST);

        
        $stmt = mysqli_prepare($conn, "UPDATE condition_climatique SET EC = ?, PH = ?, temperature_max = ?, temperature_min = ?, date = ?, id_serre = ? WHERE id_cc = ?");
        mysqli_stmt_bind_param($stmt, "ssssssi", $EC, $PH, $temperature_max, $temperature_min, $date, $id_serre,  $id_cc);

        if(mysqli_stmt_execute($stmt)){
            header("Location: conditionclimatique.php");
            exit;
        } else {
            $message = "Aucune modification";
        }

        mysqli_stmt_close($stmt);
    }
    ?>

    <div class="form">
        <a href="conditionclimatique.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Modifier une ferme</h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form method="post">
            <label>EC</label>
            <input type="text" name="EC" value="<?= $row['EC'] ?>">
            <label>PH</label>
            <input type="text" name="PH" value="<?= $row['PH'] ?>">
            <label>temperature max</label>
            <input type="text" name="temperature_max" value="<?= $row['temperature_max'] ?>">
            <label>temperature min</label>
            <input type="text" name="temperature_min" value="<?= $row['temperature_min'] ?>">
            <label>date</label>
            <input type="date" name="date" value="<?= $row['date'] ?>">
            <label>id_serre</label>
            <input type="text" name="id_serre" value="<?= $row['id_serre'] ?>">
            <!-- Ajoutez un champ caché pour transmettre l'ID -->
            <input type="hidden" name="id_cc" value="<?= $id_cc ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>

</body>
</html>