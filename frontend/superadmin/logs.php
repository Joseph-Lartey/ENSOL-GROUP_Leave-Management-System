<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Management - Activity Logs">
    <title>Activity Logs | ENSOL Group Leave Portal</title>
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
                <a href="logs.php" class="nav-item active">
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
                <h1 class="page-title">Activity Logs</h1>
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
                <!-- Filter Bar -->
                <div class="filter-bar">
                    <input type="text" class="filter-input" placeholder="Search activity..." id="logSearch">
                    <select class="filter-select" id="userFilter">
                        <option value="">All Users</option>
                        <option value="Joseph Lartey">Joseph Lartey</option>
                        <option value="Stephanie Mensah">Stephanie Mensah</option>
                        <option value="John Doe">John Doe</option>
                    </select>
                    <select class="filter-select" id="actionFilter">
                        <option value="">All Actions</option>
                        <option value="role-change">Role Changes</option>
                        <option value="user-add">User Added</option>
                        <option value="user-remove">User Removed</option>
                        <option value="permission">Permission Changes</option>
                        <option value="login">Login Activity</option>
                    </select>
                    <input type="date" class="filter-input" id="dateFilter">
                </div>

                <!-- Activity Timeline -->
                <div class="card">
                    <div class="card-body">
                        <div class="date-separator">Today</div>

                        <div class="timeline">
                            <div class="timeline-item role-change">
                                <div class="timeline-header">
                                    <div class="timeline-user">
                                        <img src="https://ui-avatars.com/api/?name=Joseph+Lartey&background=7c3aed&color=fff"
                                            alt="User" class="timeline-avatar">
                                        <div>
                                            <div class="timeline-name">Joseph Lartey</div>
                                            <div class="timeline-role">SuperAdmin</div>
                                        </div>
                                    </div>
                                    <div class="timeline-time">2 hours ago</div>
                                </div>
                                <div class="timeline-action">
                                    <span class="action-badge role-change">Role Change</span>
                                    Promoted <strong>John Doe</strong> from User to HR Supervisor
                                </div>
                            </div>

                            <div class="timeline-item user-add">
                                <div class="timeline-header">
                                    <div class="timeline-user">
                                        <img src="https://ui-avatars.com/api/?name=Stephanie+Mensah&background=dc2626&color=fff"
                                            alt="User" class="timeline-avatar">
                                        <div>
                                            <div class="timeline-name">Stephanie Mensah</div>
                                            <div class="timeline-role">Administrator</div>
                                        </div>
                                    </div>
                                    <div class="timeline-time">5 hours ago</div>
                                </div>
                                <div class="timeline-action">
                                    <span class="action-badge user-add">User Added</span>
                                    Created new user account for <strong>Sarah Johnson</strong>
                                </div>
                            </div>

                            <div class="timeline-item login">
                                <div class="timeline-header">
                                    <div class="timeline-user">
                                        <img src="https://ui-avatars.com/api/?name=Joseph+Lartey&background=7c3aed&color=fff"
                                            alt="User" class="timeline-avatar">
                                        <div>
                                            <div class="timeline-name">Joseph Lartey</div>
                                            <div class="timeline-role">SuperAdmin</div>
                                        </div>
                                    </div>
                                    <div class="timeline-time">6 hours ago</div>
                                </div>
                                <div class="timeline-action">
                                    <span class="action-badge login">Login</span>
                                    Logged in from IP <strong>192.168.1.105</strong>
                                </div>
                            </div>
                        </div>

                        <div class="date-separator">Yesterday</div>

                        <div class="timeline">
                            <div class="timeline-item user-remove">
                                <div class="timeline-header">
                                    <div class="timeline-user">
                                        <img src="https://ui-avatars.com/api/?name=Joseph+Lartey&background=7c3aed&color=fff"
                                            alt="User" class="timeline-avatar">
                                        <div>
                                            <div class="timeline-name">Joseph Lartey</div>
                                            <div class="timeline-role">SuperAdmin</div>
                                        </div>
                                    </div>
                                    <div class="timeline-time">1 day ago</div>
                                </div>
                                <div class="timeline-action">
                                    <span class="action-badge user-remove">Privileges Revoked</span>
                                    Revoked admin privileges from <strong>Mike Smith</strong>
                                </div>
                            </div>

                            <div class="timeline-item permission">
                                <div class="timeline-header">
                                    <div class="timeline-user">
                                        <img src="https://ui-avatars.com/api/?name=Joseph+Lartey&background=7c3aed&color=fff"
                                            alt="User" class="timeline-avatar">
                                        <div>
                                            <div class="timeline-name">Joseph Lartey</div>
                                            <div class="timeline-role">SuperAdmin</div>
                                        </div>
                                    </div>
                                    <div class="timeline-time">1 day ago</div>
                                </div>
                                <div class="timeline-action">
                                    <span class="action-badge permission">Permission Change</span>
                                    Updated permissions for <strong>HR Supervisor</strong> role - enabled "View team
                                    reports"
                                </div>
                            </div>

                            <div class="timeline-item role-change">
                                <div class="timeline-header">
                                    <div class="timeline-user">
                                        <img src="https://ui-avatars.com/api/?name=Stephanie+Mensah&background=dc2626&color=fff"
                                            alt="User" class="timeline-avatar">
                                        <div>
                                            <div class="timeline-name">Stephanie Mensah</div>
                                            <div class="timeline-role">Administrator</div>
                                        </div>
                                    </div>
                                    <div class="timeline-time">1 day ago</div>
                                </div>
                                <div class="timeline-action">
                                    <span class="action-badge role-change">Role Change</span>
                                    Assigned <strong>Emma Wilson</strong> to Finance department
                                </div>
                            </div>
                        </div>

                        <div class="date-separator">January 28, 2026</div>

                        <div class="timeline">
                            <div class="timeline-item login">
                                <div class="timeline-header">
                                    <div class="timeline-user">
                                        <img src="https://ui-avatars.com/api/?name=John+Doe&background=d97706&color=fff"
                                            alt="User" class="timeline-avatar">
                                        <div>
                                            <div class="timeline-name">John Doe</div>
                                            <div class="timeline-role">HR Supervisor</div>
                                        </div>
                                    </div>
                                    <div class="timeline-time">3 days ago</div>
                                </div>
                                <div class="timeline-action">
                                    <span class="action-badge login">Login</span>
                                    First login after role upgrade to <strong>HR Supervisor</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
    <script>
        // Activity Logs Filtering
        const logSearch = document.getElementById('logSearch');
        const userFilter = document.getElementById('userFilter');
        const actionFilter = document.getElementById('actionFilter');
        const dateFilter = document.getElementById('dateFilter');
        const timelineItems = document.querySelectorAll('.timeline-item');
        const dateSeparators = document.querySelectorAll('.date-separator');

        function filterLogs() {
            const searchTerm = logSearch.value.toLowerCase();
            const selectedUser = userFilter.value.toLowerCase();
            const selectedAction = actionFilter.value; // Value matches class name
            const selectedDate = dateFilter.value;

            timelineItems.forEach(item => {
                const userName = item.querySelector('.timeline-name').textContent.toLowerCase();
                const textContent = item.textContent.toLowerCase();
                const actionBadge = item.querySelector('.action-badge');

                // key logic: check if item has the selected action class
                const matchesValidAction = selectedAction === '' || actionBadge.classList.contains(selectedAction);

                // Date logic is tricky because date is in a separator or relative time text.
                // For simplicity in this mock, we might skip exact date filtering matching standard timeline date strings
                // or just rely on search.
                // However, matching the "date-separator" requires hierarchy traversal which is complex for this structure.
                // We will stick to Search, User, and Action.

                const matchesSearch = textContent.includes(searchTerm);
                const matchesUser = selectedUser === '' || userName.includes(selectedUser);
                const matchesAction = matchesValidAction;

                if (matchesSearch && matchesUser && matchesAction) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });

            // Optional: Hide separators if all their children are hidden (requires more complex logic)
        }

        logSearch.addEventListener('input', filterLogs);
        userFilter.addEventListener('change', filterLogs);
        actionFilter.addEventListener('change', filterLogs);
        // Date filter is present but logic mocked/omitted for simplicity as dates are relative "2 hours ago" or headings
    </script>
</body>

</html>