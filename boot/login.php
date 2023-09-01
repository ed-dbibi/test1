<?php
session_start();
include "connection.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header("Location: index.php?error=username is required");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error=password is required");
        exit();
    } else {
        $sql = "SELECT * FROM utilisateur WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['droit_dacces'] = $row['droit_dacces']; // Stockez le droit d'accès dans la session.

                // Redirigez l'utilisateur en fonction de son droit d'accès.
                if ($row['droit_dacces'] == '0') {
                    header("location: index.html"); // Page pour les administrateurs.
                    exit();
                } elseif ($row['droit_dacces'] == '4') {
                    header("location: user.php"); // Page pour les utilisateurs.
                    exit();
                } else {
                    // Gérez d'autres droits d'accès ici si nécessaire.
                }
            } else {
                header("location: index.php?error=incorrect username or password");
                exit();
            }
        } else {
            header("location: index.php?error=incorrect username or password");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
