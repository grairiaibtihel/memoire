<?php
session_start();
include 'connect.php';

if (isset($_POST['signIn'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $sql = $conn->prepare("SELECT id, firstName, lastName, email, password, role FROM users WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows === 0) {
        echo "<script>alert(\"L'adresse e-mail n'est pas enregistrée. Veuillez créer un compte.\"); window.location.href = 'index.php';</script>";
        exit();
    }

    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        if ($row['role'] === 'admin') {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            header("Location: admin_panel.php");
            exit();
        } else {
            echo "<script>alert(\"Vous n'avez pas l'autorisation d'accéder en tant qu'administrateur.\"); window.location.href = 'index.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert(\"Mot de passe incorrect.\"); window.location.href = 'index.php';</script>";
        exit();
    }
}
?>