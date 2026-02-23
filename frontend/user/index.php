<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Portal - Dashboard">
    <title>Dashboard | ENSOL Group Leave Portal</title>

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
        <aside class="sidebar">
            <div class="sidebar-logo">
                <img src="../assets/ensol_logo.jpg" alt="ENSOL Group">
            </div>

            <nav class="sidebar-nav">
                <a href="index.php" class="nav-item active">
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

                <a href="profile.php" class="nav-item">
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
                <a href="#" class="nav-item logout-btn">
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
            <!-- Top Header -->
            <header class="top-header">
                <h1 class="page-title">Dashboard</h1>

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
                        <img src="../assets/default-avatar.png" alt="Profile" class="header-avatar" onerror="this.src='../assets/default-avatar.png'">
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <!-- Welcome Section -->
                <div class="welcome-section">
                    <h2 class="welcome-title" id="welcome-message">Welcome back!</h2>
                    <p class="welcome-subtitle">Here's an overview of your leave status</p>
                </div>

                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card red">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <div class="stat-label">Total leave days</div>
                            <div class="stat-value" id="stat-total-allowed">--<span class="stat-unit">days</span></div>
                        </div>
                    </div>

                    <div class="stat-card yellow">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <div class="stat-label">Annual Leave Remaining</div>
                            <div class="stat-value" id="stat-leave-balance">--<span class="stat-unit">days</span></div>
                        </div>
                    </div>

                    <div class="stat-card green">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <div class="stat-label">Pending Requests</div>
                            <div class="stat-value" id="stat-pending-requests">--</div>
                        </div>
                    </div>
                </div>

                <!-- Apply Leave Link -->
                <a href="apply-leave.php" class="apply-leave-link">Apply Leave →</a>

                <!-- Dashboard Grid -->
                <div class="dashboard-grid" style="margin-top: var(--space-6);">
                    <!-- Pie Chart Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container">
                                <div class="pie-chart"></div>
                                <div class="chart-legend">
                                    <div class="legend-item">
                                        <span class="legend-color" style="background: #10B981;"></span>
                                        Annual Leave (36%)
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-color" style="background: #3B82F6;"></span>
                                        Sick Leave (25%)
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-color" style="background: #FBBF24;"></span>
                                        Personal (20%)
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-color" style="background: #8B5CF6;"></span>
                                        Maternity (11%)
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-color" style="background: #EF4444;"></span>
                                        Other (8%)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Requests Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Requests</h3>
                            <a href="my-requests.php" class="card-link">View all</a>
                        </div>
                        <div class="card-body" style="padding: 0;">
                            <div class="request-list" id="dashboard-requests-container">
                                <!-- Requests will be loaded here dynamically -->
                                <div style="padding: 20px; text-align: center; color: var(--text-light);">Loading requests...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Logout Modal -->
    <div class="modal-overlay" id="logoutModal">
        <div class="modal-content">
            <h2 class="modal-title">Are you sure you want to log out?</h2>
            <div class="modal-actions">
                <button class="modal-btn cancel">No</button>
                <button class="modal-btn confirm">Yes</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script>
        const API_BASE = '../api/v1';

        document.addEventListener('DOMContentLoaded', async () => {
            const token = localStorage.getItem('token');
            if (!token) {
                window.location.href = '../auth/login.php';
                return;
            }
            await Promise.all([fetchDashboardStats(), fetchRecentRequests(), fetchProfile()]);
        });

        async function fetchProfile() {
            try {
                const response = await fetch(API_BASE + '/user/profile.php', {
                    headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') }
                });
                const data = await response.json();
                if (data.status === 'success') {
                    const user = data.user;
                    document.getElementById('welcome-message').textContent = `Welcome back, ${user.full_name.split(' ')[0]}!`;
                    if (user.profile_image) {
                        document.querySelector('.header-avatar').src = '../' + user.profile_image;
                    }
                }
            } catch (err) {
                console.error('Profile fetch error:', err);
            }
        }

        async function fetchDashboardStats() {
            try {
                const response = await fetch(API_BASE + '/dashboard/stats.php', {
                    headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') }
                });
                const data = await response.json();
                if (data.status === 'success') {
                    const s = data.data;
                    document.getElementById('stat-total-allowed').innerHTML = `${s.total_allowed}<span class="stat-unit">days</span>`;
                    document.getElementById('stat-leave-balance').innerHTML = `${s.leave_balance}<span class="stat-unit">days</span>`;
                    document.getElementById('stat-pending-requests').textContent = s.pending_requests;
                }
            } catch (err) {
                console.error('Stats fetch error:', err);
            }
        }

        async function fetchRecentRequests() {
            try {
                const response = await fetch(API_BASE + '/user/requests.php?limit=5', {
                    headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') }
                });
                const data = await response.json();
                const container = document.getElementById('dashboard-requests-container');

                if (data.status === 'success' && data.data.length > 0) {
                    container.innerHTML = data.data.map(req => {
                        const statusClass = req.status.replace('_', '-');
                        const statusLabel = formatStatus(req.status);
                        const startDate = new Date(req.start_date).toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
                        const endDate = new Date(req.end_date).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });

                        return `
                            <div class="request-item">
                                <div class="request-info">
                                    <div class="request-type">${req.leave_type}</div>
                                    <div class="request-dates">${startDate} - ${endDate} (${req.duration} days)</div>
                                </div>
                                <span class="status-badge ${statusClass}">${statusLabel}</span>
                            </div>
                        `;
                    }).join('');
                } else {
                    container.innerHTML = '<div style="padding: 20px; text-align: center; color: var(--text-light);">No leave requests yet. <a href="apply-leave.php">Apply now</a></div>';
                }
            } catch (err) {
                console.error('Requests fetch error:', err);
                document.getElementById('dashboard-requests-container').innerHTML = 
                    '<div style="padding: 20px; text-align: center; color: var(--text-light);">Error loading requests.</div>';
            }
        }

        function formatStatus(status) {
            const labels = {
                'pending': 'Pending',
                'approved_supervisor': 'Supervisor Approved',
                'approved_hr': 'Approved',
                'rejected': 'Rejected',
                'cancelled': 'Cancelled'
            };
            return labels[status] || status.replace('_', ' ');
        }

        // Logout
        document.querySelector('.logout-btn')?.addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('logoutModal').classList.add('active');
        });
        document.querySelector('.modal-btn.confirm')?.addEventListener('click', () => {
            localStorage.removeItem('token');
            window.location.href = '../auth/login.php';
        });
        document.querySelector('.modal-btn.cancel')?.addEventListener('click', () => {
            document.getElementById('logoutModal').classList.remove('active');
        });
    </script>
</body>

</html>