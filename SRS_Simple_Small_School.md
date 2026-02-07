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
  4. No multi-campus; single school only.

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
  1. Create users and assign one primary role per user.
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
  4. Teacher or Exam-in-charge role can enter; optional approval step (e.g., lock after verification).
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
- **People:** Student, Parent/Guardian, Staff, User (login).
- **Roles:** Admin, Teacher, Accountant, Student, Parent.
- **Academic operations:** Enrollment, Timetable, Attendance (student, staff).
- **Exams:** Exam, ExamSubject (max marks), Marks (student, exam, subject, marks).
- **Results:** Result summary, published flag.
- **Fees:** FeeHead, FeeStructure (class-wise), Invoice, Payment, Receipt.
- **Communication:** Notice (with target class/section).
- **Optional:** Certificate (TC/Testimonial template and generated docs).

### 6.2 Key Relationships
- Student → Parent (one or two); Student → Enrollment (per session) → Class, Section.
- Teacher → Timetable entries (Class, Section, Subject).
- Invoice → Student, FeeStructure; Payment → Invoice.
- Marks → Student, Exam, Subject.

### 6.3 Data Validation
- Student ID and user login unique; marks between 0 and max marks; fee amounts non-negative; required fields enforced (e.g., name, DOB, class).

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
| Scale               | 100–10,000+ students          | 50–500 students                   |

---

**Document End**

*This SRS is intended for a simple, small school. The full SRS_Complete.md can be used when scaling to a larger or multi-branch institution.*
