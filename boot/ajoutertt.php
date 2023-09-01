
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
    if(isset($_POST['button'])){
        extract($_POST);
       
        if(!empty($type) && !empty($date) && !empty($quantite_eau) && !empty($bouillie) && !empty($unite_bouillie) && !empty($heuredebut) && !empty($heurefin)){
            // Connexion à la base de données
            include_once "connection.php";
            include_once "home.php";
            $req = mysqli_query($conn, "INSERT INTO traitement_chimique (type, date, quantite_eau, bouillie, unite_bouillie, heuredebut, heurefin) VALUES ('$type', '$date', '$quantite_eau', '$bouillie', '$unite_bouillie', '$heuredebut', '$heurefin')");
            
            if($req){
                header("Location: traitementchimique.php");
                exit;
            } else {
                $message = "Erreur : non ajoutée";
            }
        } else {
            $message = "Veuillez remplir tous les champs";
        }
    }
    ?>
    <div class="form">
        <a href="traitementchimique.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Ajouter</h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form method="post">
            <label>type</label>
            <input type="text" name="type">
            <label>date</label>
            <input type="date" name="date">
            <label>quantite d'eau</label>
            <input type="text" name="quantite_eau">
            <label>bouillie</label>
            <input type="text" name="bouillie"> 
            <label>unite de bouillie</label>
            <input type="text" name="unite_bouillie">
            <label>heure de debut</label>
            <input type="time" name="heuredebut">
            <label>heure de fin</label>
            <input type="time" name="heurefin">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>