<?php
session_start();
include "functions.php";
$commande = getAllCommande(); 
$commande1 = getAllx(); 
if(isset($_POST['a'])){
  changerPanier($_POST);
  header('location:cot.php');
}

if(isset($_POST['search'])){
  
  if($_POST['etat']=="tout"){
    $commande=getAllCommande();
  }else{
  $commande=getpaniers($commande,$_POST['etat']);
}

}
?><?php

if (!isset($_SESSION['nom'])){
    header('location:admin.php');
}
?>
<!doctype html>
<html lang="fr">
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

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
                <a class="nav-link " href="category.php">
                  <span data-feather="file"></span> Catégories
                </a>
              </li>
              <li class="nav-item">
                <a href="liste.php" class="nav-link" href="product.php">
                  <span data-feather="shopping-cart"></span> Produits
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="listev.php">
                  <span data-feather="users"></span> Clients
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="stock.php">
                  <span data-feather="bar-chart-2"></span> Stock
                </a>
                
          <li class="nav-item">
            <a class="nav-link active" href="cot.php">
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
            <h1 class="h2">Liste des commandes</h1>
          
          </div>

          <form action="cot.php" method="post"> 
    <div class="form-group d-flex">
        <select name="etat" class="form-control">
            <option value="">--Choisir l'état--</option>
            <option value="tout">Tout</option>
            <option value="en cours">En cours</option>
            <option value="en livraison">En livraison</option>
            <option value="livraison termine">Livraison terminée</option>
        </select>
        <button type="submit" name="search" class="btn btn-primary">Rechercher</button>
    </div>
</form>
<br>
          <div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Client</th>
                  <th scope="col">Total</th>
                  <th scope="col">Email</th>
                  <th scope="col">État</th>
                  <th scope="col">Action</th>
                  
                
                </tr>
              </thead>
              <tbody>
              <?php
$i = 1; 
foreach ($commande as $c) {
    echo '  
    <tr>
        <th scope="row">'.$i.'</th>
        <td>'.$c['username'].'</td>
        <td>'.$c['totale'].'DT</td>
        <td>'.$c['email'].'</td>
        <td>'.$c['etat'].'</td>
         <td>   <a   data-bs-toggle="modal" data-bs-target="#commandes'.$c['id'].'"  class="btn btn-success">Afficher</a>  
         
         <a   data-bs-toggle="modal"   data-bs-target="#traiter'.$c['id'].'"  class="btn btn-primary">Traiter</a>  
         </td>

   
    </tr>';
    $i++;
}
?>           

</tbody> 
            </table>


<?php
foreach ($commande as $index => $c) {
  print '
  <!-- Modal modify -->
  <div class="modal fade" id="commandes' . $c['id'] . '" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="modal-header">
          <h5 class="modal-title" id="modifyModalLabel">Liste des commandes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"> </button>
        </div>
        <div class="modal-body">
          
            <table class="table">
            <thead>
              <tr>
                <th>Nom du produit</th>
                <th>Image</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Panier</th>
              </tr>
            </thead>
            <tbody>';
      
            foreach ($commande1 as $index1 => $c1) {
              if($c1['panier']==$c['id']){
              print '
              <tr>
                <td>' . $c1['products_name'] . '</td>
                <td><img src="a/' . $c1['image'] . '" alt="Image" style="width:50px;height:50px;"></td>
                <td>' . $c1['quantite'] . '</td>
                <td>' . $c1['totale'] . 'DT</td>
                <td>' . $c1['panier'] . '</td>
              </tr>'; } }
            

  print '
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>';
} 
foreach ($commande as $index => $c) {
  print '
  <!-- Modal modify -->
  <div class="modal fade" id="traiter' . $c['id'] . '" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="modal-header">
          <h5 class="modal-title" id="modifyModalLabel">Traiter la commande</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"> </button>
        </div>
        <div class="modal-body">
       <form action="cot.php" method="post">
<input type="hidden" value="' . $c['id'] . '" name="panier_id">
    <div class="form-group">
        <label for="etat">État de la livraison</label>
        <select name="etat" id="etat" class="form-control">
            <option value="en livraison">En livraison</option>
            <option value="livraison termine">Livraison terminée</option> 
        </select> <br>
    </div>
    <div class="form-group">
        <button type="submit" name="a" class="btn btn-primary">Sauvegarder</button>
    </div>
</form>

        </div>
      </div>
    </div>
  </div>
  ';
} 
?>
                
          </div>
        </main>
      </div>
    </div>

 
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="js/dashboard.js"></script>


    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>