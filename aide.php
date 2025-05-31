<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Aide - Foire aux questions</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff;
      margin: 0;
      padding: 20px;
      color: #333;
    }

    .container {
      max-width: 800px;
      margin: auto;
    }

    h1 {
      text-align: center;
      color: #e91e63;
    }

    .question {
      margin-top: 30px;
    }

    .question h2 {
      font-size: 18px;
      color: #555;
    }

    .question p {
      font-size: 16px;
      line-height: 1.6;
    }



   
     * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Tajawal', Arial, sans-serif;
    }
    
    
    .main-header {
      width: 100%;
      background: white;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
      padding: 12px 5%;
    }
    
    .header-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1400px;
      margin: 0 auto;
    }
    
    .logo {
      font-size: 26px;
      font-weight: 700;
      color: #FC929E;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    
    .logo:before {
      
      font-size: 28px;
    }
    
    .main-nav {
      display: flex;
      align-items: center;
    }
    
    .nav-links {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
      gap: 25px;
    }
    
    .nav-links li {
      position: relative;
    }
    
    .nav-links a {
      color: #333;
      text-decoration: none;
      font-weight: 600;
      font-size: 16px;
      transition: all 0.3s ease;
      padding: 8px 0;
      display: block;
    }
    
    .nav-links a:hover {
      color: #FC929E;
    }
    
    .nav-links a.active {
      color: #FC929E;
      font-weight: 700;
    }
    
    .nav-links a:after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      background: #FC929E;
      bottom: 0;
      right: 0;
      transition: width 0.3s;
    }
    
    .nav-links a:hover:after,
    .nav-links a.active:after {
      width: 100%;
      right: auto;
      left: 0;
    }
    
    
    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      font-size: 22px;
      color: #333;
      cursor: pointer;
      padding: 5px;
    }
    
    
   
   footer {
  background-color: #F0E6EF;
  color: #333;
  padding: 40px 10%;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  flex-wrap: wrap;
  direction: ltr;
  margin-top: auto; 
  position: relative; 
}

    footer .column {
        margin: 10px;
        min-width: 200px;
    }

    footer .column h3 {
        color: #FC929E;
        margin-bottom: 15px;
        font-size: 18px;
        position: relative;
    }

    footer .column h3::after {
        content: '';
        display: block;
        width: 50px;
        height: 2px;
        background: #FC929E;
        margin-top: 5px;
    }

    footer .column ul {
        list-style: none;
    }

    footer .column ul li {
        margin: 10px 0;
    }

    footer .column ul li a {
        text-decoration: none;
        color: #333;
        font-size: 14px;
        transition: color 0.3s;
    }

    footer .column ul li a:hover {
        color: #FC929E;
    }

    footer .social-icons {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

    footer .social-icons a {
        width: 40px;
        height: 40px;
        background-color: white;
        color: #FC929E;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        text-decoration: none;
        font-size: 18px;
        transition: all 0.3s;
    }

    footer .social-icons a:hover {
        background-color: #FC929E;
        color: white;
    }
  </style>
</head>
<body>

<header class="main-header" id="mainHeader">
  <div class="header-container">
    
    
    <a href="index.php" class="logo">EntreElle</a>

    <nav class="main-nav" id="mainNav">
      <ul class="nav-links">
        <li><a href="page1.php" class="active">Accueil</a></li>
        
      </ul>
    </nav>
    

  </div>
</header>

<br><br>

  <div class="container">
    <h1>Aide / Foire aux Questions</h1>

    <div class="question">
      <h2>1. Comment acheter un produit ?</h2>
      <p>Pour acheter un produit, cliquez sur "Voir les projets", choisissez l’article qui vous intéresse, puis suivez les instructions pour finaliser votre commande.</p>
    </div>

    <div class="question">
      <h2>2. Comment proposer mon propre projet ?</h2>
      <p>Inscrivez-vous en cliquant sur "Rejoindre", puis remplissez le formulaire avec les détails de votre projet (photos, description, prix...).</p>
    </div>

    <div class="question">
      <h2>3. Quels types de produits sont autorisés ?</h2>
      <p>Nous acceptons les produits faits main ou artisanaux : accessoires, produits naturels, bougies, vêtements, etc.</p>
    </div>

    <div class="question">
      <h2>4. J’ai un problème avec ma commande, que faire ?</h2>
      <p>Contactez-nous via la page <a href="contact.html">Contact</a> en précisant votre numéro de commande et le problème rencontré.</p>
    </div>

    <div class="question">
      <h2>5. Comment supprimer mon compte ?</h2>
      <p>Envoyez une demande via la page Contact, et nous supprimerons votre compte dans un délai de 48h.</p>
    </div>
  </div>



  <br><br><br>

<footer>
    <div class="column">
        <h3>À propos de nous</h3>  <!-- من نحن -->
        <ul>
            <li><a href="A_propos_de.php">De nous</a></li>  <!-- About Us -->
            <li><a href="conditions.php">Nos services</a></li>  <!-- Our Services -->
            <li><a href="politique.php">Politique</a></li>  <!-- Privacy Policy -->
           
        </ul>
    </div>
    <div class="column">
        <h3>Aide & Conditions</h3>  <!-- Aide conditions -->
        <ul>
            <li><a href="index.php">FAQ</a></li>
            <li><a href="Expédition.php">Expédition</a></li>  <!-- Shipping -->
            <li><a href="page1.php">Retours</a></li>  <!-- Returns -->
            
            
        </ul>
    </div>
    <div class="column">
        <h3>Boutique en ligne</h3>  <!-- Online Shop -->
        <ul>
            <li><a href="voirr.php">Mode et tradition</a></li>  <!-- Watch -->
            <li><a href="#">créations artisanales</a></li>  <!-- Bag -->
            <li><a href="#">Délices et Fraicheur</a></li>  <!-- Shoes -->
            <li><a href="#">beauté</a></li>  <!-- Dress -->
        </ul>
    </div>
   
</footer>



<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</body>
</html>