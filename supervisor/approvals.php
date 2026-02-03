<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Portal - Supervisor Approvals">
    <title>Approvals | ENSOL Group Leave Portal</title>
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
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
                <a href="approvals.php" class="nav-item active">
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
                <a href="../auth/login.php" class="nav-item logout-btn">
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
                <h1 class="page-title">Approvals</h1>
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
                <!-- Info Banner -->
                <div
                    style="background: #fef3c7; padding: var(--space-4); border-radius: 12px; margin-bottom: var(--space-6); display: flex; align-items: center; gap: var(--space-3);">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="#ca8a04" fill="none" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <span style="color: #92400e;">You can only approve or reject leave requests from your department
                        members.</span>
                </div>

                <!-- Stats Grid -->
                <div class="stats-grid admin-stats">
                    <div class="stat-card stat-green">
                        <div class="stat-info">
                            <span class="stat-label">Pending requests</span>
                            <span class="stat-value">3</span>
                            <span class="stat-sublabel">Your department</span>
                        </div>
                    </div>
                    <div class="stat-card stat-yellow">
                        <div class="stat-info">
                            <span class="stat-label">Approved this month</span>
                            <span class="stat-value">5</span>
                            <span class="stat-sublabel">+2 this week</span>
                        </div>
                    </div>
                    <div class="stat-card stat-red-light">
                        <div class="stat-info">
                            <span class="stat-label">Rejected this month</span>
                            <span class="stat-value">1</span>
                            <span class="stat-sublabel">Reason required</span>
                        </div>
                    </div>
                </div>

                <!-- Approval Tabs -->
                <div class="approval-tabs">
                    <span class="approval-tab active" data-tab="pending">Pending</span>
                    <span class="approval-tab" data-tab="accepted">Accepted</span>
                    <span class="approval-tab" data-tab="rejected">Rejected</span>
                </div>

                <!-- Approval Cards Grid -->
                <div class="approval-grid" id="approvalGrid">
                    <!-- Card 1 -->
                    <div class="approval-card" data-status="pending">
                        <div class="approval-card-header">
                            <span class="clipboard-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                    </path>
                                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                </svg>
                            </span>
                            <span class="approval-id">#44231</span>
                        </div>
                        <div class="approval-employee">
                            <img src="../assets/img2.jpg" alt="Employee" class="approval-avatar"
                                onerror="this.src='https://ui-avatars.com/api/?name=John+Smith&background=eab308&color=fff&size=50'">
                            <div class="approval-employee-details">
                                <div>
                                    <span class="approval-label">Name</span>
                                    <span class="approval-name">John Smith</span>
                                </div>
                                <div>
                                    <span class="approval-label">Department</span>
                                    <span class="approval-dept">IT</span>
                                </div>
                            </div>
                        </div>
                        <div class="approval-dates">
                            <div>
                                <span class="date-label">Leave start</span>
                                <span class="date-value">19/03/2026</span>
                            </div>
                            <div>
                                <span class="date-label">Leave end</span>
                                <span class="date-value">22/03/2026</span>
                            </div>
                        </div>
                        <div class="approval-actions">
                            <button class="btn-reject">Reject</button>
                            <button class="btn-more-info" onclick="openMoreInfoModal()">More Info</button>
                            <button class="btn-approve">Approve</button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="approval-card" data-status="pending">
                        <div class="approval-card-header">
                            <span class="clipboard-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                    </path>
                                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                </svg>
                            </span>
                            <span class="approval-id">#44232</span>
                        </div>
                        <div class="approval-employee">
                            <img src="../assets/img2.jpg" alt="Employee" class="approval-avatar"
                                onerror="this.src='https://ui-avatars.com/api/?name=Sarah+Jones&background=eab308&color=fff&size=50'">
                            <div class="approval-employee-details">
                                <div>
                                    <span class="approval-label">Name</span>
                                    <span class="approval-name">Sarah Jones</span>
                                </div>
                                <div>
                                    <span class="approval-label">Department</span>
                                    <span class="approval-dept">IT</span>
                                </div>
                            </div>
                        </div>
                        <div class="approval-dates">
                            <div>
                                <span class="date-label">Leave start</span>
                                <span class="date-value">25/03/2026</span>
                            </div>
                            <div>
                                <span class="date-label">Leave end</span>
                                <span class="date-value">27/03/2026</span>
                            </div>
                        </div>
                        <div class="approval-actions">
                            <button class="btn-reject">Reject</button>
                            <button class="btn-more-info" onclick="openMoreInfoModal()">More Info</button>
                            <button class="btn-approve">Approve</button>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="approval-card" data-status="pending">
                        <div class="approval-card-header">
                            <span class="clipboard-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                    </path>
                                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                </svg>
                            </span>
                            <span class="approval-id">#44233</span>
                        </div>
                        <div class="approval-employee">
                            <img src="../assets/img2.jpg" alt="Employee" class="approval-avatar"
                                onerror="this.src='https://ui-avatars.com/api/?name=Mike+Brown&background=eab308&color=fff&size=50'">
                            <div class="approval-employee-details">
                                <div>
                                    <span class="approval-label">Name</span>
                                    <span class="approval-name">Mike Brown</span>
                                </div>
                                <div>
                                    <span class="approval-label">Department</span>
                                    <span class="approval-dept">IT</span>
                                </div>
                            </div>
                        </div>
                        <div class="approval-dates">
                            <div>
                                <span class="date-label">Leave start</span>
                                <span class="date-value">01/04/2026</span>
                            </div>
                            <div>
                                <span class="date-label">Leave end</span>
                                <span class="date-value">05/04/2026</span>
                            </div>
                        </div>
                        <div class="approval-actions">
                            <button class="btn-reject">Reject</button>
                            <button class="btn-more-info" onclick="openMoreInfoModal()">More Info</button>
                            <button class="btn-approve">Approve</button>
                        </div>
                    </div>

                    <!-- Accepted Sample (HR) -->
                    <div class="approval-card" data-status="accepted" style="display: none;">
                        <div class="approval-card-header">
                            <span class="status-badge"
                                style="background: #dcfce7; color: #16a34a; padding: 4px 12px; border-radius: 6px; font-weight: 600; font-size: 12px;">Approved</span>
                            <span class="approval-id">#44210</span>
                        </div>
                        <div class="approval-employee">
                            <img src="../assets/img2.jpg" alt="Employee" class="approval-avatar"
                                onerror="this.src='https://ui-avatars.com/api/?name=Alice+Green&background=22c55e&color=fff&size=50'">
                            <div class="approval-employee-details">
                                <div>
                                    <span class="approval-label">Name</span>
                                    <span class="approval-name">Alice Green</span>
                                </div>
                                <div>
                                    <span class="approval-label">Department</span>
                                    <span class="approval-dept">IT</span>
                                </div>
                            </div>
                        </div>
                        <div class="approval-dates">
                            <div>
                                <span class="date-label">Leave start</span>
                                <span class="date-value">15/02/2026</span>
                            </div>
                            <div>
                                <span class="date-label">Leave end</span>
                                <span class="date-value">18/02/2026</span>
                            </div>
                        </div>
                        <div class="approval-actions">
                            <button class="btn-more-info" onclick="openMoreInfoModal()" style="width: 100%;">More
                                Info</button>
                        </div>
                    </div>

                    <!-- Rejected Sample (HR) -->
                    <div class="approval-card" data-status="rejected" style="display: none;">
                        <div class="approval-card-header">
                            <span class="status-badge"
                                style="background: #fee2e2; color: #dc2626; padding: 4px 12px; border-radius: 6px; font-weight: 600; font-size: 12px;">Rejected</span>
                            <span class="approval-id">#44205</span>
                        </div>
                        <div class="approval-employee">
                            <img src="../assets/img2.jpg" alt="Employee" class="approval-avatar"
                                onerror="this.src='https://ui-avatars.com/api/?name=Bob+White&background=ef4444&color=fff&size=50'">
                            <div class="approval-employee-details">
                                <div>
                                    <span class="approval-label">Name</span>
                                    <span class="approval-name">Bob White</span>
                                </div>
                                <div>
                                    <span class="approval-label">Department</span>
                                    <span class="approval-dept">IT</span>
                                </div>
                            </div>
                        </div>
                        <div class="approval-dates">
                            <div>
                                <span class="date-label">Leave start</span>
                                <span class="date-value">05/02/2026</span>
                            </div>
                            <div>
                                <span class="date-label">Leave end</span>
                                <span class="date-value">06/02/2026</span>
                            </div>
                        </div>
                        <div class="approval-actions">
                            <button class="btn-more-info" onclick="openMoreInfoModal()" style="width: 100%;">More
                                Info</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- More Info Modal -->
    <div class="modal-overlay" id="moreInfoModal">
        <div class="modal-content">
            <div class="modal-header">
                <span></span>
                <button class="modal-close" onclick="closeMoreInfoModal()">
                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="employee-modal-content">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); text-align: left;">
                    <div>
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Emergency
                            Contact(Name)</span>
                        <p style="font-weight: 600; margin-top: 4px;">Jane Smith</p>
                    </div>
                    <div>
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Emergency
                            Contact(Contact)</span>
                        <p style="font-weight: 600; margin-top: 4px;">0547892376</p>
                    </div>
                    <div style="grid-column: 1 / -1;">
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Reason</span>
                        <p style="margin-top: 4px; padding: 12px; background: #f9fafb; border-radius: 8px;">Annual
                            family vacation</p>
                    </div>
                    <div style="grid-column: 1 / -1;">
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Vacation Address</span>
                        <p style="font-weight: 600; margin-top: 4px;">Accra, Ghana</p>
                    </div>
                    <div>
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Duties to be covered
                            by</span>
                        <p style="font-weight: 600; margin-top: 4px;">David Wilson</p>
                    </div>
                    <div>
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Job title</span>
                        <p style="font-weight: 600; margin-top: 4px;">Software Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab functionality
        // Tab functionality
        const tabs = document.querySelectorAll('.approval-tab');
        const cards = document.querySelectorAll('.approval-card');

        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                // Activate tab
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                const status = this.dataset.tab;

                // Filter cards
                cards.forEach(card => {
                    if (card.dataset.status === status) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // More Info Modal
        function openMoreInfoModal() {
            document.getElementById('moreInfoModal').classList.add('active');
        }

        function closeMoreInfoModal() {
            document.getElementById('moreInfoModal').classList.remove('active');
        }

        document.getElementById('moreInfoModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeMoreInfoModal();
            }
        });
    </script>
</body>

</html>