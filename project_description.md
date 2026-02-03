# 🏢 ENSOL GROUP LEAVE MANAGEMENT SYSTEM (LMS)

Enterprise-grade, multi-subsidiary Leave Management System for **Ensol Group** and all subsidiary companies.

---

## 📌 1. System Overview

The Leave Management System (LMS) is a secure, API-driven web platform that allows:

- Employees to submit leave requests
- Supervisors to review and approve
- Central HR to provide final approval
- Automatic leave balance tracking
- Leave balance dispute handling

The system is built as:

- 🌐 Web Application (Admin + Employee Portal)
- 📱 Mobile App Ready (via REST API)
- 🔐 Security-focused (OTP, company email restriction)

---

## 🏗 2. Multi-Company Architecture

The system supports a **parent company (Ensol Group)** and multiple subsidiaries.

```
Ensol Group (Parent)
│
├── Subsidiary A
├── Subsidiary B
├── Subsidiary C
```

### Shared Across All Companies
- HR Department  
- Leave policies  
- Security standards  

### Unique Per Subsidiary
- Supervisors  
- Departments  
- Reporting structure  

---

## 👥 3. User Roles

| Role | Scope | Description |
|------|------|-------------|
| Employee | Subsidiary | Applies for leave |
| Supervisor | Subsidiary | First-level approver |
| HR Admin | Group-wide | Final approval authority |
| System Admin | Global | System management |

---

## 🧠 4. Role Duplication Logic

The same job title may exist in different subsidiaries, but approval routing depends on **assigned supervisor**, not job title.

| Employee | Role | Subsidiary | Supervisor |
|----------|------|------------|------------|
| John | Project Manager | Sub A | Manager A |
| Mary | Project Manager | Sub B | Manager B |

---

## 🔁 5. Leave Approval Workflow

```
Employee → Subsidiary Supervisor → Central HR → Final Decision
```

### Process

1. Employee submits leave request  
2. Supervisor reviews  
3. If approved → forwarded to HR  
4. HR gives final decision  
5. Employee notified via email  

---

## 🏖 6. Leave Types

- Annual Leave  
- Sick Leave  
- Casual Leave  
- Emergency Leave  
- Maternity / Paternity Leave  
- Unpaid Leave  

Each leave type includes:
- Yearly allowance  
- Carry-forward rules  
- Optional documentation requirement  

---

## 🧮 7. Leave Balance System

The system automatically tracks:

- Total leave allocated
- Leave taken
- Leave remaining
- Sick leave days
- Leave history

Employees can submit **Leave Balance Disputes** if discrepancies occur.

---

## ⚖ 8. Leave Dispute Workflow

```
Employee raises dispute → HR reviews → Adjust or reject → Audit logged
```

---

## 👤 9. Employee Profile Fields

- Full Name  
- Company Email  
- Subsidiary  
- Department  
- Role  
- Supervisor  
- Employment Date  
- Leave Entitlement  

---

## ✉️ 10. Email Notifications

| Event | Recipient |
|------|-----------|
| Leave submitted | Supervisor |
| Supervisor approval | HR |
| Final decision | Employee |
| Leave rejected | Employee |
| Dispute raised | HR |

---

## 🔐 11. Security Architecture

### Authentication
- Company email only  
- Password hashing (bcrypt/argon2)  
- JWT authentication  

### Two-Factor Authentication (OTP)
Required for:
- HR Admins  
- Supervisors  
- System Admins  

### Additional Security
- HTTPS only  
- Role-Based Access Control (RBAC)  
- CSRF protection  
- Rate limiting  
- File upload validation  
- Full audit logs  

---

## 🔐 12. Authentication Flow

```
Login → Password Verified → OTP Sent → OTP Verified → JWT Issued → Access Granted
```

---

## 🧱 13. System Architecture

```
Frontend (Web)
│
▼
Backend API
│
▼
Database
▲
│
Mobile App (via API)
```

---

## 🔌 14. API Structure

Base path:

```
/api/v1/
```

### Example Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | /auth/login | Login |
| POST | /auth/verify-otp | OTP verification |
| GET | /leave/balance | Get leave balance |
| POST | /leave/request | Submit leave |
| POST | /leave/approve | Approve leave |
| POST | /leave/dispute | Raise dispute |

---

## 📱 15. Mobile API Contract

Defines how mobile applications communicate with the backend.

### Example: Apply Leave

**Request**
```json
POST /api/v1/leave/request
Authorization: Bearer TOKEN

{
  "leave_type_id": 1,
  "start_date": "2026-02-10",
  "end_date": "2026-02-15",
  "reason": "Medical leave"
}
```

**Response**

```json
{
  "status": "success",
  "message": "Leave request submitted",
  "request_id": 45
}
```

---

## 🗄 16. Database ER Diagram (Conceptual)

```
companies ──< users >── roles
      │
      └── subsidiaries

users ──< leave_requests >── leave_types
users ──< leave_balances
leave_requests ──< leave_approvals
leave_balances ──< leave_disputes
```

---

## ⚙ 17. Backend Workflow

### Leave Request

```
Submit → Check balance → Save → Notify supervisor
```

### Supervisor Approval

```
Approve → Forward to HR → Notify HR
```

### HR Final Approval

```
Approve → Deduct balance → Log action → Notify employee
```

---

## 🧪 18. Environments

| Environment | Purpose |
|------------|---------|
| Production | Live system |
| Staging | Web testing |
| API Sandbox | Mobile testing without affecting live data |

---

## 📊 19. HR Dashboard Features

- Employees on leave today
- Leave usage by subsidiary
- Pending approvals
- Leave trends
- Dispute reports

---

## 🧾 20. Audit Logging

Tracks:

- Approvals & rejections
- Balance adjustments
- Login attempts
- Role changes

---

**Project Type:** Enterprise HR Platform  
**Architecture:** Web + API + Mobile Ready  
**Security Level:** High
