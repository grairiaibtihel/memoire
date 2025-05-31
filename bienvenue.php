


<?php
session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h1 class="form-title">Bienvenue <?php echo isset($_SESSION['firstName']) ? $_SESSION['firstName'] : ''; ?>!</h1>
            <p style="text-align: center; margin-bottom: 20px;">
                Votre inscription a été effectuée avec succès.
            </p>
            <div style="text-align: center;">
                <a href="admin_panel.php" class="btn" style="display: inline-block; max-width: 200px; text-decoration: none;">
                    Continuer vers votre compte
                </a>
            </div>
        </div>
    </div>
</body>
</html>