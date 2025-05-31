<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $code = rand(100000, 999999);

  
    $_SESSION['code'] = $code;
    $_SESSION['email'] = $email;

   

    header("Location: verifier_code.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Demander le code</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="/css/style_demande.css">
</head>


<header class="main-header">
    <div class="header-content">
        <div class="logo">
            <a href="#">Compte</a>
        </div>
        <nav class="main-nav">
            <ul >
                 <a href="page1.php"><i class="fas fa-home"></i> </a>
                 <a href="index.php"><i class="fas fa-user"></i></a>
                    
            </ul>
        </nav>
    </div>
</header>
<body>
    
    <form method="POST">
        <h3>Entrez votre email :</h3>
        <input type="email" name="email" required>
        <button type="submit">Envoyer</button>
        
        
    </form>
     
</body>
</html>