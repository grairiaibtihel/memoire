<?php
@include 'config.php';


if (isset($_POST['delete_product'])) {
    $product_name = $_POST['product_name'];
    $product_image = $_POST['product_image'];

    
    mysqli_query($conn, "DELETE FROM products WHERE name = '$product_name'");

    
    $image_path = 'uploaded_img/' . $product_image;
    if (file_exists($image_path)) {
        unlink($image_path);
    }

    $message[] = 'Produit supprimé avec succès.';
}


if (isset($_POST['accept_product'])) {
    $product_name = $_POST['product_name'];
   $stmt = $conn->prepare("UPDATE products SET accepted = 1 WHERE name = ?");
   $stmt->bind_param("s", $product_name);
   $stmt->execute();
    $message[] = 'Produit accepté.';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .accepted-box .btn-group {
            display: none;
        }
        .accepted-box {
            border: 2px solid green;
            background-color: #f0fff0;
        }
    </style>
</head>
<body>

<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<div class="message"><span>' . $msg . '</span>
        <i class="fas fa-times" onclick="this.parentElement.style.display=\'none\'"></i></div>';
    }
}
?>

<?php include 'header.php'; ?>

<div class="container">
    <section class="products">
        <h1 class="heading">Liste des produits</h1>
        <div class="box-container">

            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM products");
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                    $isAccepted = $fetch_product['accepted'] == 1;
            ?>
                <form action="produits.php" method="post">
                    <div class="box <?php echo $isAccepted ? 'accepted-box' : ''; ?>">
                        <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                        <h3><?php echo $fetch_product['name']; ?></h3>
                        <div class="price"><?php echo $fetch_product['price']; ?> DA</div>
                        <p class="description"><?php echo $fetch_product['description']; ?></p>

                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">

                        <div class="btn-group">
                            <input type="submit" class="btn accept" value="Accepter" name="accept_product">
                            <input type="submit" class="btn delete" value="Supprimer" name="delete_product" 
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                        </div>
                    </div>
                </form>
            <?php
                }
            }
            ?>
        </div>
    </section>
</div>

</body>
</html>