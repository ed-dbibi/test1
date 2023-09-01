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
    include_once "connection.php";
    
    // Assurez-vous que $id est défini avant d'exécuter la requête
    if(isset($_GET['idemp'])){
        $idemp = $_GET['idemp'];
        $req = mysqli_query($conn , "SELECT * FROM employe WHERE idemp = $idemp");
        $row = mysqli_fetch_assoc($req);
    } else {
        // Gérer le cas où $id n'est pas défini
        $row = array('cin' => '', 'nom' => '', 'prenom' => '', 'date_embauche' => '', 'tel' => '', 'adresse' => '', 'date_naissance' => '', 'role' => '', 'rendement' => '', 'id_serre' => '');
    }

    $message = ""; // Initialisez la variable $message à une chaîne vide

    if(isset($_POST['button'])){
        extract($_POST);

        // Utilisez des requêtes préparées pour éviter les problèmes de sécurité et d'insertion
        $stmt = mysqli_prepare($conn, "UPDATE employe SET cin = ?, nom = ?, prenom = ?, date_embauche = ?, tel = ?, adresse = ?, date_naissance = ?, role = ?, rendement = ?, id_serre = ? WHERE idemp = ?");
        mysqli_stmt_bind_param($stmt, "ssssssssssi", $cin, $nom, $prenom, $date_embauche, $tel, $adresse, $date_naissance, $role,  $rendement, $id_serre, $idemp);

        if(mysqli_stmt_execute($stmt)){
            header("Location:employer.php");
            exit;
        } else {
            $message = "Aucune modification";
        }

        mysqli_stmt_close($stmt);
    }
    ?>

    <div class="form">
        <a href="employer.php" class="back_btn"> <img src="retour.png"> </a>
        <h2>Modifier</h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form method="post">
            <label>cin</label>
            <input type="text" name="cin" value="<?= $row['cin'] ?>">
            
            <label>nom</label>
            <input type="text" name="nom" value="<?= $row['nom'] ?>">
            <label>prenom</label>
            <input type="text" name="prenom" value="<?= $row['prenom'] ?>">
            <label>date_embauche</label>
            <input type="date" name="date_embauche" value="<?= $row['date_embauche'] ?>">
            <label>tel</label>
            <input type="text" name="tel" value="<?= $row['tel'] ?>">
            <label>adresse</label>
            <input type="text" name="adresse" value="<?= $row['adresse'] ?>">
            <label>date_naissance</label>
            <input type="date" name="date_naissance" value="<?= $row['date_naissance'] ?>">
            <label>role</label>
            <input type="text" name="role" value="<?= $row['role'] ?>">
            
            
            
            <label>rendement</label>
            <input type="text" name="rendement" value="<?= $row['rendement'] ?>">
            
            <label>serre</label>
            <input type="text" name="id_serre" value="<?= $row['id_serre'] ?>">
           
            <input type="hidden" name="idemp" value="<?= $idemp ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>

</body>
</html>