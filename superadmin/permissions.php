<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Management - Permission Management">
    <title>Permissions | ENSOL Group Leave Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/superadmin.css">
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
                <a href="users.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </span>
                    <span class="nav-text">Users</span>
                </a>
                <a href="roles.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </span>
                    <span class="nav-text">Roles</span>
                </a>
                <a href="permissions.php" class="nav-item active">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </span>
                    <span class="nav-text">Permissions</span>
                </a>
                <a href="logs.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </span>
                    <span class="nav-text">Activity Logs</span>
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
            <header class="top-header">
                <h1 class="page-title">Permission Management</h1>
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
                        <img src="../assets/img2.jpg" alt="SuperAdmin" class="header-avatar"
                            onerror="this.src='https://ui-avatars.com/api/?name=SA&background=7c3aed&color=fff'">
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Permission Matrix</h3>
                        <p style="font-size: var(--text-sm); color: var(--medium-gray);">Configure what each role can
                            access</p>
                    </div>
                    <div class="card-body" style="padding: 0; overflow-x: auto;">
                        <table class="permission-matrix">
                            <thead>
                                <tr>
                                    <th>Permission</th>
                                    <th>
                                        <div class="role-header">
                                            <span class="role-header-badge superadmin">SuperAdmin</span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="role-header">
                                            <span class="role-header-badge admin">Admin</span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="role-header">
                                            <span class="role-header-badge supervisor">HR Supervisor</span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="role-header">
                                            <span class="role-header-badge user">User</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Leave Management -->
                                <tr class="category-row">
                                    <td colspan="5">Leave Management</td>
                                </tr>
                                <tr>
                                    <td>Apply for leave</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                </tr>
                                <tr>
                                    <td>Approve team leave</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>
                                <tr>
                                    <td>Approve all leave requests</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>
                                <tr>
                                    <td>View all leave history</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>

                                <!-- User Management -->
                                <tr class="category-row">
                                    <td colspan="5">User Management</td>
                                </tr>
                                <tr>
                                    <td>View all employees</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>
                                <tr>
                                    <td>Create new users</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>
                                <tr>
                                    <td>Edit user profiles</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>
                                <tr>
                                    <td>Deactivate users</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>

                                <!-- Role Management -->
                                <tr class="category-row">
                                    <td colspan="5">Role & Permission Management</td>
                                </tr>
                                <tr>
                                    <td>Assign user roles</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>
                                <tr>
                                    <td>Create/edit roles</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>
                                <tr>
                                    <td>Modify permissions</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>

                                <!-- Reports -->
                                <tr class="category-row">
                                    <td colspan="5">Reports & Analytics</td>
                                </tr>
                                <tr>
                                    <td>View team reports</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>
                                <tr>
                                    <td>View company-wide reports</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>
                                <tr>
                                    <td>Export reports</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>

                                <!-- System -->
                                <tr class="category-row">
                                    <td colspan="5">System Settings</td>
                                </tr>
                                <tr>
                                    <td>View activity logs</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>
                                <tr>
                                    <td>Modify system settings</td>
                                    <td><label class="toggle-switch"><input type="checkbox" checked disabled><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                    <td><label class="toggle-switch"><input type="checkbox"><span
                                                class="toggle-slider"></span></label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="save-bar">
                        <button class="btn-cancel">Reset Changes</button>
                        <button class="btn-save">Save Permissions</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>

</html>