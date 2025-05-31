

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    
    <!-- Configuration Google Sign-In -->
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>
<body>

<header class="main-header">
    <div class="header-content">
        <div class="logo">
            <a href="#">Compte</a>
        </div>
        <nav class="main-nav">
            <ul >
                 <a href="page1.php"><i class="fas fa-home"></i> </a>
            </ul>
        </nav>
    </div>
</header>
    
    
    <div class="wrapper">
      <br><br><br>
        <!-- Affichage des messages d'erreur -->
        <?php
        session_start();
        if(isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
            echo '<div class="error-messages">';
            foreach($_SESSION['errors'] as $error) {
                echo '<p class="error">' . $error . '</p>';
            }
            echo '</div>';
            // Effacer les erreurs après affichage
            unset($_SESSION['errors']);
        }
        
        if(isset($_SESSION['success_message'])) {
            echo '<div class="success-message">';
            echo '<p class="success">' . $_SESSION['success_message'] . '</p>';
            echo '</div>';
            // Effacer le message après affichage
            unset($_SESSION['success_message']);
        }
        ?>
        
        <div class="container" id="signUp" style="display: none;">
            <h1 class="form-title">S'inscrire</h1>
            <form method="post" action="register.php">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="fName" id="fName" placeholder="Nom" required>
                    <label for="fName">Nom</label>
                </div>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="lName" id="lName" placeholder="Prénom" required>
                    <label for="lName">Prénom</label>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" id="regEmail" placeholder="Email" required>
                    <label for="regEmail">Email</label>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="regPassword" placeholder="Mot de passe" required>
                    <label for="regPassword">Mot de passe</label>
                </div>
                <input type="submit" class="btn" value="S'inscrire" name="signUp">
            </form>
            <p class="or">-----ou-----</p>
            <div class="icons">
                <div id="g_id_onload"
                     data-client_id="YOUR_CLIENT_ID.apps.googleusercontent.com"
                     data-login_uri="login_google.php">
                </div>
                <div class="g_id_signin"
                     data-type="standard"
                     data-size="large"
                     data-theme="outline"
                     data-text="sign_in_with"
                     data-shape="rectangular"
                     data-logo_alignment="left">
                </div>
            </div>
            <div class="links">
                <p>Vous avez déjà un compte</p>
                <button id="signInButton">Se connecter</button>
            </div>
        </div>

        <div class="container" id="signIn">
            <h1 class="form-title">Se connecter</h1>
            <form method="post" action="register.php">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" id="loginEmail" placeholder="Email" required>
                    <label for="loginEmail">Email</label>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="loginPassword" placeholder="Mot de passe" required>
                    <label for="loginPassword">Mot de passe</label>
                </div>
                <p class="recover">
                    <a href="demande_reset.php">Mot de passe oublié ?</a>
                </p>
                <input type="submit" class="btn" value="Se connecter" name="SignIn">
            </form>
            <p class="or">-----ou-----</p>
            <div class="icons">
                <div id="g_id_onload"
                     data-client_id="YOUR_CLIENT_ID.apps.googleusercontent.com"
                     data-login_uri="login_google.php">
                </div>
                <div class="g_id_signin"
                     data-type="standard"
                     data-size="large"
                     data-theme="outline"
                     data-text="sign_in_with"
                     data-shape="rectangular"
                     data-logo_alignment="left">
                </div>
            </div>
            <div class="links">
                <p>Vous n'avez pas de compte</p>
                <button id="signUpButton">Créer un compte</button>
            </div>
        </div>
    </div>

    <script src="scripts.js"></script>
</body>
</html>