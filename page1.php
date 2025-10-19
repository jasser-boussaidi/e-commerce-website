<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";
session_start();

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Création de la requête
$requette = "SELECT * FROM categories";
// Exécution de la requête
$resultat = $conn->query($requette);
// Récupération des résultats
$categories = $resultat->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magasin de Fitness</title>
</head>
<body>
<?php
    include "nav.php"; // Inclusion du fichier de navigation
    ?>
    <div class="main-content">
        <h2>Présentation des produits</h2>
        <h3>Découvrez notre sélection de produits</h3>
        
        <div class="product-grid">
            
        <?php
        // Affichage des produits avec foreach
        foreach($products as $product) {
            echo '
            <div class="card product-card">
                <img src="a/' . $product['image'] . '" class="card-img-top" alt="' . $product['products_name'] . '">
                <div class="card-body">
                    <h5 class="card-title">' . $product['products_name'] . '</h5>
                    <p class="card-text">' . $product['products_description'] . '</p>
                    <p class="price text-danger">' . $product['products_price'] . ' DT</p>
                    <a href="produit.php?id=' . $product['id'] . '" class="btn btn-primary">Voir plus</a>
                </div>
            </div>';
        }
        ?>
        </div>
    </div>

<footer class="mt-5 bg-dark text-light text-center p-3">
    <p>&copy; 2024 Magasin de Fitness. Tous droits réservés.</p>
</footer>

</body>
</html>