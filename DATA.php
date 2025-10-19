<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products_db";

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data
$sql = "INSERT INTO products (product_name, product_price, product_description)
VALUES ('Product 1', 15.99, 'Description for Product 1')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . $conn->error;
}

// Close connection
$conn->close();
?>
