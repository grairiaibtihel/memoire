

<?php

$host = "localhost"; 
$user = "root";      
$pass = "";          
$db = "shop_db"; 


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>