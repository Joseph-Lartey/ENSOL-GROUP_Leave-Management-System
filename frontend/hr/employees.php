<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Management - Employees">
    <title>Employees | ENSOL Group Leave Portal</title>
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
                <a href="employees.php" class="nav-item active">
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
                <a href="../auth/login.php" class="nav-item logout-item">
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
                <h1 class="page-title">Employees</h1>
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
                <!-- Employee Header -->
                <div class="employee-header">
                    <h2>All Employees</h2>
                    <div class="employee-search">
                        <select class="filter-dropdown" id="deptFilter"
                            style="padding: 8px; border-radius: 8px; border: 1px solid #e5e7eb; margin-right: 8px;">
                            <option value="">All Departments</option>
                        </select>
                        <select class="filter-dropdown" id="subFilter"
                            style="padding: 8px; border-radius: 8px; border: 1px solid #e5e7eb; margin-right: 8px;">
                            <option value="">All Companies</option>
                        </select>
                        <input type="text" class="search-input" placeholder="Search by name..." id="employeeSearch">
                    </div>
                </div>

                <!-- Employee Table -->
                <table class="employee-table">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Company</th>
                            <th>Department</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="employeesTableBody">
                        <tr>
                            <td colspan="5" style="text-align: center; color: #888;">Loading...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Employee Modal -->
    <div class="modal-overlay" id="employeeModal">
        <div class="modal-content">
            <div class="modal-header">
                <span></span>
                <button class="modal-close" onclick="closeEmployeeModal()">
                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="employee-modal-content">
                <img src="" alt="Employee" class="employee-modal-avatar" id="modalAvatar">
                <h3 class="employee-modal-name" id="modalName">--</h3>
                <p class="employee-modal-info"><strong>Position:</strong> <span id="modalPosition">--</span></p>
                <p class="employee-modal-info"><strong>Department:</strong> <span id="modalDept">--</span></p>
                <p class="employee-modal-info"><strong>Email:</strong> <span id="modalEmail">--</span></p>
                <p class="employee-modal-info"><strong>Phone:</strong> <span id="modalPhone">--</span></p>
                <p class="employee-modal-info"><strong>Company:</strong> <span id="modalCompany">--</span></p>
                <p class="employee-modal-info"><strong>Role:</strong> <span id="modalRole">--</span></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const API_BASE = '../../api/v1';
        let allEmployees = [];

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

        // Fetch Employees from API
        async function fetchEmployees() {
            try {
                const response = await fetch(`${API_BASE}/hr/employees.php`, {
                    headers: { 'Authorization': `Bearer ${getToken()}` }
                });

                if (response.status === 401 || response.status === 403) {
                    window.location.href = '../auth/login.php';
                    return;
                }

                const result = await response.json();
                if (result.status === 'success') {
                    allEmployees = result.data;
                    renderTable(allEmployees);
                    populateFilters(result.filters);
                }
            } catch (error) {
                console.error('Error fetching employees:', error);
                document.getElementById('employeesTableBody').innerHTML = 
                    '<tr><td colspan="5" style="text-align: center; color: #dc2626;">Failed to load employees.</td></tr>';
            }
        }

        // Populate Filter Dropdowns
        function populateFilters(filters) {
            const deptFilter = document.getElementById('deptFilter');
            const subFilter = document.getElementById('subFilter');

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

            if (filters.companies) {
                filters.companies.forEach(company => {
                    if (company) {
                        const option = document.createElement('option');
                        option.value = company;
                        option.textContent = company;
                        subFilter.appendChild(option);
                    }
                });
            }
        }

        // Get role badge
        function getRoleBadge(role) {
            const badges = {
                'user': '<span class="status-badge" style="background: #e0f2fe; color: #0284c7;">Employee</span>',
                'supervisor': '<span class="status-badge" style="background: #fef9c3; color: #ca8a04;">Supervisor</span>',
                'hr': '<span class="status-badge" style="background: #fee2e2; color: #dc2626;">HR</span>',
                'admin': '<span class="status-badge" style="background: #dcfce7; color: #16a34a;">Admin</span>'
            };
            return badges[role] || `<span class="status-badge">${role}</span>`;
        }

        // Render Table
        function renderTable(employees) {
            const tbody = document.getElementById('employeesTableBody');

            if (!employees || employees.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5" style="text-align: center; color: #888;">No employees found.</td></tr>';
                return;
            }

            tbody.innerHTML = employees.map(emp => `
                <tr>
                    <td>${emp.full_name || 'Unknown'}</td>
                    <td>${emp.company_name || 'N/A'}</td>
                    <td>${emp.department_name || 'N/A'}</td>
                    <td>${getRoleBadge(emp.role)}</td>
                    <td class="table-actions">
                        <button class="action-btn view" onclick='openEmployeeModal(${JSON.stringify(emp)})' title="View Details">
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none" stroke-width="2">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        // Filter Employees
        function filterEmployees() {
            const searchTerm = document.getElementById('employeeSearch').value.toLowerCase();
            const selectedDept = document.getElementById('deptFilter').value;
            const selectedCompany = document.getElementById('subFilter').value;

            const filtered = allEmployees.filter(emp => {
                const matchesSearch = (emp.full_name || '').toLowerCase().includes(searchTerm);
                const matchesDept = !selectedDept || emp.department_name === selectedDept;
                const matchesCompany = !selectedCompany || emp.company_name === selectedCompany;
                
                return matchesSearch && matchesDept && matchesCompany;
            });

            renderTable(filtered);
        }

        // Open Employee Modal
        function openEmployeeModal(emp) {
            const avatarUrl = emp.profile_image 
                ? `../../${emp.profile_image}` 
                : `https://ui-avatars.com/api/?name=${encodeURIComponent(emp.full_name)}&background=dc2626&color=fff&size=100`;
            
            document.getElementById('modalAvatar').src = avatarUrl;
            document.getElementById('modalName').textContent = emp.full_name || 'Unknown';
            document.getElementById('modalPosition').textContent = emp.position || 'N/A';
            document.getElementById('modalDept').textContent = emp.department_name || 'N/A';
            document.getElementById('modalEmail').textContent = emp.email || 'N/A';
            document.getElementById('modalPhone').textContent = emp.phone || 'N/A';
            document.getElementById('modalCompany').textContent = emp.company_name || 'N/A';
            document.getElementById('modalRole').textContent = (emp.role || 'user').charAt(0).toUpperCase() + (emp.role || 'user').slice(1);
            
            document.getElementById('employeeModal').classList.add('active');
        }

        function closeEmployeeModal() {
            document.getElementById('employeeModal').classList.remove('active');
        }

        document.getElementById('employeeModal').addEventListener('click', function(e) {
            if (e.target === this) closeEmployeeModal();
        });

        // Fetch and update profile image in header
        async function fetchProfile() {
            try {
                const response = await fetch(`${API_BASE}/user/profile.php`, {
                    headers: { 'Authorization': `Bearer ${getToken()}` }
                });
                
                if (response.ok) {
                    const result = await response.json();
                    if (result.status === 'success' && result.data) {
                        const headerAvatar = document.querySelector('.header-avatar');
                        if (headerAvatar && result.data.profile_image) {
                            headerAvatar.src = `../${result.data.profile_image}`;
                        }
                    }
                }
            } catch (error) {
                console.error('Error fetching profile:', error);
            }
        }

        // Event Listeners
        document.getElementById('employeeSearch').addEventListener('input', filterEmployees);
        document.getElementById('deptFilter').addEventListener('change', filterEmployees);
        document.getElementById('subFilter').addEventListener('change', filterEmployees);

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            if (!checkAuth()) return;
            fetchEmployees();
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