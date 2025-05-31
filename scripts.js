
// Pour basculer entre les formulaires d'inscription et de connexion
document.addEventListener('DOMContentLoaded', function() {
    const signIn = document.getElementById('signIn');
    const signUp = document.getElementById('signUp');
    const signInButton = document.getElementById('signInButton');
    const signUpButton = document.getElementById('signUpButton');

    // Afficher le formulaire d'inscription et masquer le formulaire de connexion
    if (signUpButton) {
        signUpButton.addEventListener('click', function() {
            signIn.style.display = 'none';
            signUp.style.display = 'block';
        });
    }

    // Afficher le formulaire de connexion et masquer le formulaire d'inscription
    if (signInButton) {
        signInButton.addEventListener('click', function() {
            signUp.style.display = 'none';
            signIn.style.display = 'block';
        });
    }

    // Validation côté client pour le mot de passe
    const regPassword = document.getElementById('regPassword');
    if (regPassword) {
        regPassword.addEventListener('input', function() {
            if (this.value.length < 8) {
                this.setCustomValidity('Le mot de passe doit contenir au moins 8 caractères.');
            } else {
                this.setCustomValidity('');
            }
        });
    }
    
    // Afficher les messages d'erreur pendant 5 secondes puis les faire disparaître
    const errorMessages = document.querySelector('.error-messages');
    const successMessage = document.querySelector('.success-message');
    
    if (errorMessages) {
        setTimeout(function() {
            errorMessages.style.opacity = '0';
            setTimeout(function() {
                errorMessages.style.display = 'none';
            }, 1000);
        }, 5000);
    }
    
    if (successMessage) {
        setTimeout(function() {
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 1000);
        }, 5000);
    }
});