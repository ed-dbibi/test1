
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion des serre</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php
    if(isset($_POST['button'])){
        extract($_POST);
        if(isset($nom) && isset($numero) && isset($superficie) && isset($rendement) && isset($id_bloc)){
            // Connexion à la base de données
            include_once "connection.php";
            
            $req = mysqli_query($conn, "INSERT INTO serre (nom, numero, superficie , rendement, id_bloc ) VALUES ('$nom', '$numero', '$superficie', '$rendement', '$id_bloc')");
            
            if($req){
                header("Location: serre.php");
                exit;
            } else {
                $message = "Erreur : serre non ajoutée";
            }
        } else {
            $message = "Veuillez remplir tous les champs";
        }
    }
    ?>
    <div class="form">
        <a href="serre.php" class="back_btn"><img src="images/retour.png"></a>
        <h2>Ajouter une serre</h2>
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
            <label>numero</label>
            <input type="text" name="numero">
            <label>superficie</label>
            <input type="text" name="superficie">
            <label>rendement</label>
            <input type="text" name="rendement"> 
            <label>ibloc</label>
            <input type="text" name="id_bloc">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>