<?php 
include "functions.php";
$categories = getal();
$products = getp();
session_start();
?>
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
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .product-card img {
        height: 200px;
        object-fit: cover;
    }
</style>
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
                        Catégories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        foreach ($categories as $categorie) {
                            echo '<li><a class="dropdown-item" href="' . $categorie['link'] . '">' . $categorie['name'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <?php
                if (isset($_SESSION['nom'])) {
                    print '
                    <li class="nav-item">
                        <a class="btn btn-outline-primary me-2" href="profile.php">Profil</a>
                    </li>';
                    if (isset($_SESSION['panier'][2]) && is_array($_SESSION['panier'][2])) {
                        print '
                        <li class="nav-item">
                            <a class="btn btn-outline-primary me-2" href="panier.php">Panier<span class="text-danger">(' . count($_SESSION['panier'][2]) . ')</span></a>
                        </li>';
                    } else {
                        print '
                        <li class="nav-item">
                            <a class="btn btn-outline-primary me-2" href="panier.php">Panier<span class="text-danger">(0)</span></a>
                        </li>';
                    }
                } else {
                    print '
                    <li class="nav-item">
                        <a class="btn btn-outline-primary me-2" href="signup.php">S\'inscrire</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary" href="login.php">Connexion</a>
                    </li>';
                }
                ?>
            </ul>
            <?php
            if (!empty($_POST)) {
                if (isset($_POST['search1'])) {
                    echo $_POST['search1'];
                    $products = searchs($_POST['search1']);
                }
            }
            ?>
            <form class="d-flex search-container" role="search" action="page1.php" method="POST">
                <input class="form-control me-2" type="search" name="search1" placeholder="Rechercher ici" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
            <?php
            if (isset($_SESSION['nom'])) {
                print '
                <a href="deconnexion.php" class="btn btn-primary">Déconnexion</a>';
            }
            ?>
        </div> 
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>