<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include "functions.php";
    $conn = connect();

    $requette = "DELETE FROM categories WHERE id='$id'";
    $resultat = $conn->query($requette);

    if ($resultat) {
        header('location:category.php?delete=ok');
    } else {
        header('location:category.php?delete=error');
    }
}
?>
