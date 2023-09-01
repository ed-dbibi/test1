




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
       
        if(!empty($nom) && !empty($adresse) && !empty($nature_de_sol) && !empty($Description)){
            // Connexion à la base de données
            include_once "connection.php";
            include_once "home.php";
            $req = mysqli_query($conn, "INSERT INTO ferme (nom, adresse, nature_de_sole, Description) VALUES ('$nom', '$adresse', '$nature_de_sol', '$Description')");
            
            if($req){
                header("Location: ferme.php");
                exit;
            } else {
                $message = "Erreur : ferme non ajoutée";
            }
        } else {
            $message = "Veuillez remplir tous les champs";
        }
    }
    ?>
    <div class="form">
        <a href="ferme.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Ajouter une ferme</h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form method="post">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Adresse</label>
            <input type="text" name="adresse">
            <label>Nature de sol</label>
            <input type="text" name="nature_de_sol">
            <label>Description</label>
            <input type="text" name="Description"> 
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>
