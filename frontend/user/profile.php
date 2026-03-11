<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Portal - Profile">
    <title>Profile | ENSOL Group Leave Portal</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">

    <!-- Favicon -->
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="../assets/ensol_logo.jpg">

    <style>
        .change-password-btn {
            background: #FFF;
            color: #DC1609;
            border: 1px solid #DC1609;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            transition: all 0.3s ease;
            transform: translateY(8px);
            /* Adjusted to 8px as requested */
        }

        .change-password-btn:hover {
            background: #DC1609;
            color: #FFF;
            font-weight: 700;
            /* Bold on hover */
        }

        .edit-profile-btn {
            padding: 10px 20px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="dashboard-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-logo">
                <img src="../assets/ensol_logo.jpg" alt="ENSOL Group">
            </div>

            <nav class="sidebar-nav">
                <a href="index.php" class="nav-item">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </span>
                    <span class="nav-text">Dashboard</span>
                </a>

                <a href="apply-leave.php" class="nav-item">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="12" y1="18" x2="12" y2="12"></line>
                            <line x1="9" y1="15" x2="15" y2="15"></line>
                        </svg>
                    </span>
                    <span class="nav-text">Apply Leave</span>
                </a>

                <a href="my-requests.php" class="nav-item">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                    </span>
                    <span class="nav-text">My Requests</span>
                </a>

                <a href="leave-balance.php" class="nav-item">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </span>
                    <span class="nav-text">Leave Balance</span>
                </a>

                <a href="profile.php" class="nav-item active">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </span>
                    <span class="nav-text">Profile</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <a href="#" class="nav-item logout-btn">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                    </span>
                    <span class="nav-text">Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Header -->
            <header class="top-header">
                <h1 class="page-title">Profile</h1>

                <div class="header-actions">
                    <a href="notifications.php" class="notification-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                        <span class="notification-badge"></span>
                    </a>
                    <a href="profile.php">
                        <img src="../assets/img2.jpg" alt="Profile" class="header-avatar">
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <!-- Profile Header (Red Bar) -->
                <div class="profile-header"></div>

                <div class="profile-card">
                    <div class="profile-top">
                        <div class="profile-photo-column">
                            <img src="../assets/default-avatar.png" alt="Profile" class="profile-photo" id="displayProfileImg">
                            <h2 class="profile-name" id="displayName">Loading...</h2>
                            <p class="profile-role" id="displayRole">...</p>
                        </div>

                        <div class="profile-details-column">
                            <h3>Bio & other details</h3>

                            <div class="profile-field">
                                <span class="profile-label">Name</span>
                                <span class="profile-value" id="viewName">--</span>
                            </div>

                            <div class="profile-field">
                                <span class="profile-label">Role</span>
                                <span class="profile-value" id="viewRole">--</span>
                            </div>

                            <div class="profile-field">
                                <span class="profile-label">Position</span>
                                <span class="profile-value" id="viewPosition">Not Set</span>
                            </div>

                            <div class="profile-field">
                                <span class="profile-label">Department</span>
                                <span class="profile-value" id="viewDepartment">--</span>
                            </div>

                            <div class="profile-field">
                                <span class="profile-label">Email</span>
                                <span class="profile-value" id="viewEmail">--</span>
                            </div>

                            <div class="profile-field">
                                <span class="profile-label">Phone</span>
                                <span class="profile-value" id="viewPhone">--</span>
                            </div>

                            <div class="profile-field">
                                <span class="profile-label">Subsidiary</span>
                                <span class="profile-value" id="viewSubsidiary">--</span>
                            </div>

                            <div class="action-buttons" style="display: flex; gap: 10px; margin-top: 20px; align-items: center;">
                                <button class="edit-profile-btn" onclick="openEditModal()">Edit Profile</button>
                                <button class="change-password-btn" onclick="openChangePasswordModal()">Change Password</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Summary -->
                <div class="profile-summary">
                    <h3>One-Click Summary</h3>
                    <div class="summary-item">
                        <strong>Joined Date:</strong> <span id="viewJoined">--</span>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal-overlay" id="editProfileModal">
        <div class="modal-content" style="max-width: 500px; text-align: left;">
            <h2 class="modal-title" style="text-align: center;">Edit Profile</h2>
            <form id="editProfileForm">
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">First Name</label>
                    <input type="text" id="editFirstName" name="firstName" required
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Last Name</label>
                    <input type="text" id="editLastName" name="lastName" required
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Phone</label>
                    <input type="tel" id="editPhone" name="phone"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Position / Job Title (Read-only)</label>
                    <input type="text" id="editPosition" name="position" readonly
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px; background-color: #f9f9f9; color: #888;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Profile Image</label>
                    <input type="file" id="editProfileImage" name="profileImage" accept="image/*"
                        style="width: 100%; padding: 10px; font-size: 14px;">
                </div>

                <div class="modal-actions" style="margin-top: 24px;">
                    <button type="button" class="modal-btn cancel" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="modal-btn confirm">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div class="modal-overlay" id="changePasswordModal">
        <div class="modal-content" style="max-width: 500px; text-align: left;">
            <h2 class="modal-title" style="text-align: center;">Change Password</h2>
            <form id="changePasswordForm">
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Current Password</label>
                    <input type="password" name="currentPassword" required placeholder="Enter current password"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">New Password</label>
                    <input type="password" name="newPassword" required placeholder="Minimum 8 characters" minlength="8"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Confirm New Password</label>
                    <input type="password" name="confirmPassword" required placeholder="Re-enter new password" minlength="8"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>

                <div class="modal-actions" style="margin-top: 24px;">
                    <button type="button" class="modal-btn cancel" onclick="closeChangePasswordModal()">Cancel</button>
                    <button type="submit" class="modal-btn confirm">Update Password</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal-overlay" id="logoutModal">
        <div class="modal-content">
            <h2 class="modal-title">Are you sure you want to log out?</h2>
            <div class="modal-actions">
                <button class="modal-btn cancel">No</button>
                <button class="modal-btn confirm">Yes</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script>
        // Local script for profile-specific logic
        document.addEventListener('DOMContentLoaded', () => {
            fetchProfileData();
        });

        function fetchProfileData() {
            const jwt = localStorage.getItem('token');
            if (!jwt) {
                window.location.href = '../auth/login.php';
                return;
            }

            fetch('../../api/v1/user/profile.php', {
                    headers: {
                        'Authorization': `Bearer ${jwt}`
                    }
                })
                .then(r => {
                    if (r.status === 401 || r.status === 403) {
                        localStorage.removeItem('token');
                        localStorage.removeItem('user');
                        window.location.href = '../auth/login.php';
                        throw new Error('Unauthorized');
                    }
                    return r.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        const user = data.data;
                        renderProfile(user);

                        // Pre-fill Modal
                        const names = user.full_name.split(' ');
                        document.getElementById('editFirstName').value = names[0] || '';
                        document.getElementById('editLastName').value = names.slice(1).join(' ') || '';
                        document.getElementById('editPhone').value = user.phone_number || '';
                        document.getElementById('editPosition').value = user.position || '';
                    }
                })
                .catch(err => console.error('Fetch Profile Error:', err));
        }

        function renderProfile(user) {
            // Profile Card
            document.getElementById('displayName').textContent = user.full_name;
            document.getElementById('displayRole').textContent = user.position || user.role;

            if (user.profile_image) {
                let displayPath = user.profile_image;
                if (displayPath.startsWith('/')) displayPath = displayPath.substring(1);

                // Handle different path formats:
                // 1. New format: 'assets/uploads/profile_images/...'
                // 2. Legacy format: 'uploads/profiles/...'
                if (displayPath.startsWith('assets/')) {
                    displayPath = '../' + displayPath;
                } else if (displayPath.startsWith('uploads/')) {
                    // Legacy path - files are in frontend/uploads/...
                    displayPath = '../' + displayPath;
                } else {
                    displayPath = '../uploads/profiles/' + displayPath;
                }

                // Cache buster
                displayPath += '?v=' + new Date().getTime();

                const imgEl = document.getElementById('displayProfileImg');
                imgEl.src = displayPath;
                imgEl.onerror = function() {
                    this.src = '../assets/default-avatar.png';
                };

                // Also update header avatar
                const headerAvatar = document.querySelector('.header-avatar');
                if (headerAvatar) {
                    headerAvatar.src = displayPath;
                }
            }

            // Details
            document.getElementById('viewName').textContent = user.full_name;
            document.getElementById('viewRole').textContent = user.role;
            document.getElementById('viewPosition').textContent = user.position || 'Not Set';
            document.getElementById('viewDepartment').textContent = user.department || 'Not Set';
            document.getElementById('viewEmail').textContent = user.email;
            document.getElementById('viewPhone').textContent = user.phone_number || 'Not set';
            document.getElementById('viewSubsidiary').textContent = user.subsidiary || 'Ensol Group';

            // Date
            if (user.created_at) {
                const date = new Date(user.created_at);
                document.getElementById('viewJoined').textContent = date.toLocaleDateString('en-GB', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                });
            }
        }

        function openEditModal() {
            document.getElementById('editProfileModal').classList.add('active');
        }

        function closeEditModal() {
            document.getElementById('editProfileModal').classList.remove('active');
        }

        function openChangePasswordModal() {
            document.getElementById('changePasswordModal').classList.add('active');
        }

        function closeChangePasswordModal() {
            document.getElementById('changePasswordModal').classList.remove('active');
            document.getElementById('changePasswordForm').reset();
        }

        /* ====== HANDLE EDIT SUBMISSION ====== */
        document.getElementById('editProfileForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            const jwt = localStorage.getItem('token');

            // DEBUG: Check if token exists
            console.log('Token at submit time:', jwt ? 'EXISTS' : 'NULL');

            if (!jwt) {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                Swal.fire({
                    icon: 'error',
                    title: 'Session Expired',
                    text: 'Your session has expired. Please log in again.',
                    confirmButtonColor: '#DC1609'
                }).then(() => {
                    window.location.href = '../auth/login.php';
                });
                return;
            }

            const formData = new FormData(this);

            fetch('../../api/v1/user/profile.php', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${jwt}`
                    },
                    body: formData
                })
                .then(r => r.json())
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Profile Updated',
                            text: 'Your details have been saved.',
                            confirmButtonColor: '#DC1609'
                        });

                        closeEditModal();
                        renderProfile(data.data);
                        localStorage.setItem('user', JSON.stringify(data.data));
                        if (window.initProfileSync) window.initProfileSync(jwt);

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Update Failed',
                            text: data.message || 'Something went wrong.',
                            confirmButtonColor: '#DC1609'
                        });
                    }
                })
                .catch(err => {
                    console.error(err);
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    Swal.fire({
                        icon: 'error',
                        title: 'Network Error',
                        text: 'Could not connect to server.'
                    });
                });
        });

        /* ====== CHANGE PASSWORD SUBMISSION ====== */
        document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Updating...';
            submitBtn.disabled = true;

            const jwt = localStorage.getItem('token');
            const formData = new FormData(this);
            const jsonData = Object.fromEntries(formData.entries());

            fetch('../../api/v1/user/change-password.php', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${jwt}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(jsonData)
                })
                .then(r => r.json())
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Password Changed',
                            text: 'Your password has been updated. Please log in again with your new password.',
                            confirmButtonColor: '#DC1609'
                        }).then(() => {
                            // Force logout after password change
                            localStorage.removeItem('token');
                            localStorage.removeItem('user');
                            window.location.href = '../auth/login.php';
                        });
                        closeChangePasswordModal();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message || 'Failed to update password.',
                            confirmButtonColor: '#DC1609'
                        });
                    }
                })
                .catch(err => {
                    console.error(err);
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    Swal.fire({
                        icon: 'error',
                        title: 'Network Error',
                        text: 'Could not connect to server.'
                    });
                });
        });
    </script>
</body>

</html>