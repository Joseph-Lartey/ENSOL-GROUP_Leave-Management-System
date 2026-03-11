<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Management - Approvals">
    <title>Approvals | ENSOL Group Leave Portal</title>
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
                <a href="approvals.php" class="nav-item active">
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
                        <img src="../assets/img2.jpg" alt="HR" class="header-avatar"
                            onerror="this.src='https://ui-avatars.com/api/?name=AD&background=eab308&color=fff&size=40'">
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <!-- Stats Grid -->
                <div class="stats-grid admin-stats">
                    <div class="stat-card stat-green">
                        <div class="stat-info">
                            <span class="stat-label">All leave requests</span>
                            <span class="stat-value" id="statTotal">--</span>
                            <span class="stat-sublabel">Total applications</span>
                        </div>
                    </div>
                    <div class="stat-card stat-yellow">
                        <div class="stat-info">
                            <span class="stat-label">Approved requests</span>
                            <span class="stat-value" id="statApproved">--</span>
                            <span class="stat-sublabel">Final approved by HR</span>
                        </div>
                    </div>
                    <div class="stat-card stat-red-light">
                        <div class="stat-info">
                            <span class="stat-label">Pending requests</span>
                            <span class="stat-value" id="statPending">--</span>
                            <span class="stat-sublabel">Awaiting HR approval</span>
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
                    <!-- Cards will be loaded dynamically -->
                    <div class="loading-message" style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--medium-gray);">
                        Loading pending requests...
                    </div>
                </div>
            </div>

            <!-- More Info Modal -->
            <div class="modal-overlay" id="moreInfoModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span></span>
                        <button class="modal-close" onclick="closeMoreInfoModal()">
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="employee-modal-content">
                        <!-- Content loaded dynamically -->
                    </div>
                </div>
            </div>

            <!-- SweetAlert2 -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
                const API_BASE = '../../api/v1';
                const token = localStorage.getItem('token');

                // Store all requests for filtering
                let allRequests = {
                    pending: [],
                    accepted: [],
                    rejected: []
                };

                // Current selected request for modal
                let selectedRequest = null;

                // Check authentication
                if (!token) {
                    window.location.href = '../auth/login.php';
                }

                // Fetch Stats for stat cards
                async function fetchStats() {
                    try {
                        const response = await fetch(`${API_BASE}/hr/stats.php`, {
                            headers: {
                                'Authorization': `Bearer ${token}`
                            }
                        });
                        const result = await response.json();
                        if (result.status === 'success') {
                            document.getElementById('statTotal').textContent = result.data.total_applications;
                            document.getElementById('statApproved').textContent = result.data.total_approved;
                            document.getElementById('statPending').textContent = result.data.pending_count;
                        }
                    } catch (error) {
                        console.error('Error fetching stats:', error);
                    }
                }

                // Fetch profile for header avatar
                async function fetchProfile() {
                    try {
                        const response = await fetch(`${API_BASE}/user/profile.php`, {
                            headers: {
                                'Authorization': `Bearer ${token}`
                            }
                        });
                        if (response.ok) {
                            const result = await response.json();
                            if (result.status === 'success' && result.data && result.data.profile_image) {
                                const headerAvatar = document.querySelector('.header-avatar');
                                if (headerAvatar) {
                                    headerAvatar.src = `../${result.data.profile_image}`;
                                }
                            }
                        }
                    } catch (error) {
                        console.error('Error fetching profile:', error);
                    }
                }

                // Initialize on page load
                document.addEventListener('DOMContentLoaded', () => {
                    fetchStats();
                    fetchProfile();
                    loadPendingRequests();
                    loadHistoryRequests();
                    initTabs();
                });

                // Fetch accepted/rejected history from reviews endpoint
                async function loadHistoryRequests() {
                    try {
                        const response = await fetch(`${API_BASE}/hr/reviews.php`, {
                            headers: {
                                'Authorization': `Bearer ${token}`
                            }
                        });
                        const data = await response.json();
                        if (data.status === 'success') {
                            allRequests.accepted = data.data.filter(r => r.status === 'approved_hr');
                            allRequests.rejected = data.data.filter(r => r.status === 'rejected');

                            const activeTab = document.querySelector('.approval-tab.active')?.dataset.tab;
                            if (activeTab === 'accepted' || activeTab === 'rejected') {
                                renderCards(activeTab);
                            }
                        }
                    } catch (error) {
                        console.error('Error loading history:', error);
                    }
                }

                // Fetch pending requests from API (requests approved by supervisor)
                async function loadPendingRequests() {
                    const grid = document.getElementById('approvalGrid');
                    grid.innerHTML = '<div class="loading-message" style="grid-column: 1 / -1; text-align: center; padding: 40px;">Loading...</div>';

                    try {
                        const response = await fetch(`${API_BASE}/hr/pending.php`, {
                            headers: {
                                'Authorization': `Bearer ${token}`,
                                'Content-Type': 'application/json'
                            }
                        });

                        if (response.status === 401) {
                            window.location.href = '../auth/login.php';
                            return;
                        }

                        if (response.status === 403) {
                            grid.innerHTML = '<div class="loading-message" style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #dc2626;">Access denied. HR role required.</div>';
                            return;
                        }

                        const data = await response.json();

                        if (data.status === 'success') {
                            allRequests.pending = data.data;

                            // Update stat card
                            const statCard = document.querySelector('.stat-green .stat-value');
                            if (statCard) {
                                statCard.textContent = data.count || 0;
                            }

                            renderCards('pending');
                        } else {
                            grid.innerHTML = `<div class="loading-message" style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #dc2626;">${data.message || 'Failed to load requests'}</div>`;
                        }
                    } catch (error) {
                        console.error('Error loading requests:', error);
                        grid.innerHTML = '<div class="loading-message" style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #dc2626;">Error loading requests. Please try again.</div>';
                    }
                }

                // Format date for display
                function formatDate(dateStr) {
                    const date = new Date(dateStr);
                    return date.toLocaleDateString('en-GB', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric'
                    });
                }

                // Generate avatar URL
                function getAvatarUrl(name) {
                    const encodedName = encodeURIComponent(name || 'User');
                    return `https://ui-avatars.com/api/?name=${encodedName}&background=eab308&color=fff&size=50`;
                }

                // Render cards for a specific status
                function renderCards(status) {
                    const grid = document.getElementById('approvalGrid');
                    const requests = allRequests[status] || [];

                    if (requests.length === 0) {
                        const message = status === 'pending' ?
                            'No pending requests awaiting HR approval.' :
                            status === 'accepted' ?
                            'No approved requests.' :
                            'No rejected requests.';
                        grid.innerHTML = `<div class="loading-message" style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--medium-gray);">${message}</div>`;
                        return;
                    }

                    grid.innerHTML = requests.map(req => createCardHTML(req, status)).join('');

                    // Attach event listeners
                    attachCardListeners();
                }

                // Create card HTML
                function createCardHTML(req, status) {
                    const isPending = status === 'pending';
                    const statusBadge = status === 'accepted' ?
                        '<span class="status-badge" style="background: #dcfce7; color: #16a34a; padding: 4px 12px; border-radius: 6px; font-weight: 600; font-size: 12px;">Approved</span>' :
                        status === 'rejected' ?
                        '<span class="status-badge" style="background: #fee2e2; color: #dc2626; padding: 4px 12px; border-radius: 6px; font-weight: 600; font-size: 12px;">Rejected</span>' :
                        `<span class="status-badge" style="background: #fef3c7; color: #d97706; padding: 4px 12px; border-radius: 6px; font-weight: 600; font-size: 12px;">Supervisor Approved</span>`;

                    return `
                <div class="approval-card" data-request-id="${req.id}" data-status="${status}">
                    <div class="approval-card-header">
                        ${statusBadge}
                        <span class="approval-id">#${req.id}</span>
                    </div>
                    <div class="approval-employee">
                        <img src="../assets/img2.jpg" alt="Employee" class="approval-avatar"
                            onerror="this.src='${getAvatarUrl(req.employee_name)}'">
                        <div class="approval-employee-details">
                            <div>
                                <span class="approval-label">Name</span>
                                <span class="approval-name">${req.employee_name || 'Unknown'}</span>
                            </div>
                            <div>
                                <span class="approval-label">Leave Type</span>
                                <span class="approval-dept">${req.leave_type || 'N/A'}</span>
                            </div>
                        </div>
                    </div>
                    <div class="approval-dates">
                        <div>
                            <span class="date-label">Leave start</span>
                            <span class="date-value">${formatDate(req.start_date)}</span>
                        </div>
                        <div>
                            <span class="date-label">Leave end</span>
                            <span class="date-value">${formatDate(req.end_date)}</span>
                        </div>
                    </div>
                    <div class="approval-actions">
                        ${isPending ? `
                            <button class="btn-reject" data-id="${req.id}">Reject</button>
                            <button class="btn-more-info" data-id="${req.id}">More Info</button>
                            <button class="btn-approve" data-id="${req.id}">Final Approve</button>
                        ` : `
                            <button class="btn-more-info" data-id="${req.id}" style="width: 100%;">More Info</button>
                        `}
                    </div>
                </div>
            `;
                }

                // Attach event listeners to cards
                function attachCardListeners() {
                    // Approve buttons
                    document.querySelectorAll('.btn-approve').forEach(btn => {
                        btn.addEventListener('click', () => handleApprove(btn.dataset.id));
                    });

                    // Reject buttons
                    document.querySelectorAll('.btn-reject').forEach(btn => {
                        btn.addEventListener('click', () => handleReject(btn.dataset.id));
                    });

                    // More Info buttons
                    document.querySelectorAll('.btn-more-info').forEach(btn => {
                        btn.addEventListener('click', () => showMoreInfo(btn.dataset.id));
                    });
                }

                // Handle HR final approve (deducts leave balance)
                async function handleApprove(requestId) {
                    const request = allRequests.pending.find(r => r.id == requestId);

                    const result = await Swal.fire({
                        title: 'Give Final Approval?',
                        html: `<p>This will <strong>approve</strong> ${request?.employee_name || 'this'}'s leave request and <strong>deduct ${request?.days_requested || 'the'} day(s)</strong> from their leave balance.</p>`,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#16a34a',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Yes, Final Approve',
                        cancelButtonText: 'Cancel'
                    });

                    if (!result.isConfirmed) return;

                    try {
                        const response = await fetch(`${API_BASE}/hr/approve.php`, {
                            method: 'POST',
                            headers: {
                                'Authorization': `Bearer ${token}`,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                request_id: requestId
                            })
                        });

                        const data = await response.json();

                        if (data.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Approved!',
                                text: data.message,
                                confirmButtonColor: '#16a34a'
                            });

                            // Reload everything
                            loadPendingRequests();
                            fetchStats();
                            loadHistoryRequests();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                                confirmButtonColor: '#dc2626'
                            });
                        }
                    } catch (error) {
                        console.error('Approve error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to approve request',
                            confirmButtonColor: '#dc2626'
                        });
                    }
                }

                // Handle HR reject
                async function handleReject(requestId) {
                    const request = allRequests.pending.find(r => r.id == requestId);

                    const result = await Swal.fire({
                        title: 'Reject Leave Request?',
                        text: `Please provide a reason for rejection:`,
                        input: 'textarea',
                        inputPlaceholder: 'Reason for rejection...',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc2626',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Reject',
                        cancelButtonText: 'Cancel',
                        inputValidator: (value) => {
                            if (!value) {
                                return 'Please provide a rejection reason';
                            }
                        }
                    });

                    if (!result.isConfirmed) return;

                    try {
                        const response = await fetch(`${API_BASE}/hr/reject.php`, {
                            method: 'POST',
                            headers: {
                                'Authorization': `Bearer ${token}`,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                request_id: requestId,
                                reason: result.value
                            })
                        });

                        const data = await response.json();

                        if (data.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Rejected',
                                text: data.message,
                                confirmButtonColor: '#dc2626'
                            });

                            // Reload everything
                            loadPendingRequests();
                            fetchStats();
                            loadHistoryRequests();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                                confirmButtonColor: '#dc2626'
                            });
                        }
                    } catch (error) {
                        console.error('Reject error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to reject request',
                            confirmButtonColor: '#dc2626'
                        });
                    }
                }

                // Show more info modal
                function showMoreInfo(requestId) {
                    const request = allRequests.pending.find(r => r.id == requestId) ||
                        allRequests.accepted.find(r => r.id == requestId) ||
                        allRequests.rejected.find(r => r.id == requestId);

                    if (!request) return;

                    // Update modal content
                    const modal = document.getElementById('moreInfoModal');
                    const content = modal.querySelector('.employee-modal-content');

                    content.innerHTML = `
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); text-align: left;">
                    <div>
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Emergency Contact (Name)</span>
                        <p style="font-weight: 600; margin-top: 4px;">${request.emergency_contact_name || 'N/A'}</p>
                    </div>
                    <div>
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Emergency Contact (Phone)</span>
                        <p style="font-weight: 600; margin-top: 4px;">${request.emergency_contact_phone || 'N/A'}</p>
                    </div>
                    <div style="grid-column: 1 / -1;">
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Reason / Leave Type</span>
                        <p style="margin-top: 4px; padding: 12px; background: #f9fafb; border-radius: 8px;">${request.reason || request.leave_type || 'N/A'}</p>
                    </div>
                    <div style="grid-column: 1 / -1;">
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Vacation Address</span>
                        <p style="font-weight: 600; margin-top: 4px;">${request.vacation_address || 'N/A'}</p>
                    </div>
                    <div>
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Duties covered by</span>
                        <p style="font-weight: 600; margin-top: 4px;">${request.covered_by || 'N/A'}</p>
                    </div>
                    <div>
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Position</span>
                        <p style="font-weight: 600; margin-top: 4px;">${request.position || 'N/A'}</p>
                    </div>
                    <div>
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Days Requested</span>
                        <p style="font-weight: 600; margin-top: 4px;">${request.days_requested || 'N/A'} days</p>
                    </div>
                    <div>
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Submitted</span>
                        <p style="font-weight: 600; margin-top: 4px;">${formatDate(request.created_at)}</p>
                    </div>
                    <div style="grid-column: 1 / -1;">
                        <span style="font-size: var(--text-xs); color: var(--medium-gray);">Supervisor Approved On</span>
                        <p style="font-weight: 600; margin-top: 4px; color: #16a34a;">${formatDate(request.updated_at)}</p>
                    </div>
                </div>
            `;

                    modal.classList.add('active');
                }

                function closeMoreInfoModal() {
                    document.getElementById('moreInfoModal').classList.remove('active');
                }

                document.getElementById('moreInfoModal').addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeMoreInfoModal();
                    }
                });

                // Tab functionality
                function initTabs() {
                    const tabs = document.querySelectorAll('.approval-tab');

                    tabs.forEach(tab => {
                        tab.addEventListener('click', function() {
                            tabs.forEach(t => t.classList.remove('active'));
                            this.classList.add('active');

                            const status = this.dataset.tab;
                            renderCards(status);
                        });
                    });
                }

                // Logout confirmation
                document.addEventListener('DOMContentLoaded', function() {
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