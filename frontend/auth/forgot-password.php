<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Reset your ENSOL Group Leave Portal password - Enter your email to receive a verification code.">
    <title>Forgot Password | ENSOL Group Leave Portal</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/auth.css">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="../assets/ensol_logo.jpg">
</head>

<body>
    <div class="auth-page">
        <!-- Left Side - Image -->
        <div class="auth-image-section">
            <img src="../assets/img2.jpg" alt="ENSOL Group Workers" class="auth-image">
        </div>

        <!-- Right Side - Form -->
        <div class="auth-form-section">
            <div class="auth-content">
                <!-- Header -->
                <div class="auth-header">
                    <img src="../assets/ensol_logo.jpg" alt="ENSOL Group Logo" class="auth-logo">
                    <h1 class="auth-title">Forgotten Password?</h1>
                    <p class="auth-subtitle">Don't worry! It occurs. Please enter the email address linked with your
                        account.</p>
                </div>

                <!-- Forgot Password Form -->
                <form class="auth-form" id="forgotPasswordForm">
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-input"
                            placeholder="Enter your Email Address" required autocomplete="email">
                    </div>

                    <div class="auth-submit">
                        <button type="submit" class="btn btn-primary btn-block">Send Code</button>
                    </div>
                </form>

                <!-- Footer -->
                <div class="auth-footer">
                    <p>Remember your password? <a href="login.php">Log in</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/auth.js"></script>
</body>

</html>