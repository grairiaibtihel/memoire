<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: demande_code.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nouveau_mdp = $_POST['password'];
    $email = $_SESSION['email'];

    $pdo = new PDO('mysql:host=localhost;dbname=shop_db', 'root', '');
    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->execute([password_hash($nouveau_mdp, PASSWORD_DEFAULT), $email]);

    session_destroy();
    header("Location: admin_panel.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Changer le mot de passe</title>
     <link rel="stylesheet" href="/css/style_demande.css">
</head>
<body>
    <form method="POST">
        <h3>Nouveau mot de passe</h3>
        <input type="password" name="password" required>
        <button type="submit">Changer</button>
    </form>
</body>
</html>