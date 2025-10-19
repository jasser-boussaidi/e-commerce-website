<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<?php
include "nav.php";

if (isset($_GET['id'])) {
    $produit = getproduitById($_GET['id']);
}

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

</div> 
</div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="card col-8 offset-2">
    <?php if (isset($_SESSION['etat']) && $_SESSION['etat'] == 0) {
        print '
        <div class="alert alert-danger">Compte non validé</div>';
    } ?>
    <?php if (empty($_SESSION['nom'])) {
        print '
        <div class="alert alert-danger">Créez un compte</div>';
    } ?>

    <img src="a/<?php echo $produit['image'] ?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?php echo $produit['products_name'] ?></h5>
        <p class="card-text"><?php echo $produit['products_description'] ?></p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><?php echo $produit['products_price'] ?> DT</li>
    </ul>
    <div class="col-12">
        <form class="d-flex" action="commande.php" method="POST">
            <input type="hidden" name="produit" value="<?php echo $produit['id'] ?>">
            <input type="number" name="quantite" class="fore-control" placeholder="Quantité de produit">
            <button 
                type="submit" 
                <?php if (empty($_SESSION['nom'])) { echo 'disabled'; } ?> 
                <?php if (isset($_SESSION['etat']) && $_SESSION['etat'] == 0) { echo 'disabled'; } ?> 
                class="btn btn-primary">
                Commander
            </button>
        </form>
    </div>
</div>

<footer class="mt-5 bg-dark text-light text-center p-3">
    <p>&copy; 2024 Magasin de Fitness. Tous droits réservés.</p>
</footer>