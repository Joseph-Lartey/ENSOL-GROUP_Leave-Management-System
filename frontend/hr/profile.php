<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Management - Admin Profile">
    <title>Profile | ENSOL Group Leave Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>

<body>
    <div class="dashboard-layout">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-logo">
                <img src="../assets/ensol_logo.jpg" alt="ENSOL Group">
            </div>

            <div class="sidebar-nav">
                <a href="index.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </span>
                    <span class="nav-text">Dashboard</span>
                </a>
                <a href="employees.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </span>
                    <span class="nav-text">Employees</span>
                </a>
                <a href="approvals.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </span>
                    <span class="nav-text">Approvals</span>
                </a>
                <a href="reviews.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                        </svg>
                    </span>
                    <span class="nav-text">Reviews</span>
                </a>
                <a href="apply-leave.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                            <line x1="12" y1="14" x2="12" y2="18"></line>
                            <line x1="10" y1="16" x2="14" y2="16"></line>
                        </svg>
                    </span>
                    <span class="nav-text">Apply Leave</span>
                </a>
            <a href="profile.php" class="nav-item active">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </span>
                    <span class="nav-text">Profile</span>
                </a>
            </div>

            <div class="sidebar-footer">
                <a href="#" class="nav-item logout-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                    </span>
                    <span class="nav-text">Logout</span>
                </a>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
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
                        <img src="../assets/images/admin-avatar.png" alt="HR" class="header-avatar"
                            onerror="this.src='https://ui-avatars.com/api/?name=Admin&background=dc2626&color=fff'">
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <div class="dashboard-card" style="max-width: 900px; margin: 0 auto;">
                    <div class="admin-profile-grid">
                        <!-- Profile Main -->
                        <div class="profile-main dashboard-card">
                            <h3 id="profileName">Loading...</h3>
                            <img id="profilePhoto" src="https://ui-avatars.com/api/?name=HR&background=dc2626&color=fff&size=150"
                                alt="Profile" class="profile-photo">
                        </div>

                        <!-- Profile Bio -->
                        <div class="profile-bio dashboard-card">
                            <h3>Bio & other details</h3>
                            <div class="bio-item">
                                <span>Name</span>
                                <span id="bioName">--</span>
                            </div>
                            <div class="bio-item">
                                <span>Role</span>
                                <span id="bioRole">--</span>
                            </div>
                            <div class="bio-item">
                                <span>Department</span>
                                <span id="bioDepartment">--</span>
                            </div>
                            <div class="bio-item">
                                <span>Email</span>
                                <span id="bioEmail">--</span>
                            </div>
                            <div class="bio-item">
                                <span>Phone</span>
                                <span id="bioPhone">--</span>
                            </div>
                            <div class="bio-item">
                                <span>Subsidiary</span>
                                <span id="bioSubsidiary">--</span>
                            </div>
                            <div style="margin-top: 20px; display: flex; gap: 10px;">
                                <button class="btn btn-primary" onclick="openEditModal()" style="flex: 1;">Edit Profile</button>
                                <button class="btn btn-outline" onclick="openPasswordModal()" style="flex: 1;">Change Password</button>
                            </div>
                        </div>

                        <!-- Summary -->
                        <div class="profile-summary">
                            <h3>Summary</h3>
                            <div class="summary-item">Position: <strong id="summaryPosition">--</strong></div>
                            <div class="summary-item">Member since: <strong id="summaryMemberSince">--</strong></div>
                        </div>
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
                <div style="margin-bottom: 16px; text-align: center;">
                    <img id="editProfilePhoto" src="" alt="Profile" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin-bottom: 10px;">
                    <br>
                    <label class="btn btn-outline" style="cursor: pointer; display: inline-block; padding: 8px 16px; font-size: 12px;">
                        Upload Photo
                        <input type="file" id="profileImageInput" accept="image/*" style="display: none;">
                    </label>
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">First Name</label>
                    <input type="text" id="editFirstName"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Last Name</label>
                    <input type="text" id="editLastName"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Phone</label>
                    <input type="tel" id="editPhone"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Email (Read-only)</label>
                    <input type="email" id="editEmail" readonly
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px; background-color: #f9f9f9; color: #999;">
                </div>
                <div class="modal-actions" style="margin-top: 24px;">
                    <button type="button" class="modal-btn cancel" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="modal-btn confirm" id="saveProfileBtn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div class="modal-overlay" id="passwordModal">
        <div class="modal-content" style="max-width: 400px; text-align: left;">
            <h2 class="modal-title" style="text-align: center;">Change Password</h2>
            <form id="changePasswordForm">
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Current Password</label>
                    <input type="password" id="currentPassword" required
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">New Password</label>
                    <input type="password" id="newPassword" required minlength="8"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Confirm New Password</label>
                    <input type="password" id="confirmPassword" required minlength="8"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div class="modal-actions" style="margin-top: 24px;">
                    <button type="button" class="modal-btn cancel" onclick="closePasswordModal()">Cancel</button>
                    <button type="submit" class="modal-btn confirm" id="changePasswordBtn">Change Password</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const API_BASE = '../../api/v1';
        let currentProfileData = null;
        let selectedImageFile = null;

        // Get JWT Token
        function getToken() {
            return localStorage.getItem('token');
        }

        // Check authentication
        function checkAuth() {
            const token = getToken();
            if (!token) {
                window.location.href = '../auth/login.php';
                return false;
            }
            return true;
        }

        // Fetch Profile Data
        async function fetchProfile() {
            try {
                const response = await fetch(`${API_BASE}/user/profile.php`, {
                    headers: { 'Authorization': `Bearer ${getToken()}` }
                });

                if (response.status === 401 || response.status === 403) {
                    window.location.href = '../auth/login.php';
                    return;
                }

                const result = await response.json();
                if (result.status === 'success') {
                    currentProfileData = result.data;
                    displayProfile(result.data);
                }
            } catch (error) {
                console.error('Error fetching profile:', error);
            }
        }

        // Display Profile Data
        function displayProfile(data) {
            const name = data.full_name || 'User';
            const photoUrl = data.profile_image 
                ? '../' + data.profile_image 
                : `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=dc2626&color=fff&size=150`;

            document.getElementById('profileName').textContent = name;
            document.getElementById('profilePhoto').src = photoUrl;
            document.querySelector('.header-avatar').src = photoUrl;

            document.getElementById('bioName').textContent = name;
            document.getElementById('bioRole').textContent = (data.role || '').toUpperCase();
            document.getElementById('bioDepartment').textContent = data.department || 'N/A';
            document.getElementById('bioEmail').textContent = data.email || 'N/A';
            document.getElementById('bioPhone').textContent = data.phone_number || 'N/A';
            document.getElementById('bioSubsidiary').textContent = data.subsidiary || 'N/A';

            document.getElementById('summaryPosition').textContent = data.position || 'N/A';
            document.getElementById('summaryMemberSince').textContent = data.created_at 
                ? new Date(data.created_at).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })
                : 'N/A';
        }

        // Open Edit Modal
        function openEditModal() {
            if (!currentProfileData) return;

            const nameParts = (currentProfileData.full_name || '').split(' ');
            document.getElementById('editFirstName').value = nameParts[0] || '';
            document.getElementById('editLastName').value = nameParts.slice(1).join(' ') || '';
            document.getElementById('editPhone').value = currentProfileData.phone_number || '';
            document.getElementById('editEmail').value = currentProfileData.email || '';
            
            const photoUrl = currentProfileData.profile_image 
                ? '../' + currentProfileData.profile_image 
                : `https://ui-avatars.com/api/?name=${encodeURIComponent(currentProfileData.full_name)}&background=dc2626&color=fff&size=100`;
            document.getElementById('editProfilePhoto').src = photoUrl;

            document.getElementById('editProfileModal').classList.add('active');
        }

        function closeEditModal() {
            document.getElementById('editProfileModal').classList.remove('active');
            selectedImageFile = null;
        }

        // Handle Image Selection
        document.getElementById('profileImageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                selectedImageFile = file;
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('editProfilePhoto').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Save Profile
        document.getElementById('editProfileForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const saveBtn = document.getElementById('saveProfileBtn');
            saveBtn.disabled = true;
            saveBtn.textContent = 'Saving...';

            const formData = new FormData();
            formData.append('firstName', document.getElementById('editFirstName').value);
            formData.append('lastName', document.getElementById('editLastName').value);
            formData.append('phone', document.getElementById('editPhone').value);

            if (selectedImageFile) {
                formData.append('profileImage', selectedImageFile);
            }

            try {
                const response = await fetch(`${API_BASE}/user/profile.php`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${getToken()}`
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok && result.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Profile Updated!',
                        text: 'Your profile has been updated successfully.',
                        confirmButtonColor: '#dc2626'
                    });
                    closeEditModal();
                    fetchProfile(); // Refresh display
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed',
                        text: result.message || 'Failed to update profile.'
                    });
                }
            } catch (error) {
                console.error('Error updating profile:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Network error. Please try again.'
                });
            } finally {
                saveBtn.disabled = false;
                saveBtn.textContent = 'Save Changes';
            }
        });

        // Password Modal
        function openPasswordModal() {
            document.getElementById('currentPassword').value = '';
            document.getElementById('newPassword').value = '';
            document.getElementById('confirmPassword').value = '';
            document.getElementById('passwordModal').classList.add('active');
        }

        function closePasswordModal() {
            document.getElementById('passwordModal').classList.remove('active');
        }

        // Change Password
        document.getElementById('changePasswordForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const currentPassword = document.getElementById('currentPassword').value;
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (newPassword !== confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Passwords Do Not Match',
                    text: 'Please ensure both password fields match.'
                });
                return;
            }

            const changeBtn = document.getElementById('changePasswordBtn');
            changeBtn.disabled = true;
            changeBtn.textContent = 'Changing...';

            try {
                const response = await fetch(`${API_BASE}/user/change-password.php`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${getToken()}`
                    },
                    body: JSON.stringify({ currentPassword, newPassword, confirmPassword })
                });

                const result = await response.json();

                if (response.ok && result.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Password Changed!',
                        text: 'Your password has been updated successfully.',
                        confirmButtonColor: '#dc2626'
                    });
                    closePasswordModal();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Change Failed',
                        text: result.message || 'Failed to change password.'
                    });
                }
            } catch (error) {
                console.error('Error changing password:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Network error. Please try again.'
                });
            } finally {
                changeBtn.disabled = false;
                changeBtn.textContent = 'Change Password';
            }
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            if (!checkAuth()) return;
            fetchProfile();
            
            // Logout confirmation
            const logoutBtn = document.querySelector('.logout-item');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Logout',
                        text: 'Are you sure you want to logout?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#dc2626',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Yes, logout'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            localStorage.removeItem('token');
                            window.location.href = '../auth/login.php';
                        }
                    });
                });
            }
        });
    </script>
</body>

</html>