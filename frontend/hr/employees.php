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
                            <option value="Finance">Finance</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Human Resources">Human Resources</option>
                            <option value="IT">IT</option>
                        </select>
                        <select class="filter-dropdown" id="subFilter"
                            style="padding: 8px; border-radius: 8px; border: 1px solid #e5e7eb; margin-right: 8px;">
                            <option value="">All Subsidiaries</option>
                            <option value="Southey">Southey</option>
                            <option value="Ensol Group">Ensol Group</option>
                            <option value="Ensol Tech">Ensol Tech</option>
                        </select>
                        <input type="text" class="search-input" placeholder="Search by name..." id="employeeSearch">
                    </div>
                </div>

                <!-- Employee Table -->
                <table class="employee-table">
                    <thead>
                        <tr>
                            <th>EmployeeName</th>
                            <th>Subsidiary</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Collins Dauda</td>
                            <td>Southey</td>
                            <td>Finance</td>
                            <td><span class="status-badge on-leave">on leave</span></td>
                            <td class="table-actions">
                                <button class="action-btn delete" title="Delete">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                    </svg>
                                </button>
                                <button class="action-btn view"
                                    onclick="openEmployeeModal('Collins Dauda', 'Finance', 'dcollins@ensol.comgh', 'Southey')"
                                    title="View Details">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Collins Dauda</td>
                            <td>Southey</td>
                            <td>Finance</td>
                            <td><span class="status-badge on-leave">on leave</span></td>
                            <td class="table-actions">
                                <button class="action-btn delete" title="Delete">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                    </svg>
                                </button>
                                <button class="action-btn view"
                                    onclick="openEmployeeModal('Collins Dauda', 'Finance', 'dcollins@ensol.comgh', 'Southey')"
                                    title="View Details">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Darwin Wood</td>
                            <td>Ensol Group</td>
                            <td>Finance</td>
                            <td><span class="status-badge present">Present</span></td>
                            <td class="table-actions">
                                <button class="action-btn delete" title="Delete">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                    </svg>
                                </button>
                                <button class="action-btn view"
                                    onclick="openEmployeeModal('Darwin Wood', 'Finance', 'dwood@ensol.comgh', 'Ensol Group')"
                                    title="View Details">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Collins Dauda</td>
                            <td>Southey</td>
                            <td>Finance</td>
                            <td><span class="status-badge on-leave">on leave</span></td>
                            <td class="table-actions">
                                <button class="action-btn delete" title="Delete">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                    </svg>
                                </button>
                                <button class="action-btn view"
                                    onclick="openEmployeeModal('Collins Dauda', 'Finance', 'dcollins@ensol.comgh', 'Southey')"
                                    title="View Details">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Collins Dauda</td>
                            <td>Southey</td>
                            <td>Finance</td>
                            <td><span class="status-badge on-leave">on leave</span></td>
                            <td class="table-actions">
                                <button class="action-btn delete" title="Delete">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                    </svg>
                                </button>
                                <button class="action-btn view"
                                    onclick="openEmployeeModal('Collins Dauda', 'Finance', 'dcollins@ensol.comgh', 'Southey')"
                                    title="View Details">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Darwin Wood</td>
                            <td>Ensol Group</td>
                            <td>Finance</td>
                            <td><span class="status-badge present">Present</span></td>
                            <td class="table-actions">
                                <button class="action-btn delete" title="Delete">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                    </svg>
                                </button>
                                <button class="action-btn view"
                                    onclick="openEmployeeModal('Darwin Wood', 'Finance', 'dwood@ensol.comgh', 'Ensol Group')"
                                    title="View Details">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Collins Dauda</td>
                            <td>Southey</td>
                            <td>Finance</td>
                            <td><span class="status-badge on-leave">on leave</span></td>
                            <td class="table-actions">
                                <button class="action-btn delete" title="Delete">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                    </svg>
                                </button>
                                <button class="action-btn view"
                                    onclick="openEmployeeModal('Collins Dauda', 'Finance', 'dcollins@ensol.comgh', 'Southey')"
                                    title="View Details">
                                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                        stroke-width="2">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                </button>
                            </td>
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
                <img src="https://ui-avatars.com/api/?name=Collins+Dauda&background=eab308&color=fff&size=100"
                    alt="Employee" class="employee-modal-avatar" id="modalAvatar">
                <h3 class="employee-modal-name" id="modalName">Collins Dauda</h3>
                <p class="employee-modal-info"><strong>Department:</strong> <span id="modalDept">Finance</span></p>
                <p class="employee-modal-info"><strong>Email:</strong> <span id="modalEmail">dcollins@ensol.comgh</span>
                </p>
                <p class="employee-modal-info"><strong>Subsidiary:</strong> <span id="modalSubsidiary">Southey</span>
                </p>

                <div class="employee-stats">
                    <div class="employee-stat-card">
                        <span class="employee-stat-label">Total Leave days</span>
                        <span class="employee-stat-value">45 <svg class="edit-icon" viewBox="0 0 24 24"
                                stroke="currentColor" fill="none" stroke-width="2">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg></span>
                        <span class="stat-change">+4 In this Month</span>
                    </div>
                    <div class="employee-stat-card">
                        <span class="employee-stat-label">Leave days Left</span>
                        <span class="employee-stat-value">45 <svg class="edit-icon" viewBox="0 0 24 24"
                                stroke="currentColor" fill="none" stroke-width="2">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg></span>
                        <span class="stat-change">+4 In this Month</span>
                    </div>
                    <div class="employee-stat-card">
                        <span class="employee-stat-label">Sick days</span>
                        <span class="employee-stat-value">45 <svg class="edit-icon" viewBox="0 0 24 24"
                                stroke="currentColor" fill="none" stroke-width="2">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg></span>
                        <span class="stat-change">+4 In this Month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Employee Modal Functions
        function openEmployeeModal(name, dept, email, subsidiary) {
            document.getElementById('modalName').textContent = name;
            document.getElementById('modalDept').textContent = dept;
            document.getElementById('modalEmail').textContent = email;
            document.getElementById('modalSubsidiary').textContent = subsidiary;
            document.getElementById('modalAvatar').src = `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=eab308&color=fff&size=100`;
            document.getElementById('employeeModal').classList.add('active');
        }

        function closeEmployeeModal() {
            document.getElementById('employeeModal').classList.remove('active');
        }

        // Close modal on overlay click
        document.getElementById('employeeModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeEmployeeModal();
            }
        });

        // Search and Filter functionality
        const searchInput = document.getElementById('employeeSearch');
        const deptFilter = document.getElementById('deptFilter');
        const subFilter = document.getElementById('subFilter');

        function filterEmployees() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedDept = deptFilter.value.toLowerCase();
            const selectedSub = subFilter.value.toLowerCase();
            const rows = document.querySelectorAll('.employee-table tbody tr');

            rows.forEach(row => {
                const name = row.cells[0].textContent.toLowerCase();
                const subsidiary = row.cells[1].textContent.toLowerCase();
                const department = row.cells[2].textContent.toLowerCase();

                const matchesSearch = name.includes(searchTerm);
                const matchesDept = selectedDept === '' || department.includes(selectedDept);
                const matchesSub = selectedSub === '' || subsidiary.includes(selectedSub);

                if (matchesSearch && matchesDept && matchesSub) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', filterEmployees);
        deptFilter.addEventListener('change', filterEmployees);
        subFilter.addEventListener('change', filterEmployees);
    </script>
</body>

</html>