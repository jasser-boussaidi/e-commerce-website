<?php
include "functions.php";
$idp=$_GET['idc'];
$conn=connect();
$requtte="DELETE FROM products WHERE id='$idp'";
$resultat=$conn->query($requtte);
if($resultat){
    header('location:liste.php?delete=ok');
}
?>