<?php
include "functions.php";
session_start();
if (isset($_POST['btnedit'])) {
    if (EditAdmin($_POST)) {
        $_SESSION['nom'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
        
    }
}
?>
<?php
if (!isset($_SESSION['nom'])||!isset($_SESSION['role'])) {
    header('location:admin.php');
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Tableau de bord · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Magasin de Fitness</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="deconnexion.php">Déconnexion</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php">
                            <span data-feather="home"></span>
                            Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">
                            <span data-feather="file"></span>
                            Catégories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="liste.php">
                            <span data-feather="shopping-cart"></span>
                            Produits
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listev.php">
                            <span data-feather="users"></span>
                            Clients
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stock.php">
                            <span data-feather="bar-chart-2"></span>
                            Stock
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cot.php">
                            <span data-feather="shopping-cart"></span>
                            Les commandes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="layers"></span>
                            Profil
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Profil</h1>
                <div>
                    <?php
                    echo $_SESSION['nom'];
                    ?>
                </div>
            </div>
            <div class="contrainer">
                <h1>Nom : <span class="text-primary"><?php echo $_SESSION['nom']; ?></span></h1>
                <h1>Email : <span class="text-primary"><?php echo $_SESSION['email']; ?></span></h1>
                <a data-bs-toggle="modal" data-bs-target="#profileEdit" class="btn btn-primary">Modifier</a>
            </div>

            <!-- Modal modify -->
            <div class="modal fade" id="profileEdit" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modifyModalLabel">Modifier le profil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <form action="profileA.php" method="post">
                                <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="id_admin">
                                <div class="form-group">
                                    <input type="text" name="name" value="<?php echo $_SESSION['nom']; ?>" class="form-control" placeholder="Entrez votre nom...">
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control" placeholder="Entrez votre email...">
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe...">
                                </div>
                                <br>
                                <button type="submit" name="btnedit" class="btn btn-primary">Sauvegarder</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="js/dashboard.js"></script>
</body>
</html>