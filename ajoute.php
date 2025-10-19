<?php
session_start();
$nom=$_POST['name'];
$description=$_POST['description'];
$price=$_POST['price'];

$cquantite=$_POST['quantite'];
$createur=1;

//upload image 

$target_dir = "a/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $imag=$_FILES["image"]["name"];
} else {
    echo "Sorry, there was an error uploading your file.";
  }

//dsq
include "functions.php";
$conn=connect();
$requette="INSERT INTO products(products_name,products_description,products_price,image) VALUES('$nom','$description','$price','$imag')";

$resutat=$conn->query($requette);

if($resutat){
    $produit_id=$conn->lastInsertId();
$requette2="INSERT INTO stocks(product,quantite,createur) VALUES('$produit_id','$cquantite',$createur)";
if($conn->query($requette2)){
    header('location:liste.php?ajout=ok');

}else{
    echo"impossible";
}
    
}
?>