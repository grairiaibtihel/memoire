<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Informations sur l'expédition</title>
  <link rel="stylesheet" href="">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #fff;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .container {
      max-width: 900px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fafafa;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 10px;
    }

    h1 {
      color: #FC929E;
      text-align: center;
      margin-bottom: 30px;
    }

    h2 {
      color: #555;
      margin-top: 25px;
    }

    p {
      line-height: 1.6;
      margin-bottom: 15px;
    }

    a {
      color: #FC929E;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th, td {
      padding: 12px;
      text-align: center;
    }

    th {
      background-color: #f0f0f0;
      color: #FC929E;
    }

    .note {
      background-color: #f0f0f0;
      padding: 10px;
      border-left: 4px solid rgb(255, 178, 187);
      border-radius: 8px;
    }

    /*Footer Et Header*/
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

    /* Style pour le tableau avec défilement */
    .table-container {
      max-height: 500px;
      overflow-y: auto;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .table-container table {
      margin-bottom: 0;
    }

    .table-container thead th {
      position: sticky;
      top: 0;
      background-color: #f0f0f0;
      z-index: 10;
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

<div class="container">
  <h1>Informations sur l'expédition</h1>

  <div class="section">
    <h2>Zones de livraison :</h2>
    <p>Nous livrons dans toutes les wilayas d'Algérie.</p>
  </div>

  <div class="section">
    <h2>Délais de livraison :</h2>
    <p>Les délais varient entre 2 et 7 jours ouvrables selon la région.</p>
  </div>

  <div class="section">
    <h2>Tarifs de livraison par wilaya :</h2>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Wilaya</th>
            <th>Prix de livraison (DA)</th>
            <th>Délai estimé</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Adrar</td><td>600 DA</td><td>4-7 jours</td></tr>
          <tr><td>Chlef</td><td>450 DA</td><td>3-5 jours</td></tr>
          <tr><td>Laghouat</td><td>500 DA</td><td>4-6 jours</td></tr>
          <tr><td>Oum El Bouaghi</td><td>450 DA</td><td>3-5 jours</td></tr>
          <tr><td>Batna</td><td>450 DA</td><td>3-5 jours</td></tr>
          <tr><td>Béjaïa</td><td>450 DA</td><td>3-5 jours</td></tr>
          <tr><td>Biskra</td><td>500 DA</td><td>4-6 jours</td></tr>
          <tr><td>Béchar</td><td>600 DA</td><td>5-7 jours</td></tr>
          <tr><td>Blida</td><td>300 DA</td><td>2-3 jours</td></tr>
          <tr><td>Bouira</td><td>400 DA</td><td>3-4 jours</td></tr>
          <tr><td>Tamanrasset</td><td>700 DA</td><td>6-8 jours</td></tr>
          <tr><td>Tébessa</td><td>550 DA</td><td>4-6 jours</td></tr>
          <tr><td>Tlemcen</td><td>500 DA</td><td>4-5 jours</td></tr>
          <tr><td>Tiaret</td><td>450 DA</td><td>3-5 jours</td></tr>
          <tr><td>Tizi Ouzou</td><td>400 DA</td><td>3-4 jours</td></tr>
          <tr><td>Alger</td><td>200 DA</td><td>2-3 jours</td></tr>
          <tr><td>Djelfa</td><td>500 DA</td><td>4-6 jours</td></tr>
          <tr><td>Jijel</td><td>450 DA</td><td>3-5 jours</td></tr>
          <tr><td>Sétif</td><td>450 DA</td><td>3-5 jours</td></tr>
          <tr><td>Saïda</td><td>500 DA</td><td>4-6 jours</td></tr>
          <tr><td>Skikda</td><td>450 DA</td><td>3-5 jours</td></tr>
          <tr><td>Sidi Bel Abbès</td><td>500 DA</td><td>4-5 jours</td></tr>
          <tr><td>Annaba</td><td>500 DA</td><td>3-6 jours</td></tr>
          <tr><td>Guelma</td><td>450 DA</td><td>3-5 jours</td></tr>
          <tr><td>Constantine</td><td>500 DA</td><td>3-5 jours</td></tr>
          <tr><td>Médéa</td><td>400 DA</td><td>3-4 jours</td></tr>
          <tr><td>Mostaganem</td><td>450 DA</td><td>3-5 jours</td></tr>
          <tr><td>M'Sila</td><td>500 DA</td><td>4-6 jours</td></tr>
          <tr><td>Mascara</td><td>500 DA</td><td>4-5 jours</td></tr>
          <tr><td>Ouargla</td><td>600 DA</td><td>5-7 jours</td></tr>
          <tr><td>Oran</td><td>400 DA</td><td>3-4 jours</td></tr>
          <tr><td>El Bayadh</td><td>550 DA</td><td>4-6 jours</td></tr>
          <tr><td>Illizi</td><td>700 DA</td><td>6-8 jours</td></tr>
          <tr><td>Bordj Bou Arreridj</td><td>450 DA</td><td>3-5 jours</td></tr>
          <tr><td>Boumerdès</td><td>300 DA</td><td>2-3 jours</td></tr>
          <tr><td>El Tarf</td><td>500 DA</td><td>4-6 jours</td></tr>
          <tr><td>Tindouf</td><td>700 DA</td><td>6-8 jours</td></tr>
          <tr><td>Tissemsilt</td><td>450 DA</td><td>3-5 jours</td></tr>
          <tr><td>El Oued</td><td>600 DA</td><td>5-7 jours</td></tr>
          <tr><td>Khenchela</td><td>500 DA</td><td>4-6 jours</td></tr>
          <tr><td>Souk Ahras</td><td>500 DA</td><td>4-6 jours</td></tr>
          <tr><td>Tipaza</td><td>300 DA</td><td>2-3 jours</td></tr>
          <tr><td>Mila</td><td>450 DA</td><td>3-5 jours</td></tr>
          <tr><td>Aïn Defla</td><td>400 DA</td><td>3-4 jours</td></tr>
          <tr><td>Naâma</td><td>550 DA</td><td>4-6 jours</td></tr>
          <tr><td>Aïn Témouchent</td><td>500 DA</td><td>4-5 jours</td></tr>
          <tr><td>Ghardaïa</td><td>600 DA</td><td>5-7 jours</td></tr>
          <tr><td>Relizane</td><td>500 DA</td><td>4-5 jours</td></tr>
          <tr><td>El M'Ghair</td><td>600 DA</td><td>5-7 jours</td></tr>
          <tr><td>El Menia</td><td>600 DA</td><td>5-7 jours</td></tr>
          <tr><td>Ouled Djellal</td><td>600 DA</td><td>5-7 jours</td></tr>
          <tr><td>Bordj Badji Mokhtar</td><td>700 DA</td><td>6-8 jours</td></tr>
          <tr><td>Béni Abbès</td><td>700 DA</td><td>6-8 jours</td></tr>
          <tr><td>Timimoun</td><td>700 DA</td><td>6-8 jours</td></tr>
          <tr><td>Touggourt</td><td>600 DA</td><td>5-7 jours</td></tr>
          <tr><td>Djanet</td><td>700 DA</td><td>6-8 jours</td></tr>
          <tr><td>In Salah</td><td>700 DA</td><td>6-8 jours</td></tr>
          <tr><td>In Guezzam</td><td>700 DA</td><td>6-8 jours</td></tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="section note">
    Veuillez vérifier soigneusement votre adresse et votre numéro de téléphone avant de valider votre commande. Nous vous contacterons pour confirmation avant l'expédition.
  </div>
</div>

<footer>
  <div class="column">
    <h3>À propos de nous</h3> 
    <ul>
      <li><a href="A_propos_de.php">De nous</a></li>  
      <li><a href="conditions.php">Nos services</a></li>  
      <li><a href="politique.php">Politique</a></li> 
    </ul>
  </div>
  <div class="column">
    <h3>Aide & Conditions</h3> 
    <ul>
      <li><a href="index.php">FAQ</a></li>
      <li><a href="Expédition.php">Expédition</a></li>
      <li><a href="page1.php">Retours</a></li> 
    </ul>
  </div>
  <div class="column">
    <h3>Boutique en ligne</h3>  
    <ul>
      <li><a href="voirr.php">Mode et tradition</a></li>  
      <li><a href="#">créations artisanales</a></li>  
      <li><a href="#">Délices et Fraicheur</a></li> 
      <li><a href="#">beauté</a></li> 
    </ul>
  </div>
</footer>

</body>
</html>