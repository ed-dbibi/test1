<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion des employer</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
$message = ""; // Initialize the message variable

if(isset($_POST['button'])){
    $type_dappareil = $_POST['type_dappareil'];
    $adresse = $_POST['adresse'];
    $mot_de_pass = $_POST['mot_de_pass'];
    $ip = $_POST['ip'];

    if (!empty($type_dappareil) && !empty($adresse) && !empty($mot_de_pass) && !empty($ip)) {
        include_once "connection.php";
        $query = "INSERT INTO appareil (type_dappareil, adresse, mot_de_pass, ip) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        
        mysqli_stmt_bind_param($stmt, "ssss", $type_dappareil, $adresse, $mot_de_pass, $ip);

        if(mysqli_stmt_execute($stmt)){
            header("location: appareil.php");
            exit;
        } else {
            $message = "Appareil non ajouté";
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        $message = "Veuillez remplir tous les champs !";
    }
}
?>
<!-- The rest of your HTML code -->

<div class="form">
    <a href="appareil.php" class="back_btn"><img src="images/retour.png"></a>
     
    <h2>ajouter un appareil</h2>
    <p class="erreur_message">
        <?php
        if(isset($message)){
            echo $message;
        }
        ?>
    </p>
    <form action="" method="POST">
        <label>type d'appareil</label>
        <input type="text" name="type_dappareil">
        <label>adresse</label>
        <input type="text" name="adresse">
        <label>mot de passe</label>
        <input type="text" name="mot_de_pass">
        <label>IP</label>
        <input type="ip" name="ip">
        <input type="submit" value="Ajouter" name="button">
    </form>
</div>

</body>
</html>
