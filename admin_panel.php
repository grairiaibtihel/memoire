<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
@include 'config.php';


if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}


if (isset($_POST['add_product'])) {
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_description = mysqli_real_escape_string($conn, $_POST['p_description']);
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'uploaded_img/' . $p_image;
    $user_email = $_SESSION['email'];



    $p_name = mysqli_real_escape_string($conn, $p_name);
$p_price = mysqli_real_escape_string($conn, $p_price);
$p_image = mysqli_real_escape_string($conn, $p_image);
$p_description = mysqli_real_escape_string($conn, $p_description);
$user_email = mysqli_real_escape_string($conn, $user_email);

    $insert_query = mysqli_query($conn, "INSERT INTO products (name, price, image, description, user_email)
        VALUES('$p_name', '$p_price', '$p_image', '$p_description', '$user_email')") or die('query failed');

    if ($insert_query) {
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        $message[] = 'Produit ajouté avec succès';
    } else {
        $message[] = 'Le produit n\'a pas été ajouté';
    }
}


if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $user_email = $_SESSION['email'];

    $check_ownership = mysqli_query($conn, "SELECT * FROM products WHERE id = $delete_id AND user_email = '$user_email'");
    if (mysqli_num_rows($check_ownership) > 0) {
        $delete_query = mysqli_query($conn, "DELETE FROM products WHERE id = $delete_id");
        $message[] = 'Produit supprimé';
    } else {
        $message[] = 'Action non autorisée';
    }
    header('location:admin_panel.php');
    exit();
}


if (isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_description = $_POST['update_p_description'];
    $user_email = $_SESSION['email'];

    
    $check_ownership = mysqli_query($conn, "SELECT * FROM products WHERE id = '$update_p_id' AND user_email = '$user_email'");
    if (mysqli_num_rows($check_ownership) > 0) {
        if ($_FILES['update_p_image']['name']) {
            $update_p_image = $_FILES['update_p_image']['name'];
            $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
            $update_p_image_folder = 'uploaded_img/' . $update_p_image;
            move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        } else {
            $update_p_image = $_POST['old_image'];
        }

        $update_query = mysqli_query($conn, "UPDATE products 
            SET name = '$update_p_name', price = '$update_p_price', 
                description = '$update_p_description', image = '$update_p_image' 
            WHERE id = '$update_p_id' AND user_email = '$user_email'");

        $message[] = 'Produit modifié avec succès';
    } else {
        $message[] = 'Modification non autorisée';
    }

    header('location:admin_panel.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
        <!-- Font Awesome CDN Link -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">  
    <link rel="stylesheet" href="style.css">
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

<div class="container">
    <div class="user-welcome">
        <div class="welcome-card">
            <div class="user-avatar"><i class="fas fa-user-circle"></i></div>
            <div class="user-details">
                <h3>Bienvenue</h3>
                <p class="user-name"><?php echo $_SESSION['firstName'] ?? 'Utilisateur'; ?></p>
                <p class="user-email"><?php echo $_SESSION['email']; ?></p>
            </div>
            <div class="logout-section">
                <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Sortie</a>
            </div>
        </div>
    </div>
    <!-- Formulaire ajout produit -->
    <section>
        <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
            <h3>AJOUTER UN PRODUIT</h3>
            <input type="text" name="p_name" placeholder="Nom du produit" required class="box">
            <input type="number" name="p_price" placeholder="Prix" required class="box">
            <textarea name="p_description" placeholder="Description" required class="box"></textarea>
            <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" required class="box">
            <input type="submit" name="add_product" value="Ajouter" class="btn">
        </form>
    </section>

    <!-- Affichage produits de l'utilisateur -->
    <section class="display-product-table">
        <table>
            <thead>
                <th>Image</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $user_email = $_SESSION['email'];
                $products = mysqli_query($conn, "SELECT * FROM products WHERE user_email = '$user_email' ORDER BY id DESC");
                if (mysqli_num_rows($products) > 0) {
                    while ($row = mysqli_fetch_assoc($products)) {
                        echo "<tr>
                            <td><img src='uploaded_img/{$row['image']}' height='100'></td>
                            <td>{$row['name']}</td>
                            <td>{$row['description']}</td>
                            <td>{$row['price']} DA</td>
                            <td>
                                <a href='admin_panel.php?delete={$row['id']}' onclick='return confirm(\"Supprimer ce produit ?\")' class='delete-btn'>Supprimer</a>
                                <a href='admin_panel.php?edit={$row['id']}' class='option-btn'>Modifier</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Aucun produit ajouté</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Formulaire édition produit -->
    <section class="edit-form-container">
        <?php
        if (isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];
            $user_email = $_SESSION['email'];
            $edit_query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$edit_id' AND user_email = '$user_email'");
            if (mysqli_num_rows($edit_query) > 0) {
                $fetch = mysqli_fetch_assoc($edit_query);
        ?>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="update_p_id" value="<?php echo $fetch['id']; ?>">
            <input type="hidden" name="old_image" value="<?php echo $fetch['image']; ?>">
            <img src="uploaded_img/<?php echo $fetch['image']; ?>" height="200">
            <input type="text" name="update_p_name" value="<?php echo $fetch['name']; ?>" required class="box">
            <input type="number" name="update_p_price" value="<?php echo $fetch['price']; ?>" required class="box">
            <textarea name="update_p_description" class="box" required><?php echo $fetch['description']; ?></textarea>
            <input type="file" name="update_p_image" class="box" accept="image/*">
            <input type="submit" name="update_product" value="Modifier" class="btn">
            <a href="admin_panel.php" class="option-btn">Annuler</a>
        </form>
        <script>document.querySelector('.edit-form-container').style.display = 'flex';</script>
        <?php
            }
        }
        ?>
    </section>
</div>

<script src="script.js"></script>
</body>
</html>