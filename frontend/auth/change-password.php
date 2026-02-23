<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Change your password - Create a new password for your ENSOL Group Leave Portal account.">
    <title>Change Password | ENSOL Group Leave Portal</title>

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
                    <h1 class="auth-title">Change Password</h1>
                    <p class="auth-subtitle">Enter your a new password different from your old password.</p>
                </div>

                <!-- Change Password Form -->
                <form class="auth-form" id="changePasswordForm">
                    <div class="form-group">
                        <div class="password-input-wrapper">
                            <input type="password" id="newPassword" name="newPassword" class="form-input"
                                placeholder="Enter new password" required autocomplete="new-password">
                            <button type="button" class="password-toggle" aria-label="Toggle password visibility">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="password-input-wrapper">
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-input"
                                placeholder="Confirm password" required autocomplete="new-password">
                            <button type="button" class="password-toggle" aria-label="Toggle password visibility">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="auth-submit">
                        <button type="submit" class="btn btn-primary btn-block">Confirm</button>
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