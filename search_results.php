<?php
@include 'config.php';
session_start();

if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name'");

    if(mysqli_num_rows($select_cart) > 0){
        $message[] = 'Le produit est déjà ajouté au panier';
    }else{
        $insert_product = mysqli_query($conn, "INSERT INTO cart (name, price, image, quantity) VALUES('$product_name','$product_price','$product_image','$product_quantity')");
        $message[] = 'Le produit a été ajouté au panier avec succès';
    }
}

if(isset($_POST['product_id'])){
    $product_id = $_POST['product_id'];
    
    $select_product = mysqli_query($conn, "SELECT * FROM products WHERE id = '$product_id'");
    
    if(mysqli_num_rows($select_product) > 0){
        $row = mysqli_fetch_assoc($select_product);
        $product_name = $row['name'];
        $product_price = $row['price'];
        $product_image = $row['image'];
        $product_quantity = 1;
        
        $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name'");
        
        if(mysqli_num_rows($select_cart) > 0){
            $message[] = 'Le produit est déjà ajouté au panier';
        } else {
            $insert_product = mysqli_query($conn, "INSERT INTO cart (name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
            $message[] = 'Le produit a été ajouté au panier avec succès';
        }
    }
}

$cart_count = mysqli_query($conn, "SELECT * FROM cart");
$cart_items = mysqli_num_rows($cart_count);

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$dbname = 'shop_db'; 
$username = 'root'; 
$password = ''; 

$searchTerm = '';
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (isset($_GET['q'])) {
        $searchTerm = trim($_GET['q']);
    }
} catch(PDOException $e) {
    die("Erreur de connexion: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recherche.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Résultats de recherche</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: white;
            position: relative;
            min-height: 100vh;
            padding-bottom: 250px;
        }

        .main-header {
            width: 100%;
            background: white;
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header-content {
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
            color: #FC929E;
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
        }

        .cart-count-header {
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

        .results-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .product-card {
            border: 1px solid #FC929E;
            border-radius: 10px;
            padding: 15px;
            background-color: white;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .product-image-container {
            position: relative;
            width: 100%;
            padding-top: 100%;
            overflow: hidden;
            border-radius: 5px;
        }

        .product-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-info {
            padding: 15px 0;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-info h3 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }

        .product-info p {
            margin-bottom: 15px;
            color: #666;
            flex-grow: 1;
        }

        .product-price {
            font-weight: bold;
            font-size: 18px;
            color: #FC929E;
            margin-bottom: 15px;
        }

        .add-to-cart-btn {
            width: 100%;
            padding: 12px 15px;
            background-color: #FC929E;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.2s ease;
            color: white;
            font-size: 16px;
        }

        .add-to-cart-btn:hover {
            background-color: rgb(255, 108, 125);
        }

        .search-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            padding-bottom: 10px;
            border-bottom: 2px solid #FC929E;
        }

        .no-results {
            text-align: center;
            padding: 40px 0;
            color: #666;
            font-size: 18px;
        }

        /* Styles améliorés pour les messages */
        .message-container {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1000;
            max-width: 350px;
        }
        
        .message {
            padding: 15px 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            animation: slideIn 0.5s ease, fadeOut 0.5s ease 2.5s forwards;
            opacity: 1;
            transform: translateX(0);
            position: relative;
            overflow: hidden;
            border: none;
        }
        
        .message::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
        }
        
        .message.success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
        }
        
        .message.error {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
        }
        
        .message i {
            margin-right: 10px;
            font-size: 20px;
        }
        
        .success i {
            color: #28a745;
        }
        
        .error i {
            color: #dc3545;
        }
        
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes fadeOut {
            to { opacity: 0; transform: translateX(100%); }
        }

        footer {
            background-color: #F0E6EF;
            color: rgb(255, 255, 255);
            padding: 40px 10%;
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
            flex: 1;
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
            padding: 0;
        }

        footer .column ul li {
            margin: 12px 0;
        }

        footer .column ul li a {
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
            gap: 15px;
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
            
            footer {
                flex-direction: column;
                padding: 30px 20px;
            }
            
            footer .column {
                margin-bottom: 20px;
            }
            
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
    </style>
</head>
<body>

<header class="main-header">
  <div class="header-content">
    <div class="left-section">
      <nav class="main-nav">
        <ul class="nav-links">
             <li>
               <nav class="main-nav">
            <ul>
                 <a href="page1.php"><i class="fas fa-home"></i> </a>
            </ul>
        </nav>
        </li> 
           <li>
            <a href="cart.php" class="cart-link-header">
              <i class="fas fa-shopping-cart"></i>
              <span class="cart-count-header"><?php echo $cart_items; ?></span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <a href="A_propos_de.php" class="logo">EntreElle</a>
  </div>
  <div class="header-line"></div>
</header>

<div class="message-container">
    <?php
    if(isset($message)){
        foreach($message as $msg){
            $class = (strpos($msg, 'succès') !== false) ? 'success' : 'error';
            $icon = ($class == 'success') ? 'fa-check-circle' : 'fa-exclamation-circle';
            echo '
            <div class="message '.$class.'">
                <i class="fas '.$icon.'"></i>
                <span>'.$msg.'</span>
            </div>';
        }
    }
    ?>
</div>

<div class="results-container">
    <?php if (!empty($searchTerm)): ?>
        <h2 class="search-title">Résultats pour "<?php echo htmlspecialchars($searchTerm); ?>"</h2>
        
        <?php
        $stmt = $db->prepare("SELECT * FROM products WHERE name LIKE ? OR description LIKE ?");
        $stmt->execute(["%$searchTerm%", "%$searchTerm%"]);
        $results = $stmt->fetchAll();
        
        if (count($results) > 0): ?>
            <div class="products-grid">
                <?php foreach ($results as $product): ?>
                    <div class="product-card">
                        <div class="product-image-container">
                            <img class="product-image" src="uploaded_img/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        </div>
                        <div class="product-info">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p><?php echo htmlspecialchars($product['description']); ?></p>
                            <div class="product-price"><?php echo number_format($product['price'], 2); ?> DA</div>
                            
                            <form method="post" action="">
                                <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $product['image']; ?>">
                                <button type="submit" name="add_to_cart" class="add-to-cart-btn">
                                    <i class="fas fa-cart-plus"></i> Ajouter au panier
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-results">Aucun résultat trouvé pour "<?php echo htmlspecialchars($searchTerm); ?>"</div>
        <?php endif; ?>
    <?php else: ?>
        <div class="no-results">Veuillez entrer un terme de recherche</div>
    <?php endif; ?>
</div>

<footer>
    <div class="column">
        <h3>À propos de nous</h3> 
        <ul>
            <li><a href="A_propos_de.php">Qui sommes-nous</a></li>  
            <li><a href="conditions.php">Nos services</a></li> 
            <li><a href="politique.php">Politique de confidentialité</a></li>  
        </ul>
    </div>
    <div class="column">
        <h3>Aide & Conditions</h3>  
        <ul>
            <li><a href="index.php">FAQ</a></li>
            <li><a href="Expédition.php">Expédition & Livraison</a></li>  
            <li><a href="page1.php">Retours & Échanges</a></li> 
        </ul>
    </div>
    <div class="column">
        <h3>Boutique en ligne</h3> 
        <ul>
            <li><a href="voirr.php">Mode et tradition</a></li> 
            <li><a href="#">Créations artisanales</a></li>
            <li><a href="#">Délices et Fraîcheur</a></li> 
            <li><a href="#">Beauté</a></li>  
        </ul>
    </div>
   
</footer>

<script>
    // Fermeture automatique des messages après 3 secondes
    setTimeout(function() {
        const messages = document.querySelectorAll('.message');
        messages.forEach(function(message) {
            message.style.animation = 'fadeOut 0.5s ease forwards';
            setTimeout(() => message.remove(), 500);
        });
    }, 3000);
</script>

</body>
</html>