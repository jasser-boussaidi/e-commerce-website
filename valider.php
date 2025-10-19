<?php
include"functions.php";
$conn=connect();
session_start();
$visiteur=$_SESSION['id'];
$total=$_SESSION['panier'][1];


$requettep="INSERT INTO paniers(visiteur,totale) VALUES('$visiteur','$total')";
$resultat=$conn->query($requettep);
$conn->lastInsertId();
 $panier_id=$conn->lastInsertId();
$commandes=$_SESSION['panier']['2'];
foreach($commandes as $commande){
$quantite=$commande[0];
$total=$commande[1];
$pro=$commande[2];


$requette="INSERT INTO commande(quantite,name,totale,panier) VALUES('$quantite','$pro','$total',$panier_id)";
$resultat=$conn->query($requette);
}
$_SESSION['panier']=null;
header('location:panier.php');
?>