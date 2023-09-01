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
        if(isset($nom) && isset($Description) && isset($id_culture)){
            // Connexion à la base de données
            include_once "connection.php";
            
            $req = mysqli_query($conn, "INSERT INTO variete (nom, Description, id_culture) VALUES ('$nom', '$Description', '$id_culture')");
            
            if($req){
                header("Location: variete.php");
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
        
        <h2>Ajouter une variete</h2>
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
            
            <label>Description</label>
            <input type="text" name="Description"> 
            <label>culture</label>
            <input type="text" name="id_culture"> 
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>