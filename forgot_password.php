<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper">
        <br><br><br>
        <div class="container" id="forgotPassword">
            <h1 class="form-title">Recover Password</h1>
            
        
            <div id="step1" style="display: block;">
                <p>Enter your email address to receive a password reset link.</p>
                <form method="post" action="demande_reset.php">
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="recoveryEmail" placeholder="Email" required>
                        <label for="recoveryEmail">Email</label>
                    </div>
                    <input type="submit" class="btn" value="Send Reset Link" name="sendResetLink">
                </form>
            </div>
            
           
            <div id="step2" style="display: none;">
                <p>Enter the verification code sent to your email.</p>
                <form method="post" action="forgot.php">
                    <div class="input-group">
                        <i class="fas fa-key"></i>
                        <input type="text" name="code" id="verificationCode" placeholder="Verification Code" required>
                        <label for="verificationCode">Verification Code</label>
                    </div>
                    <input type="hidden" name="email" id="hiddenEmail">
                    <input type="submit" class="btn" value="Verify Code" name="verifyCode">
                </form>
            </div>
            
          
            <div id="step3" style="display: none;">
                <p>Create your new password.</p>
                <form method="post" action="forgot.php">
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="newPassword" id="newPassword" placeholder="New Password" required>
                        <label for="newPassword">New Password</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
                        <label for="confirmPassword">Confirm Password</label>
                    </div>
                    <input type="hidden" name="email" id="hiddenEmail2">
                    <input type="hidden" name="code" id="hiddenCode">
                    <input type="submit" class="btn" value="Reset Password" name="resetPassword">
                </form>
            </div>
            
            <div class="links">
                <p>Remember your password?</p>
                <a href="index.php"><button>Back to Login</button></a>
            </div>
        </div>
    </div>

    <script>
      
        const urlParams = new URLSearchParams(window.location.search);
        const step = urlParams.get('step');
        const email = urlParams.get('email');
        const code = urlParams.get('code');if(step === '2' && email) {
            document.getElementById('step1').style.display = 'none';
            document.getElementById('step2').style.display = 'block';
            document.getElementById('hiddenEmail').value = email;
        }
        else if(step === '3' && email && code) {
            document.getElementById('step1').style.display = 'none';
            document.getElementById('step2').style.display = 'none';
            document.getElementById('step3').style.display = 'block';
            document.getElementById('hiddenEmail2').value = email;
            document.getElementById('hiddenCode').value = code;
        }
    </script>
</body>
</html>