<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Verify your identity - ENSOL Group Leave Portal">
    <title>Verification | ENSOL Group Leave Portal</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/auth.css">
    <style>
        .otp-inputs {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin: 30px 0;
        }

        .otp-input {
            width: 60px;
            height: 60px;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            color: var(--jet-black);
            transition: all 0.2s ease;
        }

        .otp-input:focus {
            outline: none;
            border-color: var(--vivid-red);
            box-shadow: 0 0 0 3px rgba(220, 22, 9, 0.1);
        }

        .resend-text {
            text-align: center;
            margin-top: 20px;
            color: var(--dark-gray);
            font-size: 14px;
        }

        .resend-link {
            color: var(--vivid-red);
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        .resend-link:hover {
            text-decoration: underline;
        }
    </style>

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
                <div class="auth-header" style="text-align: center; margin-bottom: 20px;">
                    <img src="../assets/ensol_logo.jpg" alt="ENSOL Group Logo" class="auth-logo"
                        style="width: 80px; height: auto; margin: 0 auto 20px;">
                    <h1 class="auth-title" style="font-size: 28px;">Verification</h1>
                    <p class="auth-subtitle">Check your email and enter the given code to change your password.</p>
                </div>

                <!-- OTP Form -->
                <form class="auth-form" id="otpForm">
                    <div class="otp-inputs">
                        <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*"
                            required>
                        <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*"
                            required>
                        <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*"
                            required>
                        <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*"
                            required>
                    </div>

                    <div class="auth-submit">
                        <button type="submit" class="btn btn-primary btn-block"
                            style="background-color: var(--vivid-red); border: none; height: 50px; font-size: 16px;">
                            Verify
                        </button>
                    </div>

                    <p class="resend-text">
                        Didn't receive the code? <a href="#" class="resend-link">Resend</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Auto-focus logic for OTP inputs
        const inputs = document.querySelectorAll('.otp-input');

        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if (e.target.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && e.target.value.length === 0 && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    </script>
</body>

</html>