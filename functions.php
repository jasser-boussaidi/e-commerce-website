<?php 
function connect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "my_database";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

function getal(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

//creat de la requette
$requette="SELECT * from categories";
// execution
$resultat=$conn->query($requette);
//resultat
$categories = $resultat->fetch_all(MYSQLI_ASSOC);

return $categories; }
function getp(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "my_database";
    
    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    
    //creat de la requette
    $requette="SELECT * from products";
    // execution
    $resultat=$conn->query($requette);
    //resultat
    $products = $resultat->fetch_all(MYSQLI_ASSOC);
    
    return $products;
}
function searchs($search) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "my_database";

    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create the query
    $requette = "SELECT * FROM products WHERE products_name LIKE '%" . $search . "%'";

    // Execute the query
    $resultat = $conn->query($requette);

    // Fetch the results
    $product = [];
    while ($row = $resultat->fetch_assoc()) {
        $product[] = $row;
    }

    // Close the connection
    $conn->close();

    return $product;
}
function getproduitById($id){
    $conn=connect();
    //creation de la requette 
    $requette="SELECT *  FROM products WHERE id=$id";
     
    $resultat=$conn->query($requette);
    $product=$resultat->fetch(PDO::FETCH_ASSOC);
    return $product;
}
function getallusers(){
    $conn=connect();
    
    $requette="SELECT *  FROM users WHERE etat=0";
     
    $resultat=$conn->query($requette);
    $users=$resultat->fetchAll();
    return $users;
}
function getstock(){
    $conn=connect();
    
    $requette="SELECT p.products_name ,s.quantite ,s.id FROM products p,stocks s WHERE p.id=s.product";
     
    $resultat=$conn->query($requette);
    $stock=$resultat->fetchAll();
    return $stock;

}
function getAllCommande(){
    $conn=connect();
    
    $requette="SELECT u.username ,u.email ,p.etat, p.totale,p.id FROM paniers p, users u WHERE p.visiteur=u.id";
     
    $resultat=$conn->query($requette);
    $commande=$resultat->fetchAll();
    return $commande;

}
function getAllx(){
    $conn=connect();
    
    $requette="SELECT p.products_name ,p.image ,c.quantite,c.panier, c.totale FROM commande c, products p WHERE c.name=p.id";
     
    $resultat=$conn->query($requette);
    $x=$resultat->fetchAll();
    return $x;
 

}
function changerPanier($data){
    $conn=connect();
    $requette="Update paniers SET etat='".$data['etat'] ."'WHERE id='".$data['panier_id']."'";
    $resultat=$conn->query($requette);
}
function getpaniers($commande,$etat){
    $paniersEtat=array();
    foreach($commande as $p){
        if($p['etat']== $etat){
            array_push($paniersEtat,$p);
        }
    }return $paniersEtat;
    
}  
function EditAdmin($data){
    $conn=connect();
    if($data['password'] !=""&& $data['email'] !=""&&$data['name'] !=""){
        
    $newPassword = $data["password"];
    $hashedPassword=password_hash($newPassword,PASSWORD_DEFAULT);
    $requette="Update admin1 SET name='".$data['name'] ."', email='".$data['email'] ."',password='".$hashedPassword ."' WHERE id='".$data['id_admin']."'";
  
    
}
else  {
    $requette="Update admin1 SET name='".$data['name'] ."', email='".$data['email'] ."' WHERE id='".$data['id_admin']."'";
    
}
$resultat=$conn->query($requette);
return true; }

function getData(){
    $conn=connect();
    $data=array();
    $requette1="SELECT COUNT(*) FROM products ";
    $resultat=$conn->query($requette1);
    $nbrprds=$resultat->fetchAll();
    
    $requette2="SELECT COUNT(*) FROM categories ";
    $resultat1=$conn->query($requette2);
    $nbrcat=$resultat1->fetchAll();

    $requette3="SELECT COUNT(*) FROM users ";
    $resultat2=$conn->query($requette3);
    $nbrclients=$resultat2->fetchAll();

    $data["produit"]=$nbrprds[0];
    $data["categories"]=$nbrcat[0];
    $data["client"]=$nbrclients[0];
    return $data;
}