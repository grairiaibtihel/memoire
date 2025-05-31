<?php
@include 'config.php';


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
    <link rel="stylesheet" href="recherche.css">
    <title>Résultats de recherche</title>
  
    <style>
        
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
     
        
        .results-container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
        }
        .product-card {
            border: 1px solid #E7BCDE;
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            display: flex;
        }
        .product-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }
        .product-info {
            margin-left: 20px;
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
        
    
        .alert-message {
          padding: 10px 15px;
          margin: 10px 0;
          border-radius: 5px;
          display: none;
        }
        
        .alert-success {
          background-color: #d4edda;
          color: #155724;
          border: 1px solid #c3e6cb;
        }
        
        .alert-error {
          background-color: #f8d7da;
          color: #721c24;
          border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>

  <a href="cart.php">
    <div class="cart-icon">
      🛒
      <span class="cart-count" id="cart-count"><?php echo $cart_items; ?></span>
    </div>
  </a>

 
  <div id="message-container" class="alert-message"></div>

 
  <nav class="navbar">
 
  </nav>

  <div class="results-container">
    <?php if (!empty($searchTerm)): ?>
        <h2>Résultats pour "<?php echo htmlspecialchars($searchTerm); ?>"</h2>
        
        <?php
        $stmt = $db->prepare("SELECT * FROM products WHERE name LIKE ? OR description LIKE ?");
        $stmt->execute(["%$searchTerm%", "%$searchTerm%"]);
        $results = $stmt->fetchAll();
        
        if (count($results) > 0): ?>
          
          <?php foreach ($results as $product): ?>
            <div class="product-card">
                <img class="product-image" src="uploaded_img/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <div class="product-info">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <button class="add-to-cart-btn" 
                            data-id="<?php echo $product['id']; ?>" 
                            data-name="<?php echo htmlspecialchars($product['name']); ?>" 
                            data-price="<?php echo htmlspecialchars($product['price']); ?>" 
                            data-image="<?php echo htmlspecialchars($product['image']); ?>"
                            style="margin-top:10px; padding:8px 15px; background-color:#E7BCDE; border:none; border-radius:5px; cursor:pointer;">
                        Ajouter au panier
                    </button>
                </div>
            </div>
          <?php endforeach; ?>

        <?php else: ?>
            <p>Aucun résultat trouvé.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Veuillez entrer un terme de recherche.</p>
    <?php endif; ?>
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
            <li><a href="voir4.php">Mode et tradition</a></li>
            <li><a href="voirr.php">créations artisanales</a></li>
            <li><a href="voir5.php">Délices et Fraicheur</a></li>
            <li><a href="voir3.php">beauté</a></li>
        </ul>
    </div>
</footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      
      $('.add-to-cart-btn').click(function() {
        var product_id = $(this).data('id');
        var product_name = $(this).data('name');
        var product_price = $(this).data('price');
        var product_image = $(this).data('image');
      
        $.ajax({
          url: 'add_to_cart_ajax.php',
          type: 'POST',
          data: {
            product_id: product_id,
            product_name: product_name,
            product_price: product_price,
            product_image: product_image
          },
          success: function(response) {
            var data = JSON.parse(response);
            
         
            $('#message-container').text(data.message);
            $('#message-container').removeClass('alert-success alert-error');
            
            if (data.status === 'success') {
              $('#message-container').addClass('alert-success');
              
              $('#cart-count').text(data.cart_count);
            } else {
              $('#message-container').addClass('alert-error');
            }
            
      
            $('#message-container').fadeIn();
            
        
            setTimeout(function() {
              $('#message-container').fadeOut();
            }, 3000);
          },
          error: function() {
            $('#message-container').text('Erreur lors de l\'ajout au panier');
            $('#message-container').removeClass('alert-success').addClass('alert-error');
            $('#message-container').fadeIn();
            
            setTimeout(function() {
              $('#message-container').fadeOut();
            }, 3000);
          }
        });
      });
    });
  </script>
</body>
</html>