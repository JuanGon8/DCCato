<?php
// fetch_record.php

// Replace these with your actual database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "sistema";

// Create a database connection
$connection = new mysqli($host, $username, $password, $database);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve data based on the provided codigo
$codigo = $_POST['codigo'];
$query = "SELECT * FROM reclutamiento WHERE codigo = '$codigo'";
$result = $connection->query($query);

if ($row = $result->fetch_assoc()) {
    include 'modal_editar.php';
} else {
    echo "Record not found";
}

// Close the database connection
$connection->close();
?>
