<?php
session_start();


if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel d'administration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['firstName']); ?>!</h1>
            <a href="logout.php" class="logout-btn">Déconnexion</a>
        </header>
        
        <div class="admin-content">
            <div class="user-info">
                <p><strong>Nom complet:</strong> <?php echo htmlspecialchars($_SESSION['firstName'] . ' ' . $_SESSION['lastName']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
            </div>
            
          
        </div>
    </div>
</body>
</html>