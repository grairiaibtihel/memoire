
<?php 
@include 'config.php';

if(isset($_POST['update_update_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE cart SET quantity = '$update_value' WHERE id = '$update_id' ");
    if($update_quantity_query){
        header('location:cart.php');
    };
}

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM cart WHERE id='$remove_id'");
    header('location:cart.php');
}

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM cart");
    header('location:cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
    <style>
        /* Header Styles */
        .main-header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            height: 70px;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo a {
            font-size: 3rem;
            font-weight: bold;
            color: #FC929E;
            text-decoration: none;
        }

        .main-nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .main-nav a {
            text-decoration: none;
            color: grey;
            font-weight: 500;
            transition: color 0.3s;
            font-size: 2rem;
        }

        .main-nav a:hover {
            color: #FC929E;
        }

   
        body {
            padding-top: 70px;
        }

       
        .product-image {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 5px;
        }

        
        .empty-cart-message {
            text-align: center;
            padding: 20px;
            font-size: 18px;
            color: #666;
        }
    </style>
</head>

<body>

<header class="main-header">
    <div class="header-content">
        <div class="logo">
            <a href="#">Panier</a>
        </div>
        <nav class="main-nav">
            <ul>
                <a href="page1.php"><i class="fas fa-home"></i></a>
            </ul>
        </nav>
    </div>
</header>

<br><br>
<div class="container">
    <section class="shopping-cart">
        <h1 class="heading">Panier d'achat</h1>
<br><br>
        <table>
            <thead>
                <th><h1>Image</h1></th>
                <th><h1>Nom</h1></th>
                <th><h1>Prix</h1></th>
                <th><h1>Quantité</h1></th>
                <th><h1>Prix Total</h1></th>
                <th><h1>Action</h1></th>
            </thead>
            <tbody>
                <?php 
                $select_cart = mysqli_query($conn, "SELECT * FROM cart");
                $grand_total = 0;
                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                        $sub_total = $fetch_cart['price'] * $fetch_cart['quantity'];
                        $grand_total += $sub_total;
                        
                        $image_path = $fetch_cart['image'];
                        if(strpos($image_path, '/uploaded_img/') === 0) {
                         
                            $image_path = substr($image_path, 1);
                        } else if(strpos($image_path, 'uploaded_img/') !== 0) {
                           
                            $image_path = 'uploaded_img/' . $image_path;
                        }
                ?>
                <tr>
                    <td><img src="<?php echo $image_path; ?>" height="100" class="product-image" alt="صورة المنتج"></td>
                    <td><?php echo $fetch_cart['name']; ?></td>
                    <td><?php echo number_format($fetch_cart['price']); ?> DA</td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                            <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>">
                            <input type="submit" value="Modifier" name="update_update_btn">
                        </form>
                    </td>
                    <td><?php echo number_format($sub_total); ?> DA</td>
                    <td>
                        <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" 
                           onclick="return confirm('Supprimer l\'article du panier ?')" 
                           class="delete-btn">
                           <i class="fas fa-trash"></i> Supprimer
                        </a>
                    </td>
                </tr>
                <?php 
                    }
                } else {
                    echo '<tr><td colspan="6" class="empty-cart-message">Votre panier est vide</td></tr>';
                }
                ?>

                <tr class="table-bottom">
                    <td><a href="voir.php" class="option-btn">Continuer vos achats</a></td>
                    <td colspan="3">Total général</td>
                    <td><?php echo number_format($grand_total); ?> DA</td>
                    <td>
                        <?php if($grand_total > 0): ?>
                        <a href="cart.php?delete_all" 
                           onclick="return confirm('Voulez-vous vraiment tout supprimer ?');" 
                           class="delete-btn">
                           <i class="fas fa-trash"></i> Supprimer tout
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="checkout-btn">
            <a href="checkout.php" class="btn <?= ($grand_total > 0) ? '' : 'disabled'; ?>">
                Passer à la caisse
            </a>
        </div>
    </section>
</div>

<!-- custom js file link -->
<script src="script.js"></script>

</body>
</html>