/* ========================================
   ENSOL GROUP - Dashboard JavaScript
   Sidebar, Modal, and Interactions
   ======================================== */

document.addEventListener('DOMContentLoaded', function () {
    initLogoutModal();
    initMobileMenu();
    initAnimations();

    // Auth Check & Data Loading
    checkAuthAndLoadData();
});

function checkAuthAndLoadData() {
    const jwt = localStorage.getItem('token');
    if (!jwt) {
        window.location.href = '../auth/login.php';
        return;
    }

    // Initialize Global Profile Sync
    initProfileSync(jwt);

    // Fetch Global Notification Badge
    updateGlobalNotificationBadge(jwt);

    // Load Data
    loadDashboardStats();
    loadRecentRequests();

    // Initial UI Set from LocalStorage (Fast Load)
    const userStr = localStorage.getItem('user');
    if (userStr) {
        const user = JSON.parse(userStr);
        updateProfileUI(user);
    }
}

/* ====== PROFILE SYNC ====== */
function initProfileSync(jwt) {
    fetch('../../api/v1/user/profile.php', {
        headers: { 'Authorization': `Bearer ${jwt}` }
    })
        .then(r => {
            if (r.status === 401 || r.status === 403) {
                localStorage.removeItem('token');
                localStorage.removeItem('user');
                window.location.href = getPathPrefix() + 'auth/login.php';
                throw new Error('Unauthorized');
            }
            return r.json();
        })
        .then(data => {
            if (data.status === 'success') {
                const user = data.data;
                localStorage.setItem('user', JSON.stringify(user)); // Update local storage
                updateProfileUI(user);
            }
        })
        .catch(err => console.error('Profile sync failed:', err));
}

function updateProfileUI(user) {
    // Update Welcome Message
    const welcomeMsg = document.getElementById('welcome-message'); // Note: ID might vary, checking HTML usage
    if (welcomeMsg) welcomeMsg.textContent = `Welcome back, ${user.full_name.split(' ')[0]}!`;

    // Update Sidebar/Header Names
    document.querySelectorAll('.user-name').forEach(el => el.textContent = user.full_name);
    document.querySelectorAll('.user-role').forEach(el => el.textContent = user.role);

    // Update Profile Images
    if (user.profile_image) {
        let rawPath = user.profile_image;

        // Clean path separators
        if (rawPath.startsWith('/')) rawPath = rawPath.substring(1);

        const pathPrefix = getPathPrefix(); // '../' for pages in /user/, /admin/, etc.
        let displayPath = '';

        // Handle different path formats from database:
        // 1. New format: 'assets/uploads/profile_images/...'
        // 2. Legacy format: 'uploads/profiles/...'
        if (rawPath.startsWith('assets/')) {
            displayPath = pathPrefix + rawPath;
        } else if (rawPath.startsWith('uploads/')) {
            // Legacy path - files are in frontend/uploads/profiles/
            displayPath = pathPrefix + rawPath;
        } else {
            // Fallback: assume it's a filename only
            displayPath = pathPrefix + 'uploads/profiles/' + rawPath;
        }

        // Add cache buster to force refresh after upload
        displayPath += '?v=' + new Date().getTime();

        updateAvatarImages(displayPath);
    } else {
        // No image set? Show default
        updateAvatarImages(getPathPrefix() + 'assets/default-avatar.png');
    }
}

function updateAvatarImages(src) {
    document.querySelectorAll('.header-avatar, .user-avatar, .profile-img, .profile-photo').forEach(img => {
        img.src = src;
        img.onerror = function () {
            // Prevent infinite loop if default also missing
            if (this.src.includes('default-avatar.png')) return;
            this.src = getPathPrefix() + 'assets/default-avatar.png';
        };
    });
}

function updateGlobalNotificationBadge(jwt) {
    fetch(getPathPrefix() + '../api/v1/user/notifications.php?limit=1', {
        headers: { 'Authorization': `Bearer ${jwt}` }
    })
        .then(r => {
            if (!r.ok) return null;
            return r.json();
        })
        .then(data => {
            if (data && data.status === 'success' && data.unread_count > 0) {
                document.querySelectorAll('.notification-badge').forEach(badge => {
                    badge.textContent = data.unread_count; /* Insert number */
                    badge.style.display = 'flex';
                });
            } else {
                document.querySelectorAll('.notification-badge').forEach(badge => {
                    badge.textContent = '';
                    badge.style.display = 'none';
                });
            }
        })
        .catch(err => console.error('Error auto-fetching notifications:', err));
}

function getPathPrefix() {
    // Check if we are in a subfolder of frontend
    // Current structure: frontend/[role]/page.php -> need '../'
    // If we add nested folders: frontend/[role]/[sub]/page.php -> need '../../'

    // Rudimentary depth check based on common segments
    const path = window.location.pathname;

    // If path ends with /frontend/ -> we are at root (unlikely for pages)
    // If path includes /user/ or /admin/ or /supervisor/ or /auth/
    if (path.match(/\/(user|admin|hr|supervisor|superadmin|auth)\//)) {
        return '../';
    }

    // If we are deeper ??
    // Let's stick to '../' as safe default for the current architecture
    return '../';
}


function loadDashboardStats() {
    const jwt = localStorage.getItem('token');

    if (!jwt) return;

    fetch('../../api/v1/dashboard/stats.php', {
        headers: { 'Authorization': `Bearer ${jwt}` }
    })
        .then(response => {
            if (response.status === 401) {
                // Token might be invalid - log it but don't aggressively clear storage
                // Other APIs might still work, let them handle their own auth
                console.warn('Dashboard stats returned 401 - user may need to re-login');
                // Don't clear localStorage here - it causes race conditions with other forms
                return null;
            }
            return response.json();
        })
        .then(data => {
            if (data && data.status === 'success') updateDashboardUI(data.data);
        })
        .catch(console.error);
}

function loadRecentRequests() {
    const jwt = localStorage.getItem('token');
    if (!jwt) return;

    fetch('../../api/v1/user/requests.php?limit=5', {
        headers: { 'Authorization': `Bearer ${jwt}` }
    })
        .then(r => r.json())
        .then(data => {
            if (data.status === 'success') {
                renderRequests(data.data);
            }
        })
        .catch(console.error);
}

function renderRequests(requests) {
    const container = document.getElementById('dashboard-requests-container');
    if (!container) return;

    if (requests.length === 0) {
        container.innerHTML = '<div style="padding: 20px; text-align: center; color: var(--text-light);">No recent requests</div>';
        return;
    }

    container.innerHTML = requests.map(req => `
        <div class="request-item">
            <div class="request-icon annual">📅</div>
            <div class="request-info">
                <div class="request-type">${req.leave_type}</div>
                <div class="request-status ${getStatusClass(req.status)}">${formatStatus(req.status)}</div>
            </div>
            <div class="request-date">${formatDate(req.created_at)}</div>
        </div>
    `).join('');
}

function getStatusClass(status) {
    if (status.includes('approved')) return 'approved'; // Need CSS class if exists, assuming based on text color
    if (status === 'rejected') return 'rejected';
    return 'pending';
}

function formatStatus(status) {
    return status.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-GB'); // DD/MM/YYYY
}

function loadDashboardStats() {
    const jwt = localStorage.getItem('token');
    if (!jwt) return;

    fetch('../../api/v1/dashboard/stats.php', {
        headers: { 'Authorization': `Bearer ${jwt}` }
    })
        .then(r => r.json())
        .then(data => {
            if (data.status === 'success') {
                updateDashboardUI(data.data);
            }
        })
        .catch(console.error);
}

function updateDashboardUI(stats) {
    // Balances
    const balanceEl = document.getElementById('stat-leave-balance');
    if (balanceEl) balanceEl.innerHTML = `${stats.leave_balance}<span class="stat-unit">days</span>`;

    const allowedEl = document.getElementById('stat-total-allowed');
    if (allowedEl) allowedEl.innerHTML = `${stats.total_allowed}<span class="stat-unit">days</span>`;

    const pendingEl = document.getElementById('stat-pending-requests');
    if (pendingEl) pendingEl.textContent = stats.pending_requests;
}

/* ====== LOGOUT MODAL ====== */
function initLogoutModal() {
    const logoutBtn = document.querySelector('.logout-btn');
    const modalOverlay = document.getElementById('logoutModal');

    if (!logoutBtn) return;

    if (modalOverlay) {
        // Use existing HTML modal if present
        const cancelBtn = modalOverlay.querySelector('.modal-btn.cancel');
        const confirmBtn = modalOverlay.querySelector('.modal-btn.confirm');

        logoutBtn.addEventListener('click', function (e) {
            e.preventDefault();
            modalOverlay.classList.add('active');
        });

        if (cancelBtn) {
            cancelBtn.addEventListener('click', function () {
                modalOverlay.classList.remove('active');
            });
        }

        if (confirmBtn) {
            confirmBtn.addEventListener('click', function () {
                localStorage.removeItem('token');
                localStorage.removeItem('user');
                window.location.href = '../auth/login.php';
            });
        }

        modalOverlay.addEventListener('click', function (e) {
            if (e.target === modalOverlay) {
                modalOverlay.classList.remove('active');
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
                modalOverlay.classList.remove('active');
            }
        });
    } else if (typeof Swal !== 'undefined') {
        // Fallback: Use SweetAlert2 if no modal HTML exists
        logoutBtn.addEventListener('click', function (e) {
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
                    localStorage.removeItem('user');
                    window.location.href = '../auth/login.php';
                }
            });
        });
    } else {
        // Fallback: SweetAlert confirm dialog
        logoutBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Log Out?',
                    text: 'Are you sure you want to log out?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    confirmButtonText: 'Yes, Logout',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        localStorage.removeItem('token');
                        localStorage.removeItem('user');
                        window.location.href = '../auth/login.php';
                    }
                });
            } else {
                localStorage.removeItem('token');
                localStorage.removeItem('user');
                window.location.href = '../auth/login.php';
            }
        });
    }
}

/* ====== MOBILE MENU ====== */
function initMobileMenu() {
    const menuToggle = document.querySelector('.mobile-menu-toggle');
    const sidebar = document.querySelector('.sidebar');

    if (menuToggle && sidebar) {
        menuToggle.addEventListener('click', function () {
            sidebar.classList.toggle('mobile-open');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function (e) {
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
                    sidebar.classList.remove('mobile-open');
                }
            }
        });
    }
}

/* ====== ANIMATIONS ====== */
function initAnimations() {
    // Add animation classes to elements as they appear
    const animatedElements = document.querySelectorAll('.stat-card, .card, .request-row');

    animatedElements.forEach((el, index) => {
        el.style.animationDelay = `${index * 0.1}s`;
    });
}

/* ====== FORM VALIDATION ====== */
function validateApplyLeaveForm(form) {
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;

    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('error');
        } else {
            field.classList.remove('error');
        }
    });

    // Check date validation
    const startDate = form.querySelector('#startDate');
    const endDate = form.querySelector('#endDate');

    if (startDate && endDate && startDate.value && endDate.value) {
        if (new Date(endDate.value) < new Date(startDate.value)) {
            isValid = false;
            endDate.classList.add('error');
            if (typeof Swal !== 'undefined') {
                Swal.fire('Invalid Date', 'End date must be after start date.', 'error');
            }
        }
    }

    return isValid;
}

/* ====== DELETE REQUEST ====== */
function deleteRequest(requestId) {
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: 'Delete Request?',
            text: 'Are you sure you want to delete this request?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                const requestElement = document.querySelector(`[data-request-id="${requestId}"]`);
                if (requestElement) {
                    requestElement.style.animation = 'fadeOut 0.3s ease forwards';
                    setTimeout(() => { requestElement.remove(); }, 300);
                }
            }
        });
    }
}

/* ====== EDIT REQUEST ====== */
function editRequest(requestId) {
    // Redirect to edit page or open modal
    window.location.href = `apply-leave.php?edit=${requestId}`;
}

/* ====== APPLY LEAVE FORM SUBMISSION ====== */
document.addEventListener('DOMContentLoaded', function () {
    const applyLeaveForm = document.getElementById('applyLeaveForm');

    if (applyLeaveForm) {
        applyLeaveForm.addEventListener('submit', function (e) {
            e.preventDefault();

            if (validateApplyLeaveForm(this)) {
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Submitting...';
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;

                const jwt = localStorage.getItem('token');

                // Gather Data
                const formData = {
                    firstName: document.getElementById('firstName').value,
                    lastName: document.getElementById('lastName').value,
                    reason: document.getElementById('reason').value,
                    startDate: document.getElementById('startDate').value,
                    endDate: document.getElementById('endDate').value,
                    vacationAddress: document.getElementById('vacationAddress').value,
                    emergencyName: document.getElementById('emergencyName').value,
                    emergencyPhone: document.getElementById('emergencyPhone').value,
                    coveredBy: document.getElementById('coveredBy').value,
                    jobTitle: document.getElementById('jobTitle').value
                };

                fetch('../../api/v1/leaves/apply.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${jwt}`
                    },
                    body: JSON.stringify(formData)
                })
                    .then(r => r.json())
                    .then(data => {
                        submitBtn.classList.remove('loading');
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;

                        if (data.status === 'success') {
                            // Success Alert
                            Swal.fire({
                                confirmButtonColor: '#DC1609',
                                cancelButtonColor: '#1a1a1a',
                                iconColor: '#DC1609',
                                icon: 'success',
                                title: 'Application Submitted!',
                                text: 'Your leave request has been sent for approval.',
                                confirmButtonText: 'View Requests'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'my-requests.php';
                                }
                            });
                        } else {
                            Swal.fire({
                                confirmButtonColor: '#DC1609',
                                iconColor: '#DC1609',
                                icon: 'error',
                                title: 'Submission Failed',
                                text: data.message || 'Please check your inputs and try again.'
                            });
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        submitBtn.classList.remove('loading');
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;

                        Swal.fire({
                            confirmButtonColor: '#DC1609',
                            icon: 'error',
                            title: 'System Error',
                            text: 'Unable to connect to the server.'
                        });
                    });
            } else {
                Swal.fire({
                    confirmButtonColor: '#DC1609',
                    iconColor: '#DC1609',
                    icon: 'warning',
                    text: 'Please correct the errors in the form before submitting.'
                });
            }
        });
    }
});

/* ====== CONTEST LEAVE FORM ====== */
document.addEventListener('DOMContentLoaded', function () {
    const contestForm = document.getElementById('contestForm');

    if (contestForm) {
        contestForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.classList.add('loading');

            // Simulate API call
            setTimeout(() => {
                submitBtn.classList.remove('loading');
                if (typeof Swal !== 'undefined') {
                    Swal.fire({ icon: 'success', title: 'Submitted', text: 'Contest submitted for review!', timer: 1800, showConfirmButton: false });
                }
                this.reset();
            }, 1500);
        });
    }
});
