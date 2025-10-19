<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

?> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magasin de Fitness</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .navbar-custom {
            background-color: #111;
        }

        .navbar-brand, .nav-link {
            color: #818181 !important;
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #f1f1f1 !important;
        }

        .search-container {
            display: flex;
            align-items: center;
            margin-left: auto;
        }

        .main-content {
            margin-top: 100px;
            padding: 16px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Change to 2 columns */
            gap: 16px;
        }

        .product-card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-custom navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="page1.php">Magasin de Fitness</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Karaté
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown"> <li><a class="dropdown-item" href="muscle.php">Équipement d'entraînement</a></li>
                        <li><a class="dropdown-item" href="karate.php">Karaté</a></li>
                        <li><a class="dropdown-item" href="box.php">Boxe</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary me-2" href="signup.php">S'inscrire</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary" href="login.php">Connexion</a>
                </li>
            </ul>
            <form class="d-flex search-container" role="search">
                <input class="form-control me-2" type="search" placeholder="Rechercher ici" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
        </div>
    </div>
</nav>

    <div class="main-content">
        <h2>Notre équipement d'entraînement premium</h2>
        <h3>Parcourez nos outils de fitness de qualité supérieure conçus pour améliorer vos performances</h3>
        
        <div class="product-grid">
            <div class="card product-card">
                <img src="a/kimono-karate-500-adulte.avif" class="card-img-top" alt="Kimono de Karaté">
                <div class="card-body">
                    <h5 class="card-title">Kimono de Karaté - Adulte</h5>
                    <p class="card-text">Tenue de karaté premium pour les professionnels.</p>
                    <p class="price text-danger">160.00 DT</p>
                    <a href="#" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="card product-card">
                <img src="a/protege-tibia-pied-karate-900-rouge.avif" class="card-img-top" alt="Protège-tibia de Karaté">
                <div class="card-body">
                    <h5 class="card-title">Protège-tibia de Karaté - Rouge</h5>
                    <p class="card-text">Protection renforcée pour les artistes martiaux.</p>
                    <p class="price text-danger">99.00 DT</p>
                    <a href="#" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="card product-card">
                <img src="a/Owari-Satin-Karate-Black-Belt-Martial-Arts-b.avif" class="card-img-top" alt="Ceinture noire de Karaté">
                <div class="card-body">
                    <h5 class="card-title">Ceinture noire de Karaté Owari Deluxe 100% Satin</h5>
                    <p class="card-text">Approuvée par la WT
                        Conçue pour une protection totale du visage.</p>
                    <p class="price text-danger">59.00 DT</p>
                    <a href="#" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="card product-card">
                <img src="a/71moqrBKJDL._AC_SX679_.jpg" class="card-img-top" alt="Pads d'entraînement de Karaté">
                <div class="card-body">
                    <h5 class="card-title">Pads d'entraînement de Karaté</h5>
                    <p class="card-text">Comprend 4 pads de taekwondo, un excellent choix pour pratiquer les coups bas et hauts.</p>
                    <p class="price text-danger">109.00 DT</p>
                    <a href="#" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
           
        </div>
    </div>

<footer class="mt-5 bg-dark text-light text-center p-3">
    <p>&copy; 2024 Magasin de Fitness. Tous droits réservés.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>