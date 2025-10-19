<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; 
    $quantite = $_POST['quantite'];
  

    include "functions.php";
    $conn = connect();


    $requette = "UPDATE stocks SET quantite='$quantite' WHERE id='$id'";
    $resultat = $conn->query($requette);

    if ($resultat) {
        header('location:stock.php?modify=ok');
    }
}
?>
