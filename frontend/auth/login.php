<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Login to ENSOL Group Leave Management System - Submit, track, and review your leave in one place.">
    <title>Login | ENSOL Group Leave Portal</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/auth.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
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
                    <h1 class="auth-title">Welcome back to Leave Portal</h1>
                    <p class="auth-subtitle">Submit, track, and review your leave in one place.</p>
                </div>

                <!-- Login Form -->
                <form class="auth-form" id="loginForm">
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-input" placeholder="Email" required
                            autocomplete="email">
                    </div>

                    <div class="form-group">
                        <div class="password-input-wrapper">
                            <input type="password" id="password" name="password" class="form-input"
                                placeholder="Password" required autocomplete="current-password">
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

                    <div class="remember-row">
                        <a href="forgot-password.php" class="forgot-password-link">Forgot password?</a>

                        <div class="toggle-wrapper">
                            <span class="toggle-label">Remember sign in details</span>
                            <label class="toggle">
                                <input type="checkbox" id="rememberMe" name="rememberMe">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>

                    <div class="auth-submit">
                        <button type="submit" class="btn btn-primary btn-block">Log in</button>
                    </div>
                </form>

                <!-- Footer -->
                <div class="auth-footer">
                    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/auth.js"></script>
</body>

</html>