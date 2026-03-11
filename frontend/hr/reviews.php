<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Management - Reviews">
    <title>Reviews | ENSOL Group Leave Portal</title>
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
                <a href="approvals.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </span>
                    <span class="nav-text">Approvals</span>
                </a>
                <a href="reviews.php" class="nav-item active">
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
                <h1 class="page-title">Reviews</h1>
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
                <!-- Reviews Header -->
                <div class="employee-header">
                    <h2>All Leave Reviews</h2>
                    <div class="employee-search">
                        <select class="filter-dropdown" id="statusFilter"
                            style="padding: 8px; border-radius: 8px; border: 1px solid #e5e7eb; margin-right: 8px;">
                            <option value="">All Statuses</option>
                            <option value="pending">Pending</option>
                            <option value="approved_supervisor">Supervisor Approved</option>
                            <option value="approved_hr">HR Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                        <select class="filter-dropdown" id="deptFilter"
                            style="padding: 8px; border-radius: 8px; border: 1px solid #e5e7eb; margin-right: 8px;">
                            <option value="">All Departments</option>
                        </select>
                        <select class="filter-dropdown" id="typeFilter"
                            style="padding: 8px; border-radius: 8px; border: 1px solid #e5e7eb; margin-right: 8px;">
                            <option value="">All Leave Types</option>
                        </select>
                        <input type="text" class="search-input" placeholder="Search by name..." id="reviewSearch">
                    </div>
                </div>

                <!-- Reviews Table -->
                <table class="reviews-table">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Department</th>
                            <th>Leave Type</th>
                            <th>Dates</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="reviewsTableBody">
                        <tr>
                            <td colspan="6" style="text-align: center; color: #888;">Loading...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Review Modal -->
    <div class="modal-overlay" id="reviewModal">
        <div class="modal-content">
            <div class="modal-header">
                <span></span>
                <button class="modal-close" onclick="closeReviewModal()">
                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="review-popup-content">
                <img src="" alt="Employee" class="review-popup-avatar" id="reviewAvatar">
                <h3 class="review-popup-name" id="reviewName">--</h3>
                <p class="employee-modal-info"><strong>Department:</strong> <span id="reviewDept">--</span></p>
                <p class="employee-modal-info"><strong>Email:</strong> <span id="reviewEmail">--</span></p>
                <p class="employee-modal-info"><strong>Company:</strong> <span id="reviewCompany">--</span></p>
                
                <div style="margin-top: 20px; padding: 15px; background: #f9fafb; border-radius: 10px;">
                    <p class="employee-modal-info"><strong>Leave Type:</strong> <span id="reviewLeaveType">--</span></p>
                    <p class="employee-modal-info"><strong>Dates:</strong> <span id="reviewDates">--</span></p>
                    <p class="employee-modal-info"><strong>Days Requested:</strong> <span id="reviewDays">--</span></p>
                    <p class="employee-modal-info"><strong>Reason:</strong> <span id="reviewReason">--</span></p>
                    <p class="employee-modal-info"><strong>Status:</strong> <span id="reviewStatus" class="status-badge">--</span></p>
                    <p class="employee-modal-info"><strong>Applied On:</strong> <span id="reviewAppliedOn">--</span></p>
                </div>

                <div style="margin-top: 15px; padding: 15px; background: #fff7ed; border-radius: 10px;">
                    <p class="employee-modal-info"><strong>Emergency Contact:</strong> <span id="reviewEmergency">--</span></p>
                    <p class="employee-modal-info"><strong>Covered By:</strong> <span id="reviewCoveredBy">--</span></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const API_BASE = '../../api/v1';
        let allReviews = [];

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

        // Format date
        function formatDate(dateStr) {
            if (!dateStr) return 'N/A';
            return new Date(dateStr).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
        }

        // Get status badge class
        function getStatusBadge(status) {
            const badges = {
                'pending': '<span class="status-badge pending">Pending</span>',
                'approved_supervisor': '<span class="status-badge supervisor">Supervisor Approved</span>',
                'approved_hr': '<span class="status-badge approved">HR Approved</span>',
                'rejected': '<span class="status-badge rejected">Rejected</span>'
            };
            return badges[status] || `<span class="status-badge">${status}</span>`;
        }

        // Fetch Reviews
        async function fetchReviews() {
            try {
                const response = await fetch(`${API_BASE}/hr/reviews.php`, {
                    headers: { 'Authorization': `Bearer ${getToken()}` }
                });

                if (response.status === 401 || response.status === 403) {
                    window.location.href = '../auth/login.php';
                    return;
                }

                const result = await response.json();
                if (result.status === 'success') {
                    allReviews = result.data;
                    renderTable(allReviews);
                    populateFilters(result.filters);
                }
            } catch (error) {
                console.error('Error fetching reviews:', error);
                document.getElementById('reviewsTableBody').innerHTML = 
                    '<tr><td colspan="6" style="text-align: center; color: #dc2626;">Failed to load reviews.</td></tr>';
            }
        }

        // Populate Filter Dropdowns
        function populateFilters(filters) {
            const deptFilter = document.getElementById('deptFilter');
            const typeFilter = document.getElementById('typeFilter');

            if (filters.departments) {
                filters.departments.forEach(dept => {
                    if (dept) {
                        const option = document.createElement('option');
                        option.value = dept;
                        option.textContent = dept;
                        deptFilter.appendChild(option);
                    }
                });
            }

            if (filters.leave_types) {
                filters.leave_types.forEach(type => {
                    if (type) {
                        const option = document.createElement('option');
                        option.value = type;
                        option.textContent = type;
                        typeFilter.appendChild(option);
                    }
                });
            }
        }

        // Render Table
        function renderTable(reviews) {
            const tbody = document.getElementById('reviewsTableBody');

            if (!reviews || reviews.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" style="text-align: center; color: #888;">No leave requests found.</td></tr>';
                return;
            }

            tbody.innerHTML = reviews.map(review => `
                <tr>
                    <td>${review.employee_name || 'Unknown'}</td>
                    <td>${review.department || 'N/A'}</td>
                    <td>${review.leave_type || 'N/A'}</td>
                    <td>${formatDate(review.start_date)} - ${formatDate(review.end_date)}</td>
                    <td>${getStatusBadge(review.status)}</td>
                    <td><button class="btn-more-info-table" onclick='openReviewModal(${JSON.stringify(review)})'>More Info</button></td>
                </tr>
            `).join('');
        }

        // Filter Reviews
        function filterReviews() {
            const searchTerm = document.getElementById('reviewSearch').value.toLowerCase();
            const selectedStatus = document.getElementById('statusFilter').value;
            const selectedDept = document.getElementById('deptFilter').value;
            const selectedType = document.getElementById('typeFilter').value;

            const filtered = allReviews.filter(review => {
                const matchesSearch = (review.employee_name || '').toLowerCase().includes(searchTerm);
                const matchesStatus = !selectedStatus || review.status === selectedStatus;
                const matchesDept = !selectedDept || review.department === selectedDept;
                const matchesType = !selectedType || review.leave_type === selectedType;
                
                return matchesSearch && matchesStatus && matchesDept && matchesType;
            });

            renderTable(filtered);
        }

        // Open Review Modal
        function openReviewModal(review) {
            document.getElementById('reviewAvatar').src = 
                `https://ui-avatars.com/api/?name=${encodeURIComponent(review.employee_name)}&background=dc2626&color=fff&size=80`;
            document.getElementById('reviewName').textContent = review.employee_name || 'Unknown';
            document.getElementById('reviewDept').textContent = review.department || 'N/A';
            document.getElementById('reviewEmail').textContent = review.employee_email || 'N/A';
            document.getElementById('reviewCompany').textContent = review.company_name || 'N/A';
            document.getElementById('reviewLeaveType').textContent = review.leave_type || 'N/A';
            document.getElementById('reviewDates').textContent = 
                `${formatDate(review.start_date)} - ${formatDate(review.end_date)}`;
            document.getElementById('reviewDays').textContent = review.days_requested || 'N/A';
            document.getElementById('reviewReason').textContent = review.reason || 'N/A';
            document.getElementById('reviewStatus').innerHTML = getStatusBadge(review.status);
            document.getElementById('reviewAppliedOn').textContent = formatDate(review.created_at);
            document.getElementById('reviewEmergency').textContent = 
                review.emergency_contact_name ? `${review.emergency_contact_name} (${review.emergency_contact_phone || 'N/A'})` : 'N/A';
            document.getElementById('reviewCoveredBy').textContent = review.covered_by || 'N/A';

            document.getElementById('reviewModal').classList.add('active');
        }

        function closeReviewModal() {
            document.getElementById('reviewModal').classList.remove('active');
        }

        document.getElementById('reviewModal').addEventListener('click', function(e) {
            if (e.target === this) closeReviewModal();
        });

        // Event Listeners
        document.getElementById('reviewSearch').addEventListener('input', filterReviews);
        document.getElementById('statusFilter').addEventListener('change', filterReviews);
        document.getElementById('deptFilter').addEventListener('change', filterReviews);
        document.getElementById('typeFilter').addEventListener('change', filterReviews);

        // Fetch profile for header avatar
        async function fetchProfile() {
            try {
                const response = await fetch(`${API_BASE}/user/profile.php`, {
                    headers: { 'Authorization': `Bearer ${getToken()}` }
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

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            if (!checkAuth()) return;
            fetchReviews();
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