<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Portal - Supervisor Dashboard">
    <title>Dashboard | ENSOL Group Leave Portal</title>
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
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

                <!-- Supervisor-specific: Approvals -->
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
                        <img src="../assets/img2.jpg" alt="Profile" class="header-avatar">
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <!-- Welcome Section -->
                <div class="welcome-section">
                    <h2 class="welcome-title" id="welcome-message">Welcome back!</h2>
                    <p class="welcome-subtitle">Here's an overview of your leave status and team approvals</p>
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
                            <div class="stat-label">Total leave days left</div>
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

                <!-- Quick Links -->
                <div style="display: flex; gap: var(--space-4); margin-bottom: var(--space-6);">
                    <a href="apply-leave.php" class="apply-leave-link">Apply Leave →</a>
                    <a href="approvals.php" class="apply-leave-link" id="pendingApprovalsLink"
                        style="background: #f3f4f6; color: var(--jet-black);">Pending Approvals (Loading...) →</a>
                </div>

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
                                <!-- Requests will be loaded here dynamically by dashboard.js -->
                                <div style="padding: 20px; text-align: center; color: var(--text-light);">Loading requests...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
    <script>
        // Fetch Supervisor Team Stats (Difference from Personal Stats)
        document.addEventListener('DOMContentLoaded', function() {
            const token = localStorage.getItem('token');
            if(token) {
                fetch('../../api/v1/supervisor/stats.php', {
                    headers: { 'Authorization': `Bearer ${token}` }
                })
                .then(r => r.json())
                .then(res => {
                    if(res.status === 'success') {
                        const count = res.data.pending_count;
                        const link = document.getElementById('pendingApprovalsLink');
                        if(link) link.innerHTML = `Pending Approvals (${count}) →`;
                    }
                })
                .catch(console.error);
            }
        });
    </script>
</body>

</html>