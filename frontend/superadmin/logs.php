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
                    <select class="filter-select" id="actionFilter">
                        <option value="">All Actions</option>
                        <option value="role_change">Role Changes</option>
                        <option value="user_add">User Added</option>
                        <option value="user_remove">User Removed</option>
                        <option value="user_update">User Updated</option>
                        <option value="permission_change">Permission Changes</option>
                        <option value="login">Login Activity</option>
                        <option value="logout">Logout Activity</option>
                    </select>
                    <input type="date" class="filter-input" id="dateFilter">
                </div>

                <!-- Activity Timeline -->
                <div class="card">
                    <div class="card-body" id="logsContainer">
                        <div style="text-align:center; padding: 40px; color: var(--medium-gray);">
                            Loading activity logs...
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
    <script>
        const API_BASE = '../api/v1/superadmin';

        document.addEventListener('DOMContentLoaded', async () => {
            const token = localStorage.getItem('token');
            if (!token) {
                window.location.href = '../auth/login.php';
                return;
            }
            await fetchLogs();
            await fetchProfile();
        });

        async function fetchProfile() {
            try {
                const response = await fetch('../api/v1/user/profile.php', {
                    headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') }
                });
                const data = await response.json();
                if (data.status === 'success' && data.user.profile_image) {
                    document.querySelector('.header-avatar').src = '../' + data.user.profile_image;
                }
            } catch (err) {
                console.error('Profile fetch error:', err);
            }
        }

        async function fetchLogs() {
            try {
                let url = API_BASE + '/logs.php?';
                const action = document.getElementById('actionFilter').value;
                const date = document.getElementById('dateFilter').value;
                const search = document.getElementById('logSearch').value;

                if (action) url += `action=${action}&`;
                if (date) url += `date=${date}&`;
                if (search) url += `user=${encodeURIComponent(search)}&`;

                const response = await fetch(url, {
                    headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') }
                });
                const data = await response.json();

                if (data.status === 'success') {
                    renderLogs(data.data);
                } else {
                    document.getElementById('logsContainer').innerHTML = 
                        '<div style="text-align:center;padding:40px;color:var(--medium-gray);">Failed to load logs.</div>';
                }
            } catch (err) {
                console.error('Logs fetch error:', err);
                document.getElementById('logsContainer').innerHTML = 
                    '<div style="text-align:center;padding:40px;color:var(--medium-gray);">Error loading logs.</div>';
            }
        }

        function renderLogs(logs) {
            const container = document.getElementById('logsContainer');

            if (!logs || logs.length === 0) {
                container.innerHTML = '<div style="text-align:center;padding:40px;color:var(--medium-gray);">No activity logs found.</div>';
                return;
            }

            // Group logs by date
            const grouped = {};
            logs.forEach(log => {
                const date = new Date(log.created_at);
                const today = new Date();
                const yesterday = new Date(today);
                yesterday.setDate(yesterday.getDate() - 1);

                let dateKey;
                if (date.toDateString() === today.toDateString()) {
                    dateKey = 'Today';
                } else if (date.toDateString() === yesterday.toDateString()) {
                    dateKey = 'Yesterday';
                } else {
                    dateKey = date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
                }

                if (!grouped[dateKey]) grouped[dateKey] = [];
                grouped[dateKey].push(log);
            });

            let html = '';
            for (const [dateLabel, dateLogs] of Object.entries(grouped)) {
                html += `<div class="date-separator">${dateLabel}</div>`;
                html += '<div class="timeline">';
                dateLogs.forEach(log => {
                    const iconClass = log.action_type.replace('_', '-');
                    const badgeText = formatActionType(log.action_type);
                    const avatarUrl = log.actor?.image 
                        ? '../' + log.actor.image 
                        : `https://ui-avatars.com/api/?name=${encodeURIComponent(log.actor?.name || 'U')}&background=7c3aed&color=fff`;

                    html += `
                        <div class="timeline-item ${iconClass}">
                            <div class="timeline-header">
                                <div class="timeline-user">
                                    <img src="${avatarUrl}" alt="User" class="timeline-avatar">
                                    <div>
                                        <div class="timeline-name">${log.actor?.name || 'Unknown'}</div>
                                        <div class="timeline-role">${log.actor?.role || ''}</div>
                                    </div>
                                </div>
                                <div class="timeline-time">${log.relative_time}</div>
                            </div>
                            <div class="timeline-action">
                                <span class="action-badge ${iconClass}">${badgeText}</span>
                                ${log.details}
                            </div>
                        </div>
                    `;
                });
                html += '</div>';
            }

            container.innerHTML = html;
        }

        function formatActionType(type) {
            const labels = {
                'role_change': 'Role Change',
                'user_add': 'User Added',
                'user_remove': 'User Removed',
                'user_update': 'User Updated',
                'permission_change': 'Permission Change',
                'login': 'Login',
                'logout': 'Logout'
            };
            return labels[type] || type.replace('_', ' ');
        }

        // Filters
        let searchTimeout;
        document.getElementById('logSearch').addEventListener('input', () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(fetchLogs, 300);
        });
        document.getElementById('actionFilter').addEventListener('change', fetchLogs);
        document.getElementById('dateFilter').addEventListener('change', fetchLogs);

        // Logout handler
        document.querySelector('.logout-item')?.addEventListener('click', (e) => {
            e.preventDefault();
            localStorage.removeItem('token');
            window.location.href = '../auth/login.php';
        });
    </script>
</body>

</html>