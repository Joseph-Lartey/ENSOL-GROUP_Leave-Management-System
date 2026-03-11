<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Management - HR Dashboard">
    <title>HR Dashboard | ENSOL Group Leave Portal</title>
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
                <a href="index.php" class="nav-item active">
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
                <a href="profile.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </span>
                    <span class="nav-text">Profile</span>
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
                        <img src="../assets/img2.jpg" alt="Profile" class="header-avatar"
                            onerror="this.src='https://ui-avatars.com/api/?name=Admin&background=dc2626&color=fff'">
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <!-- Welcome Section -->
                <div class="welcome-section">
                    <h2 class="welcome-title" id="welcomeTitle">Hello!</h2>
                    <p class="welcome-subtitle">Track & Manage Your Team Progress Here</p>
                </div>

                <!-- Stats Grid -->
                <div class="stats-grid admin-stats">
                    <div class="stat-card stat-green">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" width="28" height="28" stroke="currentColor" fill="none"
                                stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">TOTAL LEAVE APPLICATION</span>
                            <span class="stat-value" id="statTotal">--</span>
                            <span class="stat-sublabel">Leave Applied</span>
                        </div>
                    </div>
                    <div class="stat-card stat-yellow">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" width="28" height="28" stroke="currentColor" fill="none"
                                stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">TOTAL LEAVE APPROVED</span>
                            <span class="stat-value" id="statApproved">--</span>
                            <span class="stat-sublabel">Leave Approved</span>
                        </div>
                    </div>
                    <div class="stat-card stat-red-light">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" width="28" height="28" stroke="currentColor" fill="none"
                                stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">TOTAL LEAVE DENIED</span>
                            <span class="stat-value" id="statDenied">--</span>
                            <span class="stat-sublabel">Leave Denied</span>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Grid -->
                <div class="dashboard-grid admin-grid">
                    <!-- Leave Chart -->
                    <div class="dashboard-card chart-card">
                        <div class="chart-legend">
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #dc2626;"></span>
                                <span>On Leave</span>
                                <span class="legend-value" id="legendLeave">0</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #22c55e;"></span>
                                <span>Present</span>
                                <span class="legend-value" id="legendPresent">0</span>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="leaveChart"></canvas>
                            <div class="chart-center-text">
                                <span class="chart-percentage" id="chartPercentage">0%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="dashboard-card activity-card">
                        <div class="card-header">
                            <span>Recent Activity</span>
                            <a href="approvals.php" class="view-all-link">view all</a>
                        </div>
                        <div class="activity-list" id="activityList">
                            <p style="text-align: center; color: #888;">Loading activity...</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const API_BASE = '../../api/v1';
        let leaveChart = null;

        // Get JWT Token
        function getToken() {
            return localStorage.getItem('token');
        }

        // Check authentication
        function checkAuth() {
            const token = getToken();
            if (!token) {
                window.location.href = '../auth/login.php';
                return false;
            }
            return true;
        }

        // Fetch HR Stats
        async function fetchStats() {
            try {
                const response = await fetch(`${API_BASE}/hr/stats.php`, {
                    headers: { 'Authorization': `Bearer ${getToken()}` }
                });
                
                if (response.status === 401 || response.status === 403) {
                    window.location.href = '../auth/login.php';
                    return;
                }
                
                const result = await response.json();
                if (result.status === 'success') {
                    const data = result.data;
                    document.getElementById('statTotal').textContent = data.total_applications;
                    document.getElementById('statApproved').textContent = data.total_approved;
                    document.getElementById('statDenied').textContent = data.total_denied;
                    
                    // Update chart
                    updateChart(data.on_leave, data.present, data.total_employees);
                }
            } catch (error) {
                console.error('Error fetching stats:', error);
            }
        }

        // Update Chart
        function updateChart(onLeave, present, total) {
            document.getElementById('legendLeave').textContent = onLeave;
            document.getElementById('legendPresent').textContent = present;
            
            const leavePercentage = total > 0 ? Math.round((onLeave / total) * 100) : 0;
            document.getElementById('chartPercentage').textContent = leavePercentage + '%';
            
            const ctx = document.getElementById('leaveChart');
            if (leaveChart) {
                leaveChart.data.datasets[0].data = [onLeave, present];
                leaveChart.update();
            } else if (ctx) {
                leaveChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['On Leave', 'Present'],
                        datasets: [{
                            data: [onLeave || 0, present || 1],
                            backgroundColor: ['#dc2626', '#22c55e'],
                            borderWidth: 0,
                            cutout: '70%'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false }
                        }
                    }
                });
            }
        }

        // Fetch Recent Activity
        async function fetchActivity() {
            try {
                const response = await fetch(`${API_BASE}/hr/activity.php?limit=5`, {
                    headers: { 'Authorization': `Bearer ${getToken()}` }
                });
                
                const result = await response.json();
                if (result.status === 'success') {
                    renderActivity(result.data);
                }
            } catch (error) {
                console.error('Error fetching activity:', error);
                document.getElementById('activityList').innerHTML = '<p style="color: #888;">Failed to load activity.</p>';
            }
        }

        // Render Activity List
        function renderActivity(activities) {
            const container = document.getElementById('activityList');
            
            if (!activities || activities.length === 0) {
                container.innerHTML = '<p style="text-align: center; color: #888;">No recent activity.</p>';
                return;
            }
            
            container.innerHTML = activities.map(item => {
                let iconClass = 'request';
                let iconSvg = '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>';
                let title = 'Leave Request';
                
                if (item.activity_type === 'approved') {
                    iconClass = 'approved';
                    iconSvg = '<polyline points="20 6 9 17 4 12"></polyline>';
                    title = 'Leave Approved';
                } else if (item.activity_type === 'denied') {
                    iconClass = 'denied';
                    iconSvg = '<line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line>';
                    title = 'Leave Denied';
                }
                
                return `
                    <div class="activity-item">
                        <div class="activity-icon ${iconClass}">
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none">
                                ${iconSvg}
                            </svg>
                        </div>
                        <div class="activity-info">
                            <span class="activity-title">${title}</span>
                            <span class="activity-subtitle">by ${item.employee_name}</span>
                        </div>
                        <span class="activity-date">${item.date}</span>
                    </div>
                `;
            }).join('');
        }

        // Fetch User Profile for Welcome Message
        async function fetchProfile() {
            try {
                const response = await fetch(`${API_BASE}/user/profile.php`, {
                    headers: { 'Authorization': `Bearer ${getToken()}` }
                });
                
                const result = await response.json();
                if (result.status === 'success') {
                    const name = result.data.full_name?.split(' ')[0] || 'HR';
                    document.getElementById('welcomeTitle').textContent = `Hello, ${name}!`;
                    
                    // Update avatar if available
                    if (result.data.profile_image) {
                        const avatar = document.querySelector('.header-avatar');
                        if (avatar) avatar.src = '../' + result.data.profile_image;
                    }
                }
            } catch (error) {
                console.error('Error fetching profile:', error);
            }
        }

        // Initialize Dashboard
        document.addEventListener('DOMContentLoaded', function() {
            if (!checkAuth()) return;
            
            fetchStats();
            fetchActivity();
            fetchProfile();
            
            // Logout confirmation
            const logoutBtn = document.querySelector('.logout-item');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Logout',
                        text: 'Are you sure you want to logout?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#dc2626',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Yes, logout'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            localStorage.removeItem('token');
                            window.location.href = '../auth/login.php';
                        }
                    });
                });
            }
        });
    </script>
</body>

</html>