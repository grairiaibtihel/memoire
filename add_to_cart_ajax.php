<?php
@include 'config.php';


if (!isset($conn)) {
    die(json_encode([
        'status' => 'error',
        'message' => 'Database connection error'
    ]));
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;


    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name'");

    if (mysqli_num_rows($select_cart) > 0) {
      
        echo json_encode([
            'status' => 'info',
            'message' => 'Le produit est déjà dans votre panier',
            'cart_count' => mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cart"))
        ]);
    } else {
       
        $insert_product = mysqli_query($conn, "INSERT INTO cart (name, price, image, quantity) VALUES('$product_name','$product_price','$product_image','$product_quantity')");
        
        if ($insert_product) {
            
            $cart_count = mysqli_query($conn, "SELECT * FROM cart");
            $cart_items = mysqli_num_rows($cart_count);
            
            echo json_encode([
                'status' => 'success',
                'message' => 'Produit ajouté au panier avec succès!',
                'cart_count' => $cart_items
            ]);
        } else {
            
            echo json_encode([
                'status' => 'error',
                'message' => 'Erreur lors de l\'ajout au panier: ' . mysqli_error($conn),
                'cart_count' => mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cart"))
            ]);
        }
    }
} else {
   
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method'
    ]);
}