<?php
$idv=$_GET['id'];
include "functions.php";
$conn=connect();
$requette="UPDATE users SET etat=1 WHERE id='$idv'";
$resultat=$conn->query($requette);
if($resultat){
    header('location:listev.php?valider=ok');
    
}
?>