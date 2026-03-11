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
                        <button class="filter-btn active" data-filter="all">All</button>
                        <button class="filter-btn" data-filter="unread">Unread (<span id="unreadCount">0</span>)</button>
                    </div>
                    <button class="btn-mark-read" id="btnMarkAllRead">
                        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Mark All Read
                    </button>
                </div>

                <!-- Notifications List -->
                <div class="notification-list" id="notificationList">
                    <div style="text-align:center; padding: 40px; color: var(--medium-gray);">
                        Loading notifications...
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
    <script>
        const API_BASE = '../api/v1/superadmin';
        let currentFilter = 'all';

        document.addEventListener('DOMContentLoaded', async () => {
            const token = localStorage.getItem('token');
            if (!token) {
                window.location.href = '../auth/login.php';
                return;
            }
            await fetchNotifications();
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

        async function fetchNotifications() {
            try {
                let url = API_BASE + '/notifications.php?';
                if (currentFilter === 'unread') url += 'is_read=0&';

                const response = await fetch(url, {
                    headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') }
                });
                const data = await response.json();

                if (data.status === 'success') {
                    renderNotifications(data.data);
                    document.getElementById('unreadCount').textContent = data.unread_count;

                    // Update header badge
                    const badge = document.querySelector('.notification-badge');
                    if (badge) {
                        badge.textContent = data.unread_count > 0 ? data.unread_count : '';
                        badge.style.display = data.unread_count > 0 ? 'flex' : 'none';
                    }
                } else {
                    document.getElementById('notificationList').innerHTML = 
                        '<div style="text-align:center;padding:40px;color:var(--medium-gray);">Failed to load notifications.</div>';
                }
            } catch (err) {
                console.error('Notifications fetch error:', err);
                document.getElementById('notificationList').innerHTML = 
                    '<div style="text-align:center;padding:40px;color:var(--medium-gray);">Error loading notifications.</div>';
            }
        }

        function getNotificationIcon(type) {
            const icons = {
                'info': { bg: '#dbeafe', color: '#2563eb', svg: '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline>' },
                'warning': { bg: '#fef3c7', color: '#d97706', svg: '<path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line>' },
                'success': { bg: '#dcfce7', color: '#16a34a', svg: '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline>' },
                'error': { bg: '#fef2f2', color: '#dc2626', svg: '<circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line>' }
            };
            return icons[type] || icons['info'];
        }

        function renderNotifications(notifications) {
            const container = document.getElementById('notificationList');

            if (!notifications || notifications.length === 0) {
                container.innerHTML = `
                    <div style="text-align:center;padding:60px 40px;color:var(--medium-gray);">
                        <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-bottom: 12px; opacity: 0.4;">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                        <p>No notifications ${currentFilter === 'unread' ? 'unread' : 'found'}.</p>
                    </div>
                `;
                return;
            }

            let html = '';
            notifications.forEach(n => {
                const icon = getNotificationIcon(n.type);
                const unreadClass = !n.is_read ? 'unread' : '';

                html += `
                    <div class="notification-item ${unreadClass}" data-id="${n.id}">
                        <div style="width:40px;height:40px;border-radius:50%;background:${icon.bg};color:${icon.color};display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                                ${icon.svg}
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 4px;">
                                <strong style="color: var(--jet-black);">${n.title}</strong>
                                <span style="font-size: var(--text-xs); color: var(--medium-gray);">${n.relative_time}</span>
                            </div>
                            <p style="font-size: var(--text-sm); color: var(--medium-gray); margin: 0;">
                                ${n.message}
                            </p>
                        </div>
                    </div>
                `;
            });

            container.innerHTML = html;

            // Click to mark individual as read
            container.querySelectorAll('.notification-item.unread').forEach(item => {
                item.addEventListener('click', () => markAsRead(item.dataset.id));
            });
        }

        async function markAsRead(id) {
            try {
                await fetch(API_BASE + '/notifications.php', {
                    method: 'PUT',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: parseInt(id) })
                });
                await fetchNotifications();
            } catch (err) {
                console.error('Mark read error:', err);
            }
        }

        // Mark All Read
        document.getElementById('btnMarkAllRead').addEventListener('click', async () => {
            try {
                await fetch(API_BASE + '/notifications.php', {
                    method: 'PUT',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ mark_all: true })
                });
                await fetchNotifications();
            } catch (err) {
                console.error('Mark all read error:', err);
            }
        });

        // Filter tabs
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                currentFilter = btn.dataset.filter;
                fetchNotifications();
            });
        });

        // Logout handler
        document.querySelector('.logout-item')?.addEventListener('click', (e) => {
            e.preventDefault();
            localStorage.removeItem('token');
            window.location.href = '../auth/login.php';
        });
    </script>
</body>

</html>