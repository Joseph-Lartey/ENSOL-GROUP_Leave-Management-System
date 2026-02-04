/**
 * ENSOL GROUP - Auth Pages JavaScript
 * Handles form validation, password visibility toggle, OTP input, and form submissions
 */

document.addEventListener('DOMContentLoaded', function () {
    // Initialize all auth functionality
    initPasswordToggles();
    initOTPInputs();
    initFormValidation();
    initResendCode();
    initRememberMe();
});

/**
 * Remember Me Auto-fill
 * Restores saved email on login page
 */
function initRememberMe() {
    const emailField = document.getElementById('email');
    const rememberCheckbox = document.getElementById('rememberMe');
    const savedEmail = localStorage.getItem('rememberedEmail');

    if (savedEmail && emailField) {
        emailField.value = savedEmail;
        if (rememberCheckbox) {
            rememberCheckbox.checked = true;
        }
    }
}

/**
 * Password Visibility Toggle
 * Toggles between showing and hiding password fields
 */
function initPasswordToggles() {
    const toggleButtons = document.querySelectorAll('.password-toggle');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            const wrapper = this.closest('.password-input-wrapper');
            const input = wrapper.querySelector('input');
            const icon = this.querySelector('svg');

            if (input.type === 'password') {
                input.type = 'text';
                // Change to eye-off icon
                icon.innerHTML = `
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                    <line x1="1" y1="1" x2="23" y2="23"></line>
                `;
            } else {
                input.type = 'password';
                // Change to eye icon
                icon.innerHTML = `
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                `;
            }
        });
    });
}

/**
 * OTP Input Handler
 * Manages focus and input behavior for OTP code boxes
 */
function initOTPInputs() {
    const otpInputs = document.querySelectorAll('.otp-input');

    if (otpInputs.length === 0) return;

    otpInputs.forEach((input, index) => {
        // Handle input
        input.addEventListener('input', function (e) {
            // Only allow numbers
            this.value = this.value.replace(/[^0-9]/g, '');

            // Add filled class for styling
            if (this.value) {
                this.classList.add('filled');
            } else {
                this.classList.remove('filled');
            }

            // Auto-focus next input
            if (this.value && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
        });

        // Handle backspace
        input.addEventListener('keydown', function (e) {
            if (e.key === 'Backspace' && !this.value && index > 0) {
                otpInputs[index - 1].focus();
            }
        });

        // Handle paste
        input.addEventListener('paste', function (e) {
            e.preventDefault();
            const pastedData = e.clipboardData.getData('text').replace(/[^0-9]/g, '');

            if (pastedData.length > 0) {
                otpInputs.forEach((otp, i) => {
                    if (pastedData[i]) {
                        otp.value = pastedData[i];
                        otp.classList.add('filled');
                    }
                });

                // Focus on the last filled or first empty input
                const lastFilledIndex = Math.min(pastedData.length - 1, otpInputs.length - 1);
                otpInputs[lastFilledIndex].focus();
            }
        });
    });

    // Focus first OTP input on page load
    otpInputs[0].focus();
}

/**
 * Form Validation
 * Handles form submission and validation for all auth forms
 */
function initFormValidation() {
    // Login Form
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', handleLoginSubmit);
    }

    // Sign Up Form
    const signupForm = document.getElementById('signupForm');
    if (signupForm) {
        signupForm.addEventListener('submit', handleSignupSubmit);
    }

    // Forgot Password Form
    const forgotPasswordForm = document.getElementById('forgotPasswordForm');
    if (forgotPasswordForm) {
        forgotPasswordForm.addEventListener('submit', handleForgotPasswordSubmit);
    }

    // Verification Form
    const verificationForm = document.getElementById('verificationForm');
    if (verificationForm) {
        verificationForm.addEventListener('submit', handleVerificationSubmit);
    }

    // Change Password Form
    const changePasswordForm = document.getElementById('changePasswordForm');
    if (changePasswordForm) {
        changePasswordForm.addEventListener('submit', handleChangePasswordSubmit);
    }
}

/* ====== HELPER: SWEETALERT CONFIG ====== */
const swalConfig = {
    confirmButtonColor: '#DC1609', // Company Primary
    cancelButtonColor: '#1a1a1a',  // Company Secondary
    iconColor: '#DC1609'
};

/* ====== LOGIN FORM HANDLING ====== */
function handleLoginSubmit(e) {
    e.preventDefault();

    // ... validation ...
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const rememberMe = document.getElementById('rememberMe')?.checked || false;

    if (!validateEmail(email)) {
        showError('email', 'Please enter a valid email address');
        return;
    }

    if (!password) {
        showError('password', 'Please enter your password');
        return;
    }

    const submitBtn = this.querySelector('button[type="submit"]');
    setButtonLoading(submitBtn, true);

    fetch('../../api/v1/auth/login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, password })
    })
        .then(response => response.json())
        .then(data => {
            setButtonLoading(submitBtn, false);
            if (data.status === 'success') {
                // Handle Remember Me - save email for auto-fill
                if (rememberMe) {
                    localStorage.setItem('rememberedEmail', email);
                } else {
                    localStorage.removeItem('rememberedEmail');
                }

                // Store User
                localStorage.setItem('user', JSON.stringify(data.data));
                localStorage.setItem('token', data.token);

                // Success Alert before redirect
                Swal.fire({
                    ...swalConfig,
                    icon: 'success',
                    title: 'Welcome Back!',
                    text: 'Login successful',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    const role = data.data.role;
                    if (role === 'superadmin') window.location.href = '../superadmin/index.php';
                    else if (role === 'admin') window.location.href = '../admin/index.php';
                    else if (role === 'hr') window.location.href = '../hr/index.php';
                    else if (role === 'supervisor') window.location.href = '../supervisor/index.php';
                    else window.location.href = '../user/index.php';
                });
            } else {
                Swal.fire({
                    ...swalConfig,
                    icon: 'error',
                    title: 'Login Failed',
                    text: data.message || 'Invalid credentials'
                });
            }
        })
        .catch(error => {
            setButtonLoading(submitBtn, false);
            Swal.fire({
                ...swalConfig,
                icon: 'error',
                title: 'Connection Error',
                text: 'Unable to connect to the server'
            });
            console.error('Error:', error);
        });
}

/* ====== SIGNUP FORM HANDLING ====== */
function handleSignupSubmit(e) {
    e.preventDefault();

    // ... get values ...
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const subsidiary = document.getElementById('subsidiary').value;
    const department = document.getElementById('department').value;

    // Get File
    const profileInput = document.getElementById('profileImage');
    const profileFile = profileInput ? profileInput.files[0] : null;

    // Validation
    if (!firstName.trim() || !lastName.trim()) {
        showError('firstName', 'Please enter your full name');
        return;
    }

    if (!validateEmail(email)) {
        showError('email', 'Please enter a valid company email address');
        return;
    }

    if (password.length < 8) {
        showError('password', 'Password must be at least 8 characters');
        return;
    }

    if (password !== confirmPassword) {
        showError('confirmPassword', 'Passwords do not match');
        return;
    }

    if (!subsidiary) {
        showError('subsidiary', 'Please select a subsidiary');
        return;
    }

    if (!department) {
        showError('department', 'Please select a department');
        return;
    }

    const submitBtn = this.querySelector('button[type="submit"]');
    setButtonLoading(submitBtn, true);

    const formData = new FormData();
    formData.append('firstName', firstName);
    formData.append('lastName', lastName);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('subsidiary', subsidiary);
    formData.append('department', department);
    if (profileFile) {
        formData.append('profileImage', profileFile);
    }

    fetch('../../api/v1/auth/signup.php', {
        method: 'POST',
        // headers: DO NOT SET CONTENT-TYPE for FormData
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            setButtonLoading(submitBtn, false);
            if (data.status === 'success') {
                localStorage.setItem('pendingVerificationEmail', email);

                Swal.fire({
                    ...swalConfig,
                    icon: 'success',
                    title: 'Account Created!',
                    text: data.message,
                    confirmButtonText: 'Verify Now'
                }).then(() => {
                    window.location.href = 'verification.php';
                });
            } else {
                if (data.message.includes('email')) {
                    showError('email', data.message);
                } else {
                    Swal.fire({
                        ...swalConfig,
                        icon: 'error',
                        title: 'Signup Failed',
                        text: data.message
                    });
                }
            }
        })
        .catch(error => {
            setButtonLoading(submitBtn, false);
            Swal.fire({
                ...swalConfig,
                icon: 'error',
                title: 'System Error',
                text: 'Please try again later.'
            });
            console.error('Error:', error);
        });
}

/**
 * Handle Forgot Password Form Submit
 */
function handleForgotPasswordSubmit(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;

    if (!validateEmail(email)) {
        showError('email', 'Please enter a valid company email address');
        return;
    }

    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    setButtonLoading(submitBtn, true);

    // Simulate API call
    console.log('Forgot password request for:', email);

    // TODO: Replace with actual API call
    setTimeout(() => {
        setButtonLoading(submitBtn, false);
        // Redirect to verification page
        window.location.href = 'verification.php';
    }, 1500);
}

/* ====== VERIFICATION HANDLING ====== */
function handleVerificationSubmit(e) {
    e.preventDefault();

    const otpInputs = document.querySelectorAll('.otp-input');
    let otp = '';
    otpInputs.forEach(input => otp += input.value);

    if (otp.length !== 4) {
        Swal.fire({
            ...swalConfig,
            icon: 'warning',
            text: 'Please enter the complete 4-digit code'
        });
        return;
    }

    const email = localStorage.getItem('pendingVerificationEmail');
    if (!email) {
        Swal.fire({
            ...swalConfig,
            icon: 'info',
            text: 'Session expired. Please sign up or login again.'
        }).then(() => window.location.href = 'signup.php');
        return;
    }

    const submitBtn = this.querySelector('button[type="submit"]');
    setButtonLoading(submitBtn, true);

    fetch('../../api/v1/auth/verify_otp.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, otp })
    })
        .then(response => response.json())
        .then(data => {
            setButtonLoading(submitBtn, false);
            if (data.status === 'success') {
                localStorage.removeItem('pendingVerificationEmail');

                Swal.fire({
                    ...swalConfig,
                    icon: 'success',
                    title: 'Verified!',
                    text: 'Your account is now active.',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'login.php';
                });
            } else {
                Swal.fire({
                    ...swalConfig,
                    icon: 'error',
                    title: 'Verification Failed',
                    text: data.message || 'Invalid Code'
                });
                // Clear inputs on failure?
                otpInputs.forEach(input => input.value = '');
                otpInputs[0].focus();
            }
        })
        .catch(error => {
            setButtonLoading(submitBtn, false);
            Swal.fire({
                ...swalConfig,
                icon: 'error',
                text: 'Server connection error'
            });
            console.error('Error:', error);
        });
}

/**
 * Handle Change Password Form Submit
 */
function handleChangePasswordSubmit(e) {
    e.preventDefault();

    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (newPassword.length < 8) {
        showError('newPassword', 'Password must be at least 8 characters');
        return;
    }

    if (newPassword !== confirmPassword) {
        showError('confirmPassword', 'Passwords do not match');
        return;
    }

    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    setButtonLoading(submitBtn, true);

    // Simulate API call
    console.log('Password change request');

    // TODO: Replace with actual API call
    setTimeout(() => {
        setButtonLoading(submitBtn, false);
        // Redirect to success page
        window.location.href = 'password-changed.php';
    }, 1500);
}

/**
 * Initialize Resend Code functionality
 */
function initResendCode() {
    const resendLink = document.getElementById('resendCode');

    if (!resendLink) return;

    let cooldown = 0;

    resendLink.addEventListener('click', function (e) {
        e.preventDefault();

        if (cooldown > 0) return;

        // Simulate API call
        console.log('Resending verification code...');

        // Start cooldown
        cooldown = 60;
        this.style.pointerEvents = 'none';
        this.style.opacity = '0.5';

        const originalText = this.textContent;

        const interval = setInterval(() => {
            cooldown--;
            this.textContent = `Resend (${cooldown}s)`;

            if (cooldown <= 0) {
                clearInterval(interval);
                this.textContent = originalText;
                this.style.pointerEvents = 'auto';
                this.style.opacity = '1';
            }
        }, 1000);

        // TODO: Replace with actual API call
        alert('Verification code has been resent to your email');
    });
}

/**
 * Utility Functions
 */

// Email validation
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Show error message for an input
function showError(inputId, message) {
    const input = document.getElementById(inputId);
    if (!input) return;

    // Remove any existing error
    clearError(inputId);

    // Add error class to input
    input.classList.add('error');

    // Create and insert error message
    const errorEl = document.createElement('span');
    errorEl.className = 'form-error';
    errorEl.textContent = message;

    const wrapper = input.closest('.form-group') || input.closest('.password-input-wrapper')?.parentElement;
    if (wrapper) {
        wrapper.appendChild(errorEl);
    }

    // Remove error on input focus
    input.addEventListener('focus', function handler() {
        clearError(inputId);
        this.removeEventListener('focus', handler);
    });
}

// Clear error message for an input
function clearError(inputId) {
    const input = document.getElementById(inputId);
    if (!input) return;

    input.classList.remove('error');

    const wrapper = input.closest('.form-group') || input.closest('.password-input-wrapper')?.parentElement;
    if (wrapper) {
        const errorEl = wrapper.querySelector('.form-error');
        if (errorEl) {
            errorEl.remove();
        }
    }
}

// Set button loading state
function setButtonLoading(button, isLoading) {
    if (!button) return;

    if (isLoading) {
        button.classList.add('loading');
        button.disabled = true;
    } else {
        button.classList.remove('loading');
        button.disabled = false;
    }
}
