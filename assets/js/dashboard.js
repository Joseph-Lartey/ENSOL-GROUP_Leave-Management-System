/* ========================================
   ENSOL GROUP - Dashboard JavaScript
   Sidebar, Modal, and Interactions
   ======================================== */

document.addEventListener('DOMContentLoaded', function() {
    initLogoutModal();
    initMobileMenu();
    initAnimations();
});

/* ====== LOGOUT MODAL ====== */
function initLogoutModal() {
    const logoutBtn = document.querySelector('.logout-btn');
    const modalOverlay = document.getElementById('logoutModal');
    const cancelBtn = document.querySelector('.modal-btn.cancel');
    const confirmBtn = document.querySelector('.modal-btn.confirm');
    
    if (logoutBtn && modalOverlay) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            modalOverlay.classList.add('active');
        });
        
        // Cancel button
        if (cancelBtn) {
            cancelBtn.addEventListener('click', function() {
                modalOverlay.classList.remove('active');
            });
        }
        
        // Confirm logout
        if (confirmBtn) {
            confirmBtn.addEventListener('click', function() {
                // Redirect to login page
                window.location.href = '../auth/login.php';
            });
        }
        
        // Close on overlay click
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === modalOverlay) {
                modalOverlay.classList.remove('active');
            }
        });
        
        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
                modalOverlay.classList.remove('active');
            }
        });
    }
}

/* ====== MOBILE MENU ====== */
function initMobileMenu() {
    const menuToggle = document.querySelector('.mobile-menu-toggle');
    const sidebar = document.querySelector('.sidebar');
    
    if (menuToggle && sidebar) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('mobile-open');
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
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
            alert('End date must be after start date');
        }
    }
    
    return isValid;
}

/* ====== DELETE REQUEST ====== */
function deleteRequest(requestId) {
    if (confirm('Are you sure you want to delete this request?')) {
        // In a real app, this would make an API call
        console.log('Deleting request:', requestId);
        
        // Remove the element from DOM
        const requestElement = document.querySelector(`[data-request-id="${requestId}"]`);
        if (requestElement) {
            requestElement.style.animation = 'fadeOut 0.3s ease forwards';
            setTimeout(() => {
                requestElement.remove();
            }, 300);
        }
    }
}

/* ====== EDIT REQUEST ====== */
function editRequest(requestId) {
    // Redirect to edit page or open modal
    window.location.href = `apply-leave.php?edit=${requestId}`;
}

/* ====== APPLY LEAVE FORM SUBMISSION ====== */
document.addEventListener('DOMContentLoaded', function() {
    const applyLeaveForm = document.getElementById('applyLeaveForm');
    
    if (applyLeaveForm) {
        applyLeaveForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (validateApplyLeaveForm(this)) {
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.classList.add('loading');
                
                // Simulate API call
                setTimeout(() => {
                    submitBtn.classList.remove('loading');
                    alert('Leave request submitted successfully!');
                    window.location.href = 'my-requests.php';
                }, 1500);
            }
        });
    }
});

/* ====== CONTEST LEAVE FORM ====== */
document.addEventListener('DOMContentLoaded', function() {
    const contestForm = document.getElementById('contestForm');
    
    if (contestForm) {
        contestForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.classList.add('loading');
            
            // Simulate API call
            setTimeout(() => {
                submitBtn.classList.remove('loading');
                alert('Contest submitted for review!');
                this.reset();
            }, 1500);
        });
    }
});
