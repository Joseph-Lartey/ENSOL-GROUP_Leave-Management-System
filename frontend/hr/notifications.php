<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Portal - Admin Notifications">
    <title>Notifications | ENSOL Group Leave Portal</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="../assets/ensol_logo.jpg">
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
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </span>
                    <span class="nav-text">Reviews</span>
                </a>

                <a href="disputes.php" class="nav-item">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                    </span>
                    <span class="nav-text">Disputes</span>
                </a>
                <a href="apply-leave.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="12" y1="18" x2="12" y2="12"></line>
                            <line x1="9" y1="15" x2="15" y2="15"></line>
                        </svg>
                    </span>
                    <span class="nav-text">Apply Leave</span>
                </a>
                <a href="profile.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </span>
                    <span class="nav-text">Profile</span>
                </a>
            </div>

            <div class="sidebar-footer">
                <a href="#" class="nav-item logout-btn">
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
            <!-- Top Header -->
            <header class="top-header">
                <h1 class="page-title">Notifications</h1>
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
                        <img src="../assets/img2.jpg" alt="HR" class="header-avatar"
                            onerror="this.src='https://ui-avatars.com/api/?name=AD&background=eab308&color=fff&size=40'">
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <div class="notification-list" id="notificationList">
                    <div style="padding: 40px; text-align: center; color: var(--text-light);">Loading notifications...</div>
                </div>
            </div>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
    <script>
        const API_BASE = '../../api/v1';

        document.addEventListener('DOMContentLoaded', async () => {
            const token = localStorage.getItem('token');
            if (!token) {
                window.location.href = '../auth/login.php';
                return;
            }
            await Promise.all([fetchNotifications(), fetchProfile()]);
        });

        async function fetchProfile() {
            try {
                const response = await fetch(API_BASE + '/user/profile.php', {
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

        async function fetchNotifications() {
            try {
                const response = await fetch(API_BASE + '/user/notifications.php', {
                    headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') }
                });
                const data = await response.json();

                if (data.status === 'success') {
                    renderNotifications(data.data);
                    const badge = document.querySelector('.notification-badge');
                    if (badge) {
                        badge.textContent = data.unread_count > 0 ? data.unread_count : '';
                        badge.style.display = data.unread_count > 0 ? 'inline-flex' : 'none';
                    }
                } else {
                    document.getElementById('notificationList').innerHTML = 
                        '<div style="padding:40px;text-align:center;color:var(--text-light);">Failed to load notifications.</div>';
                }
            } catch (err) {
                console.error('Notifications error:', err);
                document.getElementById('notificationList').innerHTML = 
                    '<div style="padding:40px;text-align:center;color:var(--text-light);">Error loading notifications.</div>';
            }
        }

        function getIconEmoji(type) {
            return { 'info': '📣', 'warning': '⏳', 'success': '✓', 'error': '⚠️' }[type] || '📣';
        }

        function renderNotifications(notifications) {
            const container = document.getElementById('notificationList');
            if (!notifications || notifications.length === 0) {
                container.innerHTML = '<div style="padding:60px 40px;text-align:center;color:var(--text-light);"><p>No notifications yet.</p></div>';
                return;
            }

            container.innerHTML = notifications.map(n => `
                <div class="notification-item ${!n.is_read ? 'unread' : ''}" data-id="${n.id}" style="cursor:pointer;">
                    <div class="notification-icon ${n.type}">${getIconEmoji(n.type)}</div>
                    <div class="notification-content">
                        <div class="notification-title">${n.title}</div>
                        <div class="notification-message">${n.message}</div>
                        <div class="notification-time">${n.relative_time}</div>
                    </div>
                </div>
            `).join('');

            container.querySelectorAll('.notification-item.unread').forEach(item => {
                item.addEventListener('click', async () => {
                    try {
                        await fetch(API_BASE + '/user/notifications.php', {
                            method: 'PUT',
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('token'),
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ id: parseInt(item.dataset.id) })
                        });
                        item.classList.remove('unread');
                        await fetchNotifications();
                    } catch (err) {
                        console.error('Mark read error:', err);
                    }
                });
            });
        }

        // Logout
        document.querySelector('.logout-btn')?.addEventListener('click', (e) => {
            e.preventDefault();
            localStorage.removeItem('token');
            window.location.href = '../auth/login.php';
        });
    </script>
</body>

</html>