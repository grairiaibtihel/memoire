<?php
@include 'config.php';

if (isset($_POST['order_btn'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = 'Algérie';
    $pin_code = $_POST['pin_code'];

    $cart_query = mysqli_query($conn, "SELECT * FROM cart");
    $product_total = 0;
    $product_name = [];
    $price_total = 0;

    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ')';
            $price_total += $product_item['price'] * $product_item['quantity'];
        }
    }

    $total_product = implode(', ', $product_name);

    $name = mysqli_real_escape_string($conn, $name);
$number = mysqli_real_escape_string($conn, $number);
$email = mysqli_real_escape_string($conn, $email);
$method = mysqli_real_escape_string($conn, $method);
$flat = mysqli_real_escape_string($conn, $flat);
$street = mysqli_real_escape_string($conn, $street);
$city = mysqli_real_escape_string($conn, $city);
$state = mysqli_real_escape_string($conn, $state);
$country = mysqli_real_escape_string($conn, $country);
$pin_code = mysqli_real_escape_string($conn, $pin_code);
$total_product = mysqli_real_escape_string($conn, $total_product);
$price_total = mysqli_real_escape_string($conn, $price_total);
    $detail_query = mysqli_query($conn, "INSERT INTO orders
        (name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) 
        VALUES('$name', '$number', '$email', '$method', '$flat', '$street', '$city', '$state', '$country', '$pin_code', '$total_product', '$price_total')");

    if ($cart_query && $detail_query) {
        echo "
        <div class='order-message-container'>
            <div class='message-container'>
                <h3>Merci pour votre achat !</h3>
                <div class='order-detail'>
                    <span>$total_product</span>
                    <span class='total'>Total : " . number_format($price_total) . " DA</span>
                </div>
                <div class='customer-details'>
                    <p>Nom : $name</p>
                    <p>Téléphone : $number</p>
                    <p>Email : $email</p>
                    <p>Adresse : $flat, $street, $city, $state, $country - $pin_code</p>
                    <p>Méthode de paiement : $method</p>
                    <p>(*Paiement à la livraison*)</p>
                </div>
                <a href='page1.php' class='btn'>Retour</a>
            </div>
        </div>
        ";
    }
}
?>
<!DOCTYPE html><html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('header.php'); ?>
<div class="container">
    <section class="checkout-form">
        <h1 class="heading">Finaliser votre commande</h1>
        <form action="" method="post">
            <div class="display-order">
                <?php
                $select_cart = mysqli_query($conn, "SELECT * FROM cart");
                $grand_total = 0;
                if (mysqli_num_rows($select_cart) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
                        $grand_total += $total_price;
                        echo '<span>' . $fetch_cart['name'] . ' (' . $fetch_cart['quantity'] . ')</span>';
                    }
                } else {
                    echo "<div class='display-order'><span>Votre panier est vide !</span></div>";
                }
                ?>
                <span class="grand-total">Total général : <?= number_format($grand_total); ?> DA</span>
            </div><div class="flex">
            <div class="inputBox">
                <span>Nom</span>
                <input type="text" placeholder="Entrez votre nom" name="name" required>
            </div>
            <div class="inputBox">
                <span>Numéro de téléphone</span>
                <input type="number" placeholder="Entrez votre numéro" name="number" required></div>
            <div class="inputBox">
                <span>Email</span>
                <input type="email" placeholder="Entrez votre email" name="email" required>
            </div>
            <div class="inputBox">
                <span>Méthode de paiement</span>
                <select name="method">
                    <option value="Paiement à la livraison" selected>Paiement à la livraison</option>
                    <option value="Carte bancaire">Carte bancaire</option>
                    <option value="BaridiMob">BaridiMob</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Adresse (ligne 1)</span>
                <input type="text" placeholder="ex : N° d'appartement" name="flat" required>
            </div>
            <div class="inputBox">
                <span>Adresse (ligne 2)</span>
                <input type="text" placeholder="ex : Rue" name="street" required>
            </div>
            <div class="inputBox">
                <span>Ville</span>
                <input type="text" placeholder="ex : Alger" name="city" required>
            </div>




            <div class="inputBox">
            <span>Wilaya</span>
                <select name="state" required>
                     <option value="" disabled selected>Choisissez votre wilaya</option>
                      <option value="Adrar">Adrar</option>
                     <option value="Chlef">Chlef</option>
                      <option value="Laghouat">Laghouat</option>
                      <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                         <option value="Batna">Batna</option>
                         <option value="Béjaïa">Béjaïa</option>
                         <option value="Biskra">Biskra</option>
                         <option value="Béchar">Béchar</option>
                         <option value="Blida">Blida</option>
                      <option value="Bouira">Bouira</option>
                                     <option value="Tamanrasset">Tamanrasset</option>
                              <option value="Tébessa">Tébessa</option>
    <option value="Tlemcen">Tlemcen</option>
    <option value="Tiaret">Tiaret</option>
    <option value="Tizi Ouzou">Tizi Ouzou</option>
    <option value="Alger">Alger</option>
    <option value="Djelfa">Djelfa</option>
    <option value="Jijel">Jijel</option>
    <option value="Sétif">Sétif</option>
    <option value="Saïda">Saïda</option>
    <option value="Skikda">Skikda</option>
    <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
    <option value="Annaba">Annaba</option>
    <option value="Guelma">Guelma</option>
    <option value="Constantine">Constantine</option>
    <option value="Médéa">Médéa</option>
    <option value="Mostaganem">Mostaganem</option>
    <option value="M'Sila">M'Sila</option>
    <option value="Mascara">Mascara</option>
    <option value="Ouargla">Ouargla</option>
    <option value="Oran">Oran</option>
    <option value="El Bayadh">El Bayadh</option>
    <option value="Illizi">Illizi</option>
    <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
    <option value="Boumerdès">Boumerdès</option>
    <option value="El Tarf">El Tarf</option>
    <option value="Tindouf">Tindouf</option>
    <option value="Tissemsilt">Tissemsilt</option>
    <option value="El Oued">El Oued</option>
    <option value="Khenchela">Khenchela</option>
    <option value="Souk Ahras">Souk Ahras</option>
    <option value="Tipaza">Tipaza</option>
    <option value="Mila">Mila</option>
    <option value="Aïn Defla">Aïn Defla</option>
    <option value="Naâma">Naâma</option>
    <option value="Aïn Témouchent">Aïn Témouchent</option>
    <option value="Ghardaïa">Ghardaïa</option>
    <option value="Relizane">Relizane</option>
    <option value="Timimoun">Timimoun</option>
    <option value="Bordj Badji Mokhtar">Bordj Badji Mokhtar</option>
    <option value="Ouled Djellal">Ouled Djellal</option>
    <option value="Béni Abbès">Béni Abbès</option>
    <option value="In Salah">In Salah</option>
    <option value="In Guezzam">In Guezzam</option>
    <option value="Touggourt">Touggourt</option>
    <option value="Djanet">Djanet</option>
    <option value="El M'Ghair">El M'Ghair</option>
    <option value="El Meniaa">El Meniaa</option>
            </select>
                </div>




            <div class="inputBox">
                <span>Pays</span>
                <input type="text" value="Algérie" name="country" readonly>
            </div>
            <div class="inputBox">
                <span>Code postal</span>
                <input type="text" placeholder="ex : 16000" name="pin_code" required>
            </div>
        </div>

        <input type="submit" value="Commander maintenant" name="order_btn" class="btn">
    </form>
</section>

</div>
<script src="script.js"></script>
</body>
</html>

