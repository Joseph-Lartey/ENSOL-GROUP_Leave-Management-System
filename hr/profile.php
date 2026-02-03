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
            </div>

            <div class="sidebar-footer">
                <a href="../auth/login.php" class="nav-item logout-item">
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
            <header class="dashboard-header">
                <h1 class="page-title">Profile</h1>
                <div class="header-actions">
                    <a href="notifications.php" class="notification-btn">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" fill="none"
                            stroke-width="2">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </a>
                    <a href="profile.php" class="profile-avatar">
                        <img src="../assets/images/admin-avatar.png" alt="HR"
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
                            <h3>John Doe</h3>
                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=dc2626&color=fff&size=150"
                                alt="Profile" class="profile-photo">
                        </div>

                        <!-- Profile Bio -->
                        <div class="profile-bio dashboard-card">
                            <h3>Bio & other details</h3>
                            <div class="bio-item">
                                <span>Name</span>
                                <span>John Doe</span>
                            </div>
                            <div class="bio-item">
                                <span>Role</span>
                                <span>HR Manager</span>
                            </div>
                            <div class="bio-item">
                                <span>Department</span>
                                <span>Human Resources</span>
                            </div>
                            <div class="bio-item">
                                <span>Email</span>
                                <span>johndoe@ensol.com</span>
                            </div>
                            <div class="bio-item">
                                <span>Phone</span>
                                <span>+233 50 000 0000</span>
                            </div>
                            <div class="bio-item">
                                <span>Subsidiary</span>
                                <span>ENSOL HQ</span>
                            </div>
                            <div style="margin-top: 20px;">
                                <button class="btn btn-primary" onclick="openEditModal()" style="width: 100%;">Edit
                                    Profile</button>
                            </div>
                        </div>

                        <!-- Summary -->
                        <div class="profile-summary">
                            <h3>Summary</h3>
                            <div class="summary-item">Upcoming leave date: <strong>N/A</strong></div>
                            <div class="summary-item">Leave duration: <strong>N/A</strong></div>
                            <div class="summary-item">Last leave date: <strong>N/A</strong></div>
                            <div class="summary-item">Last leave date: <strong>N/A</strong></div>
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
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Name</label>
                    <input type="text" value="John Doe"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Phone</label>
                    <input type="tel" value="+233 50 000 0000"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Email</label>
                    <input type="email" value="johndoe@ensol.com"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Role (Request
                        Change)</label>
                    <input type="text" value="HR Manager" readonly
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px; background-color: #f9f9f9; color: #999; cursor: not-allowed;"
                        title="Role changes must be requested from SuperAdmin">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 6px; font-size: 14px; color: #666;">Subsidiary</label>
                    <input type="text" value="ENSOL HQ"
                        style="width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 10px; font-size: 14px;">
                </div>
                <div class="modal-actions" style="margin-top: 24px;">
                    <button type="button" class="modal-btn cancel" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="modal-btn confirm">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal() {
            document.getElementById('editProfileModal').classList.add('active');
        }

        function closeEditModal() {
            document.getElementById('editProfileModal').classList.remove('active');
        }

        document.getElementById('editProfileForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Profile updated successfully!');
            closeEditModal();
        });
    </script>
</body>

</html>