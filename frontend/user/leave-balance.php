<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Portal - Leave Balance">
    <title>Leave Balance | ENSOL Group Leave Portal</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
</head>

<body>
    <div class="dashboard-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-logo">
                <img src="../assets/ensol_logo.jpg" alt="ENSOL Group">
            </div>

            <nav class="sidebar-nav">
                <a href="index.php" class="nav-item">
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

                <a href="leave-balance.php" class="nav-item active">
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
                <h1 class="page-title">Leave Balance</h1>

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
                            <div class="stat-label">Total sick days left</div>
                            <div class="stat-value" id="stat-sick-balance">--<span class="stat-unit">days</span></div>
                        </div>
                    </div>
                </div>

                <!-- Contest Leave Stats -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Contest Leave Stats</h3>
                    </div>
                    <div class="card-body">
                        <form class="dashboard-form" id="contestForm">
                            <div class="form-group">
                                <select id="leaveType" name="leaveType" class="form-select" required>
                                    <option value="" disabled selected>Which leave stat do you want to contest</option>
                                    <option value="annual">Annual Leave Balance</option>
                                    <option value="sick">Sick Leave Balance</option>
                                    <option value="personal">Personal Leave Balance</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <input type="number" id="currentStat" name="currentStat" class="form-input"
                                        placeholder="Enter the current stat">
                                </div>
                                <div class="form-group">
                                    <input type="number" id="correctStat" name="correctStat" class="form-input"
                                        placeholder="Enter the correct stat">
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea id="comments" name="comments" class="form-input form-textarea"
                                    placeholder="Comments"></textarea>
                            </div>

                            <div class="form-group" style="margin-top: var(--space-4);">
                                <button type="submit" class="btn btn-primary btn-block">Submit Contest</button>
                            </div>
                        </form>
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

    <script src="../assets/js/dashboard.js"></script>
    <script>
        // Fetch and display leave balance stats
        document.addEventListener('DOMContentLoaded', function() {
            const jwt = localStorage.getItem('token');
            if (!jwt) return;
            
            fetch('../../api/v1/dashboard/stats.php', {
                headers: { 'Authorization': `Bearer ${jwt}` }
            })
            .then(r => r.json())
            .then(data => {
                if (data.status === 'success') {
                    const stats = data.data;
                    
                    // Update stat cards
                    const totalEl = document.getElementById('stat-total-allowed');
                    if (totalEl) totalEl.innerHTML = `${stats.total_allowed}<span class="stat-unit">days</span>`;
                    
                    const balanceEl = document.getElementById('stat-leave-balance');
                    if (balanceEl) balanceEl.innerHTML = `${stats.leave_balance}<span class="stat-unit">days</span>`;
                    
                    const sickEl = document.getElementById('stat-sick-balance');
                    if (sickEl) sickEl.innerHTML = `${stats.sick_balance || 0}<span class="stat-unit">days</span>`;
                }
            })
            .catch(console.error);
        });
    </script>
</body>

</html>