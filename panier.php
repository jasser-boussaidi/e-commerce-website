<?php
session_start();
if (!isset($_SESSION['nom'])) {
    header('location:login.php');
}
$total = 0;
$commande = array();
if (isset($_SESSION['panier']) && is_array($_SESSION['panier'][2]) && count($_SESSION['panier'][2]) > 0) {
    $commande = $_SESSION['panier'][2];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion réussie</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.5/sweetalert2.css">
</head>
<style>
    .a {
        margin-top: 40px;
    }
</style>
<body>
<?php
include "nav.php";
?>

<div class="row col-12 mt-4 p-5">
    <h1>Panier de l'utilisateur</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Produit</th>
                <th scope="col">Quantité</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($commande as $index => $commandes) {
                print '<tr>
                    <th scope="row">' . ($index + 1) . '</th>
                    <td>' . $commandes[3] . '</td>
                    <td>' . $commandes[0] . ' Pièces</td>
                    <td>' . $commandes[1] . ' DT</td>
                    <td><a href="delete_panier.php?id=' . $index . '" class="btn btn-danger">Supprimer</a></td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
    <div class="text-end">
        <h3>Total : <?php if (isset($_SESSION['panier'])) { $total = $_SESSION['panier'][1]; }
        echo $total; ?> DT</h3>
        <hr/>
        <a href="valider.php" class="btn btn-success" style="width:100px">Valider</a>
    </div>
</div>

<?php
include "footer.php";
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.5/sweetalert2.all.min.js"></script>
</body>
</html>