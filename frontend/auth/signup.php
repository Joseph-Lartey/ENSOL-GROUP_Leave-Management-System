<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Sign up for ENSOL Group Leave Management System - Create your account to manage your leave.">
    <title>Sign Up | ENSOL Group Leave Portal</title>

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
                    <h1 class="auth-title">Welcome to Leave Portal</h1>
                    <p class="auth-subtitle">Submit, track, and review your leave in one place.</p>
                </div>

                <!-- Sign Up Form -->
                <form class="auth-form" id="signupForm">
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" id="firstName" name="firstName" class="form-input"
                                placeholder="First Name" required autocomplete="given-name">
                        </div>
                        <div class="form-group">
                            <input type="text" id="lastName" name="lastName" class="form-input" placeholder="Last Name"
                                required autocomplete="family-name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="profileImage" class="form-label" style="display:block; margin-bottom:5px; color:var(--text-light);">Profile Picture (Optional)</label>
                        <input type="file" id="profileImage" name="profileImage" class="form-input" accept="image/*">
                    </div>

                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-input" placeholder="Email" required
                            autocomplete="email">
                    </div>

                    <div class="form-group">
                        <div class="password-input-wrapper">
                            <input type="password" id="password" name="password" class="form-input"
                                placeholder="Password" required autocomplete="new-password">
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
                                placeholder="Confirm Password" required autocomplete="new-password">
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
                        <select id="subsidiary" name="subsidiary" class="form-select" required>
                            <option value="" disabled selected>Subsidiary</option>
                            <option value="southey-contracting">Southey Contracting</option>
                            <option value="ensol-engineering">Ensol Engineering</option>
                            <option value="ensol-energy">Ensol Energy</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select id="department" name="department" class="form-select" required>
                            <option value="" disabled selected>Department</option>
                            <option value="engineering">Engineering</option>
                            <option value="operations">Operations</option>
                            <option value="finance">Finance</option>
                            <option value="hr">Human Resources</option>
                            <option value="marketing">Marketing</option>
                            <option value="admin">Administration</option>
                        </select>
                    </div>

                    <div class="auth-submit">
                        <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                    </div>
                </form>

                <!-- Footer -->
                <div class="auth-footer">
                    <p>Already have an account? <a href="login.php">Log in</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/auth.js"></script>
</body>

</html>