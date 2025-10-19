<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idc'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $img=$_POST['img'];


    include "functions.php";
    $conn = connect();

    
    $requette = "UPDATE products SET products_name='$name', products_description='$description', products_price='$price' ,image='$img' WHERE id='$id'";
    $resultat = $conn->query($requette);

    if ($resultat) {
        header('location:liste.php?modify=ok');
    }
}
?>
