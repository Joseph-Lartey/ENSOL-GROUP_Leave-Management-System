<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Management - SuperAdmin Dashboard">
    <title>SuperAdmin Dashboard | ENSOL Group Leave Portal</title>
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
                <a href="index.php" class="nav-item active">
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
                <h1 class="page-title">SuperAdmin Dashboard</h1>
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
                <!-- Welcome Section -->
                <div class="welcome-section">
                    <h2 class="welcome-title">Welcome, SuperAdmin!</h2>
                    <p class="welcome-subtitle">Manage users, roles, and system permissions</p>
                </div>

                <!-- Stats Grid -->
                <div class="stats-grid admin-stats">
                    <div class="stat-card stat-purple">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" width="28" height="28" stroke="currentColor" fill="none"
                                stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">TOTAL USERS</span>
                            <span class="stat-value">156</span>
                            <span class="stat-sublabel">Active Accounts</span>
                        </div>
                    </div>
                    <div class="stat-card stat-red">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" width="28" height="28" stroke="currentColor" fill="none"
                                stroke-width="2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">ADMINISTRATORS</span>
                            <span class="stat-value">5</span>
                            <span class="stat-sublabel">Admin Roles</span>
                        </div>
                    </div>
                    <div class="stat-card stat-gold">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" width="28" height="28" stroke="currentColor" fill="none"
                                stroke-width="2">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">HR SUPERVISORS</span>
                            <span class="stat-value">12</span>
                            <span class="stat-sublabel">Supervisor Roles</span>
                        </div>
                    </div>
                    <div class="stat-card stat-green">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" width="28" height="28" stroke="currentColor" fill="none"
                                stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">PENDING REQUESTS</span>
                            <span class="stat-value">3</span>
                            <span class="stat-sublabel">Role Changes</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <h3
                    style="margin-bottom: var(--space-4); font-size: var(--text-lg); font-weight: var(--font-weight-semibold);">
                    Quick Actions</h3>
                <div class="quick-action-grid">
                    <a href="users.php" class="quick-action-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <line x1="20" y1="8" x2="20" y2="14"></line>
                            <line x1="23" y1="11" x2="17" y2="11"></line>
                        </svg>
                        <span>Add User</span>
                    </a>
                    <a href="roles.php" class="quick-action-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <span>Manage Roles</span>
                    </a>
                    <a href="logs.php" class="quick-action-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <span>Activity Logs</span>
                    </a>
                </div>

                <!-- Dashboard Grid -->
                <div class="dashboard-grid" style="margin-top: var(--space-6);">
                    <!-- Role Distribution Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Role Distribution</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <div class="pie-chart"
                                    style="background: conic-gradient(#7c3aed 0deg 10deg, #dc2626 10deg 22deg, #eab308 22deg 50deg, #2563eb 50deg 360deg);">
                                </div>
                                <div class="chart-legend">
                                    <div class="legend-item">
                                        <span class="legend-color" style="background: #7c3aed;"></span>
                                        SuperAdmin (1%)
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-color" style="background: #dc2626;"></span>
                                        Admin (3%)
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-color" style="background: #eab308;"></span>
                                        HR Supervisor (8%)
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-color" style="background: #2563eb;"></span>
                                        User (88%)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Activity</h3>
                            <a href="logs.php" class="card-link">View all</a>
                        </div>
                        <div class="card-body" style="padding: 0;">
                            <div class="activity-item">
                                <div class="activity-icon role-change">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-text"><strong>John Doe</strong> was promoted to <span
                                            class="role-badge role-supervisor">HR Supervisor</span></div>
                                    <div class="activity-time">2 hours ago</div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon user-add">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="8.5" cy="7" r="4"></circle>
                                        <line x1="20" y1="8" x2="20" y2="14"></line>
                                        <line x1="23" y1="11" x2="17" y2="11"></line>
                                    </svg>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-text"><strong>Sarah Johnson</strong> was added as a new user
                                    </div>
                                    <div class="activity-time">5 hours ago</div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon user-remove">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="8.5" cy="7" r="4"></circle>
                                        <line x1="23" y1="11" x2="17" y2="11"></line>
                                    </svg>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-text"><strong>Mike Smith</strong>'s admin privileges were
                                        revoked</div>
                                    <div class="activity-time">1 day ago</div>
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
        const API_BASE = '../api/v1/superadmin';

        // Verify auth on page load
        document.addEventListener('DOMContentLoaded', async () => {
            const token = localStorage.getItem('token');
            if (!token) {
                window.location.href = '../auth/login.php';
                return;
            }
            await fetchStats();
            await fetchRecentActivity();
            await fetchProfile();
        });

        // Fetch profile for header avatar
        async function fetchProfile() {
            try {
                const response = await fetch('../api/v1/user/profile.php', {
                    headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') }
                });
                const data = await response.json();
                if (data.status === 'success') {
                    const avatar = document.querySelector('.header-avatar');
                    if (data.user.profile_image) {
                        avatar.src = '../' + data.user.profile_image;
                    }
                    document.querySelector('.welcome-title').textContent = `Welcome, ${data.user.full_name.split(' ')[0]}!`;
                }
            } catch (err) {
                console.error('Profile fetch error:', err);
            }
        }

        // Fetch Dashboard Stats
        async function fetchStats() {
            try {
                const response = await fetch(API_BASE + '/stats.php', {
                    headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') }
                });
                const data = await response.json();
                
                if (data.status === 'success') {
                    const stats = data.data;
                    // Update stat cards
                    const statCards = document.querySelectorAll('.stat-card');
                    statCards[0].querySelector('.stat-value').textContent = stats.total_users;
                    statCards[1].querySelector('.stat-value').textContent = stats.hr_count;
                    statCards[2].querySelector('.stat-value').textContent = stats.supervisor_count;
                    statCards[3].querySelector('.stat-value').textContent = stats.pending_requests;
                    
                    // Update pie chart dynamically
                    updatePieChart(stats);
                }
            } catch (err) {
                console.error('Stats fetch error:', err);
            }
        }

        function updatePieChart(stats) {
            const total = stats.total_users || 1;
            const saPercent = (stats.superadmin_count / total) * 100;
            const hrPercent = (stats.hr_count / total) * 100;
            const supPercent = (stats.supervisor_count / total) * 100;
            const empPercent = (stats.employee_count / total) * 100;

            const saDeg = saPercent * 3.6;
            const hrDeg = saDeg + (hrPercent * 3.6);
            const supDeg = hrDeg + (supPercent * 3.6);

            const pieChart = document.querySelector('.pie-chart');
            if (pieChart) {
                pieChart.style.background = `conic-gradient(
                    #7c3aed 0deg ${saDeg}deg,
                    #dc2626 ${saDeg}deg ${hrDeg}deg, 
                    #eab308 ${hrDeg}deg ${supDeg}deg,
                    #2563eb ${supDeg}deg 360deg
                )`;
            }

            // Update legend text
            const legendItems = document.querySelectorAll('.legend-item');
            legendItems[0].textContent = ` SuperAdmin (${Math.round(saPercent)}%)`;
            legendItems[0].prepend(legendItems[0].querySelector('.legend-color') || createLegendColor('#7c3aed'));
            legendItems[1].innerHTML = `<span class="legend-color" style="background: #dc2626;"></span> HR (${Math.round(hrPercent)}%)`;
            legendItems[2].innerHTML = `<span class="legend-color" style="background: #eab308;"></span> Supervisor (${Math.round(supPercent)}%)`;
            legendItems[3].innerHTML = `<span class="legend-color" style="background: #2563eb;"></span> Employee (${Math.round(empPercent)}%)`;
        }

        // Fetch Recent Activity
        async function fetchRecentActivity() {
            try {
                const response = await fetch(API_BASE + '/logs.php?limit=5', {
                    headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') }
                });
                const data = await response.json();

                if (data.status === 'success' && data.data.length > 0) {
                    const container = document.querySelector('.card-body[style*="padding: 0"]');
                    container.innerHTML = '';
                    
                    data.data.forEach(log => {
                        const iconClass = log.action_type.replace('_', '-');
                        container.innerHTML += `
                            <div class="activity-item">
                                <div class="activity-icon ${iconClass}">
                                    ${getActivityIcon(log.action_type)}
                                </div>
                                <div class="activity-content">
                                    <div class="activity-text">${log.details}</div>
                                    <div class="activity-time">${log.relative_time}</div>
                                </div>
                            </div>
                        `;
                    });
                }
            } catch (err) {
                console.error('Activity fetch error:', err);
            }
        }

        function getActivityIcon(actionType) {
            const icons = {
                'role_change': '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
                'user_add': '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>',
                'user_remove': '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="23" y1="11" x2="17" y2="11"></line></svg>',
                'login': '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>',
                'user_update': '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',
                'permission_change': '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>'
            };
            return icons[actionType] || icons['user_update'];
        }

        // Logout handler
        document.querySelector('.logout-item')?.addEventListener('click', (e) => {
            e.preventDefault();
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Logout?',
                    text: 'Are you sure you want to logout?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#7c3aed',
                    confirmButtonText: 'Yes, logout'
                }).then((result) => {
                    if (result.isConfirmed) {
                        localStorage.removeItem('token');
                        window.location.href = '../auth/login.php';
                    }
                });
            } else {
                localStorage.removeItem('token');
                window.location.href = '../auth/login.php';
            }
        });
    </script>
</body>

</html>