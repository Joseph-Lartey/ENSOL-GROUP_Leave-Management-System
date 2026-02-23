<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Portal - My Requests">
    <title>My Requests | ENSOL Group Leave Portal</title>

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

                <a href="my-requests.php" class="nav-item active">
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
                <h1 class="page-title">My Requests</h1>

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
                <div class="requests-container" style="background: white; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); padding: 20px;">
                    <table class="requests-table" style="width: 100%; border-collapse: separate; border-spacing: 0 15px;">
                        <tbody id="requestsTableBody">
                            <tr>
                                <td colspan="3" style="text-align: center; padding: 20px;">Loading requests...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Edit Request Modal -->
    <div class="modal-overlay" id="editRequestModal">
        <div class="modal-content" style="max-width: 600px;">
            <h2 class="modal-title">Edit Request</h2>
            <form id="editRequestForm" class="dashboard-form">
                <input type="hidden" id="editRequestId" name="request_id">
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Leave Type</label>
                        <select id="editReason" name="reason" class="form-select" required>
                             <option value="" disabled>Select Type</option>
                             <option value="annual">Annual Leave</option>
                             <option value="sick">Sick Leave</option>
                             <option value="casual">Casual Leave</option>
                             <option value="maternity">Maternity Leave</option>
                             <option value="paternity">Paternity Leave</option>
                             <option value="other">Other/Personal</option>
                        </select>
                    </div>
                    <div class="form-group">
                         <label>Reason / Description</label>
                         <input type="text" id="editReasonText" class="form-input" placeholder="e.g. Personal Family Matter">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" id="editStartDate" name="startDate" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" id="editEndDate" name="endDate" class="form-input" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Vacation Address</label>
                    <textarea id="editVacationAddress" name="vacationAddress" class="form-input" rows="2"></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Emergency Contact</label>
                        <input type="text" id="editEmergencyName" name="emergencyName" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Emergency Phone</label>
                        <input type="tel" id="editEmergencyPhone" name="emergencyPhone" class="form-input">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Covered By</label>
                        <input type="text" id="editCoveredBy" name="coveredBy" class="form-input">
                    </div>
                    <div class="form-group"></div>
                </div>

                <div class="modal-actions">
                    <button type="button" class="modal-btn cancel" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="modal-btn confirm">Update Request</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/dashboard.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
             fetchMyRequests();
        });

        function fetchMyRequests() {
            const jwt = localStorage.getItem('token');
            if (!jwt) return;

            fetch('../../api/v1/user/requests.php', {
                headers: { 'Authorization': `Bearer ${jwt}` }
            })
            .then(r => r.json())
            .then(data => {
                const tbody = document.getElementById('requestsTableBody');
                tbody.innerHTML = '';

                if (data.status === 'success' && data.data.length > 0) {
                    window.userRequests = data.data; 
                    
                    data.data.forEach(req => {
                        const tr = document.createElement('tr');
                        // Styling matches the image: simple underline, cleaner cells
                        tr.style.borderBottom = '1px solid #f0f0f0';
                        
                        // Status Indicator Color
                        let statusColor = '#fbbf24'; // Pending (Yellow default)
                        if (req.status === 'approved') statusColor = '#22c55e';
                        if (req.status === 'rejected') statusColor = '#ef4444';
                        if (req.status === 'cancelled') statusColor = '#9ca3af';

                        tr.innerHTML = `
                            <td style="padding: 15px 10px; border-bottom: 1px solid #eee; width: 40%;">
                                <div style="display: flex; align-items: center; gap: 15px;">
                                    <div class="request-icon-large">
                                        <!-- Icon from Design -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    </div>
                                    <div>
                                        <div style="font-weight: 600; font-size: 16px; color: #1f2937;">${req.leave_type}</div>
                                        <div style="font-size: 13px; color: #9ca3af; display: flex; align-items: center; gap: 6px; margin-top: 4px;">
                                            <span style="display:inline-block; width: 6px; height: 6px; border-radius: 50%; background-color: ${statusColor};"></span>
                                            ${formatStatus(req.status)}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td style="padding: 15px 10px; border-bottom: 1px solid #eee; width: 30%; text-align: center; color: #4b5563; font-weight: 500;">
                                <div>${formatDate(req.start_date)} - ${formatDate(req.end_date)}</div>
                                <div style="font-size: 12px; color: #9ca3af; margin-top: 4px;">${req.duration} days</div>
                            </td>
                            <td style="padding: 15px 10px; border-bottom: 1px solid #eee; text-align: right;">
                                <div style="display: flex; gap: 10px; justify-content: flex-end;">
                                    ${req.status === 'pending' ? 
                                        `<button class="btn-delete" onclick="cancelRequest(${req.id})">Delete</button>
                                         <button class="btn-edit" onclick="openEditModal(${req.id})">Edit</button>` 
                                        : '-' 
                                    }
                                </div>
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });
                } else {
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="3" style="text-align: center; padding: 40px; color: #666;">
                                <div style="margin-bottom: 10px; font-size: 2em;">📭</div>
                                No leave requests found. <a href="apply-leave.php" style="color: var(--primary-color); text-decoration: underline;">Apply for one?</a>
                            </td>
                        </tr>
                    `;
                }
            })
            .catch(err => {
                 console.error(err);
                 document.getElementById('requestsTableBody').innerHTML = '<tr><td colspan="3" style="color:red; text-align:center;">Failed to load data.</td></tr>';
            });
        }
        
        // ... (Keep existing helpers) ...

        // --- Cancel Action ---
        function cancelRequest(id) {
            // Note: Currently just a UI confirmation. Backend not implemented for delete yet as per instructions.
            Swal.fire({
                title: 'Cancel Request?',
                text: "Are you sure you want to cancel this leave application?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DC1609',
                cancelButtonColor: '#1a1a1a',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                   Swal.fire('Info', 'Cancellation feature coming soon!', 'info');
                   // Future: Call API to delete/cancel
                }
            });
        }

        // --- Edit Action & Modal ---
        function openEditModal(id) {
            const req = userRequests.find(r => r.id == id);
            if (!req) return;

            document.getElementById('editRequestId').value = req.id;
            
            // Map Leave Type Name to Select Value
            // req.leave_type is 'Annual Leave', 'Sick Leave' etc.
            // req.reason is 'personal' etc.
            
            const typeMap = {
                'annual leave': 'annual',
                'sick leave': 'sick',
                'casual leave': 'casual',
                'maternity leave': 'maternity',
                'paternity leave': 'paternity'
            };
            
            let typeVal = 'other';
            if (req.leave_type) {
                const lowerType = req.leave_type.toLowerCase();
                 // Try strict match or partial
                for (const [key, val] of Object.entries(typeMap)) {
                    if (lowerType.includes(key)) {
                        typeVal = val;
                        break;
                    }
                }
            }
            
            document.getElementById('editReason').value = typeVal;
            document.getElementById('editReasonText').value = req.reason || '';

            // Dates
            document.getElementById('editStartDate').value = req.start_date;
            document.getElementById('editEndDate').value = req.end_date;
            
            // Text values
            document.getElementById('editVacationAddress').value = req.vacation_address || '';
            document.getElementById('editEmergencyName').value = req.emergency_contact_name || '';
            document.getElementById('editEmergencyPhone').value = req.emergency_contact_phone || '';
            document.getElementById('editCoveredBy').value = req.covered_by || '';
            
            // Showing modal
            document.getElementById('editRequestModal').classList.add('active');
        }

        function closeEditModal() {
            document.getElementById('editRequestModal').classList.remove('active');
        }

        // Handle Update Submit
        document.getElementById('editRequestForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Updating...';
            submitBtn.disabled = true;

            const jwt = localStorage.getItem('token');
            const reasonType = document.getElementById('editReason').value;
            const reasonText = document.getElementById('editReasonText').value; // We might want to combine these?
            
            // If API expects 'reason' to determine type, we send type.
            // If API expects user description, we send text. 
            // Currently API uses 'reason' param to find type.
            // Let's send the Type value as 'reason' to ensure Type updates correctly.
            // But we lose the description? 
            // Ideally we update API to accepting separate fields. For now, let's prioritize Type.
            
            const formData = {
                request_id: document.getElementById('editRequestId').value,
                reason: reasonType, // Send 'annual', 'sick' so backend finds type
                // We might lose 'personal' text if backend overwrites column. 
                // But leave_type_id is main goal.
                
                startDate: document.getElementById('editStartDate').value,
                endDate: document.getElementById('editEndDate').value,
                vacationAddress: document.getElementById('editVacationAddress').value,
                emergencyName: document.getElementById('editEmergencyName').value,
                emergencyPhone: document.getElementById('editEmergencyPhone').value,
                coveredBy: document.getElementById('editCoveredBy').value
            };

            fetch('../../api/v1/leaves/update.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${jwt}`
                },
                body: JSON.stringify(formData)
            })
            .then(r => r.json())
            .then(data => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated!',
                        text: 'Your request has been updated.',
                        confirmButtonColor: '#DC1609'
                    });
                    closeEditModal();
                    fetchMyRequests(); // Refresh table
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Update failed.',
                        confirmButtonColor: '#DC1609'
                    });
                }
            })
            .catch(err => {
                console.error(err);
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                Swal.fire({ icon: 'error', title: 'Network Error', text: 'Could not connect to server.' });
            });
        });
    </script>
</body>
</html>