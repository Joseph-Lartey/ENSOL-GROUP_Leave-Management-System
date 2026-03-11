<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ENSOL Group Leave Management - Apply Leave">
    <title>Apply Leave | ENSOL Group Leave Portal</title>
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
                <a href="apply-leave.php" class="nav-item active">
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
                        <img src="../assets/img2.jpg" alt="HR" class="header-avatar"
                            onerror="this.src='https://ui-avatars.com/api/?name=AD&background=eab308&color=fff&size=40'">
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <div class="card">
                    <div class="card-body">
                        <form class="dashboard-form admin-leave-form">
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" id="firstName" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="lastName" placeholder="Last Name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <select id="reason" required>
                                    <option value="" disabled selected>Reason</option>
                                    <option value="annual">Annual Leave</option>
                                    <option value="sick">Sick Leave</option>
                                    <option value="personal">Personal Leave</option>
                                    <option value="maternity">Maternity Leave</option>
                                    <option value="paternity">Paternity Leave</option>
                                    <option value="bereavement">Bereavement Leave</option>
                                    <option value="study">Study Leave</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <input type="date" id="startDate" placeholder="Leave Start Date" required>
                                    <label for="startDate" class="date-label">Leave Start Date</label>
                                </div>
                                <div class="form-group">
                                    <input type="date" id="endDate" placeholder="Leave End Date" required>
                                    <label for="endDate" class="date-label">Leave End Date</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <select id="vacationAddress">
                                    <option value="" disabled selected>Vacation address</option>
                                    <option value="local">Local (within country)</option>
                                    <option value="international">International</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" id="emergencyName" placeholder="Emergency Contact (name)"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" id="emergencyPhone" placeholder="Emergency Contact (phone)"
                                        required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" id="coveredBy" placeholder="Duties to be covered by" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="jobTitle" placeholder="Job Title" required>
                                </div>
                            </div>

                            <button type="submit" class="submit-btn">Submit Application</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const API_BASE = '../../api/v1';

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

        // Fetch and pre-fill user profile data
        async function fetchProfile() {
            try {
                const response = await fetch(`${API_BASE}/user/profile.php`, {
                    headers: { 'Authorization': `Bearer ${getToken()}` }
                });
                
                if (response.status === 401 || response.status === 403) {
                    window.location.href = '../auth/login.php';
                    return;
                }
                
                const result = await response.json();
                if (result.status === 'success') {
                    const data = result.data;
                    // Pre-fill name fields
                    const nameParts = (data.full_name || '').split(' ');
                    document.getElementById('firstName').value = nameParts[0] || '';
                    document.getElementById('lastName').value = nameParts.slice(1).join(' ') || '';
                    
                    // Pre-fill job title if available
                    if (data.position) {
                        document.getElementById('jobTitle').value = data.position;
                    }
                    
                    // Update avatar
                    if (data.profile_image) {
                        const avatar = document.querySelector('.header-avatar');
                        if (avatar) avatar.src = '../' + data.profile_image;
                    }
                }
            } catch (error) {
                console.error('Error fetching profile:', error);
            }
        }

        // Submit leave application
        async function submitLeaveApplication(e) {
            e.preventDefault();
            
            const form = e.target;
            const submitBtn = form.querySelector('.submit-btn');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Submitting...';

            const payload = {
                reason: document.getElementById('reason').value,
                startDate: document.getElementById('startDate').value,
                endDate: document.getElementById('endDate').value,
                vacationAddress: document.getElementById('vacationAddress').value,
                emergencyName: document.getElementById('emergencyName').value,
                emergencyPhone: document.getElementById('emergencyPhone').value,
                coveredBy: document.getElementById('coveredBy').value
            };

            // Validate dates
            if (new Date(payload.endDate) < new Date(payload.startDate)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Dates',
                    text: 'End date cannot be before start date.'
                });
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit Application';
                return;
            }

            try {
                const response = await fetch(`${API_BASE}/leaves/apply.php`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${getToken()}`
                    },
                    body: JSON.stringify(payload)
                });

                const result = await response.json();

                if (response.ok && result.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Application Submitted!',
                        text: 'Your leave request has been submitted for approval.',
                        confirmButtonColor: '#dc2626'
                    }).then(() => {
                        // Reset form except pre-filled fields
                        document.getElementById('reason').value = '';
                        document.getElementById('startDate').value = '';
                        document.getElementById('endDate').value = '';
                        document.getElementById('vacationAddress').value = '';
                        document.getElementById('emergencyName').value = '';
                        document.getElementById('emergencyPhone').value = '';
                        document.getElementById('coveredBy').value = '';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Submission Failed',
                        text: result.message || 'Failed to submit leave application.'
                    });
                }
            } catch (error) {
                console.error('Error submitting leave:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Network error. Please try again.'
                });
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit Application';
            }
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            if (!checkAuth()) return;
            
            fetchProfile();
            document.querySelector('.dashboard-form').addEventListener('submit', submitLeaveApplication);
            
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