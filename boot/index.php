<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
    </head>
    <div class="logo">
    </div>            
    <body id="loginbody">
        <div class="container">
            <div class="loginheader">
            <img src="images/logo.png" alt="Logo Agriberry">
                
                <h3>agricultural production management system</h3>
            
            </div>
            <div class="loginbody">
                <form action="login.php" method="POST">
                <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?> 
                      
            
                    <div class="logininputcontainer">
                        <label for="">username</label>
                        <input placeholder="username" name="username" type="text" />
                    </div>
                    <div class="logininputcontainer">
                        <label for="">password</label>
                        <input placeholder="password" name="password" type="password" />
                    </div>
                    <div class="loginbuttoncontainer">
                        <button>login</button>
                    </div>
                </form>
            </div>
        </div>
        <style>
            .loginheader {
  text-align: center; /* Centre le contenu horizontalement */
}

/* Sélectionnez l'élément img à l'intérieur de .loginheader (votre logo) */
.loginheader img {
  width: 400px; /* Définissez la largeur souhaitée, par exemple 200 pixels */
  height: auto; /* Conservez le rapport hauteur/largeur original */
}

        </style>
    </body>
</html> 