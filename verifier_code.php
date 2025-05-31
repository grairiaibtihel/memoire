<?php
session_start();
$code_test = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code_saisi = $_POST['code'];
    if ($code_saisi == $_SESSION['code']) {
        header("Location: changer_motdepasse.php");
        exit();
    } else {
        $erreur = "Code incorrect.";
    }
}
$code_test = $_SESSION['code'] ?? '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérification du code</title>
    <link rel="stylesheet" href="/css/style_demande.css">
</head>
<body>
    <form method="POST">
        <h3>Vérifiez le code</h3>

        <?php if (!empty($code_test)) { ?>
            <div class="message">Code de test : <strong><?php echo $code_test; ?></strong></div>
        <?php } ?>

        <?php if (isset($erreur)) { ?>
            <div class="erreur"><?php echo $erreur; ?></div>
        <?php } ?>

        <label for="code">Entrez le code reçu :</label>
        <input type="text" name="code" required>

        <button type="submit">Vérifier</button>
    </form>
</body>
</html>