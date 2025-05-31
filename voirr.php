<?php
@include 'config.php';
session_start();

// Sauvegarder l'onglet actif dans la session
if(isset($_POST['active_tab'])){
    $_SESSION['active_tab'] = $_POST['active_tab'];
}

// Récupérer l'onglet actif de la session ou utiliser la valeur par défaut
$active_tab = isset($_SESSION['active_tab']) ? $_SESSION['active_tab'] : 'featured';

if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name'");

    if(mysqli_num_rows($select_cart) > 0){
        $message[] = 'Produit déjà ajouté au panier';
    }else{
        $insert_product = mysqli_query($conn, "INSERT INTO cart (name, price, image, quantity) VALUES('$product_name','$product_price','$product_image','$product_quantity')");
        $message[] = 'Produit ajouté au panier avec succès!';
    }
}

// Compter les articles dans le panier
$cart_count = mysqli_query($conn, "SELECT * FROM cart");
$cart_items = mysqli_num_rows($cart_count);
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boutique de vêtements</title>
  <style>
  
      * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    
    .main-content {
      flex: 1;
      margin-bottom: 20px;
    }

    body {
      background-color: transparent;
      padding: 20px;
      text-align: left;
      position: relative;
      min-height: 100vh;
      padding-bottom: 0;
      display: flex;
      flex-direction: column;
    }
    
    .tab-container {
      display: flex;
      margin-bottom: 20px;
      justify-content: center;
    }
    
    .tab {
      padding: 8px 20px;
      margin: 0 5px;
      border-radius: 20px;
      cursor: pointer;
      font-size: 14px;
      background-color: #f0f0f0;
      border: none;
      transition: background-color 0.3s;
    }
    
    .tab.active {
      background-color: #FF94A8;
    }
    
    .products-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      margin-top: 20px;
      direction: ltr;
    }
    
    .product-card {
      background-color: #fff;
      border-radius: 15px;
      overflow: hidden;
      padding: 15px;
      position: relative;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s;
      width: 100%;
    }
    
    .product-card:hover {
      transform: translateY(-5px);
    }.product-image {
      width: 100%;
      height: 200px;
      object-fit: contain;
      margin-bottom: 10px;
      border-radius: 10px;
    }
    
    .product-category {
      color: #888;
      font-size: 12px;
      margin-bottom: 5px;
    }
    
    .product-title {
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 8px;
    }
    
   
    
    .price-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    
    .price {
      color: gray;
      font-weight: bold;
      font-size: 18px;
    }
    
    .original-price {
      color: #aaa;
      text-decoration: line-through;
      font-size: 14px;
      margin-left: 5px;
    }
    
    .cart-button {
      background-color: #FF94A8;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 6px 10px;
      font-size: 12px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    
    .cart-button:hover {background-color: #a12572;
    }
    
    .action-button {
      background-color: #e9e9e9;
      color: #666;
      border: none;
      border-radius: 50%;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;justify-content: center;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    
    .action-button:hover {
      background-color: #d4d4d4;
    }
    
    
    
    .actions {
      display: flex;
      gap: 10px;
    }
    
    .wishlist-icons {
      position: absolute;
      top: 15px;
      right: 15px;
      display: flex;
      gap: 5px;
    }
    
    .heart-icon {
      color: #ccc;
      font-size: 18px;
      cursor: pointer;
      width: 24px;
      height: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: white;
      border-radius: 50%;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .heart-icon.active {
      color: #ff6b6b;
    }
    
    .products-container {
      display: none;
    }
    .products-container.active {
      display: block;
    }
    
    .cart-icon {
      position: fixed;
      top: 20px;
      right: 20px;
      font-size: 24px;
      cursor: pointer;
      background-color: #fff;
      padding: 10px;
      border-radius: 50%;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
    }
    
    .cart-count {
      position: absolute;
      top: -5px;
      right: -5px;
      background-color: #ff6b6b;
      color: white;
      border-radius: 50%;
      padding: 2px 6px;
      font-size: 12px;
    }
    
    .heart-icon {
      position: absolute;
      top: 10px;
      right: 10px;
      color: #fff;
      cursor: pointer;
      font-size: 20px;
      filter: drop-shadow(0 0 1px rgba(0,0,0,0.5));
    }
    
    .heart-icon.active {
      color: #ff4757;
    }
    
    .message {
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      padding: 15px;
      background-color: #4CAF50;
      color: white;
      border-radius: 5px;
      z-index: 1000;
      animation: fadeIn 0.5s, fadeOut 0.5s 2.5s;
    }
    
    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }
    
    @keyframes fadeOut {
      from {opacity: 1;}
      to {opacity: 0;}
    }
    
    

     
  .main-header {
  width: 100%;
  background: white;
  position: sticky;
  top: 0;
  z-index: 1000;
  padding: 15px 0;
  }.header-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
  flex-direction: row-reverse; 
  }

  
  .header-line {
  width: 100%;
  height: 1px;
  background: #e0e0e0;
  margin-top: 15px;
  }

  
  .logo {
  font-size: 24px;
  font-weight: bold;
  color: #FF94A8;
  text-decoration: none;
  }

 
.left-section {
  display: flex;
  align-items: center;
  }

  .nav-links {
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
  align-items: center;
  }

  .nav-links li {
  margin-right: 25px;
  }

  .nav-links a {
  color: #333;
  text-decoration: none;
  font-weight: 500;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  }

  .nav-links a:hover {
  color: #FF94A8;
  

  }


.cart-link-header {
  position: relative;
  display: flex;
  align-items: center;
}.cart-count-header {
  position: absolute;
  top: -8px;
  right: -12px;
  background: #ff6b6b;
  color: white;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  font-weight: bold;
}
@media (max-width: 768px) {
  .header-content {
    flex-direction: column;
    align-items: center;
  }
  
  .logo {
    margin-bottom: 15px;
    order: -1; 
  }
  
  .nav-links li {
    margin: 0 10px; 
  }
}


    
   
      footer {
        background-color: #F0E6EF;
        color: rgb(255, 255, 255);
        padding: 20px 10%;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    footer .column {
        margin: 10px;
    }

    footer .column h3 {
        color: #FC929E;
        margin-bottom: 10px;
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
        margin: 8px 0;
    }footer .column ul li a {
        text-decoration: none;
        color: black;
        font-size: 14px;
        transition: color 0.3s;
    }

    footer .column ul li a:hover {
        color: #FC929E;
    }

    footer .social-icons {
        display: flex;
        gap: 10px;
    }

    footer .social-icons a {
        width: 40px;
        height: 40px;
        background-color:white;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        text-decoration: none;
        font-size: 18px;
        transition: background-color 0.3s;
    }

    footer .social-icons a:hover {
        background-color: #FC929E;
    }


    
    @media (max-width: 768px) {
        footer {
            flex-direction: column;
            padding: 30px 20px;
        }
        
        footer .column {
            margin: 15px 0;
            width: 100%;
        }
        
        .products-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    

  </style>
</head>
<body><header class="main-header">
    <div class="header-content">
     
      
      <div class="left-section">
        <nav class="main-nav">
          <ul class="nav-links">
            
            <li><a href="page1.php"><i class="fas fa-home"></i> </a></li>
            <li>
              <a href="cart.php" class="cart-link-header">
                🛒 
                <span class="cart-count-header"><?php echo $cart_items; ?></span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
       <a href="index.php" class="logo">EntreElles</a>
    </div>
    <div class="header-line"></div>
  </header>

  <br><br><br>
  <?php
    if(isset($message)){
      foreach($message as $message){
        echo '<div class="message">'.$message.'</div>';
      }
    }
  ?>

  <br>

  <div class="tab-container">
      <button class="tab <?php echo $active_tab === 'featured' ? 'active' : ''; ?>" data-target="featured">Pour toi</button>
    <button class="tab <?php echo $active_tab === 'popular' ? 'active' : ''; ?>" data-target="popular">  Deco  </button>
   
  
  </div>
<!--Pour toi-->
 <div id="popular" class="products-container <?php echo $active_tab === 'popular' ? 'active' : ''; ?>">
    <div class="products-grid">
     
      <!-- Produit 1 -->
      <div class="product-card">
        <img src="uploaded_img/photo_2025-05-17_19-59-38.jpg" alt="Chemise colorée" class="product-image">
        <div class="product-category">Decoratif</div> <br>
        <div class="product-title">porte-pinceaux maquillage en forme de visage</div>
        
        <div class="price-container">
          <div>
            <span class="price">1200 DA</span>
            
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Decoratif">
              <input type="hidden" name="product_price" value="1200 ">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-17_19-59-38.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>
      
      
      <!-- Produit 2 -->
      <div class="product-card">
        <img src="uploaded_img/photo_2025-05-17_19-59-33.jpg" alt="Chemise champignons" class="product-image">
        <div class="product-category">Cintre</div> <br>
        <div class="product-title">Cintre en perles</div>
        <div class="price-container">
          <div>
            <span class="price">600 DA</span>
           
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Cintre">
              <input type="hidden" name="product_price" value="600">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-17_19-59-33.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>
      


      <!-- Produit 3 -->
      <div class="product-card">
        <img src="uploaded_img/photo_2025-05-17_19-59-35.jpg" alt="Chemise abstraite" class="product-image">
        <div class="product-category">Crochet</div>
        <br>
        <div class="product-title">Embrasse de rideau en perles</div>
    
        <div class="price-container">
          <div>
            <span class="price">300 DA</span>
            
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Crochet">
              <input type="hidden" name="product_price" value="300">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-17_19-59-35.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>


       
      <!-- Produit 4 -->
      <div class="product-card">
        <img src="uploaded_img/photo_2025-05-17_19-59-31.jpg" alt="Chemise abstraite" class="product-image">
        <div class="product-category">Miroir</div>
        <br>
        <div class="product-title">miroir diy perles élégant</div>
    
        <div class="price-container">
          <div>
            <span class="price">600 DA</span>
            
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Miroir">
              <input type="hidden" name="product_price" value="600">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-17_19-59-31.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>




   <!-- Produit 5 -->
      <div class="product-card">
        <img src="uploaded_img/photo_2025-05-17_19-59-38.jpg" alt="Chemise abstraite" class="product-image">
        <div class="product-category">Set déco romantique</div>
        <br>
        <div class="product-title">Ensemble 4 pièces - vase, bougeoir, plateau, boîte - décoré cœurs rouges</div>
    
        <div class="price-container">
          <div>
            <span class="price">1500 DA</span>
            
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Set déco romantique">
              <input type="hidden" name="product_price" value="1500">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-17_19-59-38.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>


      
   <!-- Produit 6-->
      <div class="product-card">
        <img src="uploaded_img/photo_2025-05-17_19-59-41.jpg" alt="Chemise abstraite" class="product-image">
        <div class="product-category">Bougie décorative</div>
        <br>
        <div class="product-title">Bougie blanche nacrée décorée de coquillages et d’une queue de sirène.</div>
    
        <div class="price-container">
          <div>
            <span class="price">500 DA</span>
            
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Bougie décorative">
              <input type="hidden" name="product_price" value="500">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-17_19-59-41.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>


         
   <!-- Produit 7-->
      <div class="product-card">
        <img src="uploaded_img/photo_2025-05-29_22-14-01.jpg" alt="Chemise abstraite" class="product-image">
        <div class="product-category">Bougie parfumée aux fleurs séchées</div>
        <br>
        <div class="product-title">Bougie décorative avec fleurs naturelles et perles colorées.</div>
    
        <div class="price-container">
          <div>
            <span class="price">900 DA</span>
            
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Bougie parfumée aux fleurs séchées">
              <input type="hidden" name="product_price" value="900">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-29_22-14-01.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>


       <!-- Produit 8-->
      <div class="product-card">
        <img src="uploaded_img/photo_2025-05-29_22-12-09.jpg" alt="Chemise abstraite" class="product-image">
        <div class="product-category">Set déco maison - Miroir, bougeoir, vase</div>
        <br>
        <div class="product-title">Ensemble décoratif blanc crème style scandinave moderne.</div>
    
        <div class="price-container">
          <div>
            <span class="price">1500 DA</span>
            
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Set déco maison - Miroir, bougeoir, vase">
              <input type="hidden" name="product_price" value="1500">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-29_22-12-09.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>


      
       <!-- Produit 9-->
      <div class="product-card">
        <img src="uploaded_img/photo_2025-05-29_22-12-05.jpg" alt="Chemise abstraite" class="product-image">
        <div class="product-category">Moules en silicone - Formes variées</div>
        <br>
        <div class="product-title">Moules silicone pour bougies et savons. Faciles à utiliser</div>
    
        <div class="price-container">
          <div>
            <span class="price">1300 DA</span>
            
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Moules en silicone - Formes variées">
              <input type="hidden" name="product_price" value="1300">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-29_22-12-05.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>


    </div>
  </div>
  
  
  <!-- pour toi -->
  <div id="featured" class="products-container <?php echo $active_tab === 'featured' ? 'active' : ''; ?>">
    <div class="products-grid">
     
      <!-- Produit 1 -->
      <div class="product-card">
      
       
        <img src="uploaded_img/photo_2025-05-17_19-59-45.jpg" alt="Chemise colorée" class="product-image">
        
        <div class="product-category">serr-tete</div> <br>
        <div class="product-title">beige rosé satiné perlé(les deux)</div>
        
        <div class="price-container">
          <div>
            <span class="price">600 DA</span>
            
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="serr-tete">
              <input type="hidden" name="product_price" value="600">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-17_19-59-45.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>


      <!-- Produit 2 -->
      <div class="product-card">
        
       
        <img src="uploaded_img/photo_2025-05-17_19-59-23.jpg" alt="Chemise champignons" class="product-image">
        
        <div class="product-category">Bracelet de perles</div> <br>
        <div class="product-title">bracelet</div>
      
        <div class="price-container">
          <div>
            <span class="price">600 DA</span>
           
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="bracelet">
              <input type="hidden" name="product_price" value="600">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-17_19-59-23.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>



       <!-- Produit 3 -->
      <div class="product-card">
        
       
        <img src="uploaded_img/photo_2025-05-17_19-59-22.jpg" alt="Chemise champignons" class="product-image">
        
        <div class="product-category">chouchous</div> <br>
        <div class="product-title">ensemble de chouchous en satin violetts et blanches</div>
      
        <div class="price-container">
          <div>
            <span class="price">600 DA</span>
           
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="chouchous">
              <input type="hidden" name="product_price" value="600">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-17_19-59-22.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>


       <!-- Produit 4 -->
      <div class="product-card">
        
       
        <img src="uploaded_img/photo_2025-05-17_20-00-00.jpg" alt="Chemise champignons" class="product-image">
        
        <div class="product-category">Sac à Main en Perles Élégant</div> <br>
        <div class="product-title">Un petit sac à main entièrement confectionné en perles blanches nacrées avec une bandoulière longue, design classique et raffiné pour les occasions spéciales</div>
      
        <div class="price-container">
          <div>
            <span class="price">1200 DA</span>
           
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Sac à Main en Perles Élégant">
              <input type="hidden" name="product_price" value="1200">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-17_20-00-00.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>


        <!-- Produit 5 -->
      <div class="product-card">
        
       
        <img src="uploaded_img/photo_2025-05-29_23-01-36.jpg" alt="Chemise champignons" class="product-image">
        
        <div class="product-category">Porte-clés</div> <br>
        <div class="product-title">Porte-clés papillons et fleur au crochet</div>
      
        <div class="price-container">
          <div>
            <span class="price">300 DA</span>
           
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Porte-clés">
              <input type="hidden" name="product_price" value="300">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-29_23-01-36.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>



        <!-- Produit 6 -->
      <div class="product-card">
        
       
        <img src="uploaded_img/photo_2025-05-17_19-59-56.jpg" alt="Chemise champignons" class="product-image">
        
        <div class="product-category">Parure de Perles Noires Royale</div> <br>
        <div class="product-title">Un ensemble de bijoux luxueux en perles noires avec des détails dorés, comprenant un collier, des boucles d'oreilles et un bracelet au design oriental sophistiqué</div>
      
        <div class="price-container">
          <div>
            <span class="price">1500 DA</span>
           
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Parure de Perles Noires Royale">
              <input type="hidden" name="product_price" value="1500">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-17_19-59-56.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>


        <!-- Produit 7 -->
      <div class="product-card">
        
       
        <img src="uploaded_img/photo_2025-05-29_21-42-17.jpg" alt="Chemise champignons" class="product-image">
        
        <div class="product-category">Cordon de Téléphone Perlé</div> <br>
        <div class="product-title">Un accessoire pratique pour téléphone portable fabriqué en perles blanches de différentes tailles, alliant élégance et fonctionnalité au quotidien</div>
      
        <div class="price-container">
          <div>
            <span class="price">400 DA</span>
           
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Cordon de Téléphone Perlé">
              <input type="hidden" name="product_price" value="400">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-29_21-42-17.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>


        <!-- Produit 8 -->
      <div class="product-card">
        
       
        <img src="uploaded_img/photo_2025-05-29_23-01-35.jpg" alt="Chemise champignons" class="product-image">
        
        <div class="product-category">Porte-clés</div> <br>
        <div class="product-title">Porte-clés noeud en crochet</div>
      
        <div class="price-container">
          <div>
            <span class="price">200 DA</span>
           
          </div>
          <div class="actions">
            <form method="post" action="">
              <input type="hidden" name="product_name" value="Porte-clés">
              <input type="hidden" name="product_price" value="200">
              <input type="hidden" name="product_image" value="uploaded_img/photo_2025-05-29_23-01-35.jpg">
              <input type="hidden" name="active_tab" value="<?php echo $active_tab; ?>">
              <button type="submit" name="add_to_cart" class="cart-button">Ajouter au panier</button>
            </form>
          </div>
        </div>
      </div>

      
     


    </div>
  </div>

  <br><br><br><br><br><br><br><br><br><br>
  <br><br><br><br>

  <footer>
    <div class="column">
        <h3>À propos</h3>
        <ul>
            <li><a href="A_propos_de.php">À propos de nous</a></li>
            <li><a href="conditions.php">Conditions d'utilisation</a></li>
            <li><a href="politique.php">Politique de confidentialité</a></li>
        </ul>
    </div>
    <div class="column">
        <h3>Service client</h3>
        <ul>
            <li><a href="index.php">FAQ</a></li>
            <li><a href="Expédition.php">Livraison</a></li>
            <li><a href="page1.php">Politique de retour</a></li>
        </ul>
    </div>
    <div class="column">
        <h3>Boutique</h3>
        <ul>
               <li><a href="voir4.php">Mode et tradition</a></li>
            <li><a href="voirr.php">créations artisanales</a></li>
            <li><a href="voir5.php">Délices et Fraicheur</a></li>
            <li><a href="voir3.php">beauté</a></li>
        </ul>
    </div>
  </footer>

  <script>
    // Cacher les messages après 3 secondes
    setTimeout(() => {
      const messages = document.querySelectorAll('.message');
      messages.forEach(msg => msg.remove());
    }, 3000);
    document.querySelectorAll('.tab').forEach(tab => {
      tab.addEventListener('click', function() {
        const targetId = this.getAttribute('data-target');
        
     
        document.querySelectorAll('input[name="active_tab"]').forEach(input => {
          input.value = targetId;
        });
        
     
        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        
      
        document.querySelectorAll('.products-container').forEach(container => {
          container.classList.remove('active');
        });
        document.getElementById(targetId).classList.add('active');
      });
    });

   
  </script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</body>
</html>