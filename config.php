

<?php

$host = 'localhost'; 
$user = 'root'; 
$password = ''; 
$db_name = 'shop_db'; 

$conn = mysqli_connect($host, $user, $password, $db_name);

if (!$conn) {
    die('La connexion a échoué : ' . mysqli_connect_error());
}
?>