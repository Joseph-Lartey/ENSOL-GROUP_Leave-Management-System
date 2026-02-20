<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Portal - Profile">
    <title>Profile | ENSOL Group Leave Portal</title>
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
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

                <a href="approvals.php" class="nav-item">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </span>
                    <span class="nav-text">Approvals</span>
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
                <a href="../auth/login.php" class="nav-item logout-btn">
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

            <div class="page-content">
                <!-- Profile Header (Red Bar) -->
                <div class="profile-header"></div>

                <!-- Profile Card -->
                <div class="profile-card">
                    <div class="profile-top">
                        <div class="profile-photo-column">
                            <img src="../assets/default-avatar.png" alt="Profile" class="profile-photo">
                            <h2 class="profile-name user-name">Loading...</h2>
                            <p class="profile-role user-role">Supervisor</p>
                        </div>

                        <div class="profile-details-column">
                            <h3>Bio & other details</h3>

                            <div class="profile-field">
                                <span class="profile-label">Name</span>
                                <span class="profile-value user-name">--</span>
                            </div>

                            <div class="profile-field">
                                <span class="profile-label">Role</span>
                                <span class="profile-value user-role">--</span>
                            </div>

                            <div class="profile-field">
                                <span class="profile-label">Department</span>
                                <span class="profile-value user-department">--</span>
                            </div>

                            <div class="profile-field">
                                <span class="profile-label">Email</span>
                                <span class="profile-value user-email">--</span>
                            </div>

                            <div class="profile-field">
                                <span class="profile-label">Phone</span>
                                <span class="profile-value user-phone">Not Set</span>
                            </div>

                            <div class="profile-field">
                                <span class="profile-label">Subsidiary</span>
                                <span class="profile-value user-subsidiary">--</span>
                            </div>

                            <div style="display: flex; gap: 10px; margin-top: 20px;">
                                <button class="edit-profile-btn" onclick="openEditModal()">Edit Profile</button>
                                <button class="edit-profile-btn" onclick="openPasswordModal()" style="background-color: #ef4444;">Change Password</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Summary -->
                <div class="profile-summary">
                    <h3>Summary</h3>

                    <div class="summary-item">
                        <strong>Upcoming leave date:</strong> 20 Mar 2026
                    </div>
                    <div class="summary-item">
                        <strong>Leave duration:</strong> 7 days
                    </div>
                    <div class="summary-item">
                        <strong>Last leave date:</strong> 10 Dec 2025
                    </div>
                    <div class="summary-item">
                        <strong>Total leaves taken:</strong> 8 days
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
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Profile Image</label>
                    <input type="file" id="editProfileImage" accept="image/*" style="font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">First Name</label>
                    <input type="text" id="editFirstName" required
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Last Name</label>
                    <input type="text" id="editLastName" required
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Phone</label>
                    <input type="tel" id="editPhone"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div class="modal-actions" style="margin-top: 24px;">
                    <button type="button" class="modal-btn cancel" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="modal-btn confirm">Save Changes</button>
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
                    <input type="password" id="newPassword" required
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Confirm New Password</label>
                    <input type="password" id="confirmPassword" required
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div class="modal-actions" style="margin-top: 24px;">
                    <button type="button" class="modal-btn cancel" onclick="closePasswordModal()">Cancel</button>
                    <button type="submit" class="modal-btn confirm">Update Password</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../assets/js/dashboard.js"></script>
    <script>
        // Extended Profile Management
        document.addEventListener('DOMContentLoaded', () => {
            const token = localStorage.getItem('token');
            if(token) {
                // Fetch full profile details including phone/subsidiary which default dashboard.js might miss
                fetch('../../api/v1/user/profile.php', {
                    headers: { 'Authorization': `Bearer ${token}` }
                })
                .then(r => r.json())
                .then(res => {
                    if(res.status === 'success') {
                        const u = res.data;
                        // Fill extra fields
                        document.querySelectorAll('.user-department').forEach(el => el.textContent = u.department || 'Not Set');
                        document.querySelectorAll('.user-phone').forEach(el => el.textContent = u.phone_number || 'Not Set');
                        document.querySelectorAll('.user-subsidiary').forEach(el => el.textContent = u.subsidiary || 'Not Set');
                        
                        // Store for edit form
                        localStorage.setItem('full_profile', JSON.stringify(u));
                    }
                });
            }
        });

        function openEditModal() {
            const user = JSON.parse(localStorage.getItem('full_profile') || '{}');
            const names = (user.full_name || '').split(' ');
            
            document.getElementById('editFirstName').value = names[0] || '';
            document.getElementById('editLastName').value = names.slice(1).join(' ') || '';
            document.getElementById('editPhone').value = user.phone_number || '';
            
            document.getElementById('editProfileModal').classList.add('active');
        }

        function closeEditModal() {
            document.getElementById('editProfileModal').classList.remove('active');
        }

        document.getElementById('editProfileForm').addEventListener('submit', function (e) {
            e.preventDefault();
            
            const formData = new FormData();
            formData.append('firstName', document.getElementById('editFirstName').value);
            formData.append('lastName', document.getElementById('editLastName').value);
            formData.append('phone', document.getElementById('editPhone').value);
            
            const fileInput = document.getElementById('editProfileImage');
            if(fileInput.files[0]) {
                formData.append('profileImage', fileInput.files[0]);
            }

            const token = localStorage.getItem('token');
            
            fetch('../../api/v1/user/profile.php', {
                method: 'POST',
                headers: { 'Authorization': `Bearer ${token}` }, // Verify if FormData needs content-type header removed? Yes, fetch handles it.
                body: formData
            })
            .then(r => r.json())
            .then(res => {
                if(res.status === 'success') {
                    alert('Profile updated successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + res.message);
                }
            })
            .catch(err => alert('Update failed.'));
        });

        // Password Modal
        function openPasswordModal() {
            document.getElementById('passwordModal').classList.add('active');
        }

        function closePasswordModal() {
            document.getElementById('passwordModal').classList.remove('active');
        }

        document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const cur = document.getElementById('currentPassword').value;
            const newP = document.getElementById('newPassword').value;
            const conf = document.getElementById('confirmPassword').value;

            if(newP !== conf) {
                alert('New passwords do not match');
                return;
            }

            const token = localStorage.getItem('token');
            fetch('../../api/v1/user/change-password.php', {
                method: 'POST',
                headers: { 
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json' 
                },
                body: JSON.stringify({ current_password: cur, new_password: newP })
            })
            .then(r => r.json())
            .then(res => {
                if(res.status === 'success') {
                    alert('Password changed successfully');
                    closePasswordModal();
                    document.getElementById('changePasswordForm').reset();
                } else {
                    alert('Error: ' + res.message);
                }
            });
        });
    </script>
</body>

</html>