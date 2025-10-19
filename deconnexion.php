<?php
session_start();
session_unset();//supprimer
session_destroy();//drope

header('location:page1.php');
?>