<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Verify your identity - Enter the verification code sent to your email.">
    <title>Verification | ENSOL Group Leave Portal</title>

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
                    <h1 class="auth-title">Verification</h1>
                    <p class="auth-subtitle">Check your email and enter the given code to change your password.</p>
                </div>

                <!-- OTP Form -->
                <form class="auth-form" id="verificationForm">
                    <div class="otp-input-group">
                        <input type="text" class="otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]"
                            autocomplete="one-time-code" required>
                        <input type="text" class="otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]"
                            autocomplete="one-time-code" required>
                        <input type="text" class="otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]"
                            autocomplete="one-time-code" required>
                        <input type="text" class="otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]"
                            autocomplete="one-time-code" required>
                    </div>

                    <div class="auth-submit">
                        <button type="submit" class="btn btn-primary btn-block">Verify</button>
                    </div>
                </form>

                <!-- Resend Link -->
                <div class="resend-link">
                    <p>Didn't receive the code? <a href="#" id="resendCode">Resend</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/auth.js"></script>
</body>

</html>