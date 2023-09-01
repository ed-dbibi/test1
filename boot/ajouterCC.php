<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion des fermes</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php
    if(isset($_POST['button'])){
        extract($_POST);
       
        if(!empty($EC) && !empty($PH) && !empty($temperature_max) && !empty($temperature_min) && !empty($date) && !empty($id_serre)){
            // Connexion à la base de données
            include_once "connection.php";
           
            $req = mysqli_query($conn, "INSERT INTO condition_climatique (EC, PH, temperature_max, temperature_min, date, id_serre) VALUES ('$EC', '$PH', '$temperature_max', '$temperature_min', '$date', '$id_serre')");

            
            if($req){
                header("Location: conditionclimatique.php");
                exit;
            } else {
                $message = "Erreur :  non ajoutée";
            }
        } else {
            $message = "Veuillez remplir tous les champs";
        }
    }
    ?>
    <div class="form">
        <a href="conditionclimatique.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Ajouter</h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form method="post">
            <label>EC</label>
            <input type="text" name="EC">
            <label>PH</label>
            <input type="text" name="PH">
            <label>temperature_max</label>
            <input type="text" name="temperature_max">
            <label>temperature_min</label>
            <input type="text" name="temperature_min"> 
            <label>date</label>
            <input type="date" name="date"> 
            <label>id_serre</label>
            <input type="text" name="id_serre"> 
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>