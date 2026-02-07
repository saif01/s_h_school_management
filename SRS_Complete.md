# SOFTWARE REQUIREMENTS SPECIFICATION (SRS)
## Simple Small School Management System

---

## DOCUMENT CONTROL

| **Item** | **Details** |
|----------|-------------|
| **Document Title** | Software Requirements Specification - Simple Small School Management System |
| **Document Version** | 1.0 |
| **Date** | 2026-02-07 |
| **Status** | Draft |
| **Classification** | Internal Use |

---

## TABLE OF CONTENTS

1. [Introduction](#1-introduction)
2. [System Overview](#2-system-overview)
3. [Functional Requirements](#3-functional-requirements)
4. [Non-Functional Requirements](#4-non-functional-requirements)
5. [System Architecture](#5-system-architecture)
6. [Data Requirements](#6-data-requirements)
7. [Constraints and Assumptions](#7-constraints-and-assumptions)
8. [Testing and Deployment](#8-testing-and-deployment)

---

## 1. INTRODUCTION

### 1.1 Purpose
This SRS describes a **simple, small school management system** for a single school (typically 50–500 students). It focuses on essential day-to-day operations without enterprise features such as multi-campus, full accounting, procurement, or complex admission workflows.

### 1.2 Scope

**In Scope:**
- Single school (one campus)
- Basic organization profile and academic year
- Simple role-based access (Admin, Teacher, Accountant, Student, Parent)
- Academic setup: classes, sections, subjects
- Staff setup (teachers and office; assign teachers to classes/sections)
- Simple admissions and enrollment
- Student information and basic lifecycle
- Timetable (class-wise)
- Student and staff attendance
- Exams, marks entry, results, and promotion
- Fee types, invoices, collection, and receipts (no full accounting)
- Notices and simple messaging
- Basic reports and dashboard
- Optional: Transfer Certificate / testimonial generation
- Year-end: promote students, close session
- Audit logging for sensitive sections (marks, fees, users, student data, certificates)

**Out of Scope (for this simple system):**
- Multi-campus or branch support
- Full accounting (Chart of Accounts, GL, vouchers, bank reconciliation)
- HR & payroll (only staff list and optional leave)
- Procurement, inventory, asset management
- Library, transport, hostel, canteen
- Complex admission (circulars, tests, interviews, merit lists)
- Front desk / gate security (optional simple visitor log)
- Events, clubs, alumni (optional minimal)
- Payment gateway (optional; cash/bank only is acceptable)
- Biometric devices (manual attendance only)

### 1.3 Definitions and Abbreviations

| **Term** | **Definition** |
|----------|----------------|
| **SMS** | School Management System |
| **RBAC** | Role-Based Access Control |
| **TC** | Transfer Certificate |
| **GPA** | Grade Point Average |

---

## 2. SYSTEM OVERVIEW

### 2.1 System Purpose
- Centralize student, staff, and academic data for one school.
- Support daily operations: attendance, timetable, exams, fees, and basic reporting.
- Give parents and students simple access to attendance, fees, and results.

### 2.2 Target Users and Scale
- **Scale:** One school, ~50–500 students, ~10–50 staff.
- **Users:** Admin (1–2), Teachers, Accountant (optional), Students, Parents.

### 2.3 System Objectives
1. Reduce manual record-keeping (registers, spreadsheets).
2. Provide a single place for student info, attendance, exams, and fees.
3. Allow parents/students to view attendance, fees, and results (web).
4. Produce basic reports for management and compliance.

### 2.4 Stakeholders
- **School Admin:** Day-to-day operation, reports.
- **Teachers:** Attendance, marks, timetable.
- **Accountant/Office:** Fee collection, receipts.
- **Students/Parents:** View attendance, fees, results, notices.
- **Development Team:** Build and maintain the system.

---

## 3. FUNCTIONAL REQUIREMENTS

### 3.1 Setup and Configuration

#### FR-1.1: Organization Setup
- **Priority:** High  
- **Description:** Admin configures school profile once.
- **Requirements:**
  1. School name, code, logo, address, phone, email.
  2. Academic year (e.g., 2026, or 2026–2027) with start/end dates.
  3. Timezone, date format, currency (optional).
  4. Optional: SMTP (email) and/or SMS gateway settings for sending notices.
  5. No multi-campus; single school only.

**Acceptance:** School profile can be created/edited and used across the system.

#### FR-1.2: Role-Based Access Control (RBAC)
- **Priority:** High  
- **Description:** Simple roles with fixed permissions.
- **Roles:**
  - **Admin:** Full access (setup, users, all modules).
  - **Teacher:** Own classes/sections; attendance, marks, timetable; view students.
  - **Accountant:** Fees, invoices, receipts, fee reports only.
  - **Student:** Own profile, attendance, fees, results, notices.
  - **Parent:** Linked children’s attendance, fees, results, notices.
- **Requirements:**
  1. Create, edit, and deactivate users; assign one primary role per user.
  2. Parent linked to one or more students.
  3. Teacher assigned to classes/sections (for data scope).
- No custom roles or granular permission builder for this version.

**Acceptance:** Each role can only access allowed screens and data.

#### FR-1.3: Academic Setup
- **Priority:** High  
- **Description:** Define classes, sections, and subjects for the academic year.
- **Requirements:**
  1. **Classes:** e.g., Class 1 to Class 10 (name, code, order).
  2. **Sections:** Per class (e.g., A, B, C).
  3. **Subjects:** Subject name, code, max marks, pass marks; assign to classes.
  4. **Grading:** Simple grade scale (e.g., A+, A, B+, …, F) with mark ranges; optional GPA.
  5. **Academic calendar:** Holidays and key dates (optional but recommended).
- No departments, streams, or complex subject combinations required.

**Acceptance:** Classes, sections, and subjects can be set up and used in enrollment, timetable, and exams.

#### FR-1.4: Staff Setup
- **Priority:** High  
- **Description:** Add staff (teachers and office) so they can be assigned to timetable and attendance.
- **Requirements:**
  1. **Staff record:** Name, role type (Teacher / Accountant / Other), contact (phone, email); optional employee ID.
  2. **Teacher assignment:** Assign teachers to class(es) and/or section(s) for timetable and marks/attendance scope.
  3. **User link:** Option to link staff to a system user (login) for Teacher/Accountant roles.
- No full HR; no payroll or leave workflow required for v1.

**Acceptance:** Staff can be added and teachers assigned to classes/sections; staff list is available for attendance and timetable.

---

### 3.2 Admissions and Enrollment

#### FR-2.1: Simple Admissions
- **Priority:** High  
- **Description:** Register new students and enroll them in a class/section.
- **Requirements:**
  1. **Admission form:** Student name, DOB, gender, address, phone; parent/guardian name(s) and contact; previous school (optional); photo (optional).
  2. **No admission circulars or application workflow;** direct “Add Student” by Admin/Teacher.
  3. **Enrollment:** Assign student to academic year, class, section; optional roll number.
  4. **Student ID:** Auto or manual (e.g., STU-2026-001).
- Optional: Application fee and single payment recording (no multi-step approval).

**Acceptance:** New students can be added and enrolled in a class/section for the current year.

#### FR-2.2: Student Lifecycle (Basic)
- **Priority:** Medium  
- **Description:** Basic status changes.
- **Requirements:**
  1. **Active:** Default after enrollment.
  2. **Transfer out (TC):** Mark as left, date, optional reason; TC can be generated later (see Certificates).
  3. **Withdrawn:** Left without TC.
- No alumni module required; optional “graduated” or “left” list.

**Acceptance:** Student status can be updated; left students excluded from active lists.

---

### 3.3 Timetable

#### FR-3.1: Timetable Management
- **Priority:** High  
- **Description:** Weekly timetable per class/section.
- **Requirements:**
  1. Define **periods** (e.g., Period 1–8) with start/end time; optional break slots.
  2. Assign **subject + teacher** to (class, section, day, period).
  3. One timetable per class-section; same structure for all sections of a class allowed.
  4. View by class, section, or teacher.
- No automatic conflict resolution; manual editing only.

**Acceptance:** Timetable can be created and viewed by class, section, and teacher.

---

### 3.4 Attendance

#### FR-4.1: Student Attendance
- **Priority:** High  
- **Description:** Daily attendance by class/section.
- **Requirements:**
  1. Select date, class, section; list of enrolled students shown.
  2. Mark Present / Absent / Late (optional).
  3. Default “Present” or “Absent” with bulk toggle.
  4. Only one attendance record per student per day; teacher or admin can edit.
- No biometric integration; manual entry only.

**Acceptance:** Daily attendance can be taken and updated; reports by student/class/date range.

#### FR-4.2: Staff Attendance (Optional)
- **Priority:** Low  
- **Description:** Simple daily Present/Absent for staff.
- **Requirements:** List staff; mark date-wise Present/Absent. Optional leave type (e.g., Casual, Sick) without full leave workflow.

**Acceptance:** Staff attendance can be recorded and reported.

---

### 3.5 Exams and Results

#### FR-5.1: Exam Setup
- **Priority:** High  
- **Description:** Define exams for the academic year.
- **Requirements:**
  1. **Exam types:** e.g., Half-yearly, Final, or “Exam 1”, “Exam 2”.
  2. **Per exam:** Name, academic year, class(es), date range (optional).
  3. **Subjects:** Use subjects already defined for the class; set max marks per subject for this exam.
- No question banks or online exams.

**Acceptance:** Exams can be created and linked to classes and subjects.

#### FR-5.2: Marks Entry
- **Priority:** High  
- **Description:** Enter and edit marks by exam and subject.
- **Requirements:**
  1. Select exam, class, section, subject; list of students shown.
  2. Enter marks obtained (numeric); system validates against max marks.
  3. Optional: Absent, Exempt.
  4. Teacher or Admin can enter; optional approval step (e.g., lock after verification).
- Bulk entry (e.g., one row per student) is desirable.

**Acceptance:** Marks can be entered and corrected; stored per student, exam, subject.

#### FR-5.3: Result Processing
- **Priority:** High  
- **Description:** Compute result and grades.
- **Requirements:**
  1. **Calculation:** Total marks, percentage; apply grade scale; optional GPA.
  2. **Pass/Fail:** Per subject (pass marks) and overall (e.g., pass all or aggregate).
  3. **Publish:** Mark result as “Published” so students/parents can view.
  4. **Report:** Result card/sheet (PDF or print) per student.
- No merit list or rank requirement for simple version.

**Acceptance:** Results are calculated, publishable, and viewable by student/parent; result card can be generated.

#### FR-5.4: Promotion
- **Priority:** High  
- **Description:** Move students to next class at year-end.
- **Requirements:**
  1. **Promotion list:** By class/section; indicate Promote / Retain per student.
  2. **Bulk promote:** Set “next class/section” for promoted students; retainees stay in same class.
  3. **New session:** Start new academic year; promoted students appear in new class.
- Optional: Promotion rules (e.g., auto-promote if pass).

**Acceptance:** Promotion can be done in bulk; new session reflects new class/section.

---

### 3.6 Fees and Finance (Simple)

#### FR-6.1: Fee Setup
- **Priority:** High  
- **Description:** Define fee types and amounts.
- **Requirements:**
  1. **Fee heads:** e.g., Tuition, Transport, Lab (optional).
  2. **Fee structure:** Amount per fee head by class (e.g., Class 5: Tuition 2000, Transport 500).
  3. **Frequency:** Monthly, Term-wise, or Annual; due date(s) optional.
- No discount rules or multiple fee plans required for v1.

**Acceptance:** Fee heads and class-wise amounts can be defined.

#### FR-6.2: Invoicing and Collection
- **Priority:** High  
- **Description:** Generate invoices and record payments.
- **Requirements:**
  1. **Invoice:** Generate fee invoice per student (for term/month/year as configured); show fee heads and total.
  2. **Payment:** Record payment against invoice (amount, date, mode: Cash/Bank); partial payment allowed; balance due updated.
  3. **Receipt:** Print/PDF receipt with invoice and payment details.
  4. **Due list:** Students with outstanding amount; optional reminder (manual or simple SMS/email if integrated).
- No Chart of Accounts, vouchers, or bank reconciliation; fee ledger only.

**Acceptance:** Invoices can be generated, payments recorded, receipts issued; due balance is correct.

---

### 3.7 Communication

#### FR-7.1: Notices and Messaging
- **Priority:** Medium  
- **Description:** Publish notices and optionally send to parents/students.
- **Requirements:**
  1. **Notices:** Title, body, date; target by “All” or by class/section.
  2. **Visibility:** Students and parents see notices on their dashboard or notice list.
  3. **Optional:** Send notice via email or SMS (if SMTP/SMS configured in setup); no WhatsApp required for simple version.
- No two-way chat; one-way notices only.

**Acceptance:** Notices can be created, targeted, and viewed by students/parents; optional email/SMS.

---

### 3.8 Reports and Dashboard

#### FR-8.1: Dashboards
- **Priority:** Medium  
- **Description:** Simple role-based summary views.
- **Requirements:**
  1. **Admin:** Total students, staff; today’s attendance summary; fee collection summary (e.g., this month); recent notices.
  2. **Teacher:** My classes; today’s timetable; pending attendance or marks entry.
  3. **Accountant:** Fee collection today/month; list of defaulters.
  4. **Student/Parent:** Attendance summary; fee dues; recent results; notices.
- No complex analytics or BI.

**Acceptance:** Each role sees a relevant dashboard.

#### FR-8.2: Reports
- **Priority:** High  
- **Description:** Essential reports only.
- **Requirements:**
  1. **Attendance:** Student-wise or class-wise; date range; summary (present days, absent days).
  2. **Exam/Result:** Class-wise result summary; student result card.
  3. **Fees:** Collection report (by date range); defaulter list; student-wise fee statement.
  4. **Strength:** Class-wise/section-wise student count.
- Export: PDF and/or Excel for key reports.

**Acceptance:** Listed reports are available and exportable.

---

### 3.9 Documents and Certificates (Optional)

#### FR-9.1: Certificates
- **Priority:** Low  
- **Description:** Generate TC and/or testimonial.
- **Requirements:**
  1. **TC:** Template with school details, student name, class, date of leaving, reason; unique number; print/PDF.
  2. **Testimonial:** Similar; optional conduct and academic summary.
- No document vault or workflow; generate on demand.

**Acceptance:** TC and testimonial can be generated and printed/PDF.

---

### 3.10 Year-End and Session Closing

#### FR-10.1: Session Closing
- **Priority:** High  
- **Description:** Close current academic year and start next.
- **Requirements:**
  1. **Academic:** Run promotion (see FR-5.4); optionally lock results for previous session.
  2. **Fees:** Option to carry forward dues to new session or close old invoices.
  3. **New session:** New academic year created; students in new classes; new fee structure if needed.
- No full finance closing (no GL); only fee and academic closing.

**Acceptance:** Session can be closed and new session started with promoted students.

---

## 4. NON-FUNCTIONAL REQUIREMENTS

### 4.1 Performance
- **Response time:** Pages load within 3 seconds under normal use.
- **Concurrent users:** Support at least 50 simultaneous users.
- **Scale:** Support up to 500 students and 50 staff without major performance issues.

### 4.2 Availability
- **Uptime:** 99% (about 7 hours downtime per month acceptable for small school).
- **Backup:** Daily database backup; keep at least 7 days.

### 4.3 Security
- **Authentication:** Login with username/email and password; session timeout (e.g., 30 minutes).
- **Password:** Minimum 8 characters; no mandatory complexity for v1.
- **Authorization:** RBAC enforced; users see only their role-based data.
- **HTTPS:** Use HTTPS in production.
- **Sensitive data:** Do not store unnecessary sensitive data; protect student/parent info.
- **Audit log:** All sensitive operations (marks, fees, user changes, student data, certificates, etc.) must be logged; see Section 6.6.

### 4.4 Usability
- **Responsive:** Usable on desktop and tablet (mobile-friendly preferred).
- **Browsers:** Latest Chrome, Firefox, Edge, Safari.
- **Clarity:** Clear labels, simple navigation; minimal training for basic tasks.

### 4.5 Maintainability
- **Technology:** Use a common framework (e.g., Laravel, Django, or similar) and clear structure.
- **Logs:** Basic application and error logs; no sensitive data in logs.

---

## 5. SYSTEM ARCHITECTURE

### 5.1 Approach
- **Single application:** One web application (no microservices).
- **Layers:** Presentation (web UI), Business logic, Data access, Database.

### 5.2 Suggested Stack
- **Backend:** PHP (Laravel) or Python (Django) or Node.js – one of these.
- **Frontend:** Server-rendered pages with minimal JavaScript, or simple SPA (e.g., Vue/React).
- **Database:** MySQL 5.7+ or PostgreSQL 10+.
- **Server:** Single server (app + database on same machine acceptable for small scale).
- **Optional:** Redis for session/cache if needed.

### 5.3 Deployment
- **Hosting:** Single VPS or shared hosting with PHP/Node/Python support.
- **SSL:** HTTPS via Let’s Encrypt or provider SSL.
- **Domain:** School subdomain or dedicated domain.

---

## 6. DATA REQUIREMENTS

### 6.1 Core Entities (Simplified)
- **Organization:** Name, code, logo, address, contact, academic year.
- **Academic:** Session, Class, Section, Subject, Grade scale.
- **People:** Student, Parent/Guardian, Staff (with role type and class assignment), User (login).
- **Roles:** Admin, Teacher, Accountant, Student, Parent.
- **Academic operations:** Enrollment, Timetable, Attendance (student, staff).
- **Exams:** Exam, ExamSubject (max marks), Marks (student, exam, subject, marks).
- **Results:** Result summary, published flag.
- **Fees:** FeeHead, FeeStructure (class-wise), Invoice, Payment, Receipt.
- **Communication:** Notice (with target class/section).
- **Optional:** Certificate (TC/Testimonial template and generated docs); `transfer_certificates` table for TC unique number and audit.

### 6.2 Key Relationships
- Student → Parent (one or two); Student → Enrollment (per session) → Class, Section.
- Student.user_id, Parent.user_id → User (for Student/Parent login); Staff.user_id → User (for Teacher/Accountant login).
- Teacher → Timetable entries (Class, Section, Subject); Exam → exam_classes → Class.
- Invoice → Student, FeeStructure; Payment → Invoice.
- Marks → Student, Exam, Subject.

### 6.3 Data Validation
- Student ID and user login unique; marks between 0 and max marks; fee amounts non-negative; required fields enforced (e.g., name, DOB, class).

### 6.4 Table Design Convention
**Every table MUST include these timestamp and user-tracking columns:**

| **Column**    | **Type**     | **Required** | **Purpose**                              |
|---------------|--------------|--------------|------------------------------------------|
| `created_at`  | TIMESTAMP    | Yes          | When the row was inserted                |
| `updated_at`  | TIMESTAMP    | Yes          | When the row was last modified           |
| `created_by`  | BIGINT (FK)  | No (nullable)| User who inserted the row → users.id     |
| `updated_by`  | BIGINT (FK)  | No (nullable)| User who last updated the row → users.id |

- **Timestamps:** `created_at` and `updated_at` default to current timestamp on insert; `updated_at` updated on every row update. Both NOT NULL.
- **User tracking:** `created_by` and `updated_by` are nullable (e.g. system/seed data, or first user). FK to `users.id`. Set on insert/update from current logged-in user.
- **Framework:** Use framework conventions (e.g., Laravel `timestamps()`, Django `auto_now`/`auto_now_add`) for timestamps; set created_by/updated_by in model observers or application layer.
- **Exception:** Audit log table (`audit_logs`) has `created_at` and `created_by` only (no `updated_at`/`updated_by`) since log rows are immutable. `user_id` in audit_logs is the actor; `created_by` can be used for consistency or omitted (redundant with user_id).

### 6.5 Database Migration Details

#### 6.5.1 Migration Strategy
- **Versioned migrations:** One migration file per schema change; sequential numbering (e.g., `001_create_users`, `002_create_students`).
- **Reversible:** Each migration must support rollback where possible (drop table, revert column).
- **Idempotent checks:** Use `IF NOT EXISTS` / `IF EXISTS` where supported to avoid errors on re-run.
- **Order:** Run migrations in order; maintain dependency order (e.g., create `users` before `students` if `students.user_id` references `users`).

#### 6.5.2 Migration Process
1. **Develop:** Create migration file with up (apply) and down (rollback) logic.
2. **Test:** Run migrations on local/test database; verify rollback works.
3. **Deploy:** Run migrations as part of deployment before application restart.
4. **Backup:** Take database backup before running migrations in production.
5. **Log:** Log migration name, status (success/fail), and timestamp.

#### 6.5.3 Migration File Naming
- Format: `YYYY_MM_DD_HHMMSS_description_of_change` (e.g., `2026_02_07_100000_create_students_table`).
- Or numeric: `001_create_users_table`, `002_add_created_at_to_legacy_table`.

#### 6.5.4 Tables Requiring Migrations (with `created_at`, `updated_at`)

*This list includes both already-implemented tables (see 6.5.4a) and planned tables. Implemented ones have schema in 6.5.5 marked “(implemented – see 6.5.4a)”.*

| **Table**           | **Purpose**                          |
|---------------------|--------------------------------------|
| `organizations`     | School profile, settings             |
| `academic_sessions` | Academic years                       |
| `classes`           | Class master                         |
| `sections`          | Section master (per class)           |
| `subjects`          | Subject master                       |
| `grade_scales`      | Grade definitions                    |
| `staff`             | Staff/teacher records                |
| `staff_class_assignments` | Teacher–class/section link    |
| `students`          | Student master                       |
| `parents`           | Parent/guardian records              |
| `student_parents`   | Student–parent link                  |
| `enrollments`       | Student enrollment (session, class, section) |
| `users`             | Login accounts                       |
| `roles`             | Role definitions                     |
| `permissions`       | Permission definitions               |
| `role_permission`   | Role–permission assignment           |
| `user_role`         | User–role assignment (pivot; one primary role per user) |
| `settings`           | Key-value settings (general, seo, email, etc.) |
| `login_logs`         | Login attempt audit (success/failed) |
| `class_subjects`    | Subject–class assignment (FR-1.3)   |
| `periods`           | Period/bell schedule                 |
| `timetable_entries` | Class timetable (day, period, subject, teacher) |
| `student_attendance`| Daily student attendance             |
| `staff_attendance`  | Daily staff attendance               |
| `exams`             | Exam definitions                     |
| `exam_classes`      | Exam–class link (FR-5.1)             |
| `exam_subjects`     | Exam–subject (max marks)             |
| `marks`             | Student marks (exam, subject)        |
| `results`           | Processed result summary             |
| `fee_heads`         | Fee types                            |
| `fee_structures`    | Class-wise fee amounts               |
| `invoices`          | Fee invoices                         |
| `invoice_items`     | Fee breakdown per invoice (optional)  |
| `payments`          | Payment records                      |
| `notices`           | Notice/announcements                 |
| `notice_targets`    | Notice–class/section targeting       |
| `transfer_certificates` | TC issuance (unique number, audit) |
| `audit_logs`        | Sensitive operation logs (see 6.6)   |

#### 6.5.4a Current migration files (implemented)

The following tables and columns exist in the project’s migration folder. Schema below (6.5.5) is aligned with these migrations for **users**, **roles**, **user_role**, **permissions**, **role_permission**, **settings**, **login_logs**, and framework tables.

| **Migration file** | **Tables / changes** |
|--------------------|------------------------|
| `0001_01_01_000000_create_users_table.php` | `users`, `password_reset_tokens`, `sessions` |
| `0001_01_01_000001_create_cache_table.php` | `cache`, `cache_locks` |
| `0001_01_01_000002_create_jobs_table.php` | `jobs`, `job_batches`, `failed_jobs` |
| `2025_11_22_200555_create_settings_table.php` | `settings` |
| `2025_11_22_200626_add_role_to_users_table.php` | `users`: +`role`, +`avatar` |
| `2025_11_22_201228_create_personal_access_tokens_table.php` | `personal_access_tokens` |
| `2025_11_22_210651_create_permissions_table.php` | `permissions` |
| `2025_11_22_210651_create_roles_table.php` | `roles` |
| `2025_11_22_210652_create_role_permission_table.php` | `role_permission` |
| `2025_11_22_210652_create_user_role_table.php` | `user_role` |
| `2025_11_23_170700_create_sessions_table_if_not_exists.php` | `sessions` (if not exists) |
| `2025_11_23_180622_create_login_logs_table.php` | `login_logs` |
| `2025_11_27_115627_sync_user_role_fields.php` | (no schema change) |

**Framework / support tables (no created_by/updated_by):** `password_reset_tokens`, `sessions`, `cache`, `cache_locks`, `jobs`, `job_batches`, `failed_jobs`, `personal_access_tokens` — used by Laravel for auth, cache, queue, and API tokens.

#### 6.5.5 Table Fields (Schema)

All tables include `created_at`, `updated_at` (TIMESTAMP, NOT NULL) and `created_by`, `updated_by` (BIGINT FK → users.id, nullable) unless noted. PK = Primary Key, FK = Foreign Key.

**organizations**
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**                    |
|----------------|-----------------|---------------|--------|-------------|------------------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID                          |
| name           | VARCHAR(255)    | No            | —      | —           | School name                         |
| code           | VARCHAR(255)    | No            | UNIQUE | —           | School code                         |
| logo           | VARCHAR(255)    | Yes           | —      | —           | Logo file path                      |
| address        | TEXT            | Yes           | —      | —           | Full address                        |
| phone          | VARCHAR(50)     | Yes           | —      | —           | Phone number                        |
| email          | VARCHAR(255)    | Yes           | —      | —           | Email                               |
| timezone       | VARCHAR(50)     | No            | —      | 'UTC'       | Timezone                            |
| date_format    | VARCHAR(20)     | No            | —      | 'Y-m-d'     | Date format                         |
| currency       | VARCHAR(3)      | Yes           | —      | —           | Currency code                       |
| smtp_config    | JSON            | Yes           | —      | —           | SMTP/email settings                 |
| sms_config     | JSON            | Yes           | —      | —           | SMS gateway settings                |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time                         |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time                    |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (who created)            |
| updated_by     | BIGINT          | Yes           | FK     | —           | → users.id (who last updated)       |

**academic_sessions**
| **Field**          | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|--------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                 | BIGINT          | No            | PK     | —           | Unique ID               |
| organization_id    | BIGINT          | No            | FK     | —           | → organizations.id      |
| name               | VARCHAR(255)    | No            | —      | —           | Session name (e.g. 2026) |
| start_date         | DATE            | No            | —      | —           | Session start           |
| end_date           | DATE            | No            | —      | —           | Session end             |
| is_current         | BOOLEAN         | No            | —      | false       | Current session flag    |
| created_at         | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at         | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by         | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by         | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**roles** *(implemented – see 6.5.4a)*
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**                    |
|----------------|-----------------|---------------|--------|-------------|------------------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID                          |
| name           | VARCHAR(255)    | No            | UNIQUE | —           | Role display name                   |
| slug           | VARCHAR(255)    | No            | UNIQUE | —           | admin, teacher, accountant, student, parent |
| description    | TEXT            | Yes           | —      | —           | Role description                    |
| is_system       | BOOLEAN         | No            | —      | false       | System roles cannot be deleted      |
| is_active       | BOOLEAN         | No            | —      | true        | Role active flag                    |
| order           | INT             | No            | —      | 0           | Display order                       |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time                         |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time                    |

**users** *(implemented – see 6.5.4a)*
| **Field**            | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                   | BIGINT          | No            | PK     | —           | Unique ID               |
| name                 | VARCHAR(255)    | No            | —      | —           | User display name       |
| email                | VARCHAR(255)    | No            | UNIQUE | —           | Login email              |
| email_verified_at    | TIMESTAMP       | Yes           | —      | —           | Email verification time  |
| password             | VARCHAR(255)    | No            | —      | —           | Hashed password          |
| role                 | VARCHAR(255)    | No            | —      | 'admin'     | Legacy role (admin, editor, hr, staff) |
| avatar               | VARCHAR(255)    | Yes           | —      | —           | Avatar file path         |
| phone                | VARCHAR(255)    | Yes           | —      | —           | Phone                    |
| date_of_birth        | DATE            | Yes           | —      | —           | Date of birth            |
| gender               | ENUM            | Yes           | —      | —           | male, female, other      |
| address              | TEXT            | Yes           | —      | —           | Address                  |
| city                 | VARCHAR(255)    | Yes           | —      | —           | City                     |
| state                | VARCHAR(255)    | Yes           | —      | —           | State                    |
| country              | VARCHAR(255)    | Yes           | —      | —           | Country                  |
| postal_code          | VARCHAR(255)    | Yes           | —      | —           | Postal code              |
| bio                  | TEXT            | Yes           | —      | —           | Bio                      |
| remember_token       | VARCHAR(100)    | Yes           | —      | —           | Remember-me token        |
| created_at           | TIMESTAMP       | No            | —      | CURRENT     | Insert time              |
| updated_at           | TIMESTAMP       | No            | —      | CURRENT     | Last update time         |

*Note: RBAC uses `user_role` (many-to-many). `organization_id`, `created_by`, `updated_by` are planned for future migrations when organization and audit fields are added.*

**user_role** *(implemented – see 6.5.4a; pivot table name is `user_role`)*
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| user_id        | BIGINT          | No            | FK     | —           | → users.id (cascade)    |
| role_id        | BIGINT          | No            | FK     | —           | → roles.id (cascade)    |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time              |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| UNIQUE(user_id, role_id) | —     | —            | —      | —           | One assignment per user-role pair; one primary role per user (FR-1.2) |

**permissions** *(implemented – see 6.5.4a)*
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**                    |
|----------------|-----------------|---------------|--------|-------------|------------------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID                          |
| name           | VARCHAR(255)    | No            | —      | —           | Permission display name             |
| slug           | VARCHAR(255)    | No            | UNIQUE | —           | Permission slug (e.g. manage-users) |
| group          | VARCHAR(255)    | No            | —      | 'general'    | Group (general, content, users, etc.) |
| description    | TEXT            | Yes           | —      | —           | Description                         |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time                         |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time                    |

**role_permission** *(implemented – see 6.5.4a)*
| **Field**        | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|------------------|-----------------|---------------|--------|-------------|-------------------------|
| id               | BIGINT          | No            | PK     | —           | Unique ID               |
| role_id          | BIGINT          | No            | FK     | —           | → roles.id (cascade)    |
| permission_id    | BIGINT          | No            | FK     | —           | → permissions.id (cascade) |
| created_at       | TIMESTAMP       | No            | —      | CURRENT     | Insert time              |
| updated_at       | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| UNIQUE(role_id, permission_id) | — | —      | —      | —           | One row per role-permission pair |

**settings** *(implemented – see 6.5.4a)*
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**                    |
|----------------|-----------------|---------------|--------|-------------|------------------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID                          |
| key            | VARCHAR(255)    | No            | UNIQUE | —           | Setting key                         |
| value          | TEXT            | Yes           | —      | —           | Setting value                       |
| type           | VARCHAR(255)    | No            | —      | 'text'      | text, textarea, image, boolean, json |
| group          | VARCHAR(255)    | No            | —      | 'general'   | general, seo, email, social, branding |
| description    | TEXT            | Yes           | —      | —           | Description                         |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time                         |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time                    |

**login_logs** *(implemented – see 6.5.4a)*
| **Field**        | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|------------------|-----------------|---------------|--------|-------------|-------------------------|
| id               | BIGINT          | No            | PK     | —           | Unique ID               |
| user_id          | BIGINT          | Yes           | FK     | —           | → users.id (set null on delete) |
| email            | VARCHAR(255)    | No            | INDEX  | —           | Email used for login attempt |
| ip_address       | VARCHAR(45)     | Yes           | —      | —           | Client IP               |
| user_agent       | TEXT            | Yes           | —      | —           | Browser/client          |
| status           | ENUM            | No            | INDEX  | 'failed'    | success, failed         |
| failure_reason   | VARCHAR(255)    | Yes           | —      | —           | e.g. invalid_credentials |
| logged_in_at     | TIMESTAMP       | Yes           | —      | —           | When login succeeded    |
| created_at       | TIMESTAMP       | No            | INDEX  | CURRENT     | Insert time              |
| updated_at       | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |

**classes**
| **Field**             | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|-----------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                    | BIGINT          | No            | PK     | —           | Unique ID               |
| organization_id       | BIGINT          | No            | FK     | —           | → organizations.id      |
| academic_session_id   | BIGINT          | No            | FK     | —           | → academic_sessions.id   |
| name                  | VARCHAR(255)    | No            | —      | —           | Class name (e.g. Class 5) |
| code                  | VARCHAR(50)     | No            | —      | —           | Class code              |
| sort_order            | SMALLINT UNSIGNED | No          | —      | 0           | Display order           |
| created_at            | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at            | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by            | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by            | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |
| UNIQUE(academic_session_id, code) | — | —            | —      | —           | Unique per session      |

**sections**
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| class_id       | BIGINT          | No            | FK     | —           | → classes.id             |
| name           | VARCHAR(255)    | No            | —      | —           | Section name (e.g. A)   |
| code           | VARCHAR(50)     | No            | —      | —           | Section code            |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by     | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |
| UNIQUE(class_id, code) | —          | —            | —      | —           | Unique per class        |

**class_subjects** (FR-1.3: subjects assigned to classes)
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| class_id       | BIGINT          | No            | FK     | —           | → classes.id            |
| subject_id     | BIGINT          | No            | FK     | —           | → subjects.id           |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by     | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |
| UNIQUE(class_id, subject_id) | —   | —            | —      | —           | Unique per class-subject |

**subjects**
| **Field**          | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|--------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                 | BIGINT          | No            | PK     | —           | Unique ID               |
| organization_id    | BIGINT          | No            | FK     | —           | → organizations.id       |
| name               | VARCHAR(255)    | No            | —      | —           | Subject name             |
| code               | VARCHAR(50)     | No            | —      | —           | Subject code             |
| max_marks          | DECIMAL(8,2)    | No            | —      | 100         | Maximum marks            |
| pass_marks         | DECIMAL(8,2)    | Yes           | —      | —           | Pass marks               |
| created_at         | TIMESTAMP       | No            | —      | CURRENT     | Insert time              |
| updated_at         | TIMESTAMP       | No            | —      | CURRENT     | Last update time         |
| created_by         | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by         | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |
| UNIQUE(organization_id, code) | — | —            | —      | —           | Unique per org           |

**grade_scales**
| **Field**          | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|--------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                 | BIGINT          | No            | PK     | —           | Unique ID               |
| organization_id    | BIGINT          | No            | FK     | —           | → organizations.id       |
| name               | VARCHAR(20)     | No            | —      | —           | Grade label (A+, A, B…)  |
| grade_point        | DECIMAL(4,2)    | No            | —      | 0           | GPA point               |
| min_marks          | DECIMAL(8,2)    | No            | —      | —           | Min marks for grade     |
| max_marks          | DECIMAL(8,2)    | No            | —      | —           | Max marks for grade     |
| created_at         | TIMESTAMP       | No            | —      | CURRENT     | Insert time              |
| updated_at         | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by         | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by         | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**staff**
| **Field**          | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|--------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                 | BIGINT          | No            | PK     | —           | Unique ID               |
| organization_id    | BIGINT          | No            | FK     | —           | → organizations.id       |
| user_id            | BIGINT          | Yes           | FK     | —           | → users.id (optional)   |
| name               | VARCHAR(255)    | No            | —      | —           | Staff name               |
| role_type          | VARCHAR(50)     | No            | —      | —           | teacher, accountant, other |
| phone              | VARCHAR(50)     | Yes           | —      | —           | Phone                    |
| email              | VARCHAR(255)    | Yes           | —      | —           | Email                    |
| employee_id        | VARCHAR(50)     | Yes           | —      | —           | Optional employee ID     |
| created_at         | TIMESTAMP       | No            | —      | CURRENT     | Insert time              |
| updated_at         | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by         | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by         | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**staff_class_assignments**
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| staff_id       | BIGINT          | No            | FK     | —           | → staff.id               |
| class_id       | BIGINT          | No            | FK     | —           | → classes.id            |
| section_id     | BIGINT          | Yes           | FK     | —           | → sections.id (null = whole class) |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by     | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**students**
| **Field**          | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|--------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                 | BIGINT          | No            | PK     | —           | Unique ID               |
| organization_id    | BIGINT          | No            | FK     | —           | → organizations.id       |
| user_id            | BIGINT          | Yes           | FK     | —           | → users.id (for Student login) |
| student_id         | VARCHAR(50)     | No            | UNIQUE | —           | Roll/ID (e.g. STU-2026-001) |
| name               | VARCHAR(255)    | No            | —      | —           | Student name             |
| dob                | DATE            | Yes           | —      | —           | Date of birth            |
| gender             | VARCHAR(20)     | Yes           | —      | —           | male, female, other      |
| address            | TEXT            | Yes           | —      | —           | Address                   |
| phone              | VARCHAR(50)     | Yes           | —      | —           | Phone                    |
| photo              | VARCHAR(255)    | Yes           | —      | —           | Photo file path          |
| previous_school    | VARCHAR(255)    | Yes           | —      | —           | Previous school name     |
| status             | VARCHAR(30)     | No            | —      | 'active'    | active, transferred, withdrawn |
| created_at         | TIMESTAMP       | No            | —      | CURRENT     | Insert time              |
| updated_at         | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by         | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by         | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**parents**
| **Field**          | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|--------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                 | BIGINT          | No            | PK     | —           | Unique ID               |
| organization_id    | BIGINT          | No            | FK     | —           | → organizations.id       |
| user_id            | BIGINT          | Yes           | FK     | —           | → users.id (for Parent login) |
| name               | VARCHAR(255)    | No            | —      | —           | Parent/guardian name    |
| phone              | VARCHAR(50)     | Yes           | —      | —           | Phone                   |
| email              | VARCHAR(255)    | Yes           | —      | —           | Email                   |
| address            | TEXT            | Yes           | —      | —           | Address                 |
| created_at         | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at         | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by         | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by         | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**student_parents**
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| student_id     | BIGINT          | No            | FK     | —           | → students.id           |
| parent_id      | BIGINT          | No            | FK     | —           | → parents.id            |
| relation       | VARCHAR(30)     | Yes           | —      | —           | father, mother, guardian |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by     | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**enrollments**
| **Field**             | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|-----------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                    | BIGINT          | No            | PK     | —           | Unique ID               |
| student_id            | BIGINT          | No            | FK     | —           | → students.id           |
| academic_session_id   | BIGINT          | No            | FK     | —           | → academic_sessions.id  |
| class_id              | BIGINT          | No            | FK     | —           | → classes.id            |
| section_id            | BIGINT          | No            | FK     | —           | → sections.id           |
| roll_number           | VARCHAR(20)     | Yes           | —      | —           | Roll number in class    |
| status                | VARCHAR(30)     | No            | —      | 'active'    | active, promoted, withdrawn |
| created_at            | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at            | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by            | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by            | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**periods**
| **Field**          | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|--------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                 | BIGINT          | No            | PK     | —           | Unique ID               |
| organization_id    | BIGINT          | No            | FK     | —           | → organizations.id       |
| name               | VARCHAR(100)    | No            | —      | —           | Period name (e.g. Period 1) |
| start_time         | TIME            | No            | —      | —           | Start time               |
| end_time           | TIME            | No            | —      | —           | End time                 |
| sort_order         | SMALLINT UNSIGNED | No          | —      | 0           | Display order            |
| created_at         | TIMESTAMP       | No            | —      | CURRENT     | Insert time              |
| updated_at         | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by         | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by         | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**timetable_entries**
| **Field**             | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|-----------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                    | BIGINT          | No            | PK     | —           | Unique ID               |
| academic_session_id   | BIGINT          | No            | FK     | —           | → academic_sessions.id  |
| class_id              | BIGINT          | No            | FK     | —           | → classes.id            |
| section_id            | BIGINT          | No            | FK     | —           | → sections.id           |
| period_id             | BIGINT          | No            | FK     | —           | → periods.id            |
| day_of_week           | TINYINT         | No            | —      | —           | 1=Mon … 7=Sun           |
| subject_id            | BIGINT          | No            | FK     | —           | → subjects.id           |
| staff_id              | BIGINT          | No            | FK     | —           | → staff.id              |
| created_at            | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at            | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by            | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by            | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |
| UNIQUE(academic_session_id, class_id, section_id, period_id, day_of_week) | — | — | — | — | One slot per class-section-period-day |

**student_attendance**
| **Field**       | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|-----------------|-----------------|---------------|--------|-------------|-------------------------|
| id              | BIGINT          | No            | PK     | —           | Unique ID               |
| enrollment_id   | BIGINT          | No            | FK     | —           | → enrollments.id       |
| date            | DATE            | No            | —      | —           | Attendance date         |
| status          | VARCHAR(20)     | No            | —      | —           | present, absent, late   |
| created_at      | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at      | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by      | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by      | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |
| UNIQUE(enrollment_id, date) | —       | —            | —      | —           | One record per student per day |

**staff_attendance**
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| staff_id       | BIGINT          | No            | FK     | —           | → staff.id              |
| date           | DATE            | No            | —      | —           | Attendance date         |
| status         | VARCHAR(20)     | No            | —      | —           | present, absent         |
| leave_type     | VARCHAR(50)     | Yes           | —      | —           | casual, sick (optional) |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by     | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |
| UNIQUE(staff_id, date) | —        | —            | —      | —           | One record per staff per day |

**exams**
| **Field**             | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|-----------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                    | BIGINT          | No            | PK     | —           | Unique ID               |
| academic_session_id   | BIGINT          | No            | FK     | —           | → academic_sessions.id  |
| name                  | VARCHAR(255)    | No            | —      | —           | Exam name (e.g. Final)  |
| exam_type            | VARCHAR(50)     | Yes           | —      | —           | half_yearly, final, etc. |
| start_date            | DATE            | Yes           | —      | —           | Exam start              |
| end_date              | DATE            | Yes           | —      | —           | Exam end                |
| created_at            | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at            | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by            | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by            | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**exam_classes** (FR-5.1: exam linked to class(es))
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| exam_id        | BIGINT          | No            | FK     | —           | → exams.id              |
| class_id       | BIGINT          | No            | FK     | —           | → classes.id            |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by     | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |
| UNIQUE(exam_id, class_id) | —     | —            | —      | —           | One row per exam-class  |

**exam_subjects**
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| exam_id        | BIGINT          | No            | FK     | —           | → exams.id              |
| subject_id     | BIGINT          | No            | FK     | —           | → subjects.id           |
| max_marks      | DECIMAL(8,2)    | No            | —      | —           | Max marks for this exam |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by     | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |
| UNIQUE(exam_id, subject_id) | —   | —            | —      | —           | One row per exam-subject |

**marks**
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| student_id     | BIGINT          | No            | FK     | —           | → students.id           |
| exam_id        | BIGINT          | No            | FK     | —           | → exams.id              |
| subject_id     | BIGINT          | No            | FK     | —           | → subjects.id           |
| marks_obtained | DECIMAL(8,2)    | Yes           | —      | —           | Marks (null = absent)   |
| status         | VARCHAR(20)     | Yes           | —      | —           | absent, exempt         |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by     | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |
| UNIQUE(student_id, exam_id, subject_id) | — | — | — | — | One mark per student-exam-subject |

**results**
| **Field**       | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|-----------------|-----------------|---------------|--------|-------------|-------------------------|
| id              | BIGINT          | No            | PK     | —           | Unique ID               |
| student_id      | BIGINT          | No            | FK     | —           | → students.id           |
| exam_id         | BIGINT          | No            | FK     | —           | → exams.id              |
| total_marks     | DECIMAL(10,2)   | Yes           | —      | —           | Total marks             |
| percentage      | DECIMAL(5,2)    | Yes           | —      | —           | Percentage              |
| grade           | VARCHAR(10)     | Yes           | —      | —           | Grade from scale        |
| gpa             | DECIMAL(4,2)    | Yes           | —      | —           | GPA (optional)          |
| is_published    | BOOLEAN         | No            | —      | false       | Published to student/parent |
| created_at      | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at      | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by      | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by      | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |
| UNIQUE(student_id, exam_id) | —   | —            | —      | —           | One result per student-exam |

**fee_heads**
| **Field**          | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|--------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                 | BIGINT          | No            | PK     | —           | Unique ID               |
| organization_id    | BIGINT          | No            | FK     | —           | → organizations.id       |
| name               | VARCHAR(255)    | No            | —      | —           | Fee type (Tuition, etc.) |
| code               | VARCHAR(50)     | Yes           | —      | —           | Fee head code           |
| created_at         | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at         | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by         | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by         | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**fee_structures**
| **Field**             | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|-----------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                    | BIGINT          | No            | PK     | —           | Unique ID               |
| fee_head_id           | BIGINT          | No            | FK     | —           | → fee_heads.id          |
| class_id              | BIGINT          | No            | FK     | —           | → classes.id            |
| academic_session_id   | BIGINT          | No            | FK     | —           | → academic_sessions.id  |
| amount                | DECIMAL(12,2)   | No            | —      | —           | Amount                  |
| frequency             | VARCHAR(30)     | No            | —      | —           | monthly, term, annual   |
| created_at            | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at            | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by            | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by            | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |
| UNIQUE(fee_head_id, class_id, academic_session_id) | — | — | — | — | One amount per head-class-session |

**invoices**
| **Field**             | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|-----------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                    | BIGINT          | No            | PK     | —           | Unique ID               |
| student_id             | BIGINT          | No            | FK     | —           | → students.id           |
| academic_session_id   | BIGINT          | No            | FK     | —           | → academic_sessions.id  |
| invoice_number        | VARCHAR(50)     | No            | UNIQUE | —           | Invoice number          |
| period_label          | VARCHAR(50)     | No            | —      | —           | e.g. 2026-01, Term 1    |
| total_amount          | DECIMAL(12,2)   | No            | —      | —           | Total due               |
| due_date              | DATE            | Yes           | —      | —           | Due date                |
| status                 | VARCHAR(30)     | No            | —      | 'issued'    | draft, issued, paid, partial |
| created_at            | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at            | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by            | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by            | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**invoice_items** (optional – fee breakdown per invoice)
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| invoice_id     | BIGINT          | No            | FK     | —           | → invoices.id           |
| fee_head_id    | BIGINT          | No            | FK     | —           | → fee_heads.id          |
| amount         | DECIMAL(12,2)   | No            | —      | —           | Amount for this head    |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by     | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**payments**
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| invoice_id     | BIGINT          | No            | FK     | —           | → invoices.id           |
| amount         | DECIMAL(12,2)   | No            | —      | —           | Payment amount          |
| payment_date   | DATE            | No            | —      | —           | Date of payment         |
| mode           | VARCHAR(30)     | No            | —      | —           | cash, bank              |
| reference      | VARCHAR(100)    | Yes           | —      | —           | Cheque/reference no     |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by     | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**notices**
| **Field**          | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|--------------------|-----------------|---------------|--------|-------------|-------------------------|
| id                 | BIGINT          | No            | PK     | —           | Unique ID               |
| organization_id    | BIGINT          | No            | FK     | —           | → organizations.id       |
| user_id            | BIGINT          | Yes           | FK     | —           | → users.id (author)     |
| title              | VARCHAR(255)    | No            | —      | —           | Notice title             |
| body               | TEXT            | Yes           | —      | —           | Notice body              |
| date               | DATE            | No            | —      | —           | Notice date              |
| created_at         | TIMESTAMP       | No            | —      | CURRENT     | Insert time              |
| updated_at         | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by         | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by         | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**notice_targets**
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| notice_id      | BIGINT          | No            | FK     | —           | → notices.id            |
| class_id       | BIGINT          | Yes           | FK     | —           | → classes.id (null = all) |
| section_id     | BIGINT          | Yes           | FK     | —           | → sections.id (null = all in class) |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by     | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**transfer_certificates** (FR-9.1: TC issuance – unique number, audit)
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| student_id     | BIGINT          | No            | FK     | —           | → students.id           |
| tc_number      | VARCHAR(50)     | No            | UNIQUE | —           | Unique TC number        |
| date_of_issue  | DATE            | No            | —      | —           | Date of issue           |
| reason         | VARCHAR(255)    | Yes           | —      | —           | Reason for leaving      |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | Insert time             |
| updated_at     | TIMESTAMP       | No            | —      | CURRENT     | Last update time        |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (who created) |
| updated_by     | BIGINT          | Yes           | FK     | —           | → users.id (who last updated) |

**audit_logs** (created_at and created_by only; no updated_at/updated_by – log rows are immutable)
| **Field**      | **Type**        | **Nullable** | **Key** | **Default** | **Description**        |
|----------------|-----------------|---------------|--------|-------------|-------------------------|
| id             | BIGINT          | No            | PK     | —           | Unique ID               |
| user_id        | BIGINT          | Yes           | FK     | —           | → users.id (actor; null = system) |
| action         | VARCHAR(50)     | No            | —      | —           | CREATE, UPDATE, DELETE, PUBLISH |
| section        | VARCHAR(100)    | No            | —      | —           | Module (marks, fees, users…) |
| table_name     | VARCHAR(100)    | No            | —      | —           | Affected table          |
| record_id      | VARCHAR(50)     | Yes           | —      | —           | Affected row ID         |
| old_values     | JSON/TEXT       | Yes           | —      | —           | Previous values         |
| new_values     | JSON/TEXT       | Yes           | —      | —           | New values              |
| ip_address     | VARCHAR(45)     | Yes           | —      | —           | Client IP               |
| user_agent     | VARCHAR(500)    | Yes           | —      | —           | Browser/client          |
| created_at     | TIMESTAMP       | No            | —      | CURRENT     | When action occurred    |
| created_by     | BIGINT          | Yes           | FK     | —           | → users.id (same as user_id; optional for consistency) |

---

### 6.6 Sensitive Section Audit Log

#### 6.6.1 Purpose
Log all changes to sensitive data for accountability, compliance, and troubleshooting. Audit logs are append-only and must not be editable or deletable by normal users.

#### 6.6.2 Sensitive Sections (Must Be Logged)
| **Section**       | **Actions to Log**                         | **Reason**                    |
|-------------------|--------------------------------------------|-------------------------------|
| **Marks**         | Create, Update, Delete                     | Academic integrity            |
| **Results**       | Publish, Unpublish, Edit                   | Academic integrity            |
| **Fees/Payments** | Create invoice, Record payment, Edit, Delete | Financial integrity        |
| **User/RBAC**     | Create user, Edit user, Deactivate, Role change | Access control             |
| **Student data**  | Create, Update (key fields), Status change | Student privacy               |
| **Enrollment**    | Enroll, Transfer, Promote, Withdraw        | Academic records              |
| **Certificates**  | Generate TC, Generate testimonial          | Document authenticity         |
| **Organization**  | Update school profile, settings            | System configuration          |

#### 6.6.3 Audit Log Table Structure
| **Column**      | **Type**        | **Purpose**                                  |
|-----------------|-----------------|----------------------------------------------|
| `id`            | BIGINT (PK)     | Unique log entry ID                          |
| `user_id`       | BIGINT (FK)     | User who performed the action                |
| `action`        | VARCHAR(50)     | CREATE, UPDATE, DELETE, PUBLISH, etc.        |
| `section`       | VARCHAR(100)    | Module/section (e.g., marks, fees, users)    |
| `table_name`    | VARCHAR(100)    | Affected table                               |
| `record_id`     | VARCHAR(50)     | Affected row ID                              |
| `old_values`    | JSON/TEXT       | Previous values (for UPDATE/DELETE)          |
| `new_values`    | JSON/TEXT       | New values (for CREATE/UPDATE)               |
| `ip_address`    | VARCHAR(45)     | Client IP                                    |
| `user_agent`    | VARCHAR(500)    | Browser/client (optional)                    |
| `created_at`    | TIMESTAMP       | When the action occurred                     |

- **Note:** `audit_logs` has `created_at` only (no `updated_at`) because log entries are immutable.
- **Retention:** Keep audit logs for at least 1 year; archive older logs if needed.
- **Access:** Only Admin can view audit logs; logs cannot be modified or deleted through the application.

#### 6.6.4 What to Log
- **CREATE:** Log `new_values` (relevant fields only; exclude passwords).
- **UPDATE:** Log `old_values` and `new_values` for changed columns only.
- **DELETE:** Log `old_values` (full row or key fields).
- **Sensitive fields:** Never log passwords, tokens, or raw payment card data.

#### 6.6.5 Implementation
- Use triggers, middleware, or model events to write to `audit_logs` on sensitive operations.
- Ensure logging does not block the main transaction; consider async/queue for high-volume systems.
- For simple systems, synchronous logging is acceptable.

---

## 7. CONSTRAINTS AND ASSUMPTIONS

### 7.1 Constraints
- **Single school:** No multi-branch or multi-campus.
- **Budget:** Low-cost hosting and no expensive third-party services required.
- **Users:** Basic computer literacy; school has at least one person who can manage Admin.
- **Integrations:** Optional SMS/email; no mandatory payment gateway.

### 7.2 Assumptions
1. One active academic year at a time.
2. Timetable and fee structure are defined once per session (or with rare changes).
3. Attendance and marks are entered by teachers/admin; no biometric/automated capture.
4. Fee collection is done at school (cash/bank); online payment is optional.
5. Local data protection and school regulations apply; system will be used accordingly.

---

## 8. TESTING AND DEPLOYMENT

### 8.1 Testing
- **Functional:** All main flows (setup, admission, attendance, marks, fees, reports) tested.
- **Roles:** Each role tested for allowed and disallowed access.
- **Data:** Sample data for 2–3 classes, multiple students, fees, and exams.
- **Browsers:** Test on at least Chrome and one other browser.

### 8.2 Deployment
- **Environment:** One production environment (staging optional).
- **Steps:** Deploy code, run migrations, configure .env (DB, app URL), set file permissions, enable SSL.
- **Go-live:** Backup before go-live; train Admin and 1–2 power users (2–4 hours).

### 8.3 Training and Documentation
- **Admin:** Setup, user creation, academic setup, year-end (2–3 hours).
- **Teachers:** Attendance, marks entry, timetable view (1–2 hours).
- **Accountant:** Fee setup, invoicing, payment, receipts (1–2 hours).
- **Students/Parents:** Optional brief guide or in-app hints for login and viewing dashboard (attendance, fees, results, notices).
- **Documentation:** Short user guide (PDF or online) per role; in-app help optional.

---

## SUMMARY: SIMPLE VS FULL SRS

| **Area**            | **Full SRS (Enterprise)**     | **Simple Small School**           |
|---------------------|-------------------------------|-----------------------------------|
| Campuses            | Multi-campus                  | Single school                     |
| Roles               | 15+ with custom permissions   | 5 fixed roles                     |
| Admissions          | Circulars, tests, merit list   | Direct add + enroll               |
| Accounting          | Full COA, GL, vouchers         | Fee ledger only                   |
| HR/Payroll          | Full payroll                  | Staff list + optional leave       |
| Inventory/Assets    | Yes                           | No                                |
| Library/Transport   | Yes                           | No                                |
| Certificates        | Full document vault           | TC + testimonial only             |
| Integrations        | Payment, SMS, WhatsApp, etc.  | Optional email/SMS                |
| Audit logging       | Full audit trail              | Sensitive sections only (6.6)     |
| Scale               | 100–10,000+ students          | 50–500 students                   |

---

### Document review (2026-02-07)
- Schema aligned with functional requirements: added **students.user_id** and **parents.user_id** for Student/Parent login; **class_subjects** for FR-1.3 (subjects assigned to classes); **exam_classes** for FR-5.1 (exam linked to class(es)); **transfer_certificates** for TC unique number and audit.
- **user_roles:** Enforced one role per user via UNIQUE(user_id) per FR-1.2.
- **6.5.4:** Removed duplicate `exam_classes` from migration list. **6.2:** Added user-link and exam–class relationships.
- **Optional (not required for v1):** FR-1.3 “Academic calendar: holidays and key dates” may use a simple `holidays` or `calendar_events` table if implemented. Testimonial (FR-9.1) can be generated on demand without a separate table; add a `testimonials` issuance table only if unique numbering/audit is needed for testimonials.

---

**Document End**

*This SRS is intended for a simple, small school. The full SRS_Complete.md can be used when scaling to a larger or multi-branch institution.*
