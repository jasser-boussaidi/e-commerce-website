<?php 

include"functions.php";
$conn=connect();
session_start();
$id_produit=$_POST['produit'];
$quantite=$_POST['quantite'];
$requette="SELECT products_price , products_name FROM products WHERE id='$id_produit'";
$resultat=$conn->query($requette);
 $produit=$resultat->fetch();

$total=$quantite * $produit['products_price'];

$visiteur=$_SESSION['id'];
if(!isset($_SESSION['panier'])){
    $_SESSION['panier']=array($visiteur,0,array());

}
$_SESSION['panier'][1]+=$total;
$_SESSION['panier'][2][]=array($quantite,$total,$id_produit, $produit['products_name']);

header('location:panier.php');
?>