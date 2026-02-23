<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Portal - Apply for Leave">
    <title>Apply Leave | ENSOL Group Leave Portal</title>

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

                <a href="apply-leave.php" class="nav-item active">
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
                <h1 class="page-title">Apply Leave</h1>

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
                <div class="card">
                    <div class="card-body">
                        <form class="dashboard-form" id="applyLeaveForm">
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" id="firstName" name="firstName" class="form-input"
                                        placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="lastName" name="lastName" class="form-input"
                                        placeholder="Last Name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <select id="reason" name="reason" class="form-select" required>
                                    <option value="" disabled selected>Reason</option>
                                    <option value="annual">Annual Leave</option>
                                    <option value="sick">Sick Leave</option>
                                    <option value="personal">Personal Leave</option>
                                    <option value="maternity">Maternity Leave</option>
                                    <option value="paternity">Paternity Leave</option>
                                    <option value="bereavement">Bereavement Leave</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <input type="date" id="startDate" name="startDate" class="form-input"
                                        placeholder="Leave Start Date" required>
                                </div>
                                <div class="form-group">
                                    <input type="date" id="endDate" name="endDate" class="form-input"
                                        placeholder="Leave End Date" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <select id="vacationAddress" name="vacationAddress" class="form-select">
                                    <option value="" disabled selected>Vacation address</option>
                                    <option value="home">Home</option>
                                    <option value="travel">Traveling</option>
                                    <option value="other">Other Location</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" id="emergencyName" name="emergencyName" class="form-input"
                                        placeholder="Emergency Contact (name)">
                                </div>
                                <div class="form-group">
                                    <input type="tel" id="emergencyPhone" name="emergencyPhone" class="form-input"
                                        placeholder="Emergency Contact (phone)">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" id="coveredBy" name="coveredBy" class="form-input"
                                        placeholder="Duties to be covered by">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="jobTitle" name="jobTitle" class="form-input"
                                        placeholder="Job Title">
                                </div>
                            </div>

                            <div class="form-group" style="margin-top: var(--space-6);">
                                <button type="submit" class="btn btn-primary btn-block">Submit Application</button>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script>
        const API_BASE = '../api/v1';

        document.addEventListener('DOMContentLoaded', async () => {
            const token = localStorage.getItem('token');
            if (!token) {
                window.location.href = '../auth/login.php';
                return;
            }
            await Promise.all([fetchProfile(), loadLeaveTypes()]);

            // Set min date to today
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('startDate').min = today;
            document.getElementById('endDate').min = today;

            // Update endDate min when startDate changes
            document.getElementById('startDate').addEventListener('change', function() {
                document.getElementById('endDate').min = this.value;
            });
        });

        async function fetchProfile() {
            try {
                const response = await fetch(API_BASE + '/user/profile.php', {
                    headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') }
                });
                const data = await response.json();
                if (data.status === 'success') {
                    const user = data.user;
                    const names = user.full_name.split(' ');
                    document.getElementById('firstName').value = names[0] || '';
                    document.getElementById('lastName').value = names.slice(1).join(' ') || '';
                    if (user.profile_image) {
                        document.querySelector('.header-avatar').src = '../' + user.profile_image;
                    }
                }
            } catch (err) {
                console.error('Profile fetch error:', err);
            }
        }

        async function loadLeaveTypes() {
            try {
                const response = await fetch(API_BASE + '/leaves/types.php', {
                    headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') }
                });
                const data = await response.json();
                if (data.status === 'success') {
                    const select = document.getElementById('reason');
                    select.innerHTML = '<option value="" disabled selected>Reason</option>';
                    data.data.forEach(type => {
                        const slug = type.name.toLowerCase().replace(/\s+/g, '_').replace('_leave', '');
                        select.innerHTML += `<option value="${slug}">${type.name} (${type.days_allowed} days)</option>`;
                    });
                }
            } catch (err) {
                console.error('Leave types error:', err);
            }
        }

        // Form submission
        document.getElementById('applyLeaveForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const submitBtn = e.target.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Submitting...';

            const body = {
                reason: document.getElementById('reason').value,
                startDate: document.getElementById('startDate').value,
                endDate: document.getElementById('endDate').value,
                vacationAddress: document.getElementById('vacationAddress').value,
                emergencyName: document.getElementById('emergencyName').value,
                emergencyPhone: document.getElementById('emergencyPhone').value,
                coveredBy: document.getElementById('coveredBy').value
            };

            try {
                const response = await fetch(API_BASE + '/leaves/apply.php', {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(body)
                });
                const data = await response.json();

                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Application Submitted!',
                        text: data.message,
                        confirmButtonColor: '#7c3aed'
                    }).then(() => {
                        window.location.href = 'my-requests.php';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Submission Failed',
                        text: data.message,
                        confirmButtonColor: '#7c3aed'
                    });
                }
            } catch (err) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Unable to submit. Please try again.',
                    confirmButtonColor: '#7c3aed'
                });
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit Application';
            }
        });

        // Logout
        document.querySelector('.logout-btn')?.addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('logoutModal').classList.add('active');
        });
        document.querySelector('.modal-btn.confirm')?.addEventListener('click', () => {
            localStorage.removeItem('token');
            window.location.href = '../auth/login.php';
        });
        document.querySelector('.modal-btn.cancel')?.addEventListener('click', () => {
            document.getElementById('logoutModal').classList.remove('active');
        });
    </script>
</body>

</html>