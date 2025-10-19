<?php
session_start();
include "functions.php";
$categorie = getal(); 
?><?php

if (!isset($_SESSION['nom'])){
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
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
                <a class="nav-link" href="home.php">
                  <span data-feather="home"></span> Accueil
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="category.php">
                  <span data-feather="file"></span> Catégories
                </a>
              </li>
              <li class="nav-item">
                <a href="liste.php" class="nav-link" href="product.php">
                  <span data-feather="shopping-cart"></span> Produits
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="listev.php">
                  <span data-feather="users"></span> Clients
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="stock.php">
                  <span data-feather="bar-chart-2"></span> Stock
                </a>
                
          <li class="nav-item">
            <a class="nav-link" href="cot.php">
              <span data-feather="shopping-cart"></span>
              Les commandes
            </a>
          </li>
              </li>
              <li class="nav-item">
                <a href="profileA.php"class="nav-link" href="profileA.php">
                  <span data-feather="layers"></span> Profil
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Catégories</h1>
            <div>
              <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">AJOUTER</a>
            </div>
          </div>

          <?php
          if (isset($_GET['ajout']) && $_GET['ajout'] == 'ok') {
              echo '<div class="alert alert-success">Catégorie ajoutée avec succès</div>';
          }
          if (isset($_GET['delete']) && $_GET['delete'] == 'ok') {
              echo '<div class="alert alert-success">Catégorie supprimée avec succès</div>';
          }
          if (isset($_GET['modify']) && $_GET['modify'] == 'ok') {
              echo '<div class="alert alert-success">Catégorie modifiée avec succès</div>';
          }
          ?>

          <div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($categorie as $category) {
                    $i++;
                    echo '<tr>
                          <th scope="row">'.$i.'</th>
                          <td>'.$category['name'].'</td>
                          <td>'.$category['description'].'</td>
                          <td>
                            <a data-bs-toggle="modal" data-bs-target="#editCategory'.$category['id'].'" class="btn btn-success">Modifier</a>
                            <a href="delete_category.php?id='.$category['id'].'" class="btn btn-danger">Supprimer</a>
                          </td>
                        </tr>';
                }
                ?>
              </tbody> 
            </table>
          </div>
        </main>
      </div>
    </div>

    <?php
    foreach ($categorie as $category) {
        echo '
        <div class="modal fade" id="editCategory'.$category['id'].'" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Modifier la catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
              </div>
              <div class="modal-body">
                <form action="modify_category.php" method="post">
                  <input type="hidden" name="id" value="'.$category['id'].'" /> 
                  <div class="form-group">
                    <input type="text" name="name" value="'.$category['name'].'" class="form-control" placeholder="Nom de la catégorie..." required>
                  </div>
                  <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="Description..." required>'.$category['description'].'</textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>';
    }
    ?>

    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addCategoryModalLabel">Ajouter une catégorie</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
          </div>
          <div class="modal-body">
            <form action="add_category.php" method="post">
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Nom de la catégorie..." required>
              </div>
              <div class="form-group">
                <textarea name="description" class="form-control" placeholder="Description..." required></textarea>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Ajouter</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="js/dashboard.js"></script>


    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>