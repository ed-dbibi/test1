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
if(isset($_POST['button'])){
    $cin = $_POST['cin'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_embauche = $_POST['date_embauche'];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];
    $date_naissance = $_POST['date_naissance'];
    $role = $_POST['role'];
    $rendement = $_POST['rendement'];
    $id_serre = $_POST['id_serre'];

    if(!empty($cin) && !empty($nom) && !empty($prenom) && !empty($date_embauche) && !empty($tel) && !empty($adresse) && !empty($date_naissance) && !empty($role) && !empty($rendement) && !empty($id_serre)){
        include_once "connection.php";
        $query = "INSERT INTO employe (cin, nom, prenom, date_embauche, tel, adresse, date_naissance, role, rendement, id_serre) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        
        mysqli_stmt_bind_param($stmt, "sssssssssi", $cin, $nom, $prenom, $date_embauche, $tel, $adresse, $date_naissance, $role, $rendement, $id_serre);

        if(mysqli_stmt_execute($stmt)){
            header("location: employer.php");
            exit;
        }else{
            $message = "employe non ajouté";
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }else{
        $message = "Veuillez remplir tous les champs !";
    }
}
?>
<!-- Le reste de votre code HTML -->


    <div class="form">
        <a href="employer.php"class="back_btn"><img src="retour.png"></a>
     
        <h2>ajouter un employer</h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo "$message";
            }

            
            
            
            ?>
            
        </p>
        <form action="" method="POST">
        <label>cin</label>
        <input type="text" name="cin">
        <label>nom</label>
        <input type="text" name="nom">
        <label>prenom</label>
        <input type="text" name="prenom">
        <label>date d'embauche</label>
        <input type="date" name="date_embauche">
        <label>tel</label>
        <input type="text" name="tel">
        <label>adresse</label>
        <input type="text" name="adresse">
        <label>date de naissance</label>
        <input type="date" name="date_naissance">
        <label>role</label>
        <input type="text" name="role">
        <label>rendement</label>
        <input type="text" name="rendement">
        <label>serre</label>
        <input type="text" name="id_serre">
        <input type="submit" value="Ajouter" name="button">
        </form>
        

    </div>

</body>
    