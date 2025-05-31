<?php 
session_start(); 
include 'connect.php';



// Tableau pour stocker les messages d'erreur
$errors = [];
$success = false;

// Traitement de l'inscription
if(isset($_POST['signUp'])) {
    $firstName = htmlspecialchars($_POST['fName']);
    $lastName = htmlspecialchars($_POST['lName']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    // Validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format de l'email invalide.";
    }
    
    // Check password strength
    if(strlen($password) < 8) {
        $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
    }
    
    // Si pas d'erreurs, continuer l'inscription
    if(empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Check if email exists
        $checkEmail = $conn->prepare("SELECT email FROM users WHERE email = ?");
        if(!$checkEmail) {
            $errors[] = "Erreur de base de données: " . $conn->error;
        } else {
            $checkEmail->bind_param("s", $email);
            $checkEmail->execute();
            $checkEmail->store_result();
            
            if($checkEmail->num_rows > 0) {
                $errors[] = "Cette adresse email est déjà utilisée !";
            } else {
                // Insert new user
                $insertQuery = $conn->prepare("INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
                if(!$insertQuery) {
                    $errors[] = "Erreur de base de données: " . $conn->error;
                } else {
                    $insertQuery->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);
                    
                    if($insertQuery->execute()) {
                        $_SESSION['email'] = $email;
                        $_SESSION['firstName'] = $firstName;
                        $_SESSION['success_message'] = "Inscription réussie! Vous pouvez maintenant vous connecter.";
                        header("Location: bienvenue.php");
                        exit();
                    } else {
                        $errors[] = "Erreur lors de l'inscription: " . $conn->error;
                    }
                }
            }
        }
    }
}

// Traitement de la connexion
if(isset($_POST['SignIn'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    // Vérifier si les champs ne sont pas vides
    if(empty($email) || empty($password)) {
        $errors[] = "Veuillez saisir votre email et mot de passe.";
    } else {
        try {
            $sql = $conn->prepare("SELECT id, firstName, lastName, email, password FROM users WHERE email = ?");
            if(!$sql) {
                $errors[] = "Erreur de base de données: " . $conn->error;
            } else {
                $sql->bind_param("s", $email);
                $sql->execute();
                $result = $sql->get_result();
                
                if($result->num_rows === 1) {
                    $row = $result->fetch_assoc();
                    
                    if(password_verify($password, $row['password'])) {
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['firstName'] = $row['firstName'];
                        $_SESSION['lastName'] = $row['lastName'];
                        header("Location: admin_panel.php");
                        exit();
                    } else {
                        $errors[] = "Email ou mot de passe incorrect.";
                    }
                } else {
                    $errors[] = "Email ou mot de passe incorrect.";
                }
            }
        } catch (Exception $e) {
            $errors[] = "Erreur système: " . $e->getMessage();
        }
    }
}// Rediriger vers la page d'accueil avec les erreurs
$_SESSION['errors'] = $errors;
// Si la requête n'a pas abouti avec un redirect, retourner à l'index
if(!empty($errors)) {
    header("Location: index.php");
    exit();
}
?>