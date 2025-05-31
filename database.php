
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "review_system";


$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    die("Erreur " . $conn->connect_error);
}


$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE) {
    die("Les données sont invalides. Veuillez réessayer." . $conn->error);
}



$conn->select_db($dbname);


$sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    rating INT(1) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
    die("Erreur" . $conn->error);
}
?>

