<?php 
session_start();
$id=$_GET['id'];
var_dump(($_SESSION['panier'][1]));
$totale_p=$_SESSION['panier'][2][$id][1];
$_SESSION['panier'][1]-=$totale_p;
var_dump(($_SESSION['panier'][2]));

unset($_SESSION['panier'][2][$id]);//delete
header('location:panier.php');
?>