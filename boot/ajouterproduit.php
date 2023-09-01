<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion des produits</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php
    if(isset($_POST['button'])){
        // Connexion à la base de données
        include_once "connection.php";
        include_once "home.php";

        // Loop through the submitted products
        foreach($_POST['products'] as $product){
            $nom_commercial = $product['nom_commercial'];
            $prix = $product['prix'];
            $unite = $product['unite'];
            $doses = $product['doses'];

            // Check if any of the fields are empty for this product
            if(!empty($nom_commercial) && !empty($prix) && !empty($unite) && !empty($doses)){
                $req = mysqli_query($conn, "INSERT INTO produit (nom_commercial, prix, unite, doses) VALUES ('$nom_commercial', '$prix', '$unite', '$doses')");
                
                if(!$req){
                    $message = "Erreur : produit non ajouté";
                    break; // If one product fails to insert, stop the loop
                }
            } else {
                $message = "Veuillez remplir tous les champs pour chaque produit";
                break; // If one product has missing fields, stop the loop
            }
        }
        
        if(!isset($message)){
            header("Location: produit.php");
            exit;
        }
    }
    ?>
    <div class="form">
        <a href="produit.php" class="back_btn"> <img src="images/retour.png"> </a>
        <h2>Ajouter des produits</h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form method="post">
            <div id="products-container">
                <!-- Initial product input fields -->
                <div class="product">
                    <label>Nom commercial</label>
                    <input type="text" name="products[0][nom_commercial]">
                    <div class="row">
                        <div class="col">
                            <label>Prix</label>
                            <input type="text" name="products[0][prix]">
                        </div>
                        <div class="col">
                            <label>Unité</label>
                            <input type="text" name="products[0][unite]">
                        </div>
                    </div>
                    <label>Doses</label>
                    <input type="text" name="products[0][doses]">
                </div>
            </div>
            <button type="button" onclick="addProduct()">Ajouter un produit</button>
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>

    <script>
        let productCount = 1; // Start with 1 since the first one is already in the HTML

        function addProduct() {
            const productsContainer = document.getElementById("products-container");
            const newProductDiv = document.createElement("div");
            newProductDiv.classList.add("product");
            newProductDiv.innerHTML = `
                <label>Nom commercial</label>
                <input type="text" name="products[${productCount}][nom_commercial]">
                <div class="row">
                    <div class="col">
                        <label>Prix</label>
                        <input type="text" name="products[${productCount}][prix]">
                    </div>
                    <div class="col">
                        <label>Unité</label>
                        <input type="text" name="products[${productCount}][unite]">
                    </div>
                </div>
                <label>Doses</label>
                <input type="text" name="products[${productCount}][doses]">
            `;
            productsContainer.appendChild(newProductDiv);
            productCount++;
        }
    </script>
</body>
</html>

