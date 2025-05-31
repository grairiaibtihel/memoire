<?php
header('Content-Type: application/json');


$db = new PDO('mysql:host=localhost;dbname=shop_db', 'username', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$searchTerm = isset($_GET['q']) ? trim($_GET['q']) : '';

if (strlen($searchTerm) > 2) {
    $stmt = $db->prepare("SELECT id, titre FROM produits WHERE titre LIKE :search LIMIT 5");
    $stmt->execute([':search' => "%$searchTerm%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($results);
} else {
    echo json_encode([]);
}