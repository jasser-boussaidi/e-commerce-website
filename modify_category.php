<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; 
    $name = $_POST['name'];
    $description = $_POST['description'];

    include "functions.php";
    $conn = connect();

    
    $requette = "UPDATE categories SET name='$name', description='$description' WHERE id='$id'";
    $resultat = $conn->query($requette);

    if ($resultat) {
        header('location:category.php?modify=ok');
    } else {
        header('location:category.php?modify=error');
    }
}

?>
