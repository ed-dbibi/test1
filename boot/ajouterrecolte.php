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
        if(isset($quantite) && isset($type_de_recolte) && isset($date) && isset($id_serre) && isset($id)){
            // Connexion à la base de données
            include_once "connection.php";
            include_once "home.php";
            $req = mysqli_query($conn, "INSERT INTO récolte(quantite, type_de_recolte, date, id_serre, id ) VALUES ('$quantite', '$type_de_recolte', '$date', '$id_serre', '$id')");
            
            if($req){
                header("Location: recolte.php");
                exit;
            } else {
                $message = "Erreur : recolte non ajoutée";
            }
        } else {
            $message = "Veuillez remplir tous les champs";
        }
    }
    ?>
    <div class="form">
        <a href="recolte.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Ajouter une recolte </h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form method="post">
            <label>quantite</label>
            <input type="text" name="quantite">
            <label>type_de_recolte</label>
            <input type="text" name="type_de_recolte">
            <label>date</label>
            <input type="date" name="date">
            <label>serre</label>
            <input type="text" name="id_serre"> 
            <label>ferme</label>
            <input type="text" name="id"> 
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>
