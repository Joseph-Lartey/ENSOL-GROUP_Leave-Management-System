<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Management - SuperAdmin Notifications">
    <title>Notifications | ENSOL Group Leave Portal</title>
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
                <a href="permissions.php" class="nav-item">
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
                <h1 class="page-title">Notifications</h1>
                <div class="header-actions">
                    <a href="notifications.php" class="notification-btn active">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </a>
                    <a href="profile.php">
                        <img src="../assets/img2.jpg" alt="SuperAdmin" class="header-avatar"
                            onerror="this.src='https://ui-avatars.com/api/?name=SA&background=7c3aed&color=fff'">
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <!-- Notification Actions -->
                <div class="notification-toolbar">
                    <div class="notification-filters">
                        <button class="filter-btn active">All</button>
                        <button class="filter-btn">Unread (3)</button>
                        <button class="filter-btn">Role Changes</button>
                        <button class="filter-btn">System</button>
                    </div>
                    <button class="btn-mark-read">
                        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Mark All Read
                    </button>
                </div>

                <!-- Notifications List -->
                <div class="notification-list">
                    <!-- Unread Notification -->
                    <div class="notification-item unread">
                        <div class="activity-icon role-change">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 4px;">
                                <strong style="color: var(--jet-black);">Role Change Request</strong>
                                <span style="font-size: var(--text-xs); color: var(--medium-gray);">2 hours
                                    ago</span>
                            </div>
                            <p style="font-size: var(--text-sm); color: var(--medium-gray); margin: 0;">
                                <strong style="color: #7c3aed;">Stephanie Mensah</strong> requested to promote John
                                Doe to HR Supervisor
                            </p>
                            <div style="margin-top: var(--space-3); display: flex; gap: var(--space-2);">
                                <button class="btn-action" style="background: #7c3aed; color: white;">Approve</button>
                                <button class="btn-action btn-deactivate">Reject</button>
                            </div>
                        </div>
                    </div>

                    <!-- Unread Notification -->
                    <div class="notification-item unread">
                        <div class="activity-icon user-add">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 4px;">
                                <strong style="color: var(--jet-black);">New User Registration</strong>
                                <span style="font-size: var(--text-xs); color: var(--medium-gray);">5 hours
                                    ago</span>
                            </div>
                            <p style="font-size: var(--text-sm); color: var(--medium-gray); margin: 0;">
                                <strong style="color: #7c3aed;">Emily Chen</strong> has registered and is awaiting
                                account activation
                            </p>
                            <div style="margin-top: var(--space-3); display: flex; gap: var(--space-2);">
                                <button class="btn-action" style="background: #16a34a; color: white;">Activate</button>
                                <button class="btn-action btn-deactivate">Decline</button>
                            </div>
                        </div>
                    </div>

                    <!-- Unread Notification -->
                    <div class="notification-item unread">
                        <div
                            style="width: 40px; height: 40px; border-radius: 50%; background: #fef3c7; color: #d97706; display: flex; align-items: center; justify-content: center;">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path
                                    d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                                </path>
                                <line x1="12" y1="9" x2="12" y2="13"></line>
                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 4px;">
                                <strong style="color: var(--jet-black);">Permission Alert</strong>
                                <span style="font-size: var(--text-xs); color: var(--medium-gray);">1 day ago</span>
                            </div>
                            <p style="font-size: var(--text-sm); color: var(--medium-gray); margin: 0;">
                                HR Supervisor role permissions were modified. 3 new permissions added.
                            </p>
                        </div>
                    </div>

                    <!-- Read Notification -->
                    <div class="notification-item">
                        <div class="activity-icon" style="background: #dbeafe; color: #2563eb;">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 4px;">
                                <strong style="color: var(--jet-black);">System Update Complete</strong>
                                <span style="font-size: var(--text-xs); color: var(--medium-gray);">2 days
                                    ago</span>
                            </div>
                            <p style="font-size: var(--text-sm); color: var(--medium-gray); margin: 0;">
                                The permission system has been updated successfully. All roles are now using the new
                                permission matrix.
                            </p>
                        </div>
                    </div>

                    <!-- Read Notification -->
                    <div class="notification-item">
                        <div class="activity-icon role-change">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 4px;">
                                <strong style="color: var(--jet-black);">Role Change Approved</strong>
                                <span style="font-size: var(--text-xs); color: var(--medium-gray);">3 days
                                    ago</span>
                            </div>
                            <p style="font-size: var(--text-sm); color: var(--medium-gray); margin: 0;">
                                You approved the promotion of <strong style="color: #7c3aed;">Sarah Wilson</strong>
                                to Administrator.
                            </p>
                        </div>
                    </div>

                    <!-- Read Notification -->
                    <div class="notification-item">
                        <div class="activity-icon user-remove">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 4px;">
                                <strong style="color: var(--jet-black);">User Deactivated</strong>
                                <span style="font-size: var(--text-xs); color: var(--medium-gray);">1 week
                                    ago</span>
                            </div>
                            <p style="font-size: var(--text-sm); color: var(--medium-gray); margin: 0;">
                                <strong style="color: #7c3aed;">Mike Brown</strong>'s account was deactivated due to
                                inactivity.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>

</html>