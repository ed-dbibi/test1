<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php
    if(isset($_POST['button'])){
        extract($_POST);
       
        if(!empty($nom) && !empty($prenom) && !empty($username) && !empty($password) && !empty($droit_dacces) && !empty($id_appareil)){
            // Connexion à la base de données
            include_once "connection.php";
            
            $req = mysqli_query($conn, "INSERT INTO utilisateur (nom, prenom, username, password, droit_dacces, id_appareil) VALUES ('$nom', '$prenom', '$username', '$password', '$droit_dacces', '$id_appareil')");
            
            if($req){
                header("Location: utilisateur.php");
                exit;
            } else {
                $message = "Erreur : utilisateur  non ajoutée";
            }
        } else {
            $message = "Veuillez remplir tous les champs";
        }
    }
    ?>
    <div class="form">
        <a href="utilisateur.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Ajouter un utilisateur</h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form action="traiter_creation_utilisateur.php" method="post">
        <form method="post">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>prenom</label>
            <input type="text" name="prenom">
            <label>username</label>
            <input type="text" name="username">
            <label>password</label>
            <input type="password" name="password"> 
            <label>Droit d'accès</label>
            <select name="droit_dacces">
                <option value="admin">Admin</option>
                <option value="utilisateur">Utilisateur</option>
                <option value="editeur">Editeur</option>
                <option value="gestoinnaire">Gestoinnaire</option>
            </select>
            <label>appareil</label>
            <input type="text" name="id_appareil">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>
