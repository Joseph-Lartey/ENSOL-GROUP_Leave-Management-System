<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group - HR Leave Disputes">
    <title>Leave Disputes | ENSOL Group Leave Portal</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="icon" type="image/jpeg" href="../assets/ensol_logo.jpg">
    <style>
        .disputes-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: #fff;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .disputes-table th {
            background: #f9fafb;
            padding: 16px;
            text-align: left;
            font-weight: 600;
            color: var(--medium-gray);
            font-size: var(--text-sm);
            border-bottom: 2px solid #e5e7eb;
        }
        .disputes-table td {
            padding: 16px;
            vertical-align: middle;
            border-bottom: 1px solid #e5e7eb;
            color: var(--dark-gray);
        }
        .dispute-status {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: var(--text-xs);
            font-weight: 600;
        }
        .status-pending { background: #fef3c7; color: #d97706; }
        .status-resolved { background: #dcfce7; color: #16a34a; }
        .status-rejected { background: #fee2e2; color: #dc2626; }
        
        /* Modal tweaks */
        .dispute-popup-content {
            padding: 20px 0;
            text-align: left;
        }
        .dispute-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }
        .dispute-box {
            background: #f9fafb;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }
        .resolve-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .resolve-actions button {
            flex: 1;
        }
    </style>
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

                <a href="disputes.php" class="nav-item active">
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
            <header class="top-header">
                <h1 class="page-title">Leave Disputes</h1>
                <div class="header-actions">
                    <a href="notifications.php" class="notification-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </a>
                    <a href="profile.php">
                        <img src="../assets/img2.jpg" alt="HR" class="header-avatar" onerror="this.src='https://ui-avatars.com/api/?name=HR&background=eab308&color=fff&size=40'">
                    </a>
                </div>
            </header>

            <div class="page-content">
                <div class="employee-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h2>Employee Stats Disputes</h2>
                    <select id="statusFilter" class="filter-dropdown" style="padding: 8px; border-radius: 8px; border: 1px solid #e5e7eb;">
                        <option value="">All Statuses</option>
                        <option value="pending">Pending</option>
                        <option value="resolved">Resolved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>

                <table class="disputes-table">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Company</th>
                            <th>Leave Class</th>
                            <th>Current Stat</th>
                            <th>Contested Stat</th>
                            <th>Status</th>
                            <th>Submitted</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="disputesTableBody">
                        <tr><td colspan="8" style="text-align:center;color:#888;">Loading...</td></tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Review Modal -->
    <div class="modal-overlay" id="disputeModal">
        <div class="modal-content" style="max-width: 600px;">
            <div class="modal-header">
                <h3>Review Dispute</h3>
                <button class="modal-close" onclick="closeDisputeModal()">
                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            
            <div class="dispute-popup-content">
                <div style="display:flex; align-items:center; gap: 15px; margin-bottom: 20px;">
                    <img src="" id="disputeAvatar" style="width:50px; height:50px; border-radius:50%;">
                    <div>
                        <h4 id="disputeName" style="margin:0;">--</h4>
                        <p id="disputeCompany" style="margin:4px 0 0 0; font-size:13px; color:var(--medium-gray);">--</p>
                    </div>
                </div>

                <div class="dispute-grid">
                    <div class="dispute-box">
                        <span style="font-size:12px; color:var(--medium-gray);">Leave Category</span>
                        <p id="disputeType" style="margin:5px 0 0 0; font-weight:600; font-size:15px; color:#1e40af; text-transform:capitalize;">--</p>
                    </div>
                    <div class="dispute-box">
                        <span style="font-size:12px; color:var(--medium-gray);">Status</span>
                        <div id="disputeStatus" style="margin-top:5px;">--</div>
                    </div>
                    <div class="dispute-box" style="background:#fee2e2; border-color:#fca5a5;">
                        <span style="font-size:12px; color:#991b1b;">System Shows</span>
                        <p id="disputeCurrent" style="margin:5px 0 0 0; font-weight:700; font-size:18px; color:#991b1b;">-- <span style="font-size:12px; font-weight:normal;">days left</span></p>
                    </div>
                    <div class="dispute-box" style="background:#dcfce7; border-color:#86efac;">
                        <span style="font-size:12px; color:#166534;">Employee Claims</span>
                        <p id="disputeClaim" style="margin:5px 0 0 0; font-weight:700; font-size:18px; color:#166534;">-- <span style="font-size:12px; font-weight:normal;">days left</span></p>
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <span style="font-size:13px; font-weight:600;">Employee Reason</span>
                    <p id="disputeComments" style="margin-top:5px; padding:12px; background:#f3f4f6; border-radius:6px; font-size:14px; line-height:1.5;">--</p>
                </div>

                <div id="resolutionSection">
                    <span style="font-size:13px; font-weight:600;">HR Resolution Notes (required)</span>
                    <textarea id="adminNotes" class="form-input form-textarea" style="margin-top:8px; height:80px;" placeholder="What action did you take? Explain to the employee..."></textarea>
                    
                    <div style="margin-top:16px; padding:14px; background:#eff6ff; border:1px solid #bfdbfe; border-radius:8px;">
                        <label style="font-size:13px; font-weight:600; color:#1e40af; display:block; margin-bottom:6px;">Adjust Days Used (optional)</label>
                        <p style="font-size:12px; color:#6b7280; margin:0 0 8px 0;">If the employee's claim is correct, enter the corrected 'days used' value here. Leave blank to keep the current balance unchanged.</p>
                        <input type="number" id="overrideDaysUsed" min="0" class="form-input" style="width:120px; padding:8px 12px; border-radius:8px; border:1px solid #93c5fd; font-size:14px;" placeholder="e.g. 5">
                    </div>

                    <div class="resolve-actions" style="margin-top:16px;">
                        <button class="btn" style="background:var(--red); color:white;" onclick="processDispute('rejected')">Reject Claim</button>
                        <button class="btn btn-primary" onclick="processDispute('resolved')">Mark as Resolved</button>
                    </div>
                </div>
                
                <div id="resolvedDetails" style="display:none;">
                    <span style="font-size:13px; font-weight:600; color:#166534;">Resolution Notes</span>
                    <p id="disputeAdminComments" style="margin-top:5px; padding:12px; background:#f0fdf4; border-radius:6px; font-size:14px; line-height:1.5; border:1px solid #bbf7d0;">--</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal-overlay" id="logoutModal">
        <div class="modal-content" style="max-width: 400px; text-align:center;">
            <div style="width: 50px; height: 50px; background: #fee2e2; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="#dc2626" fill="none" stroke-width="2">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
            </div>
            <h2 class="modal-title" style="margin-bottom: 20px;">Are you sure you want to log out?</h2>
            <div class="modal-actions" style="display: flex; gap: 10px; justify-content: center;">
                <button class="btn cancel" onclick="document.getElementById('logoutModal').classList.remove('active')" style="background: white; border: 1px solid #e5e7eb; color: var(--dark-gray); padding: 8px 16px;">Cancel</button>
                <button class="btn confirm" id="confirmLogout" style="background: var(--red); color: white; padding: 8px 16px;">Yes, Logout</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const API_BASE = '../../api/v1';
        let allDisputes = [];
        let currentDisputeId = null;

        document.addEventListener('DOMContentLoaded', () => {
            const token = localStorage.getItem('token');
            if (!token) {
                window.location.href = '../auth/login.php';
                return;
            }
            fetchDisputes();
            
            document.getElementById('statusFilter').addEventListener('change', filterDisputes);
            
            // Logout
            document.querySelector('.logout-btn').addEventListener('click', (e) => {
                e.preventDefault();
                document.getElementById('logoutModal').classList.add('active');
            });
            document.getElementById('confirmLogout').addEventListener('click', () => {
                localStorage.removeItem('token');
                window.location.href = '../auth/login.php';
            });
        });

        async function fetchDisputes() {
            try {
                const response = await fetch(`${API_BASE}/hr/disputes.php`, {
                    headers: { 'Authorization': `Bearer ${localStorage.getItem('token')}` }
                });
                const data = await response.json();
                
                if (data.status === 'success') {
                    allDisputes = data.data;
                    filterDisputes();
                } else {
                    document.getElementById('disputesTableBody').innerHTML = 
                        `<tr><td colspan="8" style="text-align:center;color:red;">Failed to load disputes</td></tr>`;
                }
            } catch (err) {
                console.error(err);
                document.getElementById('disputesTableBody').innerHTML = 
                    `<tr><td colspan="8" style="text-align:center;color:red;">Error connecting to server</td></tr>`;
            }
        }

        function filterDisputes() {
            const status = document.getElementById('statusFilter').value;
            let filtered = allDisputes;
            if (status) {
                filtered = allDisputes.filter(d => d.status === status);
            }
            renderTable(filtered);
        }

        function getStatusBadge(status) {
            return `<span class="dispute-status status-${status}">${status.charAt(0).toUpperCase() + status.slice(1)}</span>`;
        }
        
        function formatDate(dateString) {
            if(!dateString) return 'N/A';
            const date = new Date(dateString);
            return date.toLocaleDateString() + ' ' + date.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
        }

        function renderTable(disputes) {
            const tbody = document.getElementById('disputesTableBody');
            if (!disputes.length) {
                tbody.innerHTML = `<tr><td colspan="8" style="text-align:center;color:#888;">No disputes found.</td></tr>`;
                return;
            }

            tbody.innerHTML = disputes.map(d => `
                <tr>
                    <td><strong>${d.employee_name}</strong></td>
                    <td>${d.company_name || 'Group'}</td>
                    <td style="text-transform: capitalize;">${d.leave_type}</td>
                    <td><span style="color:#dc2626;font-weight:600;">${d.current_stat}</span></td>
                    <td><span style="color:#16a34a;font-weight:600;">${d.correct_stat}</span></td>
                    <td>${getStatusBadge(d.status)}</td>
                    <td style="font-size:12px; color:#666;">${formatDate(d.created_at)}</td>
                    <td><button class="btn btn-primary" style="padding:6px 12px; font-size:12px;" onclick="openDisputeModal(${d.id})">Review</button></td>
                </tr>
            `).join('');
        }

        function openDisputeModal(id) {
            const dispute = allDisputes.find(d => d.id == id);
            if (!dispute) return;
            currentDisputeId = id;

            document.getElementById('disputeAvatar').src = `https://ui-avatars.com/api/?name=${encodeURIComponent(dispute.employee_name)}&background=eab308&color=fff`;
            document.getElementById('disputeName').textContent = dispute.employee_name;
            document.getElementById('disputeCompany').textContent = dispute.company_name || 'Group';
            document.getElementById('disputeType').textContent = dispute.leave_type;
            document.getElementById('disputeStatus').innerHTML = getStatusBadge(dispute.status);
            document.getElementById('disputeCurrent').innerHTML = `${dispute.current_stat} <span style="font-size:12px; font-weight:normal;">days left</span>`;
            document.getElementById('disputeClaim').innerHTML = `${dispute.correct_stat} <span style="font-size:12px; font-weight:normal;">days left</span>`;
            document.getElementById('disputeComments').textContent = dispute.comments || 'No comments provided.';
            
            // Reset modal state
            document.getElementById('adminNotes').value = '';
            
            if (dispute.status === 'pending') {
                document.getElementById('resolutionSection').style.display = 'block';
                document.getElementById('resolvedDetails').style.display = 'none';
            } else {
                document.getElementById('resolutionSection').style.display = 'none';
                document.getElementById('resolvedDetails').style.display = 'block';
                document.getElementById('disputeAdminComments').textContent = dispute.admin_comments || 'No notes provided.';
                // Adjust colors based on status
                const box = document.getElementById('disputeAdminComments');
                if (dispute.status === 'rejected') {
                    box.style.background = '#fef2f2'; box.style.borderColor = '#fecaca'; box.style.color = '#991b1b';
                } else {
                    box.style.background = '#f0fdf4'; box.style.borderColor = '#bbf7d0'; box.style.color = '#166534';
                }
            }

            document.getElementById('disputeModal').classList.add('active');
        }

        function closeDisputeModal() {
            document.getElementById('disputeModal').classList.remove('active');
            currentDisputeId = null;
        }

        async function processDispute(status) {
            const adminNotes = document.getElementById('adminNotes').value.trim();
            if (!adminNotes) {
                Swal.fire('Required', 'Please enter resolution notes to explain what action you took.', 'warning');
                return;
            }

            const overrideVal = document.getElementById('overrideDaysUsed').value;
            const payload = {
                dispute_id: currentDisputeId,
                status: status,
                admin_comments: adminNotes
            };
            if (overrideVal !== '' && status === 'resolved') {
                payload.override_days_used = parseInt(overrideVal, 10);
            }

            try {
                const response = await fetch(`${API_BASE}/hr/resolve_dispute.php`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${localStorage.getItem('token')}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });
                
                const data = await response.json();
                
                if (response.ok && data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message || `Dispute marked as ${status}.`,
                        timer: 2000,
                        showConfirmButton: false
                    });
                    closeDisputeModal();
                    fetchDisputes(); // Refresh table
                } else {
                    throw new Error(data.message || 'Failed to update dispute');
                }
            } catch (err) {
                Swal.fire('Error', err.message, 'error');
            }
        }
    </script>
</body>
</html>
