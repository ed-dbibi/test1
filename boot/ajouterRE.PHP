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
       
        if(!empty($nom) && !empty($prenom) && !empty($idemp) && !empty($id_ferme) && !empty($id_serre) && !empty($date) && !empty($quantite) && !empty($typedelaquantite)){
            // Connexion à la base de données
            include_once "connection.php";
            include_once "home.php";
            $req = mysqli_query($conn, "INSERT INTO rendement_demployer (nom, prenom, idemp, id_ferme, id_serre, date, quantite, typedelaquantite) VALUES ('$nom', '$prenom', '$idemp', '$id_ferme', '$id_serre', '$date', '$quantite', '$typedelaquantite')");
            
            if($req){
                header("Location: rendementemployer.php");
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
        <a href="rendementemployer.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2></h2>
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
            <label>prenom</label>
            <input type="text" name="prenom">
            <label>idemp</label>
            <input type="text" name="idemp">
            <label>ferme</label>
            <input type="text" name="id_ferme"> 
            <label>serre</label>
            <input type="text" name="id_serre"> 
            <label>date</label>
            <input type="date" name="date">
            <label>quantite</label> 
            <input type="text" name="quantite">

            <label>type de la quantite</label>
            <select name="typedelaquantite">
                <option value="ecart">Ecart</option>
                <option value="frais">Frais</option>
               
            </select>
         
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>