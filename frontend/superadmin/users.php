<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Management - User Management">
    <title>User Management | ENSOL Group Leave Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/superadmin.css">
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
                <a href="users.php" class="nav-item active">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </span>
                    <span class="nav-text">Users</span>
                </a>
                <a href="roles.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </span>
                    <span class="nav-text">Roles</span>
                </a>
                <a href="permissions.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </span>
                    <span class="nav-text">Permissions</span>
                </a>
                <a href="logs.php" class="nav-item">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </span>
                    <span class="nav-text">Activity Logs</span>
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
                <h1 class="page-title">User Management</h1>
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
                        <img src="../assets/img2.jpg" alt="SuperAdmin" class="header-avatar"
                            onerror="this.src='https://ui-avatars.com/api/?name=SA&background=7c3aed&color=fff'">
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <!-- Search and Filter Bar -->
                <div class="search-filter-bar">
                    <input type="text" class="search-input" placeholder="Search users by name or email...">
                    <select class="filter-select">
                        <option value="">All Roles</option>
                        <option value="superadmin">SuperAdmin</option>
                        <option value="admin">Admin</option>
                        <option value="supervisor">HR Supervisor</option>
                        <option value="user">User</option>
                    </select>
                    <select class="filter-select">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <button class="btn-add-user">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Add User
                    </button>
                </div>

                <!-- Users Table Card -->
                <div class="card">
                    <div class="card-body" style="padding: 0;">
                        <table class="user-table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Department</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="user-info">
                                            <img src="https://ui-avatars.com/api/?name=Joseph+Lartey&background=7c3aed&color=fff"
                                                alt="User" class="user-avatar">
                                            <div>
                                                <div class="user-name">Joseph Lartey</div>
                                                <div class="user-email">joseph.lartey@ensol.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>IT</td>
                                    <td>
                                        <select class="role-select superadmin" onchange="updateRoleStyle(this)">
                                            <option value="superadmin" selected>SuperAdmin</option>
                                            <option value="admin">Admin</option>
                                            <option value="supervisor">HR Supervisor</option>
                                            <option value="user">User</option>
                                        </select>
                                    </td>
                                    <td><span class="status-active">Active</span></td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="btn-action btn-edit">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="user-info">
                                            <img src="https://ui-avatars.com/api/?name=Stephanie+Mensah&background=dc2626&color=fff"
                                                alt="User" class="user-avatar">
                                            <div>
                                                <div class="user-name">Stephanie Mensah</div>
                                                <div class="user-email">stephanie.mensah@ensol.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>HR</td>
                                    <td>
                                        <select class="role-select admin" onchange="updateRoleStyle(this)">
                                            <option value="superadmin">SuperAdmin</option>
                                            <option value="admin" selected>Admin</option>
                                            <option value="supervisor">HR Supervisor</option>
                                            <option value="user">User</option>
                                        </select>
                                    </td>
                                    <td><span class="status-active">Active</span></td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="btn-action btn-edit">Edit</button>
                                            <button class="btn-action btn-deactivate">Deactivate</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="user-info">
                                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=d97706&color=fff"
                                                alt="User" class="user-avatar">
                                            <div>
                                                <div class="user-name">John Doe</div>
                                                <div class="user-email">john.doe@ensol.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Finance</td>
                                    <td>
                                        <select class="role-select supervisor" onchange="updateRoleStyle(this)">
                                            <option value="superadmin">SuperAdmin</option>
                                            <option value="admin">Admin</option>
                                            <option value="supervisor" selected>HR Supervisor</option>
                                            <option value="user">User</option>
                                        </select>
                                    </td>
                                    <td><span class="status-active">Active</span></td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="btn-action btn-edit">Edit</button>
                                            <button class="btn-action btn-deactivate">Deactivate</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="user-info">
                                            <img src="https://ui-avatars.com/api/?name=Sarah+Johnson&background=2563eb&color=fff"
                                                alt="User" class="user-avatar">
                                            <div>
                                                <div class="user-name">Sarah Johnson</div>
                                                <div class="user-email">sarah.johnson@ensol.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Marketing</td>
                                    <td>
                                        <select class="role-select user" onchange="updateRoleStyle(this)">
                                            <option value="superadmin">SuperAdmin</option>
                                            <option value="admin">Admin</option>
                                            <option value="supervisor">HR Supervisor</option>
                                            <option value="user" selected>User</option>
                                        </select>
                                    </td>
                                    <td><span class="status-active">Active</span></td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="btn-action btn-edit">Edit</button>
                                            <button class="btn-action btn-deactivate">Deactivate</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="user-info">
                                            <img src="https://ui-avatars.com/api/?name=Mike+Brown&background=2563eb&color=fff"
                                                alt="User" class="user-avatar">
                                            <div>
                                                <div class="user-name">Mike Brown</div>
                                                <div class="user-email">mike.brown@ensol.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Sales</td>
                                    <td>
                                        <select class="role-select user" onchange="updateRoleStyle(this)">
                                            <option value="superadmin">SuperAdmin</option>
                                            <option value="admin">Admin</option>
                                            <option value="supervisor">HR Supervisor</option>
                                            <option value="user" selected>User</option>
                                        </select>
                                    </td>
                                    <td><span class="status-inactive">Inactive</span></td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="btn-action btn-edit">Edit</button>
                                            <button class="btn-action"
                                                style="background: #dcfce7; color: #16a34a;">Activate</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="user-info">
                                            <img src="https://ui-avatars.com/api/?name=Emma+Wilson&background=2563eb&color=fff"
                                                alt="User" class="user-avatar">
                                            <div>
                                                <div class="user-name">Emma Wilson</div>
                                                <div class="user-email">emma.wilson@ensol.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Engineering</td>
                                    <td>
                                        <select class="role-select user" onchange="updateRoleStyle(this)">
                                            <option value="superadmin">SuperAdmin</option>
                                            <option value="admin">Admin</option>
                                            <option value="supervisor">HR Supervisor</option>
                                            <option value="user" selected>User</option>
                                        </select>
                                    </td>
                                    <td><span class="status-active">Active</span></td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="btn-action btn-edit">Edit</button>
                                            <button class="btn-action btn-deactivate">Deactivate</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add User Modal -->
    <div class="modal-overlay" id="addUserModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" style="margin-bottom: 0;">Add New User</h3>
                <button class="modal-close" onclick="closeAddUserModal()">
                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="dashboard-form" style="text-align: left;">
                <div class="form-group">
                    <label style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500;">Full
                        Name</label>
                    <input type="text" class="form-input" placeholder="e.g. John Doe">
                </div>
                <div class="form-group">
                    <label style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500;">Email
                        Address</label>
                    <input type="email" class="form-input" placeholder="e.g. john@ensol.com">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label
                            style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500;">Department</label>
                        <select class="form-select">
                            <option>IT</option>
                            <option>Finance</option>
                            <option>HR</option>
                            <option>Marketing</option>
                            <option>Sales</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label
                            style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500;">Subsidiary</label>
                        <select class="form-select">
                            <option>Ensol Group</option>
                            <option>Ensol Tech</option>
                            <option>Southey</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label
                            style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500;">Role</label>
                        <select class="form-select">
                            <option value="user">User</option>
                            <option value="supervisor">HR Supervisor</option>
                            <option value="admin">Admin</option>
                            <option value="superadmin">SuperAdmin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label
                            style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500;">Status</label>
                        <select class="form-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-actions" style="margin-top: 24px;">
                    <button class="modal-btn cancel" onclick="closeAddUserModal()">Cancel</button>
                    <button class="modal-btn confirm"
                        onclick="closeAddUserModal(); alert('User added successfully!');">Save User</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/dashboard.js"></script>
    <script>
        // Update role select styling when changed
        function updateRoleStyle(select) {
            // Remove all role classes
            select.classList.remove('superadmin', 'admin', 'supervisor', 'user');
            // Add new role class
            select.classList.add(select.value);

            // Get user name from the row
            const row = select.closest('tr');
            const userName = row.querySelector('.user-name').textContent;
            const roleName = select.options[select.selectedIndex].text;

            // Show confirmation (in real app, this would save to backend)
            // alert(`Role updated: ${userName} is now a ${roleName}`);
        }

        // Add User Modal Functions
        const addUserBtn = document.querySelector('.btn-add-user');
        const addUserModal = document.getElementById('addUserModal');

        addUserBtn.addEventListener('click', () => {
            addUserModal.classList.add('active');
        });

        function closeAddUserModal() {
            addUserModal.classList.remove('active');
        }

        addUserModal.addEventListener('click', (e) => {
            if (e.target === addUserModal) {
                closeAddUserModal();
            }
        });

        // Search and Filter Functionality
        const searchInput = document.querySelector('.search-input');
        const roleFilter = document.querySelectorAll('.filter-select')[0]; // First select is role
        const statusFilter = document.querySelectorAll('.filter-select')[1]; // Second select is status
        const tableRows = document.querySelectorAll('.user-table tbody tr');

        function filterUsers() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedRole = roleFilter.value.toLowerCase();
            const selectedStatus = statusFilter.value.toLowerCase();

            tableRows.forEach(row => {
                const name = row.querySelector('.user-name').textContent.toLowerCase();
                const email = row.querySelector('.user-email').textContent.toLowerCase();
                // Role is in a select element value
                const roleSelect = row.querySelector('.role-select');
                const role = roleSelect.value.toLowerCase();
                // Status is text in a span
                const status = row.cells[3].textContent.trim().toLowerCase();

                const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm);
                const matchesRole = selectedRole === '' || role === selectedRole;
                const matchesStatus = selectedStatus === '' || status === selectedStatus;

                if (matchesSearch && matchesRole && matchesStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', filterUsers);
        roleFilter.addEventListener('change', filterUsers);
        statusFilter.addEventListener('change', filterUsers);
    </script>
</body>

</html>