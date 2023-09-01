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
    
    
    if(isset($_GET['id_appareil'])){
        $id_appareil = $_GET['id_appareil'];
        $req = mysqli_query($conn , "SELECT * FROM appareil WHERE id_appareil = $id_appareil");
        $row = mysqli_fetch_assoc($req);
    } else {
        
        $row = array('type_dappareil' => '', 'adresse' => '', 'mot_de_pass' => '', 'ip' => '');
    }

    $message = ""; 

    if(isset($_POST['button'])){
        extract($_POST);

        
        $stmt = mysqli_prepare($conn, "UPDATE appareil SET type_dappareil = ?, adresse = ?, mot_de_pass = ?, ip = ? WHERE id_appareil = ?");
        mysqli_stmt_bind_param($stmt, "ssssi", $type_dappareil, $adresse, $mot_de_pass, $ip, $id_appareil);

        if(mysqli_stmt_execute($stmt)){
            header("Location: appareil.php");
            exit;
        } else {
            $message = "Aucune modification";
        }

        mysqli_stmt_close($stmt);
    }
    ?>

    <div class="form">
        <a href="appareil.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Modifier </h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form method="post">
            <label>type d'appareil</label>
            <input type="text" name="type_dappareil" value="<?= $row['type_dappareil'] ?>">
            <label>Adresse</label>
            <input type="text" name="adresse" value="<?= $row['adresse'] ?>">
            <label>mot de pass</label>
            <input type="text" name="mot_de_pass" value="<?= $row['mot_de_pass'] ?>">
            <label>IP</label>
            <input type="text" name="ip" value="<?= $row['ip'] ?>">
            
            <input type="hidden" name="id_appareil" value="<?= $id_appareil ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>

</body>
</html>