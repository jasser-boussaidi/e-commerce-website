<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    include "functions.php";
    $conn = connect();

    
    $requette = "INSERT INTO categories (name, description) VALUES ('$name', '$description')";
    $resultat = $conn->query($requette);

    if ($resultat) {
        header('location:category.php?ajout=ok');
    } else {
        header('location:category.php?ajout=error');
    }
}
?>
