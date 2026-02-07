# SOFTWARE REQUIREMENTS SPECIFICATION (SRS)
## School Management System (SMS/ERP)

---

## DOCUMENT CONTROL

| **Item** | **Details** |
|----------|-------------|
| **Document Title** | Software Requirements Specification - School Management System |
| **Document Version** | 1.1 |
| **Date** | 2026-01-22 |
| **Status** | Complete Draft (Pending Approval) |
| **Prepared By** | Development Team |
| **Approved By** | Pending |
| **Classification** | Internal Use |

### Document History

| **Version** | **Date** | **Author** | **Description** |
|-------------|----------|------------|-----------------|
| 1.0 | 2025-01-27 | Development Team | Initial complete SRS document |
| 1.1 | 2026-01-22 | Development Team | Normalize status/date, remove placeholders, ASCII cleanup |

---

## TABLE OF CONTENTS

1. [Introduction](#1-introduction)
2. [System Overview](#2-system-overview)
3. [Functional Requirements](#3-functional-requirements)
4. [Non-Functional Requirements](#4-non-functional-requirements)
5. [System Architecture](#5-system-architecture)
6. [Data Requirements](#6-data-requirements)
7. [Interface Requirements](#7-interface-requirements)
8. [Constraints and Assumptions](#8-constraints-and-assumptions)
9. [Dependencies](#9-dependencies)
10. [Risk Analysis](#10-risk-analysis)
11. [Testing Requirements](#11-testing-requirements)
12. [Deployment Requirements](#12-deployment-requirements)
13. [Training and Documentation](#13-training-and-documentation)
14. [Appendices](#14-appendices)

---

## 1. INTRODUCTION

### 1.1 Purpose
This Software Requirements Specification (SRS) document provides a comprehensive description of the School Management System (SMS/ERP). It details the functional and non-functional requirements, system architecture, and implementation specifications necessary for the development team to build a complete, enterprise-grade school management solution.

### 1.2 Scope
The School Management System is a comprehensive ERP solution designed to manage all aspects of educational institution operations including:

**In Scope:**
- Academic operations (admissions, enrollment, timetable, attendance, exams, results)
- Financial management (fees, full accounting, payroll)
- Human resources and payroll
- Inventory, procurement, and asset management
- Library, transport, and hostel management
- Communication and messaging
- Document and certificate management
- Reporting and analytics
- Multi-campus/branch support
- Role-based access control and security
- Year-end closing and archival

**Out of Scope (Phase 1):**
- Mobile native applications (web-responsive interface provided)
- Advanced LMS features (basic assignment/homework included)
- Video conferencing integration
- Advanced analytics/BI tools (standard reports included)
- Third-party student information system migration tools (manual import available)

### 1.3 Definitions, Acronyms, and Abbreviations

| **Term** | **Definition** |
|----------|----------------|
| **SMS** | School Management System |
| **ERP** | Enterprise Resource Planning |
| **RBAC** | Role-Based Access Control |
| **COA** | Chart of Accounts |
| **GL** | General Ledger |
| **JV** | Journal Voucher |
| **PV** | Payment Voucher |
| **RV** | Receipt Voucher |
| **CV** | Contra Voucher |
| **PR** | Purchase Requisition |
| **PO** | Purchase Order |
| **GRN** | Goods Receive Note |
| **TC** | Transfer Certificate |
| **EIIN** | Educational Institution Identification Number |
| **GPA** | Grade Point Average |
| **CQ** | Creative Question |
| **MCQ** | Multiple Choice Question |
| **LMS** | Learning Management System |
| **POS** | Point of Sale |
| **API** | Application Programming Interface |
| **UI** | User Interface |
| **UX** | User Experience |
| **WCAG** | Web Content Accessibility Guidelines |
| **GDPR** | General Data Protection Regulation |

### 1.4 References
- IEEE 830-1998: Recommended Practice for Software Requirements Specifications
- Educational data protection regulations (local jurisdiction)
- Financial reporting standards (local accounting standards)
- Web accessibility standards (WCAG 2.1 Level AA)

### 1.5 Overview
This document is organized into sections covering system overview, detailed functional requirements, non-functional requirements, architecture, data models, interfaces, constraints, risks, testing, deployment, and training requirements.

---

## 2. SYSTEM OVERVIEW

### 2.1 System Purpose
The School Management System aims to digitize and automate all operational processes of educational institutions, providing:
- Centralized data management
- Streamlined academic workflows
- Comprehensive financial management
- Efficient resource management
- Enhanced communication
- Data-driven decision making
- Regulatory compliance

### 2.2 System Objectives
1. **Operational Efficiency**: Reduce manual paperwork by 90%
2. **Data Accuracy**: Eliminate data entry errors through automation
3. **Accessibility**: Provide 24/7 access to students, parents, and staff
4. **Financial Transparency**: Real-time financial reporting and tracking
5. **Compliance**: Meet educational and financial regulatory requirements
6. **Scalability**: Support institutions from 100 to 10,000+ students
7. **Security**: Protect sensitive student and financial data

### 2.3 System Context
The system interfaces with:
- **Users**: Super Admin, Principal, Academic Admin, Exam Controller, HR, Accountant, Cashier, Librarian, Transport Manager, Hostel Manager, Front Desk, Security, Teachers, Students, Parents
- **External Systems**: Payment gateways, SMS/Email providers, WhatsApp API, Biometric devices, Government reporting systems (optional)
- **Infrastructure**: Web servers, Database servers, File storage, Backup systems

### 2.4 Stakeholders

| **Stakeholder** | **Role** | **Interest** |
|-----------------|----------|--------------|
| School Administration | Primary User | System efficiency, compliance |
| Teachers | Primary User | Easy-to-use interface, time-saving |
| Students | Primary User | Access to academic information |
| Parents | Primary User | Real-time updates on children |
| IT Department | Technical Support | System maintainability, security |
| Finance Department | Primary User | Accurate financial reporting |
| Regulatory Bodies | External | Compliance, data reporting |
| Development Team | Implementation | Clear requirements, feasibility |

---

## 3. FUNCTIONAL REQUIREMENTS

### 3.1 Master Setup and Configuration

#### FR-1.1: Organization Setup
**Priority**: High  
**Description**: System shall allow Super Admin to configure organization profile.

**Requirements**:
1. Create/Edit school/institute profile with:
   - Name, code/EIIN, logo, address, contact information
   - Legal entity information
   - Tax identification numbers
2. Define multiple campuses/branches (if applicable)
3. Configure system-wide settings:
   - Timezone, currency, date formats, numbering formats
   - Academic year structure
   - Language preferences (multi-language support)

**Detailed Step-by-Step Process**:

**Step 1: Access Organization Setup**
1. Login as Super Admin
2. Navigate to: Settings -> Organization -> Profile
3. Click "Create New" or "Edit Existing" button

**Step 2: Enter Basic Information**
1. Enter School/Institute Name (required, max 200 characters)
2. Enter School Code/EIIN (required, unique, alphanumeric)
3. Upload School Logo (optional, max 2MB, formats: JPG/PNG)
4. Enter Complete Address:
   - Street address
   - City
   - State/Province
   - Postal/ZIP code
   - Country
5. Enter Contact Information:
   - Primary phone number
   - Secondary phone number (optional)
   - Email address
   - Website URL (optional)
6. Click "Save" to proceed

**Step 3: Enter Legal Information**
1. Enter Legal Entity Name (if different from school name)
2. Enter Registration Number
3. Enter Tax Identification Number (TIN/VAT)
4. Enter License Number (if applicable)
5. Enter Registration Date
6. Upload Registration Certificate (optional, PDF, max 5MB)
7. Click "Save"

**Step 4: Configure Campuses/Branches (if multi-campus)**
1. Click "Add Campus/Branch" button
2. Enter Campus Name
3. Enter Campus Code (unique identifier)
4. Enter Campus Address
5. Enter Campus Contact Information
6. Select Data Sharing Options:
   - Shared data (students can access all campuses)
   - Isolated data (separate data per campus)
7. Set Default Campus (if applicable)
8. Click "Save Campus"
9. Repeat for additional campuses

**Step 5: Configure System-Wide Settings**
1. Navigate to: Settings -> System Configuration
2. Set Timezone:
   - Select from dropdown list
   - Verify time display
3. Set Currency:
   - Select primary currency
   - Set currency symbol position (before/after)
   - Set decimal places (default: 2)
4. Configure Date Formats:
   - Select date format (DD/MM/YYYY, MM/DD/YYYY, YYYY-MM-DD)
   - Select time format (12-hour/24-hour)
   - Set first day of week
5. Configure Numbering Formats:
   - Student ID format (e.g., STU-YYYY-####)
   - Invoice number format (e.g., INV-YYYY-####)
   - Receipt number format (e.g., RCP-YYYY-####)
6. Set Academic Year Structure:
   - Select year format (Calendar year / Academic year)
   - Set academic year start month
   - Set academic year end month
7. Configure Language Preferences:
   - Select primary language
   - Enable additional languages (if multi-language support)
   - Set default language for new users
8. Click "Save All Settings"

**Step 6: Verify Configuration**
1. Review all entered information
2. Test system-wide settings:
   - Verify date/time display
   - Verify currency display
   - Verify number formats
3. If multi-campus: Test data isolation/sharing
4. Click "Finalize Setup"

**Acceptance Criteria**:
- Organization profile can be created and updated
- Multi-campus data isolation and sharing can be configured
- All system-wide settings are applied consistently

#### FR-1.2: Integration Configuration
**Priority**: High  
**Description**: System shall support integration with external services.

**Requirements**:
1. Email server configuration (SMTP settings)
2. SMS gateway integration (API configuration)
3. WhatsApp provider integration (optional)
4. Payment gateway integration:
   - SSLCommerz, bKash, Nagad, Card payments
   - Transaction limits and security settings
5. Biometric/attendance device integration (optional):
   - Device model compatibility
   - Data sync frequency
   - Offline mode handling

**Detailed Step-by-Step Process**:

**Step 1: Access Integration Settings**
1. Login as Super Admin
2. Navigate to: Settings -> Integrations
3. View list of available integrations

**Step 2: Configure Email Server (SMTP)**
1. Click "Email Configuration" or "SMTP Settings"
2. Select Email Provider:
   - Gmail
   - Outlook/Office 365
   - Custom SMTP
   - Other (specify)
3. Enter SMTP Configuration:
   - SMTP Host (e.g., smtp.gmail.com)
   - SMTP Port (e.g., 587 for TLS, 465 for SSL)
   - Encryption Type (None/TLS/SSL)
   - Username (email address)
   - Password (or app password)
4. Configure Sender Information:
   - From Name (e.g., "ABC School")
   - From Email Address
   - Reply-to Email (optional)
5. Click "Test Connection" button:
   - System sends test email
   - Verify email received
6. If successful, click "Save"
7. If failed, check error message and retry



**Step 4: Verify All Integrations**
1. Review integration status dashboard
2. Check status indicators (Green = Active, Red = Failed)
3. View last successful connection time
4. Review error logs (if any)
5. Test each integration individually
6. Document any issues

**Acceptance Criteria**:
- All integrations can be configured through admin panel
- Integration status can be tested and verified
- Error handling for integration failures is implemented

#### FR-1.3: Role-Based Access Control (RBAC)
**Priority**: High  
**Description**: System shall implement comprehensive RBAC.

**Roles Defined**:
- Super Admin: Full system access
- Principal: Academic and financial overview, approvals
- Academic Admin: Academic operations management
- Exam Controller: Exam and result management
- HR: Staff and payroll management
- Accountant: Financial operations, accounting
- Cashier: Fee collection, receipts
- Librarian: Library operations
- Transport Manager: Transport operations
- Hostel Manager: Hostel operations
- Front Desk: Admissions, visitor management
- Security: Gate pass, visitor log
- Teacher: Class management, attendance, marks entry
- Student: Personal information, assignments, results
- Parent: Child's information, fee payment, communication

**Requirements**:
1. Create custom roles with granular permissions
2. Assign multiple roles to users
3. Permission inheritance and override
4. Audit trail for permission changes

**Detailed Step-by-Step Process**:

**Step 1: Access Role Management**
1. Login as Super Admin
2. Navigate to: Settings -> Users & Roles -> Roles
3. View existing roles list

**Step 2: Create Custom Role**
1. Click "Create New Role" button
2. Enter Role Details:
   - Role Name (e.g., "Assistant Academic Admin")
   - Role Code (unique identifier)
   - Description
   - Based on (select existing role to inherit from, optional)
3. Set Role Permissions:
   - Navigate through module tree
   - For each module, set permissions:
     * View: Yes/No
     * Create: Yes/No
     * Edit: Yes/No
     * Delete: Yes/No
     * Approve: Yes/No (if applicable)
   - Modules to configure:
     * Academic Operations
     * Admissions
     * Attendance
     * Exams & Results
     * Fees & Finance
     * Accounting
     * HR & Payroll
     * Inventory
     * Library
     * Transport
     * Hostel
     * Reports
     * Settings
4. Set Data Access Restrictions:
   - All Data: Yes/No
   - Own Data Only: Yes/No
   - Assigned Classes Only: Yes/No
   - Department Only: Yes/No
5. Set Approval Limits (if applicable):
   - Maximum amount for approval
   - Require second approval above limit
6. Save Role

**Step 3: Assign Roles to Users**
1. Navigate to: Settings -> Users & Roles -> Users
2. Select User to assign role
3. Click "Edit Roles"
4. Assign Roles:
   - Check roles to assign
   - Uncheck roles to remove
   - User can have multiple roles
5. Set Primary Role (if multiple roles):
   - Select primary role (default interface)
6. Save User Roles
7. System Actions:
   - Updates user permissions
   - Logs role assignment
   - User must re-login for changes to take effect

**Step 4: Configure Permission Inheritance**
1. Navigate to: Settings -> Users & Roles -> Permission Inheritance
2. View role hierarchy
3. Set Inheritance Rules:
   - Child roles inherit from parent roles
   - Can override specific permissions
4. Configure Override:
   - Select role
   - Select permission to override
   - Set override value
   - Save override

**Step 5: Test Role Permissions**
1. Login as test user with assigned role
2. Test Access:
   - Try accessing each module
   - Verify allowed access works
   - Verify restricted access is blocked
3. Test Actions:
   - Try create/edit/delete operations
   - Verify permissions are enforced
4. Document any issues

**Step 6: Audit Permission Changes**
1. View Permission Change Log:
   - Navigate to: Settings -> Audit Logs -> Permission Changes
2. View Log Entries:
   - Date and time
   - User who made change
   - Role affected
   - Permission changed
   - Old value
   - New value
3. Export Log (if needed):
   - Filter by date range
   - Export to Excel/PDF

**Acceptance Criteria**:
- All roles have appropriate access levels
- Permission changes are logged
- Users can only access authorized modules

#### FR-1.4: System Configuration
**Priority**: Medium  
**Description**: System shall allow configuration of operational parameters.

**Requirements**:
1. Audit log configuration (retention period, log levels)
2. Approval workflow engine configuration
3. Data retention policies
4. Backup configuration:
   - Daily database backups
   - Weekly full backups
   - Offsite backup (optional)
5. Notification preferences (default settings)

**Detailed Step-by-Step Process**:

**Step 1: Access System Configuration**
1. Login as Super Admin
2. Navigate to: Settings -> System Configuration
3. View configuration categories

**Step 2: Configure Audit Logs**
1. Navigate to: Settings -> System Configuration -> Audit Logs
2. Set Log Retention Period:
   - Application Logs: 90 days (default)
   - Audit Logs: 365 days (default)
   - Error Logs: 180 days (default)
   - Custom retention period
3. Configure Log Levels:
   - DEBUG: Enable/Disable
   - INFO: Enable/Disable
   - WARN: Enable/Disable
   - ERROR: Enable/Disable
   - FATAL: Enable/Disable
4. Set Log Rotation:
   - Daily rotation: Yes/No
   - Maximum log file size
   - Archive old logs: Yes/No
5. Configure Log Storage:
   - Local storage path
   - Cloud storage (optional)
6. Save Audit Log Settings

**Step 3: Configure Approval Workflow Engine**
1. Navigate to: Settings -> System Configuration -> Approval Workflows
2. Create Approval Workflow:
   - Workflow Name (e.g., "Fee Waiver Approval")
   - Workflow Type:
     * Single Level (one approver)
     * Multi-Level (multiple approvers)
     * Parallel (multiple approvers, any can approve)
3. Configure Approval Levels:
   - Level 1:
     * Approver Role (e.g., "Principal")
     * Approval Limit (e.g., up to 10,000)
     * Required: Yes/No
   - Level 2 (if multi-level):
     * Approver Role (e.g., "Super Admin")
     * Approval Limit (e.g., above 10,000)
     * Required: Yes/No
4. Set Workflow Rules:
   - Auto-approve if within limit: Yes/No
   - Escalate if not approved in X days
   - Notify on approval/rejection
5. Assign Workflow to Modules:
   - Select modules that use this workflow
   - Save assignment
6. Save Workflow Configuration

**Step 4: Configure Data Retention Policies**
1. Navigate to: Settings -> System Configuration -> Data Retention
2. Set Retention Periods:
   - Active Student Data: Indefinite
   - Archived Student Data: 10 years
   - Financial Records: 7 years
   - Audit Logs: 1 year
   - Application Logs: 90 days
   - Backup Files: 30 days (daily), 1 year (weekly)
3. Configure Auto-Archival:
   - Enable auto-archival: Yes/No
   - Archive data older than: (specify period)
   - Archive location
4. Set Data Deletion Rules:
   - Auto-delete after retention: Yes/No
   - Require approval before deletion: Yes/No
5. Save Retention Policies

**Step 5: Configure Backup Settings**
1. Navigate to: Settings -> System Configuration -> Backup Settings
2. Configure Daily Backups:
   - Enable daily backup: Yes/No
   - Backup time (e.g., 2:00 AM)
   - Backup type: Incremental
   - Retention: 30 days
   - Storage location: Local/Cloud
3. Configure Weekly Full Backups:
   - Enable weekly backup: Yes/No
   - Backup day (e.g., Sunday)
   - Backup time (e.g., 1:00 AM)
   - Backup type: Full
   - Retention: 1 year
   - Storage location: Local/Cloud
4. Configure Offsite Backup (Optional):
   - Enable offsite backup: Yes/No
   - Cloud provider: AWS/Azure/GCP/Other
   - Configure cloud credentials
   - Set backup frequency
   - Set encryption: Yes/No
5. Configure Backup Verification:
   - Verify backup after creation: Yes/No
   - Test restore monthly: Yes/No
   - Alert on backup failure: Yes/No
6. Set Backup Notifications:
   - Email on success: Yes/No
   - Email on failure: Yes/No
   - Recipient email addresses
7. Test Backup:
   - Click "Test Backup Now"
   - Verify backup created successfully
   - Verify backup file integrity
8. Save Backup Configuration

**Step 6: Configure Notification Preferences**
1. Navigate to: Settings -> System Configuration -> Notifications
2. Set Default Notification Methods:
   - Email: Enable/Disable
   - SMS: Enable/Disable
3. Configure Notification Types:
   - Attendance Notifications:
     * Absence: Email/SMS/Both
     * Late: Email/SMS/Both
   - Fee Notifications:
     * Invoice: Email/SMS/Both
     * Due Reminder: Email/SMS/Both
   - Exam Notifications:
     * Result Published: Email/SMS/Both
     * Exam Schedule: Email/SMS/Both
   - Other Notifications:
     * Configure each type
4. Set Notification Timing:
   - Immediate: Yes/No
   - Scheduled (specify time)
   - Batch (daily summary)
5. Configure Notification Templates:
   - Edit email templates
   - Edit SMS templates
   - Preview templates
6. Save Notification Settings

**Step 7: Verify All Configurations**
1. Review all configuration settings
2. Test each configuration:
   - Test audit log creation
   - Test approval workflow
   - Test backup process
   - Test notification sending
3. Document configuration
4. Save all changes

**Acceptance Criteria**:
- All configurations are accessible to Super Admin
- Configuration changes are logged
- Backup processes run automatically

---

### 3.2 Academic Operations

#### FR-2.1: Academic Year/Session Setup
**Priority**: High  
**Description**: System shall manage academic sessions and structure.

**Requirements**:
1. Create academic sessions (e.g., 2026, 2026-2027)
2. Setup academic structure:
   - Classes/Grades -> Sections -> Groups/Streams
   - Subject combinations
3. Setup subjects:
   - Compulsory and optional subjects
   - Components (CQ, MCQ, Practical)
   - Marks distribution rules
   - Pass marks per subject
4. Setup departments:
   - Academic departments (Science, Arts, Commerce, etc.)
   - Staff departments
5. Configure grading system:
   - Marks to grade conversion
   - GPA calculation rules
   - Optional subject rules
6. Setup academic calendar:
   - Holidays and events
   - Working days
   - Bell schedule/periods

**Detailed Step-by-Step Process**:

**Step 1: Create Academic Session**
1. Login as Academic Admin
2. Navigate to: Academic -> Sessions -> Create New
3. Enter Session Details:
   - Session Name (e.g., "2026" or "2026-2027")
   - Start Date
   - End Date
   - Session Type:
     * Calendar Year
     * Academic Year
   - Status: Active/Inactive
4. Set Session as Current:
   - Check "Set as Current Session" if this is the active session
   - Only one session can be current at a time
5. Save Session
6. System Actions:
   - Creates session record
   - Sets up session structure
   - Makes session available for use

**Step 2: Setup Academic Structure - Classes**
1. Navigate to: Academic -> Structure -> Classes
2. Create Class:
   - Click "Add New Class"
   - Enter Class Name (e.g., "Class 1", "Grade 1")
   - Enter Class Code (e.g., "C1", "G1")
   - Enter Class Order (for sorting)
   - Select Academic Session
   - Set Class Level (if hierarchical)
3. Save Class
4. Repeat for all classes
5. Organize Classes:
   - Drag and drop to reorder
   - Set class hierarchy if needed

**Step 3: Setup Sections**
1. Navigate to: Academic -> Structure -> Sections
2. For each Class, create Sections:
   - Select Class
   - Click "Add Section"
   - Enter Section Name (e.g., "A", "B", "Science", "Arts")
   - Enter Section Code
   - Set Maximum Capacity (optional)
   - Set Section Teacher (optional)
3. Save Section
4. Repeat for all classes

**Step 4: Setup Groups/Streams**
1. Navigate to: Academic -> Structure -> Groups
2. For each Class/Section, create Groups:
   - Select Class and Section
   - Click "Add Group"
   - Enter Group Name (e.g., "Science Group", "Arts Group")
   - Enter Group Code
3. Configure Subject Combinations:
   - Select subjects for this group
   - Set as default combination
4. Save Group
5. Repeat for all classes that have groups

**Step 5: Setup Subjects**
1. Navigate to: Academic -> Subjects -> Create New
2. Enter Subject Details:
   - Subject Name (e.g., "Mathematics", "English")
   - Subject Code (e.g., "MATH", "ENG")
   - Subject Type:
     * Compulsory
     * Optional
     * Elective
   - Subject Category:
     * Core
     * Language
     * Science
     * Arts
     * Other
3. Configure Subject Components:
   - Add Component:
     * Component Name (e.g., "CQ", "MCQ", "Practical")
     * Component Code
     * Maximum Marks
     * Weightage (percentage)
   - Repeat for all components
   - Total must equal 100%
4. Set Marks Distribution:
   - Total Marks for Subject
   - Pass Marks
   - Component-wise pass marks (if applicable)
5. Assign Subject to Classes:
   - Select classes where subject is taught
   - Set as compulsory/optional for each class
6. Assign Teachers (optional):
   - Select default teacher(s) for subject
7. Save Subject
8. Repeat for all subjects

**Step 6: Setup Departments**
1. Navigate to: Academic -> Departments
2. Create Academic Departments:
   - Click "Add Department"
   - Enter Department Name (e.g., "Science", "Arts", "Commerce")
   - Enter Department Code
   - Set Department Head (optional)
   - Save Department
3. Create Staff Departments:
   - Click "Add Staff Department"
   - Enter Department Name (e.g., "Administration", "Teaching", "Support")
   - Enter Department Code
   - Set Department Head
   - Save Department

**Step 7: Configure Grading System**
1. Navigate to: Academic -> Settings -> Grading System
2. Create Grade Scale:
   - Click "Add Grade"
   - Enter Grade Name (e.g., "A+", "A", "B+", "B", "C", "F")
   - Enter Grade Points (e.g., 5.0, 4.0, 3.0, 2.0, 1.0, 0.0)
   - Set Marks Range:
     * Minimum Marks (e.g., 80)
     * Maximum Marks (e.g., 100)
   - Set Grade Description
3. Repeat for all grades
4. Configure GPA Calculation:
   - Select GPA Scale (4.0, 5.0, or custom)
   - Set Calculation Method:
     * Simple Average
     * Weighted Average
   - Set Optional Subject Rules:
     * Include in GPA: Yes/No
     * If No: How to handle
5. Save Grading System

**Step 8: Setup Academic Calendar**
1. Navigate to: Academic -> Calendar
2. Add Holidays:
   - Click "Add Holiday"
   - Enter Holiday Name
   - Select Date(s):
     * Single day
     * Date range
   - Select Holiday Type:
     * Public Holiday
     * School Holiday
     * Exam Holiday
   - Save Holiday
3. Add Events:
   - Click "Add Event"
   - Enter Event Name
   - Select Date(s)
   - Enter Event Description
   - Set Event Type
   - Save Event
4. Configure Working Days:
   - Select days of week that are working days
   - Set working hours
5. Setup Bell Schedule:
   - Navigate to: Academic -> Settings -> Bell Schedule
   - Add Period:
     * Period Number
     * Period Name (e.g., "Period 1", "Lunch")
     * Start Time
     * End Time
     * Duration
   - Add Break:
     * Break Name (e.g., "Morning Break", "Lunch Break")
     * Start Time
     * End Time
   - Save Bell Schedule

**Step 9: Verify Academic Setup**
1. Review all configurations:
   - Sessions
   - Classes and Sections
   - Subjects
   - Departments
   - Grading System
   - Calendar
2. Test Structure:
   - Create test student
   - Assign to class/section
   - Verify subject assignment
   - Verify grading calculation
3. Make corrections if needed
4. Finalize Setup

**Acceptance Criteria**:
- Multiple academic sessions can be active
- Academic structure supports complex hierarchies
- Grading rules are applied correctly in results

#### FR-2.2: Admissions and Enrollment
**Priority**: High  
**Description**: System shall manage complete admission lifecycle.

**Sub-Requirements**:

**FR-2.2.1: Admission Setup**

**Detailed Step-by-Step Process**:

**Step 1: Create Admission Circular**
1. Login as Academic Admin or Front Desk
2. Navigate to: Admissions -> Admission Circulars -> Create New
3. Enter Circular Details:
   - Circular Title (e.g., "Admission 2026")
   - Academic Session (select from dropdown)
   - Start Date (application start)
   - End Date (application deadline)
   - Publication Date (when to publish)
4. Select Classes for Admission:
   - Check classes that are open for admission
   - For each class, enter:
     * Available Seats
     * Reserved Seats (if any)
     * Application Fee Amount
5. Configure Admission Requirements:
   - Minimum Age (if applicable)
   - Previous Class/Grade Required
   - Required Documents List:
     * Birth Certificate
     * Previous School Certificate
     * Transfer Certificate (if applicable)
     * Passport Size Photos (quantity)
     * Other documents (specify)
6. Set Admission Test/Interview Rules (if applicable):
   - Enable Admission Test: Yes/No
   - Test Date (if enabled)
   - Test Duration
   - Subjects for Test
   - Passing Marks Criteria
   - Enable Interview: Yes/No
   - Interview Date (if enabled)
7. Configure Application Form Fields:
   - Personal Information:
     * Student Name (required)
     * Date of Birth (required)
     * Gender (required)
     * Blood Group (optional)
     * Nationality (required)
   - Contact Information:
     * Address (required)
     * Phone Number (required)
     * Email (optional)
   - Academic Information:
     * Previous School Name
     * Previous Class
     * Previous Class Result
   - Parent/Guardian Information:
     * Father's Name (required)
     * Father's Occupation
     * Father's Phone
     * Mother's Name (required)
     * Mother's Occupation
     * Mother's Phone
     * Guardian Name (if different)
   - Additional Fields (customizable):
     * Add custom field
     * Set field type (text/number/date/dropdown)
     * Set as required/optional
8. Set Document Upload Requirements:
   - Enable document upload: Yes/No
   - For each document type:
     * Document Name
     * Required: Yes/No
     * File Format (PDF/JPG/PNG)
     * Maximum File Size (e.g., 2MB)
9. Configure Online/Offline Application:
   - Enable Online Application: Yes/No
   - Enable Offline Application: Yes/No
   - If online: Set application form URL
   - If offline: Set application form print template
10. Set Application Fee Payment:
    - Application Fee Amount
    - Payment Methods (Cash/Online/Bank)
    - Fee Refund Policy (if applicable)
11. Review all settings
12. Click "Save and Publish" or "Save as Draft"
13. If published, system sends notifications (if configured)

**Step 2: Configure Application Form Fields (Advanced)**
1. Navigate to: Admissions -> Settings -> Form Builder
2. View default form fields
3. Add Custom Fields:
   - Click "Add Field"
   - Enter Field Label
   - Select Field Type:
     * Text Input
     * Number Input
     * Date Picker
     * Dropdown
     * Checkbox
     * Radio Button
     * Text Area
   - Set Field Properties:
     * Required: Yes/No
     * Placeholder Text
     * Default Value
     * Validation Rules
   - Set Field Position (drag and drop)
4. Edit Existing Fields:
   - Click field to edit
   - Modify properties
   - Save changes
5. Delete Unwanted Fields (if not used in any application)
6. Preview Form:
   - Click "Preview" to see form as applicant will see
   - Test form on mobile device
7. Save Form Configuration

**FR-2.2.2: Application Processing**

**Detailed Step-by-Step Process**:

**Step 1: Applicant Submits Application (Online)**
1. Applicant accesses admission portal/website
2. Clicks "Apply Now" or "Online Application"
3. Selects Class for Admission
4. Fills Application Form:
   - Enters all required personal information
   - Enters parent/guardian details
   - Uploads required documents
   - Reviews all entered information
5. Pays Application Fee (if online payment enabled):
   - Selects payment method
   - Enters payment details
   - Completes payment
   - Receives payment confirmation
6. Submits Application:
   - Clicks "Submit Application"
   - System validates all fields
   - If validation passes: Application submitted
   - If validation fails: Error messages shown, applicant corrects
7. System Actions:
   - Generates unique Application ID (format: APP-YYYY-####)
   - Sends confirmation email/SMS to applicant
   - Creates application record in database
   - Sets status: "Submitted"

**Step 2: Applicant Submits Application (Offline)**
1. Applicant collects application form from school
2. Fills form manually
3. Attaches required documents
4. Pays application fee (cash/bank)
5. Submits to Front Desk:
   - Front Desk officer receives application
   - Verifies documents are attached
   - Collects application fee receipt
6. Front Desk Officer Enters Application:
   - Navigate to: Admissions -> Applications -> Add New
   - Enters all information from form
   - Uploads scanned documents
   - Enters payment details
   - Generates Application ID
   - Saves application
7. System sets status: "Submitted"

**Step 3: Document Verification**
1. Academic Admin/Front Desk accesses: Admissions -> Applications -> Pending Verification
2. Views list of submitted applications
3. Selects application to verify
4. Opens application details
5. Reviews Application Information:
   - Checks all personal details
   - Verifies age eligibility
   - Checks previous academic records
6. Verifies Documents:
   - Opens each uploaded document
   - Checks document authenticity
   - Verifies document quality (readable, complete)
   - Checks document dates (if applicable)
7. Completes Eligibility Checklist:
   - Age requirement: Met/Not Met
   - Previous class requirement: Met/Not Met
   - Documents complete: Yes/No
   - Application fee paid: Yes/No
   - Other requirements: (specify)
8. Makes Verification Decision:
   - If all requirements met:
     * Click "Approve for Next Step"
     * Status changes to "Verified"
     * System notifies applicant
   - If requirements not met:
     * Click "Reject" or "Request More Information"
     * Enter rejection reason
     * Status changes to "Rejected" or "Pending Documents"
     * System notifies applicant
9. Assigns Verification Officer (for tracking):
   - Selects officer name
   - System logs assignment
10. System Actions:
    - Updates application status
    - Logs verification activity
    - Sends notification to applicant

**Step 4: Application Status Tracking**
1. Applicant can track status:
   - Login to admission portal (if online)
   - Enter Application ID and phone number
   - View current status
2. System provides status updates:
   - Submitted
   - Under Verification
   - Verified
   - Rejected
   - Selected for Test/Interview
   - Test/Interview Completed
   - Selected for Admission
   - Admission Confirmed
3. Admin can view status dashboard:
   - Total applications
   - Applications by status
   - Applications by class
   - Pending actions

**FR-2.2.3: Admission Test/Interview**

**Detailed Step-by-Step Process**:

**Step 1: Create Test/Interview Schedule**
1. Navigate to: Admissions -> Test/Interview -> Create Schedule
2. Select Admission Circular
3. Create Test Schedule:
   - Test Date
   - Test Time
   - Test Duration (hours)
   - Test Venue/Location
   - Select Classes (which classes have test)
4. Configure Test Subjects:
   - Add subjects for test
   - Set marks per subject
   - Set total marks
   - Set passing marks
5. Create Interview Schedule (if applicable):
   - Interview Date
   - Interview Time Slot Duration
   - Interview Venue
   - Number of Interview Panels
6. Assign Invigilators/Interviewers:
   - Select staff members
   - Assign to test rooms/panels
7. Save Schedule
8. Publish Schedule:
   - System notifies all verified applicants
   - Schedule visible on admission portal

**Step 2: Generate Admit Cards**
1. Navigate to: Admissions -> Test/Interview -> Generate Admit Cards
2. Select Admission Circular
3. Select Applicants:
   - All verified applicants (bulk)
   - Specific applicants (individual)
4. System Generates Admit Cards:
   - Application ID
   - Applicant Name
   - Test Date and Time
   - Test Venue
   - Test Room/Seat Number
   - Instructions
   - QR Code (for verification)
5. Review Admit Cards:
   - Preview sample
   - Check all information
6. Publish Admit Cards:
   - System generates PDF for each applicant
   - Applicants can download from portal
   - System sends download link via email/SMS
7. Print Admit Cards (if needed):
   - Bulk print option
   - Print by class
   - Individual print

**Step 3: Conduct Test and Enter Marks**
1. On Test Day:
   - Applicants arrive with admit cards
   - Verification at entrance (scan QR code)
   - Seating arrangement
2. After Test Completion:
   - Collect answer sheets
   - Evaluate answer sheets
3. Enter Test Marks:
   - Navigate to: Admissions -> Test/Interview -> Enter Marks
   - Select Admission Circular
   - Select Applicant
   - Enter marks for each subject:
     * Subject Name
     * Marks Obtained
     * Maximum Marks
   - Enter Total Marks
   - Save marks
4. Bulk Entry (if many applicants):
   - Download template Excel file
   - Fill marks in Excel
   - Upload Excel file
   - System validates and imports
   - Review imported data
   - Confirm import

**Step 4: Enter Interview Scores (if applicable)**
1. Navigate to: Admissions -> Test/Interview -> Interview Scores
2. Select Applicant
3. Enter Interview Details:
   - Interview Date
   - Interviewer Name
   - Scores by Criteria:
     * Communication Skills
     * Academic Knowledge
     * Overall Impression
   - Total Interview Score
   - Interviewer Comments
4. Save Interview Scores

**Step 5: Publish Merit List**
1. Navigate to: Admissions -> Test/Interview -> Generate Merit List
2. Select Admission Circular
3. Select Class
4. Configure Merit List Criteria:
   - Based on: Test Marks / Interview / Combined
   - Weightage (if combined):
     * Test: X%
     * Interview: Y%
   - Tie-breaker rules
5. Generate Merit List:
   - System calculates scores
   - Ranks applicants
   - Creates merit list
6. Review Merit List:
   - Check rankings
   - Verify calculations
7. Create Wait List:
   - System automatically creates wait list for remaining applicants
   - Wait list ordered by merit
8. Publish Lists:
   - Click "Publish Merit List"
   - System makes lists visible on portal
   - Sends notifications:
     * Selected applicants: "Congratulations, you are selected"
     * Wait list applicants: "You are on wait list"
     * Not selected: "Thank you for applying"

**Step 6: Automated Seat Allocation (Optional)**
1. Navigate to: Admissions -> Seat Allocation
2. Select Admission Circular and Class
3. Configure Allocation Rules:
   - Allocation based on merit rank
   - Reserved seats allocation (if any)
   - Special category allocation
4. Run Automatic Allocation:
   - System allocates seats to top-ranked applicants
   - Respects seat limits
   - Handles reserved seats
5. Review Allocation:
   - Check allocated students
   - Verify seat distribution
6. Manual Adjustment (if needed):
   - Select applicant
   - Change allocated seat/class
   - Save changes
7. Finalize Allocation:
   - Lock allocation
   - System notifies allocated students

**FR-2.2.4: Final Admission**

**Detailed Step-by-Step Process**:

**Step 1: Approve Selected Students**
1. Navigate to: Admissions -> Final Admission -> Approve Students
2. View Merit List / Selected Applicants
3. Select Students for Admission:
   - Select individual students
   - Or select all from merit list
   - Or select by rank range
4. Review Selected Students:
   - Verify all information
   - Check documents
   - Confirm eligibility
5. Approve for Admission:
   - Click "Approve Selected"
   - System changes status to "Approved for Admission"
   - Sends approval notification to parents

**Step 2: Assign Class/Section/Group**
1. Navigate to: Admissions -> Final Admission -> Assign Class
2. Select Approved Student
3. Assign Academic Details:
   - Select Academic Session
   - Select Class
   - Select Section (if multiple sections)
   - Select Group/Stream (if applicable):
     * Science
     * Arts
     * Commerce
   - Select Optional Subjects (if applicable):
     * Subject 1
     * Subject 2
     * (based on class requirements)
4. Bulk Assignment (if many students):
   - Select multiple students
   - Set default class/section
   - System assigns to all selected
   - Individual adjustments can be made later
5. Save Assignment
6. System Actions:
   - Creates student record
   - Links to class/section
   - Updates class strength

**Step 3: Generate Student ID**
1. System automatically generates Student ID:
   - Format: Based on configured format (e.g., STU-2026-0001)
   - Sequential numbering
   - Unique identifier
2. View Generated ID:
   - Navigate to: Students -> View Student
   - Student ID displayed on profile
3. Print ID Card (optional):
   - Navigate to: Students -> ID Cards -> Generate
   - Select student
   - System generates ID card with:
     * Student ID
     * Student Name
     * Photo
     * Class/Section
     * Academic Session
     * QR Code
   - Print ID card

**Step 4: Create Parent Accounts**
1. System automatically creates parent accounts:
   - For each parent/guardian in application
   - Generates username (usually phone number or email)
   - Generates temporary password
   - Sends login credentials via SMS/Email
2. Parent Account Details:
   - Username
   - Temporary Password
   - Login URL
   - Instructions to change password
3. Parent can login and:
   - View child's information
   - Pay fees
   - View attendance
   - View results
   - Communicate with teachers

**Step 5: Assign Roll Numbers**
1. Navigate to: Students -> Roll Number Assignment
2. Select Class and Section
3. Configure Roll Number Rules:
   - Auto-assign: Sequential (1, 2, 3...)
   - Manual assignment
   - Based on merit rank
4. Assign Roll Numbers:
   - If auto: Click "Auto Assign"
   - System assigns sequentially
   - If manual: Enter roll number for each student
5. Review Assignment:
   - Check for duplicates
   - Verify sequence
6. Save Roll Numbers
7. System updates student records

**Step 6: Update Student Status**
1. System automatically updates status:
   - From "Approved for Admission" -> "Enrolled"
2. Student now appears in:
   - Class student list
   - Attendance system
   - Fee system
   - Academic system

**FR-2.2.5: Admission Fees**

**Detailed Step-by-Step Process**:

**Step 1: System Generates Admission Invoice**
1. When student status changes to "Enrolled":
   - System automatically generates admission invoice
   - Invoice includes:
     * Admission Fee
     * Registration Fee
     * Other applicable fees
2. View Generated Invoice:
   - Navigate to: Fees -> Invoices -> View
   - Select student
   - View invoice details
3. Invoice Details:
   - Invoice Number (unique)
   - Invoice Date
   - Due Date
   - Fee Breakdown
   - Total Amount
   - Payment Status

**Step 2: Payment Collection**
1. Cash Payment:
   - Navigate to: Fees -> Payments -> Collect Payment
   - Select student
   - Select invoice
   - Enter payment amount (full or partial)
   - Select payment method: "Cash"
   - Enter received amount
   - Enter cashier name
   - Click "Process Payment"
2. Bank Deposit Payment:
   - Select payment method: "Bank Deposit"
   - Enter bank name
   - Enter deposit slip number
   - Enter deposit date
   - Upload deposit slip (optional)
   - Process payment
3. Online Payment:
   - Student/Parent accesses portal
   - Views pending invoice
   - Clicks "Pay Now"
   - Selects payment gateway
   - Enters payment details
   - Completes payment
   - System receives payment confirmation
   - Updates invoice status

**Step 3: Generate Receipt**
1. After payment is recorded:
   - System automatically generates receipt
   - Receipt Number (unique, sequential)
   - Receipt Date
2. Receipt Contains:
   - Student Name and ID
   - Invoice Number
   - Payment Details:
     * Payment Date
     * Payment Method
     * Amount Paid
     * Balance (if partial payment)
   - School Logo and Details
3. Print Receipt:
   - Navigate to: Fees -> Receipts -> Print
   - Select receipt
   - Click "Print"
   - Or email receipt to parent

**Step 4: Update Student Ledger**
1. System automatically updates:
   - Student fee ledger
   - Payment history
   - Outstanding balance
2. View Ledger:
   - Navigate to: Fees -> Student Ledger
   - Select student
   - View complete transaction history

**Step 5: Update Student Status to Active**
1. When admission fee is fully paid:
   - System automatically changes status
   - From "Enrolled" -> "Active"
2. Active Student can now:
   - Attend classes
   - Access all student portal features
   - Participate in academic activities
3. If fee not paid:
   - Student remains "Enrolled"
   - Access may be restricted
   - Reminders sent to parents

**Acceptance Criteria**:
- Complete admission workflow is digitized
- Application tracking is transparent
- Student IDs are unique and sequential
- Parent accounts are created automatically

#### FR-2.3: Student Lifecycle Management
**Priority**: High  
**Description**: System shall manage student status throughout their journey.

**Requirements**:
1. Student status lifecycle:
   - Applicant -> Enrolled -> Active -> Promoted/Repeat -> Transfer/Withdraw -> Alumni
2. Transfer Certificate (TC) workflow:
   - TC request initiation
   - Clearance checks (fees, library, hostel, transport)
   - Approval workflow
   - TC generation with unique number
   - Status update to "Transferred"
3. Withdrawal workflow (similar to transfer)
4. Re-admission workflow (for returning students)
5. Promotion workflow (detailed in FR-3.4)

**Detailed Step-by-Step Process**:

**Step 1: Transfer Certificate (TC) Request**
1. Student/Parent initiates TC request:
   - Login to portal
   - Navigate to: Students -> Transfer Certificate -> Request TC
   - Enter transfer details:
     * Transfer reason
     * Destination school (if known)
     * Transfer date
   - Submit request
2. Or Front Desk creates request:
   - Navigate to: Students -> Transfer Certificate -> Create Request
   - Select student
   - Enter transfer details
   - Save request
3. System Actions:
   - Creates TC request
   - Status: "Pending Clearance"
   - Notifies Academic Admin

**Step 2: Clearance Checks**
1. Academic Admin accesses: Students -> Transfer Certificate -> Pending Clearance
2. Select TC request
3. System automatically checks:
   - Fee Clearance:
     * Navigate to: Fees -> Student Ledger
     * Check outstanding balance
     * If dues exist: Clearance failed
     * If no dues: Clearance passed
   - Library Clearance:
     * Navigate to: Library -> Student Books
     * Check issued books
     * If books not returned: Clearance failed
     * If all returned: Clearance passed
   - Hostel Clearance (if applicable):
     * Navigate to: Hostel -> Student Allocation
     * Check hostel allocation
     * If allocated: Check room clearance
     * Clearance status updated
   - Transport Clearance (if applicable):
     * Navigate to: Transport -> Student Allocation
     * Check transport allocation
     * Check transport fee payment
     * Clearance status updated
4. Manual Clearance Verification:
   - Review each clearance status
   - If any failed: Contact relevant department
   - Resolve issues
   - Re-check clearance
5. All Clearances Passed:
   - System updates status to "Clearance Complete"
   - Ready for approval

**Step 3: TC Approval Workflow**
1. Academic Admin reviews:
   - Navigate to: Students -> Transfer Certificate -> Pending Approval
   - Review student details
   - Review clearance status
   - Review transfer reason
2. Approve TC:
   - Click "Approve TC"
   - Enter approval comments (optional)
   - Status changes to "Approved"
3. Or Reject TC:
   - Click "Reject"
   - Enter rejection reason
   - Status changes to "Rejected"
   - Notifies student/parent

**Step 4: Generate Transfer Certificate**
1. When TC approved:
   - Navigate to: Students -> Transfer Certificate -> Generate TC
   - Select approved request
2. System generates TC:
   - Unique TC Number (format: TC-YYYY-####)
   - Student details
   - Academic history
   - Transfer date
   - School seal and signature
3. Review TC:
   - Preview generated certificate
   - Verify all information
4. Print TC:
   - Click "Print TC"
   - Print on official letterhead
   - Sign by authorized person
5. Issue TC to student/parent:
   - Record issue date
   - Record recipient name
   - Get signature on receipt

**Step 5: Update Student Status**
1. After TC issued:
   - Navigate to: Students -> Update Status
   - Select student
   - Change status to "Transferred"
2. System Actions:
   - Updates student status
   - Archives student record
   - Removes from active class list
   - Logs status change
3. Move to Alumni (if applicable):
   - If student completed studies
   - Move to alumni module
   - Maintain alumni record

**Step 6: Withdrawal Workflow**
1. Similar to TC workflow:
   - Create withdrawal request
   - Perform clearance checks
   - Approve withdrawal
   - Update student status to "Withdrawn"
2. Difference:
   - No TC generated
   - Withdrawal certificate (if needed)
   - Different status code

**Step 7: Re-admission Workflow**
1. For returning students:
   - Navigate to: Students -> Re-admission
   - Search previous student record
   - Verify previous enrollment
2. Create re-admission:
   - Select previous student
   - Enter re-admission details
   - Assign new class/section
   - Generate new student ID (or reactivate old)
3. Update status:
   - From "Transferred"/"Withdrawn" -> "Active"
   - Restore student access
   - Update class strength

**Acceptance Criteria**:
- All status transitions are logged
- Clearance checks prevent incomplete transfers
- TC numbers are unique and traceable

#### FR-2.4: Timetable Management
**Priority**: High  
**Description**: System shall manage class and teacher timetables.

**Sub-Requirements**:

**FR-2.4.1: Timetable Setup**

**Detailed Step-by-Step Process**:

**Step 1: Define Periods and Breaks**
1. Navigate to: Academic -> Timetable -> Periods Setup
2. Configure Periods:
   - Click "Add Period"
   - Enter Period Number (1, 2, 3...)
   - Enter Period Name (e.g., "Period 1", "Period 2")
   - Set Start Time
   - Set End Time
   - Set Duration (auto-calculated)
   - Save Period
3. Configure Breaks:
   - Click "Add Break"
   - Enter Break Name (e.g., "Morning Break", "Lunch Break")
   - Set Start Time
   - Set End Time
   - Set Break Duration
   - Save Break
4. Review Schedule:
   - View complete day schedule
   - Verify no time conflicts
   - Adjust if needed

**Step 2: Define Rooms/Labs**
1. Navigate to: Academic -> Timetable -> Rooms Setup
2. Add Room:
   - Click "Add Room"
   - Enter Room Number/Name
   - Enter Room Code
   - Set Room Type:
     * Regular Classroom
     * Laboratory
     * Computer Lab
     * Library
     * Auditorium
     * Other
   - Set Capacity (maximum students)
   - Set Equipment/Facilities (if lab)
   - Set Availability (all days/specific days)
   - Save Room
3. Repeat for all rooms
4. Organize Rooms:
   - Group by building/floor
   - Set room hierarchy if needed

**Step 3: Manage Teacher Availability**
1. Navigate to: Academic -> Timetable -> Teacher Availability
2. Select Teacher
3. Set Available Periods:
   - For each day of week
   - Mark available periods
   - Mark unavailable periods
4. Set Unavailable Times:
   - Add unavailable slot
   - Enter reason (optional)
   - Set date range (if temporary)
5. Set Preferred Periods (optional):
   - Mark preferred teaching periods
   - System considers when assigning
6. Save Teacher Availability
7. Repeat for all teachers

**Step 4: Create Class Routine**
1. Navigate to: Academic -> Timetable -> Class Routine
2. Select Academic Session
3. Select Class and Section
4. Create Routine:
   - For each day of week
   - For each period:
     * Select Subject
     * Select Teacher (from available teachers)
     * Select Room (from available rooms)
     * System checks:
       - Teacher availability
       - Room availability
       - No conflicts
5. Handle Conflicts:
   - If conflict detected:
     * System highlights conflict
     * Shows conflicting assignment
     * User resolves conflict
     * Re-assign subject/teacher/room
6. Save Routine:
   - Click "Save Routine"
   - System validates:
     * All periods filled
     * No conflicts
     * Teacher availability
     * Room availability
   - If valid: Routine saved
   - If invalid: Error messages shown

**Step 5: Generate Teacher Routine**
1. Navigate to: Academic -> Timetable -> Teacher Routine
2. Select Teacher
3. System automatically generates:
   - All classes assigned to teacher
   - Day-wise schedule
   - Period-wise schedule
   - Room assignments
4. View Teacher Routine:
   - Daily view
   - Weekly view
   - Print routine

**Step 6: Generate Room Routine**
1. Navigate to: Academic -> Timetable -> Room Routine
2. Select Room
3. System automatically generates:
   - All classes using room
   - Day-wise schedule
   - Period-wise schedule
   - Teacher assignments
4. View Room Routine:
   - Check room utilization
   - Identify free periods
   - Print routine

**Step 7: Conflict Detection and Resolution**
1. System automatically detects:
   - Teacher double-booking
   - Room double-booking
   - Class without teacher
   - Period without subject
2. View Conflicts:
   - Navigate to: Academic -> Timetable -> Conflicts
   - View all detected conflicts
3. Resolve Conflicts:
   - Select conflict
   - View conflict details
   - Re-assign teacher/room/subject
   - Save changes
4. Re-check Conflicts:
   - System re-validates
   - Confirms resolution

**Step 8: Publish Timetable**
1. Review Complete Timetable:
   - Check all classes
   - Verify all periods filled
   - Ensure no conflicts
2. Publish Timetable:
   - Navigate to: Academic -> Timetable -> Publish
   - Select timetable to publish
   - Click "Publish"
   - Set publish date
3. System Actions:
   - Makes timetable visible to:
     * Students
     * Teachers
     * Parents
   - Sends notifications (optional)
   - Creates timetable snapshot

**FR-2.4.2: Substitute Teacher Management**

**Detailed Step-by-Step Process**:

**Step 1: Teacher Marks Leave/Unavailability**
1. Teacher logs in
2. Navigate to: Timetable -> Mark Unavailability
3. Select Date(s):
   - Single day
   - Date range
4. Select Periods:
   - All periods
   - Specific periods
5. Enter Reason:
   - Leave
   - Training
   - Other (specify)
6. Submit Request
7. System Actions:
   - Creates unavailability record
   - Highlights in timetable
   - Notifies Academic Admin

**Step 2: System Suggests Substitute Teachers**
1. Academic Admin accesses: Timetable -> Substitute Assignment
2. View Unavailable Teachers:
   - List of teachers with unavailability
   - Dates and periods
3. Select Unavailable Slot:
   - Click on unavailable period
   - View class and subject
4. System Suggests Substitutes:
   - Based on:
     * Same subject expertise
     * Available during that period
     * Previous substitute assignments
   - Shows suggested teachers
   - Shows teacher availability

**Step 3: Assign Substitute Teacher**
1. Review Suggestions:
   - Check suggested teachers
   - Verify availability
2. Assign Substitute:
   - Select substitute teacher
   - Click "Assign Substitute"
   - System updates timetable for that day/period
3. Or Manual Assignment:
   - Search for teacher
   - Check availability manually
   - Assign if available
4. Save Assignment:
   - System updates routine
   - Notifies:
     * Original teacher
     * Substitute teacher
     * Students (optional)

**Step 4: Routine Auto-Update**
1. System automatically updates:
   - Timetable for affected day
   - Teacher routine for substitute
   - Class routine
2. View Updated Routine:
   - Students see updated timetable
   - Teachers see updated schedule
3. Revert on Return:
   - When original teacher returns
   - System reverts to original timetable
   - Or manual revert if needed

**FR-2.4.3: Class Diary/Lesson Plan**

**Detailed Step-by-Step Process**:

**Step 1: Teacher Logs Daily Lesson**
1. Teacher logs in
2. Navigate to: Academic -> Class Diary -> Log Lesson
3. Select Date (default: today)
4. Select Class and Section
5. Select Subject
6. Enter Lesson Details:
   - Chapter/Topic Covered
   - Learning Objectives
   - Teaching Methods Used
   - Materials Used:
     * Textbooks
     * Visual aids
     * Digital resources
   - Homework Assigned:
     * Assignment details
     * Due date
   - Attachments:
     * Upload files (PDF, images, etc.)
     * Add links
7. Save Lesson Log

**Step 2: Review Lesson Logs**
1. Class Teacher/Principal accesses: Academic -> Class Diary -> Review
2. View Lesson Logs:
   - Filter by:
     * Date range
     * Class/Section
     * Subject
     * Teacher
3. Review Details:
   - Check lesson coverage
   - Verify homework assigned
   - Review teaching methods
4. Add Comments (optional):
   - Provide feedback
   - Suggest improvements
5. Approve Log (if approval required)

**Step 3: Lesson Plan Templates (Optional)**
1. Navigate to: Academic -> Class Diary -> Templates
2. Create Template:
   - Enter Template Name
   - Define structure:
     * Learning objectives
     * Teaching methods
     * Assessment methods
   - Save template
3. Use Template:
   - When logging lesson
   - Select template
   - Fill in details
   - Save

**Step 4: Progress Tracking**
1. View Progress Reports:
   - Navigate to: Academic -> Class Diary -> Progress
2. Select Class and Subject
3. View Progress:
   - Topics covered
   - Topics remaining
   - Completion percentage
   - Timeline comparison
4. Generate Progress Report:
   - Export to PDF/Excel
   - Share with principal/admin

**Acceptance Criteria**:
- Timetable conflicts are detected automatically
- Substitute assignments update routine seamlessly
- Lesson logs are searchable and reportable

#### FR-2.5: Attendance Management
**Priority**: High  
**Description**: System shall manage student and staff attendance.

**Sub-Requirements**:

**FR-2.5.1: Student Attendance**

**Detailed Step-by-Step Process**:

**Step 1: Take Daily Attendance**
1. Teacher/Class Teacher logs in
2. Navigate to: Attendance -> Take Attendance
3. Select Date (default: today)
4. Select Class and Section
5. View Student List:
   - System displays all students in class
   - Shows previous attendance status (if any)
6. Mark Attendance for Each Student:
   - Click on student name
   - Select attendance status:
     * Present (P)
     * Absent (A)
     * Late (L)
     * Leave (LV)
     * Excused (E)
7. For Late Students:
   - Mark as "Late"
   - Enter arrival time (if known)
   - System automatically applies late rules
8. For Leave Students:
   - Mark as "Leave"
   - System checks if leave was approved
   - If not approved, mark as "Absent"
9. Bulk Marking (if all present):
   - Click "Mark All Present"
   - System marks all as present
   - Teacher can then change individual statuses
10. Save Attendance:
    - Click "Save Attendance"
    - System validates:
      * All students marked
      * No duplicate entries
    - If valid: Attendance saved
    - If invalid: Error message shown

**Step 2: Take Period-wise Attendance**
1. Navigate to: Attendance -> Period Attendance
2. Select Date
3. Select Class and Section
4. Select Period/Subject:
   - Choose from timetable
   - Or select subject directly
5. Mark Attendance:
   - Similar to daily attendance
   - But specific to that period/subject
6. Save Period Attendance
7. System Actions:
   - Updates period attendance records
   - Updates overall daily attendance
   - Calculates subject-wise attendance percentage

**Step 3: Late Arrival Processing**
1. When student marked as "Late":
   - System checks arrival time
   - Compares with class start time
2. Apply Late Rules:
   - If arrival within grace period (e.g., 15 minutes):
     * Marked as "Late" but counted as present
   - If arrival after grace period:
     * Marked as "Late"
     * May be counted as partial absence (based on rules)
3. Late Fine (if configured):
   - System calculates late fine
   - Adds to student fee ledger
   - Notifies parent

**Step 4: Leave Application and Approval**
1. Student/Parent Initiates Leave:
   - Login to portal
   - Navigate to: Leave -> Apply Leave
   - Select Leave Date(s):
     * Single day
     * Multiple days (date range)
   - Enter Leave Reason
   - Upload Supporting Documents (if required)
   - Submit Leave Application
2. System Actions:
   - Creates leave request
   - Status: "Pending Approval"
   - Notifies Class Teacher
3. Class Teacher Reviews:
   - Navigate to: Attendance -> Leave Requests
   - View pending requests
   - Review leave details
4. Approve/Reject Leave:
   - If Approve:
     * Click "Approve"
     * Enter approval comments (optional)
     * Status changes to "Approved"
   - If Reject:
     * Click "Reject"
     * Enter rejection reason
     * Status changes to "Rejected"
5. System Notifications:
   - Approved: Notifies student/parent
   - Rejected: Notifies student/parent with reason
6. Attendance Update:
   - If approved: Student marked as "Leave" on that date
   - If rejected: Student marked as "Absent" (if not present)

**Step 5: Automatic Parent Notifications**
1. System sends notifications for:
   - Absence:
     * When student marked absent
     * Notification sent immediately or at end of day
     * Contains: Date, Class, Student Name
   - Late Arrival:
     * When student marked late
     * Notification sent immediately
     * Contains: Arrival time, Late duration
   - Leave Approval/Rejection:
     * When leave approved/rejected
     * Notification sent immediately
     * Contains: Leave dates, Status, Reason (if rejected)
2. Notification Methods:
   - SMS (if configured)
   - Email (if configured)
   - Portal notification
   - WhatsApp (if configured)

**Step 6: Generate Attendance Reports**
1. Daily Attendance Sheet:
   - Navigate to: Reports -> Attendance -> Daily Sheet
   - Select Date
   - Select Class/Section
   - Click "Generate Report"
   - Report shows:
     * Student list
     * Attendance status for each
     * Total present/absent/late
   - Export to PDF/Excel
2. Monthly Summary:
   - Navigate to: Reports -> Attendance -> Monthly Summary
   - Select Month
   - Select Class/Section
   - Report shows:
     * Student-wise attendance
     * Total days present/absent
     * Attendance percentage
     * Working days in month
   - Export option available
3. Term-wise Summary:
   - Navigate to: Reports -> Attendance -> Term Summary
   - Select Term
   - Select Class/Section
   - Report shows:
     * Overall attendance for term
     * Attendance percentage
     * Comparison with previous term
4. Subject-wise Attendance:
   - Navigate to: Reports -> Attendance -> Subject-wise
   - Select Subject
   - Select Date Range
   - Report shows:
     * Attendance for that subject
     * Percentage attendance per student

**Step 7: Minimum Attendance Rules for Exam Eligibility**
1. Configure Minimum Attendance:
   - Navigate to: Settings -> Attendance -> Exam Eligibility
   - Set Minimum Attendance Percentage (e.g., 75%)
   - Set Rule Type:
     * Overall attendance
     * Subject-wise attendance
     * Both
2. Check Exam Eligibility:
   - Before exam registration:
     * System checks student attendance
     * Compares with minimum requirement
   - If Eligible:
     * Student can register for exam
   - If Not Eligible:
     * Student cannot register
     * System shows attendance percentage
     * Shows shortfall
3. Exception Handling:
   - Principal/Admin can override:
     * Navigate to: Students -> Exam Eligibility
     * Select student
     * Click "Approve Exception"
     * Enter reason
     * Student can now register

**FR-2.5.2: Staff Attendance**
1. Attendance capture:
   - Manual entry
   - Biometric device integration
   - Mobile app check-in (optional)
2. Late arrival tracking
3. Overtime calculation
4. Attendance feeds into payroll system
5. Leave balance integration
6. Attendance reports for HR

**Acceptance Criteria**:
- Attendance can be taken quickly (bulk operations)
- Notifications are sent reliably
- Attendance data is accurate and auditable
- Biometric integration works seamlessly

#### FR-2.6: Homework and Assignments
**Priority**: Medium  
**Description**: System shall manage assignments and basic LMS features.

**Requirements**:
1. Teacher posts assignments:
   - Title, description, due date
   - Marks/weightage
   - Attachments (files, links)
   - Target class/section
2. Student submission:
   - Online submission (file upload)
   - Offline submission (teacher marks as submitted)
3. Teacher grading:
   - Marks entry
   - Feedback/comments
   - Grade assignment
4. Parent visibility:
   - View assigned homework
   - View submission status
   - View grades and feedback
5. Quiz/Online Test Module (Optional):
   - MCQ quiz creation
   - Auto-grading
   - Time limits
   - Results and analytics

**Detailed Step-by-Step Process**:

**Step 1: Create Assignment**
1. Teacher logs in
2. Navigate to: Academics -> Homework/Assignments -> Create
3. Select Class/Section and Subject
4. Enter title, instructions, due date, and marks/weightage
5. Attach files or links (optional)
6. Set submission type: Online/Offline/Both
7. Click "Save Draft" or "Publish"

**Step 2: Publish Assignment**
1. Review assignment details
2. Set visibility:
   - Students
   - Parents (optional)
3. Set late submission policy:
   - Allow late submission: Yes/No
   - Late penalty (if applicable)
4. Click "Publish"
5. System sends notifications (optional)

**Step 3: Student Submission (Online)**
1. Student logs in
2. Navigate to: Student Portal -> Assignments
3. Open assignment and review instructions
4. Upload file(s) or enter text response
5. Click "Submit"
6. System confirms submission timestamp

**Step 4: Offline Submission Tracking**
1. Teacher collects offline work
2. Navigate to: Academics -> Homework/Assignments -> Submissions
3. Mark student as "Submitted (Offline)"
4. Add submission date and notes (optional)

**Step 5: Review and Grading**
1. Teacher opens submissions list
2. For each student:
   - View submission
   - Enter marks
   - Add feedback/comments
3. Save grades
4. System updates student and parent view (if enabled)

**Step 6: Close Assignment**
1. Review completion status
2. Click "Close Assignment" after grading
3. System locks further submissions
4. Generate assignment summary report


**Acceptance Criteria**:
- File uploads work reliably
- Submission deadlines are enforced
- Parents receive notifications for new assignments

#### FR-2.7: Discipline and Student Support
**Priority**: Medium  
**Description**: System shall manage discipline records and student support.

**Requirements**:
1. Discipline record management:
   - Incident type (minor, major, severe)
   - Description, date, location
   - Evidence (documents, photos)
   - Witnesses
2. Action management:
   - Warning (verbal, written)
   - Guardian call
   - Counseling session
   - Suspension (policy-based)
   - Expulsion (extreme cases)
3. Access control:
   - Sensitive records restricted to authorized personnel
   - Parent access to their child's records
4. Parent notifications (optional, policy-based)
5. Health/Medical Records:
   - Blood group, allergies, medical conditions
   - Emergency contact information
   - Clinic visit logs (date, issue, action taken)
   - Medication records
6. Counseling records:
   - Session notes
   - Counselor assignment
   - Follow-up scheduling

**Detailed Step-by-Step Process**:

**Step 1: Log Incident**
1. Authorized user logs in
2. Navigate to: Students -> Discipline -> New Incident
3. Select student and incident type
4. Enter date, time, location, and description
5. Attach evidence (files/photos) and witnesses (optional)
6. Save incident record

**Step 2: Review and Classify**
1. Admin reviews incident queue
2. Verify details and classification (minor/major/severe)
3. Assign responsible staff (counselor/discipline officer)
4. Set priority and next action date

**Step 3: Define Action**
1. Select action type:
   - Warning
   - Counseling
   - Guardian call
   - Suspension (policy-based)
2. Set action details and duration (if applicable)
3. Record approval if required
4. Save action plan

**Step 4: Notify Stakeholders**
1. Send parent/guardian notification (policy-based)
2. Notify class teacher and relevant staff
3. Log communication in the incident record

**Step 5: Counseling and Follow-up**
1. Schedule counseling session
2. Record session notes and outcomes
3. Set follow-up date
4. Track repeated incidents or improvements

**Step 6: Close Case**
1. Verify actions completed
2. Add closure notes and final outcome
3. Mark incident as "Closed"
4. Generate discipline summary report if needed

**Step 7: Health/Medical Record Update (if applicable)**
1. Navigate to: Students -> Health Records
2. Update medical notes, clinic logs, or medication
3. Save and restrict access per policy


**Acceptance Criteria**:
- Sensitive information is properly protected
- Records are searchable and reportable
- Parent notifications respect privacy policies

---

### 3.3 Exams and Results

#### FR-3.1: Exam Planning
**Priority**: High  
**Description**: System shall manage exam creation and scheduling.

**Requirements**:
1. Create exam terms:
   - Class Test (CT), Mid-term, Final, Annual
   - Exam dates and duration
2. Define marks distribution per subject:
   - Component-wise (CQ, MCQ, Practical)
   - Total marks per subject
3. Create exam routine:
   - Subject-wise schedule
   - Date, time, duration
4. Room/Seat plan:
   - Room allocation
   - Seat number assignment
   - Capacity management
5. Invigilator assignment:
   - Invigilator duties
   - Room assignments
   - Duty schedule
6. Publish schedule to student/parent portal
7. Generate admit cards (if required)

**Detailed Step-by-Step Process**:

**Step 1: Create Exam Term**
1. Login as Exam Controller
2. Navigate to: Exams -> Exam Terms -> Create New
3. Enter Exam Term Details:
   - Term Name (e.g., "Class Test 1", "Mid-term Exam", "Final Exam")
   - Term Type:
     * Class Test (CT)
     * Mid-term
     * Final
     * Annual
   - Academic Session (select)
   - Start Date
   - End Date
   - Status: Active/Inactive
4. Configure Exam Settings:
   - Allow late submission: Yes/No
   - Require admit card: Yes/No
   - Publish results date (if known)
5. Save Exam Term

**Step 2: Define Marks Distribution**
1. Navigate to: Exams -> Exam Terms -> [Select Term] -> Marks Distribution
2. Select Class
3. For each Subject:
   - Select Subject
   - Configure Components:
     * CQ (Creative Question):
       - Maximum Marks
       - Weightage (%)
     * MCQ (Multiple Choice):
       - Maximum Marks
       - Weightage (%)
     * Practical (if applicable):
       - Maximum Marks
       - Weightage (%)
   - Set Total Marks (sum of all components)
   - Set Pass Marks
   - Save Subject Configuration
4. Repeat for all subjects
5. Verify Distribution:
   - Check all components sum to 100%
   - Verify total marks consistency

**Step 3: Create Exam Routine**
1. Navigate to: Exams -> Exam Terms -> [Select Term] -> Exam Routine
2. Select Class
3. Add Exam Schedule:
   - Click "Add Exam"
   - Select Subject
   - Enter Exam Date
   - Enter Start Time
   - Enter Duration (hours)
   - Enter End Time (auto-calculated)
4. Organize Schedule:
   - Arrange exams chronologically
   - Ensure no time conflicts
   - Consider subject difficulty distribution
5. Save Routine
6. Repeat for all classes
7. View Complete Routine:
   - All classes schedule
   - Identify any conflicts
   - Make adjustments if needed

**Step 4: Create Room/Seat Plan**
1. Navigate to: Exams -> Exam Terms -> [Select Term] -> Room Plan
2. Select Exam Date and Subject
3. Allocate Rooms:
   - View available rooms
   - Select rooms for exam
   - System shows room capacity
4. Assign Students to Rooms:
   - Select class/section
   - Click "Auto Allocate" or "Manual Allocate"
   - If Auto:
     * System distributes students evenly
     * Respects room capacity
     * Minimizes same-class grouping
   - If Manual:
     * Select room
     * Select students
     * Assign to room
5. Assign Seat Numbers:
   - For each room:
     * System assigns sequential seat numbers
     * Or manual assignment
     * Ensures proper spacing
6. Review Room Plan:
   - Check capacity utilization
   - Verify all students assigned
   - Check seat distribution
7. Save Room Plan
8. Generate Room Plan Report:
   - Print room-wise student list
   - Print seat plan diagram

**Step 5: Assign Invigilators**
1. Navigate to: Exams -> Exam Terms -> [Select Term] -> Invigilator Assignment
2. Select Exam Date and Room
3. View Available Invigilators:
   - Staff members available during exam time
   - Previous invigilation assignments
4. Assign Invigilators:
   - Select invigilator(s)
   - Assign to room
   - Set invigilator role:
     * Chief Invigilator
     * Invigilator
     * Assistant
5. Balance Assignments:
   - Ensure fair distribution
   - Avoid over-assignment
   - Consider invigilator preferences
6. Save Assignments
7. Generate Invigilator Schedule:
   - View invigilator-wise schedule
   - Print invigilator duty list

**Step 6: Publish Exam Schedule**
1. Review Complete Schedule:
   - Check all exams scheduled
   - Verify room assignments
   - Confirm invigilator assignments
2. Publish Schedule:
   - Navigate to: Exams -> Exam Terms -> [Select Term] -> Publish
   - Click "Publish Schedule"
   - Set publish date
3. System Actions:
   - Makes schedule visible to:
     * Students
     * Teachers
     * Parents
   - Sends notifications (optional)
   - Creates schedule snapshot

**Step 7: Generate Admit Cards**
1. Navigate to: Exams -> Exam Terms -> [Select Term] -> Admit Cards
2. Select Class/Section
3. Generate Admit Cards:
   - Click "Generate Admit Cards"
   - System generates for all students
4. Admit Card Contains:
   - Student Name and ID
   - Exam Term Name
   - Exam Schedule (all subjects)
   - Room and Seat Number
   - Instructions
   - QR Code (for verification)
5. Review Admit Cards:
   - Preview sample
   - Verify information
6. Publish Admit Cards:
   - Students can download from portal
   - Or print and distribute
   - System sends download link via email/SMS

**Acceptance Criteria**:
- Exam schedules are conflict-free
- Room capacity is respected
- Invigilator assignments are balanced

#### FR-3.2: Marks Entry and Verification
**Priority**: High  
**Description**: System shall manage marks entry with verification workflow.

**Requirements**:
1. Marks entry interface:
   - Component-wise entry (CQ, MCQ, Practical)
   - Bulk entry support (Excel import)
   - Individual entry
2. Marks validation:
   - Maximum marks check
   - Negative marks prevention
   - Required field validation
3. Submission workflow:
   - Teacher submits marks
   - Marks locked after submission
   - Unlock request (with approval)
4. Verification process:
   - Exam controller reviews
   - Missing entries detection
   - Invalid entries flagging
5. Recheck/approval process:
   - Marks correction request
   - Approval workflow
   - Audit trail

**Detailed Step-by-Step Process**:

**Step 1: Individual Marks Entry**
1. Teacher logs in
2. Navigate to: Exams -> Marks Entry -> Enter Marks
3. Select Exam Term
4. Select Class and Section
5. Select Subject
6. View Student List:
   - System displays all students in class
   - Shows exam components (CQ, MCQ, Practical)
7. Enter Marks for Each Student:
   - For each component:
     * CQ Marks (if applicable)
     * MCQ Marks (if applicable)
     * Practical Marks (if applicable)
   - System validates:
     * Marks not exceeding maximum
     * Marks not negative
     * Required fields filled
8. Save Marks:
   - Click "Save" after each student
   - Or "Save All" after all students
   - System validates all entries
   - If valid: Marks saved (draft)
   - If invalid: Error messages shown

**Step 2: Bulk Marks Entry (Excel Import)**
1. Navigate to: Exams -> Marks Entry -> Bulk Import
2. Download Template:
   - Click "Download Excel Template"
   - Template contains:
     * Student ID column
     * Student Name column
     * Component columns (CQ, MCQ, Practical)
3. Fill Template:
   - Open downloaded Excel file
   - Enter marks for all students
   - Save file
4. Upload Template:
   - Click "Upload Excel File"
   - Select filled template
   - Click "Upload"
5. System Validates:
   - Checks file format
   - Validates all marks
   - Checks student IDs
   - Verifies maximum marks
6. Preview Import:
   - System shows preview of data
   - Highlights any errors
   - Shows validation results
7. Confirm Import:
   - If no errors: Click "Confirm Import"
   - System imports marks
   - If errors: Correct Excel file and re-upload

**Step 3: Marks Validation**
1. System automatically validates:
   - Maximum marks check:
     * Each component <= maximum marks
     * Total <= subject total marks
   - Negative marks prevention:
     * All marks >= 0
   - Required field validation:
     * All components filled (if required)
2. View Validation Errors:
   - System highlights errors
   - Shows error messages
   - Indicates which student/component
3. Correct Errors:
   - Fix invalid entries
   - Re-save marks
   - System re-validates

**Step 4: Submit Marks**
1. After all marks entered and validated:
   - Navigate to: Exams -> Marks Entry -> Submit Marks
   - Select Exam Term, Class, Subject
2. Review Marks:
   - View all entered marks
   - Verify totals
   - Check for any missing entries
3. Submit Marks:
   - Click "Submit Marks"
   - System asks for confirmation
   - Confirm submission
4. System Actions:
   - Locks marks (cannot edit)
   - Changes status to "Submitted"
   - Notifies Exam Controller
   - Creates submission record
   - Logs submission (audit trail)

**Step 5: Unlock Request (if correction needed)**
1. If marks need correction after submission:
   - Navigate to: Exams -> Marks Entry -> Unlock Request
   - Select submitted marks
   - Enter reason for unlock
   - Submit unlock request
2. Exam Controller Reviews:
   - Navigate to: Exams -> Marks Entry -> Unlock Requests
   - View pending requests
   - Review reason
3. Approve/Reject:
   - If Approve:
     * Click "Approve Unlock"
     * Marks unlocked for editing
     * Teacher can make corrections
   - If Reject:
     * Click "Reject"
     * Enter rejection reason
     * Marks remain locked
4. After Correction:
   - Teacher makes corrections
   - Re-submits marks
   - System locks again

**Step 6: Verification Process**
1. Exam Controller accesses: Exams -> Marks Entry -> Verification
2. View Submitted Marks:
   - Filter by:
     * Exam Term
     * Class/Section
     * Subject
     * Teacher
3. Review Marks:
   - Check all students have marks
   - Verify marks are within limits
   - Check for anomalies
4. System Detects Issues:
   - Missing entries (students without marks)
   - Invalid entries (marks exceeding limits)
   - Incomplete entries (missing components)
5. Flag Issues:
   - Select problematic entries
   - Add comments/notes
   - Flag for teacher attention
6. Approve Marks:
   - If all correct:
     * Click "Approve Marks"
     * Status changes to "Verified"
     * Ready for result processing
   - If issues found:
     * Request correction
     * Marks sent back to teacher

**Step 7: Recheck/Approval Process**
1. If marks need correction after verification:
   - Navigate to: Exams -> Marks Entry -> Correction Request
   - Select marks to correct
   - Enter correction details:
     * Student
     * Component
     * Old marks
     * New marks
     * Reason for correction
   - Submit correction request
2. Approval Workflow:
   - Request sent to Exam Controller
   - Exam Controller reviews
   - Approves or rejects
3. If Approved:
   - System updates marks
   - Logs correction (audit trail)
   - Notifies relevant parties
4. Audit Trail:
   - All changes logged:
     * Who made change
     * When changed
     * What changed (old -> new)
     * Reason for change
   - View audit log:
     * Navigate to: Exams -> Audit Log
     * Filter by student/subject/date

**Acceptance Criteria**:
- Marks cannot be altered after submission without approval
- All validation rules are enforced
- Audit trail is complete

#### FR-3.3: Result Processing and Publishing
**Priority**: High  
**Description**: System shall generate and publish results.

**Requirements**:
1. Result generation:
   - Calculate totals per subject
   - Apply grading rules
   - Calculate GPA
   - Apply optional subject rules
   - Determine pass/fail status
2. Result reports:
   - Individual report cards
   - Class-wise result sheet
   - Merit list (class-wise, subject-wise)
   - Fail list
   - Subject-wise pass rate analytics
3. Publishing:
   - Publish to student/parent portal
   - Access control (publish date/time)
   - Print report cards
   - Generate transcripts
4. Result correction:
   - Post-publication correction workflow
   - Re-issue corrected report cards
   - Audit trail

**Detailed Step-by-Step Process**:

**Step 1: Configure Result Rules**
1. Exam Controller logs in
2. Navigate to: Exams -> Result Settings
3. Select exam term and class
4. Configure grading scale, GPA rules, and optional subject rules
5. Save settings

**Step 2: Run Result Generation**
1. Navigate to: Exams -> Results -> Generate
2. Select exam term and class/section
3. Click "Generate Results"
4. System calculates:
   - Total marks
   - Grade and GPA
   - Pass/fail status

**Step 3: Validate Results**
1. Review result summary and anomalies
2. Check for missing marks or invalid totals
3. Re-run generation if corrections were made

**Step 4: Approve Results**
1. Submit results for approval
2. Principal/Exam Controller reviews and approves
3. System locks results after approval

**Step 5: Publish Results**
1. Navigate to: Exams -> Results -> Publish
2. Select classes and publish date
3. Enable student/parent portal visibility
4. Send notifications (optional)

**Step 6: Generate Reports**
1. Generate report cards and transcripts
2. Generate merit list, fail list, and analytics
3. Export to PDF/Excel for printing

**Step 7: Recheck/Correction Workflow**
1. Accept recheck requests (if enabled)
2. Record changes and approvals
3. Regenerate affected results
4. Update audit trail


**Acceptance Criteria**:
- Results are calculated accurately
- Publishing is controlled and secure
- Report cards are printable and professional

#### FR-3.4: Promotion and Academic Year Transition
**Priority**: High  
**Description**: System shall manage student promotion to next class.

**Requirements**:
1. Promotion rules configuration:
   - Pass criteria (minimum marks, subjects)
   - Compulsory subject rules
   - Optional subject rules
2. Promotion execution:
   - Apply promotion rules
   - Promote to next class OR mark as repeat
   - Handle retake exams
3. Next session preparation:
   - Create new academic session
   - Migrate promoted students
   - Handle repeat students
   - Generate enrollment lists

**Detailed Step-by-Step Process**:

**Step 1: Define Promotion Rules**
1. Academic Admin logs in
2. Navigate to: Academics -> Promotion Rules
3. Select class and session
4. Define pass criteria and subject requirements
5. Save rules

**Step 2: Run Promotion**
1. Navigate to: Academics -> Promotions -> Run
2. Select session and class
3. Click "Run Promotion"
4. System calculates promotion status for each student

**Step 3: Review Exceptions**
1. Review list of students marked for repeat/retake
2. Apply overrides (if policy allows)
3. Record reasons for overrides

**Step 4: Assign New Class/Section**
1. Allocate promoted students to new classes/sections
2. Generate new roll numbers (auto/manual)
3. Confirm class strength limits

**Step 5: Confirm Transition**
1. Lock previous session records
2. Activate new academic session
3. Notify students and parents (optional)
4. Generate promotion summary report


**Acceptance Criteria**:
- Promotion rules are applied consistently
- Student data is migrated correctly
- Repeat students are handled appropriately

---

### 3.4 Fees and Finance

#### FR-4.1: Fee Management
**Priority**: High  
**Description**: System shall manage complete fee lifecycle.

**Sub-Requirements**:

**FR-4.1.1: Fee Setup**

**Detailed Step-by-Step Process**:

**Step 1: Create Fee Heads**
1. Login as Accountant or Admin
2. Navigate to: Fees -> Fee Setup -> Fee Heads
3. Click "Add New Fee Head"
4. Enter Fee Head Details:
   - Fee Head Name (e.g., "Tuition Fee", "Exam Fee")
   - Fee Head Code (unique identifier, e.g., "TUI", "EXM")
   - Fee Head Type:
     * One-time (e.g., Admission Fee)
     * Recurring (e.g., Monthly Tuition)
     * Optional (e.g., Library Fee)
   - Description
   - Applicable To:
     * All Classes
     * Specific Classes (select)
   - Tax Applicable: Yes/No
     * If Yes: Enter tax rate
5. Set Fee Head Properties:
   - Is Refundable: Yes/No
   - Is Waivable: Yes/No
   - Display Order (for invoice)
6. Save Fee Head
7. Repeat for all fee heads:
   - Tuition Fee
   - Exam Fee
   - Admission Fee
   - Transport Fee
   - Hostel Fee
   - Library Fee
   - Lab Fee
   - Sports Fee
   - Other fees (as needed)

**Step 2: Setup Class-wise Fee Structure**
1. Navigate to: Fees -> Fee Setup -> Class Fee Structure
2. Select Academic Session
3. Select Class
4. For each Fee Head:
   - Enter Fee Amount
   - Set Frequency:
     * Monthly
     * Quarterly
     * Term-wise
     * Annual
     * One-time
   - Set Due Date (if applicable)
5. Configure Fee Structure:
   - Base Fee Amount
   - Additional Charges (if any)
   - Discounts (if any)
6. Copy Structure (if similar to another class):
   - Select source class
   - Click "Copy Structure"
   - Modify amounts if needed
7. Save Class Fee Structure
8. Repeat for all classes

**Step 3: Setup Category-wise Fee Structure**
1. Navigate to: Fees -> Fee Setup -> Category Fee Structure
2. Create Fee Categories:
   - Full Fee (no discount)
   - Scholarship Category 1 (e.g., 50% discount)
   - Scholarship Category 2 (e.g., 25% discount)
   - Need-based Category
   - Merit-based Category
3. For each Category:
   - Enter Category Name
   - Set Discount Percentage or Fixed Amount
   - Select Applicable Fee Heads:
     * Apply to all fees
     * Apply to specific fees only
4. Save Categories

**Step 4: Setup Scholarship/Waiver Rules**
1. Navigate to: Fees -> Fee Setup -> Scholarships/Waivers
2. Create Scholarship Rule:
   - Rule Name (e.g., "Merit Scholarship")
   - Rule Type:
     * Percentage-based (e.g., 50% off)
     * Fixed Amount (e.g., 5000 off)
     * Conditional (based on criteria)
3. If Percentage-based:
   - Enter Discount Percentage
   - Select Applicable Fee Heads
4. If Fixed Amount:
   - Enter Discount Amount
   - Select Applicable Fee Heads
5. If Conditional:
   - Set Conditions:
     * Merit-based: Minimum GPA/Marks
     * Need-based: Income criteria
     * Other criteria
   - Set Discount (percentage or amount)
6. Set Validity:
   - Start Date
   - End Date
   - Or Permanent
7. Save Scholarship Rule
8. Repeat for all scholarship types

**Step 5: Setup Fine Rules**
1. Navigate to: Fees -> Fee Setup -> Fine Rules
2. Create Fine Rule:
   - Rule Name (e.g., "Late Payment Fine")
   - Fine Type:
     * Percentage of due amount
     * Fixed amount per period
     * Fixed amount per day
3. If Percentage-based:
   - Enter Fine Percentage (e.g., 5%)
   - Calculate on: Due Amount / Outstanding Balance
4. If Fixed Amount:
   - Enter Fine Amount
   - Set Frequency:
     * Per day
     * Per week
     * Per month
     * One-time
5. Set Fine Calculation Rules:
   - Grace Period (days before fine applies)
   - Maximum Fine Cap (if applicable)
   - Fine Calculation Start Date
6. Select Applicable Fee Heads
7. Save Fine Rule

**Step 6: Setup Installment Plans**
1. Navigate to: Fees -> Fee Setup -> Installment Plans
2. Create Installment Plan:
   - Plan Name (e.g., "Monthly Installment")
   - Number of Installments (e.g., 12 for monthly)
   - Installment Frequency:
     * Monthly
     * Quarterly
     * Custom
3. Configure Installment Schedule:
   - Start Date
   - Due Date for each installment
   - Amount per installment:
     * Equal installments
     * Custom amounts
4. Set Partial Payment Rules:
   - Allow Partial Payment: Yes/No
   - Minimum Payment Amount
   - Payment Priority (which fee head paid first)
5. Save Installment Plan
6. Assign Plan to Classes:
   - Select classes
   - Assign installment plan
   - Save

**FR-4.1.2: Billing and Invoicing**

**Detailed Step-by-Step Process**:

**Step 1: Automatic Invoice Generation**
1. System automatically generates invoices based on schedule:
   - Monthly invoices: Generated on 1st of each month
   - Term-wise: Generated at term start
   - Annual: Generated at session start
2. Invoice Generation Process:
   - System runs scheduled job
   - For each active student:
     * Retrieves fee structure
     * Calculates fees
     * Applies previous dues
     * Applies waivers/scholarships
     * Applies fines (if applicable)
     * Generates invoice
3. View Generated Invoices:
   - Navigate to: Fees -> Invoices -> View All
   - Filter by:
     * Class
     * Section
     * Date Range
     * Payment Status

**Step 2: Manual Invoice Generation (if needed)**
1. Navigate to: Fees -> Invoices -> Generate Invoice
2. Select Student(s):
   - Individual student
   - Bulk by class/section
3. Select Fee Period:
   - Month
   - Term
   - Custom date range
4. Review Fee Calculation:
   - Base fees
   - Previous dues
   - Waivers applied
   - Fines (if any)
   - Total amount
5. Generate Invoice:
   - Click "Generate Invoice"
   - System creates invoice
   - Invoice number assigned

**Step 3: Invoice Calculation Details**
1. System calculates invoice as follows:
   - Base Fee Amount:
     * Retrieves class fee structure
     * Applies fee amounts
   - Previous Dues:
     * Sums all unpaid invoices
     * Includes overdue amounts
   - Waivers/Scholarships:
     * Checks student category
     * Applies applicable discounts
     * Calculates waiver amount
   - Fines:
     * Checks payment due dates
     * Calculates fine if overdue
     * Applies fine rules
   - Total Calculation:
     * Base Fees + Previous Dues - Waivers + Fines = Total Due

**Step 4: Invoice Notification**
1. After invoice generation:
   - System sends notifications
2. Email Notification:
   - System sends email to parent
   - Email contains:
     * Invoice PDF attachment
     * Invoice summary
     * Payment instructions
     * Payment link (if online payment enabled)
3. SMS Notification:
   - System sends SMS to parent
   - SMS contains:
     * Invoice number
     * Total amount
     * Due date
     * Payment link (if applicable)
4. Portal Notification:
   - Notification appears in parent portal
   - Parent can view and download invoice

**Step 5: Invoice Customization**
1. Navigate to: Fees -> Settings -> Invoice Template
2. Customize Invoice Template:
   - Upload School Logo
   - Set Header Text
   - Set Footer Text
   - Add Custom Fields
   - Set Terms and Conditions
3. Preview Invoice:
   - Click "Preview"
   - Review appearance
4. Save Template

**FR-4.1.2: Billing and Invoicing**
1. Automatic invoice generation:
   - Monthly invoices
   - Term-wise invoices
   - Annual invoices
2. Invoice calculation:
   - Apply base fees
   - Apply previous dues
   - Apply waivers/scholarships
   - Apply fines
   - Calculate totals
3. Invoice notification:
   - Email/SMS to parents
   - Portal notification
4. Invoice customization:
   - School logo
   - Custom fields
   - Terms and conditions

**FR-4.1.3: Payment Collection**
1. Payment methods:
   - Cash
   - Bank deposit
   - Card payment
   - Mobile banking (bKash, Nagad, etc.)
   - Online gateway (SSLCommerz, etc.)
2. Payment entry:
   - Full payment
   - Partial payment (multiple installments)
   - Advance payment
3. Receipt generation:
   - Unique receipt number
   - Payment details
   - Print receipt
   - Email receipt
4. Student ledger update:
   - Real-time balance update
   - Payment history
5. Refund workflow:
   - Refund request
   - Approval workflow
   - Payment processing
   - Ledger adjustment

**FR-4.1.4: Dues Management**
1. Due list generation:
   - Class-wise
   - Section-wise
   - Month-wise
   - Custom date range
2. Reminder system:
   - SMS reminders
   - Email reminders
   - Portal notifications
   - Automated reminder schedule
3. Defaulter management:
   - Defaulter list
   - Exam admit restriction (policy-based)
   - Portal access restriction (policy-based)
   - Custom restrictions

**Acceptance Criteria**:
- Invoices are generated accurately
- Payment reconciliation is automatic
- Refunds are properly tracked
- Dues are calculated correctly

#### FR-4.2: Full Accounting Module
**Priority**: High  
**Description**: System shall provide complete accounting functionality.

**Sub-Requirements**:

**FR-4.2.1: Accounting Setup**
1. Chart of Accounts (COA):
   - Assets (Current, Fixed)
   - Liabilities (Current, Long-term)
   - Income (Fee Income, Other Income)
   - Expenses (Salaries, Utilities, etc.)
   - Equity
2. Account setup:
   - Cash accounts (multiple)
   - Bank accounts (multiple)
   - Fee income accounts
   - Expense categories
   - Sub-accounts support

**FR-4.2.2: Voucher Management**
1. Journal Voucher (JV):
   - Adjustments
   - Corrections
   - Opening balances
2. Payment Voucher (PV):
   - Expense payments
   - Supplier payments
   - Salary payments
   - Multi-account support
3. Receipt Voucher (RV):
   - Non-fee receipts
   - Donations
   - Other income
4. Contra Voucher (CV):
   - Cash to bank transfer
   - Bank to cash transfer
   - Bank to bank transfer
5. Approval workflow:
   - Multi-level approval
   - Approval limits
   - Approval notifications

**FR-4.2.3: Bank Management**
1. Bank deposit slip generation
2. Bank reconciliation:
   - Import bank statement
   - Match transactions
   - Reconcile differences
3. Cheque management:
   - Cheque register
   - Cheque printing
   - Cheque status tracking

**FR-4.2.4: Financial Reports**
1. Trial Balance
2. Profit & Loss Statement
3. Balance Sheet
4. Cash Flow Statement (optional)
5. Fee collection vs expenses report
6. Account-wise ledger
7. Day book
8. Cash book
9. Bank book
10. Custom date range reports

**Detailed Step-by-Step Process**:

**Step 1: Configure Chart of Accounts (COA)**
1. Accountant logs in
2. Navigate to: Accounting -> COA
3. Create account groups (Assets, Liabilities, Income, Expense, Equity)
4. Add ledger accounts under each group
5. Save COA

**Step 2: Set Fiscal Year and Opening Balances**
1. Navigate to: Accounting -> Fiscal Year
2. Define start/end dates
3. Enter opening balances for accounts
4. Save and lock opening balances

**Step 3: Create Vouchers**
1. Navigate to: Accounting -> Vouchers
2. Select voucher type (JV/PV/RV/CV)
3. Enter voucher details:
   - Date
   - Account heads
   - Amounts
   - Narration
4. Attach supporting documents (optional)
5. Save voucher (draft)

**Step 4: Approve and Post Vouchers**
1. Submit voucher for approval
2. Approver reviews and approves/rejects
3. On approval, system posts to ledger
4. Audit trail is updated

**Step 5: Bank Reconciliation**
1. Navigate to: Accounting -> Bank Reconciliation
2. Import bank statement or enter manually
3. Match transactions
4. Post adjustments for unmatched entries
5. Save reconciliation report

**Step 6: Generate Financial Reports**
1. Navigate to: Accounting -> Reports
2. Select report type (Trial Balance, P&L, Balance Sheet)
3. Set date range and filters
4. Generate report
5. Export to PDF/Excel

**Step 7: Period Closing**
1. Review all pending vouchers
2. Post adjustments and accruals
3. Close period and lock entries
4. Generate closing summary


**Acceptance Criteria**:
- All accounting principles are followed
- Reports are accurate and auditable
- Bank reconciliation is efficient
- Vouchers cannot be deleted (only reversed)

---

### 3.5 HR and Payroll

#### FR-5.1: HR Setup and Staff Management
**Priority**: High  
**Description**: System shall manage staff information and lifecycle.

**Requirements**:
1. Staff profile creation:
   - Personal information
   - Contact details
   - Employment details
   - Qualifications
   - Documents (contracts, certificates)
2. Role and department assignment
3. Staff history:
   - Promotion records
   - Transfer records
   - Performance records
4. Staff documents management
5. Staff search and filtering

**Detailed Step-by-Step Process**:

**Step 1: Configure HR Master Data**
1. HR logs in
2. Navigate to: HR -> Settings
3. Create departments, designations, and grade levels
4. Configure employment types (permanent/contract)
5. Save settings

**Step 2: Add Staff Profile**
1. Navigate to: HR -> Staff -> Add New
2. Enter personal details, contact info, and IDs
3. Upload documents (photo, CV, certificates)
4. Enter employment details:
   - Department
   - Designation
   - Joining date
   - Salary grade
5. Save staff profile

**Step 3: Assign Roles and Access**
1. Navigate to: Settings -> Users & Roles
2. Create user account for staff
3. Assign role(s) and permissions
4. Save and notify staff

**Step 4: Manage Staff Lifecycle**
1. Record probation confirmation
2. Update promotions or transfers
3. Record resignations/termination
4. Archive inactive staff records


**Acceptance Criteria**:
- Staff profiles are complete and searchable
- Document management is efficient
- History is maintained accurately

#### FR-5.2: Leave Management
**Priority**: High  
**Description**: System shall manage staff leave.

**Requirements**:
1. Leave types setup:
   - Casual leave, Sick leave, Annual leave
   - Maternity/Paternity leave
   - Unpaid leave
2. Leave balance rules:
   - Annual allocation
   - Carry forward rules
   - Encashment rules
3. Leave application:
   - Staff applies for leave
   - Approval workflow
   - Leave balance check
4. Leave approval:
   - Single/multi-level approval
   - Approval notifications
5. Attendance integration:
   - Automatic attendance update
   - Leave balance update

**Detailed Step-by-Step Process**:

**Step 1: Configure Leave Types**
1. HR logs in
2. Navigate to: HR -> Leave -> Types
3. Create leave types (casual, sick, earned, etc.)
4. Set annual balance, carry forward rules, and eligibility
5. Save leave types

**Step 2: Assign Leave Balances**
1. Navigate to: HR -> Leave -> Balances
2. Select staff or staff group
3. Assign opening balances
4. Save balances

**Step 3: Staff Applies for Leave**
1. Staff logs in
2. Navigate to: HR -> Leave -> Apply
3. Select leave type and date range
4. Add reason and attachments (optional)
5. Submit request

**Step 4: Approve/Reject Leave**
1. Manager/HR reviews request
2. Check balance and overlaps
3. Approve or reject with remarks
4. System updates leave balance

**Step 5: Update Attendance and Payroll**
1. Approved leave updates attendance records
2. Payroll picks up leave deductions (if any)
3. Generate leave report


**Acceptance Criteria**:
- Leave balances are accurate
- Approval workflow is flexible
- Integration with attendance is seamless

#### FR-5.3: Payroll Processing
**Priority**: High  
**Description**: System shall process staff salaries.

**Requirements**:
1. Salary structure setup:
   - Basic salary
   - Allowances (house rent, transport, medical, etc.)
   - Deductions (tax, provident fund, loan, etc.)
   - Formula-based calculations
2. Payroll cycle:
   - Monthly processing
   - Pull attendance data
   - Calculate late deductions
   - Calculate overtime (if applicable)
   - Apply deductions
   - Apply bonuses/incentives
3. Payslip generation:
   - Detailed breakdown
   - Print payslip
   - Email payslip
4. Salary disbursement:
   - Record payment method (cash/bank transfer)
   - Payment date tracking
   - Bank file generation (for bulk transfer)
5. Payroll reports:
   - Salary register
   - Tax reports
   - PF reports
   - Loan deduction reports

**Detailed Step-by-Step Process**:

**Step 1: Configure Salary Structure**
1. HR/Accounts logs in
2. Navigate to: HR -> Payroll -> Salary Structure
3. Define salary components:
   - Basic
   - Allowances
   - Deductions
4. Assign structure to staff
5. Save configuration

**Step 2: Prepare Payroll**
1. Navigate to: HR -> Payroll -> Run Payroll
2. Select payroll period
3. Import attendance, overtime, and leave data
4. System calculates gross and net salary

**Step 3: Review Payroll Sheet**
1. Review staff-wise calculations
2. Edit adjustments or bonuses (if authorized)
3. Validate totals

**Step 4: Approve Payroll**
1. Submit payroll for approval
2. Approver reviews and approves
3. System locks payroll for the period

**Step 5: Generate Payslips**
1. Navigate to: HR -> Payroll -> Payslips
2. Generate payslips for all staff
3. Distribute via portal/email

**Step 6: Disbursement and Posting**
1. Record salary payment (bank/cash)
2. Post to accounting ledger
3. Generate payroll summary report


**Acceptance Criteria**:
- Salary calculations are accurate
- Payslips are detailed and clear
- Integration with attendance is automatic

---

### 3.6 Procurement, Inventory, and Assets

#### FR-6.1: Procurement Workflow
**Priority**: Medium  
**Description**: System shall manage procurement process.

**Requirements**:
1. Purchase Requisition (PR):
   - Department raises PR
   - Item details, quantities, specifications
   - Estimated cost
2. Approval workflow:
   - Multi-level approval
   - Budget check
   - Approval notifications
3. Purchase Order (PO):
   - Generate PO to supplier
   - PO number (unique, sequential)
   - Terms and conditions
   - Print/email PO
4. Goods Receive Note (GRN):
   - Receive goods against PO
   - Quality check
   - Quantity verification
5. Invoice entry:
   - Supplier invoice
   - Match with PO and GRN
   - Stock update
6. Supplier payment:
   - Link to accounting (PV)
   - Payment tracking

**Detailed Step-by-Step Process**:

**Step 1: Raise Purchase Requisition (PR)**
1. Department user logs in
2. Navigate to: Inventory -> Procurement -> PR
3. Enter item, quantity, and required date
4. Submit PR for approval

**Step 2: Approve PR**
1. Approver reviews PR
2. Approve or reject with remarks
3. System notifies requester

**Step 3: Create Purchase Order (PO)**
1. Store/Accounts user opens approved PR
2. Select supplier and create PO
3. Set delivery date and terms
4. Send PO to supplier

**Step 4: Receive Goods (GRN)**
1. Receive items from supplier
2. Navigate to: Inventory -> GRN
3. Match PO items and quantities
4. Record received quantities and quality check
5. Save GRN and update stock

**Step 5: Record Supplier Invoice**
1. Enter supplier invoice details
2. Match invoice with PO/GRN
3. Record tax and discounts
4. Save invoice

**Step 6: Make Payment**
1. Create payment voucher
2. Approve payment
3. Record payment and update ledger

**Step 7: Procurement Reporting**
1. Generate PR/PO/GRN reports
2. Track supplier performance
3. Review pending orders


**Acceptance Criteria**:
- Complete procurement cycle is tracked
- Stock is updated automatically
- Accounting integration is seamless

#### FR-6.2: Inventory/Store Management
**Priority**: Medium  
**Description**: System shall manage inventory.

**Requirements**:
1. Item master:
   - Item code, name, category
   - Unit of measurement
   - Reorder level
   - Maximum stock level
2. Stock management:
   - Stock in (purchase, transfer in)
   - Stock out (issue, transfer out, damage)
   - Current stock tracking
3. Minimum stock alerts:
   - Automatic alerts when stock below reorder level
   - Alert notifications
4. Issue to departments:
   - Issue slip generation
   - Department-wise tracking
   - Approval workflow
5. Stock audit:
   - Physical stock count
   - Stock adjustment
   - Variance reporting
6. Stock reports:
   - Stock register
   - Item-wise stock
   - Department-wise consumption
   - Low stock report

**Detailed Step-by-Step Process**:

**Step 1: Item Master Setup**
1. Store user logs in
2. Navigate to: Inventory -> Items
3. Create item categories and units
4. Add items with reorder levels
5. Save item master

**Step 2: Record Stock In**
1. Navigate to: Inventory -> Stock In
2. Select source (GRN or direct receipt)
3. Enter quantities and batch details
4. Save and update stock

**Step 3: Issue Stock Out**
1. Navigate to: Inventory -> Issue
2. Select department and items
3. Enter quantities
4. Save issue slip and update stock

**Step 4: Stock Return and Adjustment**
1. Record returns from departments
2. Enter adjustments for damaged/expired items
3. Save and update stock

**Step 5: Stock Audit**
1. Perform periodic stock count
2. Compare physical vs system quantities
3. Record variances and approvals
4. Generate stock audit report

**Step 6: Reorder Alerts**
1. System monitors stock levels
2. Generate low stock alerts
3. Create PR from alert


**Acceptance Criteria**:
- Stock levels are accurate
- Alerts are timely
- Audit process is efficient

#### FR-6.3: Asset Management
**Priority**: Medium  
**Description**: System shall manage fixed assets.

**Requirements**:
1. Asset register:
   - Asset code (unique)
   - Asset name, category
   - Purchase date, cost
   - Supplier information
   - Warranty information
2. Asset assignment:
   - Assign to room/department
   - Assign to staff (personal assets)
   - Assignment history
3. Maintenance management:
   - Maintenance schedule
   - Service logs
   - Maintenance cost tracking
   - Service provider information
4. Depreciation (optional):
   - Depreciation method (straight-line, reducing balance)
   - Depreciation calculation
   - Depreciation reports
5. Asset disposal:
   - Disposal workflow
   - Disposal reason
   - Disposal value
   - Accounting integration

**Detailed Step-by-Step Process**:

**Step 1: Asset Category Setup**
1. Admin logs in
2. Navigate to: Assets -> Categories
3. Create asset categories and depreciation rules (optional)
4. Save categories

**Step 2: Register Asset**
1. Navigate to: Assets -> Register
2. Enter asset details (name, serial, purchase date, cost)
3. Upload purchase documents
4. Assign asset to location or staff
5. Save asset

**Step 3: Asset Allocation and Tracking**
1. Track asset custody changes
2. Record transfers between rooms/staff
3. Update asset status (active/repair/disposed)

**Step 4: Maintenance Management**
1. Schedule maintenance
2. Record service history and costs
3. Set next service date

**Step 5: Depreciation (Optional)**
1. Run depreciation calculation
2. Post depreciation entries to accounting
3. Generate depreciation report

**Step 6: Asset Disposal**
1. Initiate disposal request
2. Approve disposal
3. Record disposal method and value
4. Archive asset record


**Acceptance Criteria**:
- Assets are tracked throughout lifecycle
- Maintenance schedules are followed
- Depreciation is calculated accurately

---

### 3.7 Auxiliary Modules

#### FR-7.1: Library Management
**Priority**: Medium  
**Description**: System shall manage library operations.

**Requirements**:
1. Book catalog:
   - Book details (title, author, ISBN, category)
   - Barcode/QR code generation
   - Multiple copies tracking
2. Issue/Return:
   - Book issue to students/staff
   - Return processing
   - Renewal
   - Due date tracking
3. Fine management:
   - Fine calculation rules
   - Fine collection
   - Integration with fee system
4. Reports:
   - Overdue books
   - Book inventory
   - Member-wise issue history
   - Popular books report

**Detailed Step-by-Step Process**:

**Step 1: Library Setup**
1. Librarian logs in
2. Navigate to: Library -> Settings
3. Configure loan periods and fine rules
4. Save settings

**Step 2: Catalog Books**
1. Navigate to: Library -> Catalog
2. Add book details (title, author, ISBN)
3. Add copies and barcode numbers
4. Save catalog

**Step 3: Issue Books**
1. Navigate to: Library -> Issue
2. Search student/staff
3. Scan barcode and issue book
4. Set due date
5. Save transaction

**Step 4: Return and Renewal**
1. Scan returned book
2. System calculates fine if overdue
3. Collect fine or waive (if authorized)
4. Renew if requested

**Step 5: Reservations**
1. Place reservation for unavailable book
2. Notify user when available
3. Process reservation issue

**Step 6: Reports**
1. Generate overdue list
2. Inventory and circulation reports
3. Export reports


**Acceptance Criteria**:
- Book tracking is accurate
- Fines are calculated correctly
- Integration with fees works seamlessly

#### FR-7.2: Transport Management
**Priority**: Medium  
**Description**: System shall manage transport operations.

**Requirements**:
1. Vehicle management:
   - Vehicle registration, model, capacity
   - Driver assignment
   - Vehicle documents (license, insurance, fitness)
   - Document expiry alerts
2. Route management:
   - Route definition
   - Stops definition
   - Route distance, time
3. Student allocation:
   - Assign students to routes
   - Seat allocation
   - Pickup/drop time
4. Transport fee:
   - Route-wise fee structure
   - Auto-billing integration
5. Driver attendance/logs (optional):
   - Driver check-in/out
   - Route completion logs

**Detailed Step-by-Step Process**:

**Step 1: Setup Transport Master Data**
1. Transport Manager logs in
2. Navigate to: Transport -> Setup
3. Add vehicles, routes, stops, and drivers
4. Save transport master data

**Step 2: Assign Students to Routes**
1. Navigate to: Transport -> Student Allocation
2. Select student and route/stop
3. Assign pickup/drop timings
4. Save allocation

**Step 3: Generate Transport Fees**
1. Navigate to: Transport -> Billing
2. Set route-wise fees
3. Generate monthly/term transport invoices
4. Post fees to student ledger

**Step 4: Daily Route Management**
1. Record driver attendance
2. Track route completion (optional)
3. Log delays or incidents

**Step 5: Reports**
1. Generate route-wise student list
2. Vehicle maintenance and fuel reports
3. Transport fee collection report


**Acceptance Criteria**:
- Route allocation is efficient
- Transport fees are billed correctly
- Document alerts are timely

#### FR-7.3: Hostel Management
**Priority**: Medium  
**Description**: System shall manage hostel operations.

**Requirements**:
1. Room/bed management:
   - Room allocation
   - Bed allocation
   - Capacity management
2. Hostel fee:
   - Room-wise fee structure
   - Auto-billing integration
3. Visitor management:
   - Visitor log
   - Entry/exit time
   - Visitor ID verification
4. Discipline management:
   - Hostel-specific discipline records
   - Rules and violations
5. Meal plan (optional):
   - Meal plan setup
   - Meal attendance
   - Meal cost tracking

**Detailed Step-by-Step Process**:

**Step 1: Hostel Setup**
1. Hostel Manager logs in
2. Navigate to: Hostel -> Setup
3. Add hostels, floors, rooms, and bed capacity
4. Set hostel rules and fees
5. Save setup

**Step 2: Allocate Rooms/Beds**
1. Navigate to: Hostel -> Allocation
2. Select student and available bed
3. Assign check-in date
4. Save allocation

**Step 3: Hostel Billing**
1. Navigate to: Hostel -> Billing
2. Generate hostel fee invoices
3. Post to student ledger

**Step 4: Check-out and Transfers**
1. Process check-out request
2. Verify clearance (fees, damages)
3. Update bed status
4. Record transfer if moving rooms

**Step 5: Visitor Log and Discipline**
1. Log visitor entry/exit
2. Record hostel discipline incidents
3. Generate hostel reports


**Acceptance Criteria**:
- Room allocation is efficient
- Hostel fees are billed correctly
- Visitor management is secure

#### FR-7.4: Canteen/POS
**Priority**: Low  
**Description**: System shall manage canteen sales (optional).

**Requirements**:
1. Item setup:
   - Menu items
   - Pricing
2. Sales:
   - Point of sale interface
   - Payment processing
3. Student wallet/card (optional):
   - Prepaid wallet
   - Card-based payment
4. Sales reports:
   - Daily sales
   - Item-wise sales
   - Revenue reports

**Detailed Step-by-Step Process**:

**Step 1: Item and Pricing Setup**
1. Canteen Manager logs in
2. Navigate to: POS -> Items
3. Add items, categories, and prices
4. Configure taxes and discounts
5. Save items

**Step 2: Stock Management**
1. Record stock purchases
2. Update stock quantities
3. Set low stock alerts

**Step 3: Sales Transaction**
1. Open POS screen
2. Scan/select items
3. Apply discounts (if allowed)
4. Accept payment (cash/card/wallet)
5. Print or send receipt

**Step 4: Refunds and Void**
1. Search transaction
2. Process refund or void with reason
3. Update stock and ledger

**Step 5: Day Closing**
1. Reconcile cash drawer
2. Generate daily sales report
3. Close day and lock transactions


**Acceptance Criteria**:
- Sales are tracked accurately
- Payment processing is efficient

---

### 3.8 Communication and Front Desk

#### FR-8.1: Notice and Messaging
**Priority**: High  
**Description**: System shall manage communication.

**Requirements**:
1. Notice management:
   - Create notices
   - Target audience (class, section, role, all)
   - Attachments
   - Publish date/time
   - Expiry date
2. Broadcast messaging:
   - SMS broadcast
   - Email broadcast
   - WhatsApp broadcast (optional)
   - Portal notification
3. Two-way messaging:
   - Teacher <-> Parent messaging
   - Admin <-> Staff messaging
   - Message threads
   - Read receipts
   - Message logs

**Detailed Step-by-Step Process**:

**Step 1: Create Notice/Message**
1. Admin/Teacher logs in
2. Navigate to: Communication -> Notices
3. Click "Create New"
4. Enter title and message content
5. Attach files (optional)

**Step 2: Select Audience**
1. Choose target audience:
   - All users
   - Specific roles
   - Specific classes/sections
2. Apply filters as needed

**Step 3: Choose Channels**
1. Select delivery channels:
   - In-app
   - Email
   - SMS
   - WhatsApp (optional)
2. Choose template if required

**Step 4: Schedule and Send**
1. Send immediately or schedule later
2. Click "Send"
3. System logs delivery status

**Step 5: Track Delivery**
1. View sent messages
2. Check delivery success/failure
3. Retry failed messages if needed

**Step 6: Two-way Messaging (Optional)**
1. Enable replies for targeted messages
2. Review responses
3. Export conversation logs


**Acceptance Criteria**:
- Notices reach intended audience
- Broadcasts are delivered reliably
- Messaging is secure and logged

#### FR-8.2: Front Desk and Gate Security
**Priority**: Medium  
**Description**: System shall manage front desk operations.

**Requirements**:
1. Visitor management:
   - Visitor registration
   - Purpose of visit
   - Person to meet
   - Entry time, exit time
   - ID proof capture
   - Visitor badge generation
2. Gate pass:
   - Early leave pass for students
   - Who collected (parent/guardian)
   - Time of collection
   - Approval workflow
3. Dispatch/Receiving:
   - Courier log
   - Incoming/outgoing register
   - Delivery tracking

**Detailed Step-by-Step Process**:

**Step 1: Visitor Entry**
1. Front Desk logs in
2. Navigate to: Front Desk -> Visitors
3. Enter visitor details and purpose
4. Capture ID proof and photo
5. Assign person to visit and issue visitor pass

**Step 2: Visitor Exit**
1. Record exit time on return
2. Retrieve pass and close visit record

**Step 3: Student Gate Pass**
1. Navigate to: Front Desk -> Gate Pass
2. Select student and reason
3. Record guardian details and pickup time
4. Issue gate pass
5. Close pass on student exit

**Step 4: Dispatch/Receiving Log**
1. Navigate to: Front Desk -> Dispatch/Receiving
2. Record courier details and tracking number
3. Update received status
4. Generate dispatch report

**Step 5: Reports**
1. Generate visitor logs by date
2. Export gate pass records
3. Review security incidents


**Acceptance Criteria**:
- Visitor records are complete
- Gate passes are tracked
- Dispatch log is maintained

#### FR-8.3: Events, Clubs, and Activities
**Priority**: Medium  
**Description**: System shall manage extracurricular activities.

**Requirements**:
1. Event management:
   - Create events
   - Schedule, venue
   - Participant management
   - Event registration
2. Clubs management:
   - Club creation
   - Membership management
   - Activity logs
3. Student achievements:
   - Achievement records
   - Certificates
   - Awards

**Detailed Step-by-Step Process**:

**Step 1: Create Event or Club**
1. Admin/Teacher logs in
2. Navigate to: Activities -> Events/Clubs
3. Click "Create New"
4. Enter event/club details, dates, and organizer
5. Save

**Step 2: Register Participants**
1. Open event/club record
2. Select eligible classes/roles
3. Add participants or allow self-registration
4. Capture consent if required

**Step 3: Schedule and Announce**
1. Publish event schedule
2. Send notices to participants
3. Reserve rooms/resources (if needed)

**Step 4: Record Attendance and Outcomes**
1. Take attendance on event day
2. Record results, awards, or achievements
3. Upload photos or documents (optional)

**Step 5: Close and Report**
1. Close event
2. Generate participation and achievement reports
3. Archive event record


**Acceptance Criteria**:
- Events are well-organized
- Club activities are tracked
- Achievements are recorded

---

### 3.9 Documents and Certificates

#### FR-9.1: Certificate and Document Management
**Priority**: High  
**Description**: System shall manage certificates and documents.

**Requirements**:
1. Certificate templates:
   - Transfer Certificate (TC)
   - Testimonial
   - Bonafide certificate
   - Character certificate
   - Transcript
   - Custom templates
2. Certificate generation:
   - Auto-fill student data
   - Unique certificate number
   - QR code generation (optional)
   - Digital signature
3. Approval workflow:
   - Certificate approval
   - Print authorization
4. Document vault:
   - Secure document storage
   - Document search
   - Access control
5. Archive:
   - Historical certificate archive
   - Search and retrieval

**Detailed Step-by-Step Process**:

**Step 1: Configure Templates**
1. Admin logs in
2. Navigate to: Certificates -> Templates
3. Create or upload template
4. Map fields (student name, ID, dates)
5. Save template

**Step 2: Configure Numbering**
1. Navigate to: Certificates -> Settings
2. Set certificate numbering format
3. Enable unique number validation

**Step 3: Generate Certificate**
1. Navigate to: Certificates -> Generate
2. Select student(s) and certificate type
3. Preview certificate
4. Submit for approval (if required)

**Step 4: Approve and Issue**
1. Approver reviews request
2. Approve or reject with remarks
3. System generates certificate number
4. Print or export PDF

**Step 5: Verification and Archive**
1. Store certificate in document vault
2. Enable QR verification (optional)
3. Maintain audit log


**Acceptance Criteria**:
- Certificates are professional and accurate
- QR codes are scannable (if implemented)
- Document vault is secure

---

### 3.10 Reports and Dashboards

#### FR-10.1: Role-Based Dashboards
**Priority**: High  
**Description**: System shall provide role-specific dashboards.

**Requirements**:
1. Principal Dashboard:
   - Student strength
   - Attendance summary
   - Fee collection summary
   - Exam results overview
   - Staff attendance
   - Financial summary
2. Academic Admin Dashboard:
   - Timetable status
   - Exam progress
   - Promotion status
   - Attendance trends
3. Accounts Dashboard:
   - Daily collection
   - Dues summary
   - Daily cashbook
   - P&L summary
4. HR Dashboard:
   - Staff attendance
   - Leave summary
   - Payroll status
5. Teacher Dashboard:
   - Assigned classes
   - Pending attendance
   - Pending assignment grading
   - Upcoming exams
6. Parent/Student Dashboard:
   - Attendance summary
   - Fee dues
   - Homework/assignments
   - Exam results
   - Notices

**Detailed Step-by-Step Process**:

**Step 1: Configure Dashboard Widgets**
1. Admin logs in
2. Navigate to: Reports -> Dashboards -> Settings
3. Assign widgets per role
4. Save configuration

**Step 2: Access Dashboard**
1. User logs in
2. System loads role-specific dashboard
3. User views KPIs and summaries

**Step 3: Filter and Drill Down**
1. Apply filters (date/class/department)
2. Click widget to open detailed report
3. Export if needed

**Step 4: Personalization (Optional)**
1. User rearranges widgets
2. Save layout preferences


**Acceptance Criteria**:
- Dashboards load quickly
- Data is accurate and real-time
- Widgets are customizable (optional)

#### FR-10.2: Reports and Exports
**Priority**: High  
**Description**: System shall provide comprehensive reporting.

**Requirements**:
1. Attendance reports:
   - Daily, monthly, term-wise
   - Class-wise, student-wise
   - Subject-wise (for period attendance)
2. Exam analytics:
   - Subject-wise pass rate
   - Class-wise performance
   - Merit lists
3. Fee reports:
   - Collection reports
   - Defaulter reports
   - Fee structure reports
4. Accounting reports:
   - Trial Balance, P&L, Balance Sheet
   - Ledger reports
   - Day book, Cash book
5. Payroll reports:
   - Salary register
   - Tax reports
6. Inventory/Asset reports:
   - Stock reports
   - Asset register
7. Student strength reports:
   - Class-wise strength
   - Section-wise strength
   - Category-wise strength
8. Export formats:
   - PDF
   - Excel (XLSX)
   - CSV
9. Report customization:
   - Date range selection
   - Filter options
   - Column selection

**Detailed Step-by-Step Process**:

**Step 1: Select Report**
1. User navigates to: Reports
2. Select report category and type
3. Open report parameters

**Step 2: Apply Filters**
1. Set date range, class, section, or department
2. Apply status filters (paid/unpaid, active/inactive)
3. Click "Generate"

**Step 3: Review Report**
1. Review totals and data accuracy
2. Drill down to detail rows
3. Save report view (optional)

**Step 4: Export or Schedule**
1. Export to PDF/Excel/CSV
2. Schedule report delivery (optional)
3. System logs export activity


**Acceptance Criteria**:
- Reports are accurate
- Exports work correctly
- Reports are printable

---

### 3.11 Year-End and Session Closing

#### FR-11.1: Academic Closing
**Priority**: High  
**Description**: System shall manage academic year closing.

**Requirements**:
1. Lock results and reports for the session
2. Promote/retain students (FR-3.4)
3. Generate annual transcripts
4. Generate certificates for graduates
5. Move graduates to Alumni module
6. Archive academic data

**Detailed Step-by-Step Process**:

**Step 1: Finalize Results**
1. Exam Controller confirms all results published
2. Lock result edits
3. Generate final report cards

**Step 2: Complete Promotions**
1. Run promotion process
2. Review exceptions
3. Confirm class allocations

**Step 3: Archive Session Data**
1. Lock attendance, exams, and marks
2. Create session archive snapshot
3. Store archives per retention policy

**Step 4: Generate Final Documents**
1. Generate transcripts and certificates
2. Move graduates to alumni
3. Publish session closing report


**Acceptance Criteria**:
- Data is locked correctly
- Promotion is executed accurately
- Alumni data is migrated

#### FR-11.2: Finance Closing
**Priority**: High  
**Description**: System shall manage financial year closing.

**Requirements**:
1. Close fee cycle:
   - Freeze old invoices (or carry forward dues)
   - Final fee reconciliation
2. Close accounting period:
   - Final adjustments
   - Final vouchers
   - Period lock
3. Generate final financial statements:
   - Final P&L
   - Final Balance Sheet
4. Start new financial year:
   - Opening balances
   - New period setup

**Detailed Step-by-Step Process**:

**Step 1: Reconcile Fees and Accounts**
1. Verify all fee invoices and receipts
2. Resolve pending dues or adjustments
3. Reconcile cash and bank balances

**Step 2: Post Adjustments**
1. Record accruals and provisions
2. Post adjusting entries
3. Review ledger balances

**Step 3: Close Financial Period**
1. Generate trial balance
2. Review and approve P&L and Balance Sheet
3. Close period and lock vouchers

**Step 4: Carry Forward Balances**
1. Roll forward opening balances
2. Start new fiscal year
3. Generate finance closing report


**Acceptance Criteria**:
- Financial closing is accurate
- Period locks are enforced
- Opening balances are correct

#### FR-11.3: System Archival
**Priority**: Medium  
**Description**: System shall archive old data.

**Requirements**:
1. Archive logs (based on retention policy)
2. Archive old academic data
3. Backup final snapshot
4. Reset sequences (optional, for new year)

**Detailed Step-by-Step Process**:

**Step 1: Prepare Archival Scope**
1. Admin logs in
2. Navigate to: Settings -> Archival
3. Select academic/financial period
4. Review data size and retention rules

**Step 2: Generate Archive**
1. Create archive snapshot
2. Verify archive integrity
3. Store archive to backup location

**Step 3: Verify Restore**
1. Perform test restore in staging
2. Validate data consistency
3. Document restore verification

**Step 4: Purge (If Allowed)**
1. Purge data per policy after archive
2. Log purge actions
3. Generate archival report


**Acceptance Criteria**:
- Archival process is automated
- Archived data is retrievable
- Backups are verified

---

### 3.12 Alumni Management

#### FR-12.1: Alumni Management
**Priority**: Low  
**Description**: System shall manage alumni information.

**Requirements**:
1. Alumni profile:
   - Graduation details
   - Current occupation
   - Contact information
   - Achievements
2. Alumni directory:
   - Searchable directory
   - Batch-wise listing
   - Class-wise listing
3. Alumni events:
   - Event management
   - Alumni registration
4. Alumni communication:
   - Newsletter
   - Event invitations

**Detailed Step-by-Step Process**:

**Step 1: Convert Graduates to Alumni**
1. Academic Admin logs in
2. Navigate to: Alumni -> Convert
3. Select graduating batch
4. Confirm conversion

**Step 2: Maintain Alumni Profiles**
1. Update contact and career details
2. Manage alumni consent and visibility
3. Upload alumni achievements

**Step 3: Alumni Communication**
1. Send announcements and newsletters
2. Invite to events
3. Track responses

**Step 4: Alumni Reports**
1. Generate alumni directory
2. Export alumni data (authorized users only)
3. Maintain audit log


**Acceptance Criteria**:
- Alumni data is maintained
- Directory is searchable
- Communication is effective

---

## 4. NON-FUNCTIONAL REQUIREMENTS

### 4.1 Performance Requirements

#### NFR-1.1: Response Time
- **Page Load Time**: < 2 seconds for standard pages
- **Report Generation**: < 5 seconds for standard reports, < 30 seconds for complex reports
- **Search Operations**: < 1 second for standard searches
- **Database Queries**: < 500ms for standard queries
- **API Response Time**: < 1 second for standard API calls

#### NFR-1.2: Throughput
- **Concurrent Users**: Support minimum 500 simultaneous users
- **Transactions per Second**: Minimum 100 TPS
- **Database Connections**: Efficient connection pooling

#### NFR-1.3: Scalability
- **Student Capacity**: Support 100 to 10,000+ students
- **Staff Capacity**: Support 10 to 1,000+ staff members
- **Data Growth**: Handle 5+ years of historical data
- **Horizontal Scaling**: Architecture should support horizontal scaling

### 4.2 Reliability and Availability

#### NFR-2.1: Availability
- **Uptime**: 99.9% availability (maximum 8.76 hours downtime per year)
- **Scheduled Maintenance**: During off-peak hours with advance notice
- **Failover**: Automatic failover for critical services

#### NFR-2.2: Reliability
- **Mean Time Between Failures (MTBF)**: Minimum 720 hours
- **Mean Time To Repair (MTTR)**: Maximum 4 hours
- **Data Integrity**: Zero data loss tolerance
- **Error Recovery**: Automatic error recovery where possible

### 4.3 Security Requirements

#### NFR-3.1: Authentication
- **Password Policy**:
  - Minimum 8 characters
  - Must include uppercase, lowercase, number, special character
  - Password expiry: 90 days
  - Password history: Last 5 passwords cannot be reused
- **Session Management**:
  - Session timeout: 30 minutes of inactivity
  - Concurrent session limit: 2 sessions per user
  - Secure session tokens
- **Two-Factor Authentication (2FA)**: Optional for sensitive roles (Super Admin, Principal, Accountant)

#### NFR-3.2: Authorization
- **Role-Based Access Control**: Strictly enforced
- **Permission Granularity**: Module-level and action-level permissions
- **Data Access Control**: Users can only access authorized data
- **Audit Trail**: All permission changes logged

#### NFR-3.3: Data Security
- **Encryption at Rest**: All sensitive data encrypted (AES-256)
- **Encryption in Transit**: HTTPS/TLS 1.2+ for all communications
- **Database Encryption**: Sensitive fields encrypted
- **Backup Encryption**: All backups encrypted

#### NFR-3.4: Application Security
- **SQL Injection Prevention**: Parameterized queries, input validation
- **XSS Prevention**: Input sanitization, output encoding
- **CSRF Protection**: Token-based CSRF protection
- **File Upload Security**: File type validation, virus scanning, size limits
- **API Security**: API key authentication, rate limiting

#### NFR-3.5: Privacy
- **Data Privacy for Minors**: Strict access control for student data
- **Health/Counseling Records**: Restricted access, encryption
- **GDPR Compliance**: Right to access, right to deletion (where applicable)
- **Data Anonymization**: For reporting and analytics

### 4.4 Usability Requirements

#### NFR-4.1: User Interface
- **Responsive Design**: Support desktop, tablet, mobile devices
- **Browser Compatibility**: Chrome, Firefox, Safari, Edge (latest 2 versions)
- **Accessibility**: WCAG 2.1 Level AA compliance
- **Multi-language**: Support for primary language (English) with option for additional languages
- **Intuitive Navigation**: Maximum 3 clicks to reach any feature
- **Help System**: Contextual help, tooltips, user manual

#### NFR-4.2: User Experience
- **Learning Curve**: New users should be productive within 2 hours of training
- **Error Messages**: Clear, actionable error messages
- **Confirmation Dialogs**: For destructive actions
- **Bulk Operations**: Support for bulk data entry/operations
- **Keyboard Shortcuts**: Common operations have keyboard shortcuts

### 4.5 Maintainability

#### NFR-5.1: Code Quality
- **Code Documentation**: All functions/classes documented
- **Code Standards**: Follow language-specific coding standards
- **Code Review**: Mandatory code review before merge
- **Version Control**: Git-based version control

#### NFR-5.2: Logging
- **Log Levels**: DEBUG, INFO, WARN, ERROR, FATAL
- **Log Retention**: 90 days for application logs, 1 year for audit logs
- **Structured Logging**: JSON format for easy parsing
- **Sensitive Data**: No sensitive data in logs (passwords, payment info)

#### NFR-5.3: Error Handling
- **Graceful Degradation**: System continues operating with reduced functionality
- **Error Logging**: All errors logged with context
- **User-Friendly Messages**: Technical errors not exposed to end users
- **Error Recovery**: Automatic retry for transient errors

### 4.6 Portability
- **Operating System**: Support Linux and Windows servers
- **Database**: Support MySQL 8.0+ and PostgreSQL 12+
- **Cloud Compatibility**: Deployable on AWS, Azure, GCP, or on-premise

### 4.7 Compatibility
- **Backward Compatibility**: Database migrations for version upgrades
- **Data Import**: Support CSV, Excel import for bulk data
- **Data Export**: Support PDF, Excel, CSV export
- **Browser Support**: Latest 2 versions of major browsers

---

## 5. SYSTEM ARCHITECTURE

### 5.1 Architecture Pattern
- **Pattern**: Layered Architecture (Presentation, Business Logic, Data Access)
- **Framework**: Modern web framework (Laravel/Django/Spring Boot recommended)
- **Frontend**: Component-based framework (Vue.js/React recommended)

### 5.2 Technology Stack (Recommended)

#### Backend
- **Framework**: Laravel 10+ / Django 4+ / Spring Boot 3+
- **Language**: PHP 8.1+ / Python 3.11+ / Java 17+
- **API**: RESTful API, GraphQL (optional)
- **Authentication**: JWT tokens / OAuth 2.0

#### Frontend
- **Framework**: Vue.js 3+ / React 18+
- **UI Library**: Vuetify / Material-UI / Ant Design
- **State Management**: Vuex / Redux / Pinia
- **Build Tool**: Vite / Webpack

#### Database
- **Primary Database**: MySQL 8.0+ / PostgreSQL 12+
- **Caching**: Redis
- **Search**: Elasticsearch (optional, for advanced search)

#### Infrastructure
- **Web Server**: Nginx / Apache
- **Application Server**: PHP-FPM / Gunicorn / Tomcat
- **File Storage**: Local / S3 / Azure Blob
- **Queue**: Redis Queue / RabbitMQ

### 5.3 System Architecture Diagram
```
[Users] -> [Load Balancer] -> [Web Servers] -> [Application Servers] -> [Database]
                (down)
         [Cache Layer (Redis)]
                (down)
         [File Storage]
                (down)
         [External APIs]
```

### 5.4 Database Design
- **Normalization**: 3NF (Third Normal Form)
- **Indexing**: Strategic indexes on frequently queried columns
- **Partitioning**: Consider partitioning for large tables (attendance, transactions)
- **Backup Strategy**: Daily incremental, weekly full backups

### 5.5 API Architecture
- **RESTful Design**: Resource-based URLs, HTTP methods
- **Versioning**: API versioning (v1, v2)
- **Rate Limiting**: 100 requests per minute per user
- **Pagination**: All list endpoints paginated
- **Filtering/Sorting**: Support filtering and sorting

### 5.6 Third-Party Integration Architecture
- **Payment Gateways**: Plugin-based architecture for multiple gateways
- **SMS/Email**: Queue-based for reliability
- **Biometric Devices**: Scheduled sync jobs
- **Error Handling**: Retry mechanism with exponential backoff

---

## 6. DATA REQUIREMENTS

### 6.1 Data Models (Key Entities)

#### Core Entities
- **Organization**: School/institute information
- **Campus/Branch**: Multi-campus support
- **Academic Session**: Academic year
- **Class/Section/Group**: Academic structure
- **Subject**: Subject master
- **Student**: Student information
- **Parent/Guardian**: Parent information
- **Staff**: Staff information
- **User**: System users
- **Role**: User roles
- **Permission**: System permissions

#### Academic Entities
- **Timetable**: Class schedules
- **Attendance**: Student and staff attendance
- **Exam**: Exam information
- **Marks**: Exam marks
- **Result**: Processed results
- **Assignment**: Homework/assignments
- **Discipline**: Discipline records

#### Financial Entities
- **Fee Head**: Fee categories
- **Fee Structure**: Class-wise fees
- **Invoice**: Fee invoices
- **Payment**: Fee payments
- **Chart of Accounts**: Accounting structure
- **Voucher**: Accounting vouchers
- **Transaction**: Financial transactions

#### HR Entities
- **Leave**: Leave applications
- **Salary Structure**: Staff salary components
- **Payslip**: Salary payslips
- **Payroll**: Payroll processing

#### Inventory Entities
- **Item**: Inventory items
- **Stock**: Stock levels
- **Purchase Order**: Procurement orders
- **Asset**: Fixed assets

### 6.2 Data Relationships
- One-to-Many: Organization -> Campuses, Class -> Sections, Student -> Payments
- Many-to-Many: Student -> Subjects, Teacher -> Classes, Staff -> Roles
- Hierarchical: Class -> Section -> Group

### 6.3 Data Validation Rules
- **Student ID**: Unique, alphanumeric, 6-10 characters
- **Email**: Valid email format, unique per user
- **Phone**: Valid phone format, country code support
- **Marks**: Non-negative, within maximum marks limit
- **Dates**: Valid date format, logical date ranges
- **Amounts**: Non-negative, precision to 2 decimal places

### 6.4 Data Retention Policies
- **Active Data**: Indefinite (while student/staff is active)
- **Archived Data**: 10 years for academic records, 7 years for financial records
- **Audit Logs**: 1 year retention
- **Application Logs**: 90 days retention
- **Backup Retention**: 30 days for daily backups, 1 year for weekly backups

### 6.5 Data Backup and Recovery
- **Backup Frequency**: Daily incremental, weekly full
- **Backup Storage**: On-site and off-site (cloud)
- **Backup Verification**: Weekly restore tests
- **Recovery Time Objective (RTO)**: 4 hours
- **Recovery Point Objective (RPO)**: 24 hours

### 6.6 Data Migration
- **Import Formats**: CSV, Excel (XLSX)
- **Bulk Import**: Support for student, staff, marks bulk import
- **Data Validation**: Pre-import validation
- **Error Handling**: Detailed error reports for failed imports
- **Rollback**: Ability to rollback failed imports

---

## 7. INTERFACE REQUIREMENTS

### 7.1 User Interface Requirements

#### UI-1: Design Principles
- **Modern and Clean**: Modern, professional design
- **Consistent**: Consistent UI patterns throughout
- **Responsive**: Mobile-first responsive design
- **Accessible**: WCAG 2.1 Level AA compliance
- **Intuitive**: Self-explanatory interface

#### UI-2: Navigation
- **Main Menu**: Sidebar or top navigation
- **Breadcrumbs**: Show current location
- **Search**: Global search functionality
- **Quick Actions**: Common actions easily accessible

#### UI-3: Forms
- **Validation**: Real-time validation
- **Error Display**: Inline error messages
- **Auto-save**: Auto-save for long forms (draft)
- **File Upload**: Drag-and-drop file upload

#### UI-4: Tables/Lists
- **Pagination**: Server-side pagination
- **Sorting**: Column sorting
- **Filtering**: Advanced filtering options
- **Bulk Actions**: Select multiple items for bulk operations
- **Export**: Export to Excel/PDF

#### UI-5: Reports
- **Print-Friendly**: Optimized for printing
- **Export Options**: PDF, Excel, CSV
- **Date Range**: Flexible date range selection
- **Filters**: Multiple filter options

### 7.2 API Requirements

#### API-1: Authentication
- **Method**: JWT tokens
- **Token Expiry**: 24 hours (refresh token: 30 days)
- **API Keys**: For third-party integrations

#### API-2: Endpoints
- **RESTful**: Resource-based endpoints
- **Versioning**: /api/v1/ prefix
- **Documentation**: OpenAPI/Swagger documentation

#### API-3: Response Format
- **Success**: JSON with data, status, message
- **Error**: JSON with error code, message, details
- **Pagination**: Standard pagination metadata

#### API-4: Rate Limiting
- **Limit**: 100 requests per minute per user
- **Headers**: Rate limit information in response headers

### 7.3 Integration Interfaces

#### INT-1: Payment Gateway Integration
- **Supported Gateways**: SSLCommerz, bKash, Nagad, Card payments
- **API**: RESTful API integration
- **Webhook**: Payment status webhooks
- **Error Handling**: Retry mechanism, fallback options

#### INT-2: SMS Integration
- **Providers**: Multiple SMS gateway providers
- **API**: RESTful API
- **Templates**: Message templates
- **Delivery Status**: Delivery confirmation tracking

#### INT-3: Email Integration
- **SMTP**: Standard SMTP configuration
- **Templates**: Email templates
- **Attachments**: Support file attachments
- **Bulk Email**: Queue-based bulk email

#### INT-4: WhatsApp Integration (Optional)
- **API**: WhatsApp Business API
- **Templates**: Approved message templates
- **Two-way**: Support two-way messaging

#### INT-5: Biometric Device Integration
- **Protocol**: Device-specific API/SDK
- **Sync**: Scheduled sync (every 15 minutes)
- **Offline Mode**: Handle offline device data
- **Error Handling**: Retry failed syncs

---

## 8. CONSTRAINTS AND ASSUMPTIONS

### 8.1 Technical Constraints
- **Browser Support**: Latest 2 versions of Chrome, Firefox, Safari, Edge
- **Operating System**: Linux (Ubuntu 20.04+) or Windows Server 2019+
- **Database**: MySQL 8.0+ or PostgreSQL 12+
- **PHP Version**: PHP 8.1+ (if using PHP)
- **Network**: Minimum 10 Mbps internet connection for optimal performance

### 8.2 Business Constraints
- **Budget**: [To be specified]
- **Timeline**: [To be specified]
- **Resources**: Availability of development team
- **Third-Party Services**: Dependency on external service providers (payment, SMS)

### 8.3 Regulatory Constraints
- **Data Protection**: Compliance with local data protection laws
- **Educational Regulations**: Compliance with educational board requirements
- **Financial Regulations**: Compliance with accounting standards
- **Privacy Laws**: Protection of minor's data

### 8.4 Assumptions
1. Users have basic computer literacy
2. Stable internet connection available
3. Third-party services (payment, SMS) are reliable
4. Users will receive training on system usage
5. IT support available for system maintenance
6. Regular backups will be performed
7. System will be hosted on reliable infrastructure

---

## 9. DEPENDENCIES

### 9.1 External System Dependencies
- **Payment Gateways**: SSLCommerz, bKash, Nagad APIs
- **SMS Providers**: SMS gateway APIs
- **Email Service**: SMTP server
- **Biometric Devices**: Device-specific APIs/SDKs

### 9.2 Third-Party Library Dependencies
- **Framework**: Laravel/Django/Spring Boot
- **Frontend**: Vue.js/React
- **UI Components**: Vuetify/Material-UI
- **PDF Generation**: DomPDF/FPDF/ReportLab
- **Excel**: PhpSpreadsheet/OpenPyXL
- **Authentication**: JWT libraries

### 9.3 Infrastructure Dependencies
- **Web Server**: Nginx/Apache
- **Database Server**: MySQL/PostgreSQL
- **Cache**: Redis
- **File Storage**: Local/S3/Azure Blob

---

## 10. RISK ANALYSIS

### 10.1 Technical Risks

| **Risk** | **Impact** | **Probability** | **Mitigation** |
|----------|------------|-----------------|----------------|
| Database performance degradation | High | Medium | Proper indexing, query optimization, caching |
| Third-party API failures | Medium | Medium | Retry mechanism, fallback options, queue system |
| Security vulnerabilities | High | Low | Regular security audits, penetration testing |
| Data loss | High | Low | Regular backups, backup verification, disaster recovery plan |
| Scalability issues | Medium | Medium | Load testing, horizontal scaling architecture |

### 10.2 Business Risks

| **Risk** | **Impact** | **Probability** | **Mitigation** |
|----------|------------|-----------------|----------------|
| User adoption resistance | High | Medium | Comprehensive training, user-friendly interface |
| Scope creep | Medium | High | Clear requirements, change management process |
| Timeline delays | Medium | Medium | Agile methodology, regular progress reviews |
| Budget overrun | Medium | Medium | Regular budget reviews, phased implementation |

### 10.3 Security Risks

| **Risk** | **Impact** | **Probability** | **Mitigation** |
|----------|------------|-----------------|----------------|
| Data breach | High | Low | Encryption, access control, security audits |
| Unauthorized access | High | Medium | Strong authentication, RBAC, audit logs |
| SQL injection | High | Low | Parameterized queries, input validation |
| XSS attacks | Medium | Medium | Input sanitization, output encoding |

---

## 11. TESTING REQUIREMENTS

### 11.1 Unit Testing
- **Coverage**: Minimum 70% code coverage
- **Framework**: PHPUnit / pytest / JUnit
- **Scope**: All business logic functions

### 11.2 Integration Testing
- **API Testing**: All API endpoints
- **Database Testing**: Data integrity, transactions
- **Third-Party Integration**: Payment, SMS, email integrations

### 11.3 System Testing
- **Functional Testing**: All functional requirements
- **Performance Testing**: Load testing, stress testing
- **Security Testing**: Penetration testing, vulnerability scanning
- **Usability Testing**: User acceptance testing

### 11.4 User Acceptance Testing (UAT)
- **Participants**: End users from each role
- **Duration**: 2-4 weeks
- **Criteria**: All critical paths tested, feedback incorporated

### 11.5 Test Data Requirements
- **Test Data**: Realistic test data for all modules
- **Data Privacy**: No real student/parent data in test environment
- **Data Volume**: Sufficient data for performance testing

---

## 12. DEPLOYMENT REQUIREMENTS

### 12.1 Server Specifications (Recommended)

#### Production Server
- **CPU**: 4+ cores
- **RAM**: 16GB+
- **Storage**: 500GB+ SSD
- **Network**: 100 Mbps+

#### Database Server
- **CPU**: 4+ cores
- **RAM**: 32GB+
- **Storage**: 1TB+ SSD (with backup storage)
- **Network**: High-speed connection to application server

### 12.2 Hosting Requirements
- **Option 1**: Cloud hosting (AWS, Azure, GCP)
- **Option 2**: On-premise server
- **SSL Certificate**: Required (Let's Encrypt or commercial)
- **Domain**: Custom domain name
- **CDN**: Optional, for static assets

### 12.3 Deployment Procedure
1. **Pre-deployment**:
   - Code review and approval
   - Database migration scripts prepared
   - Backup current system (if upgrade)
2. **Deployment**:
   - Deploy code to staging environment
   - Run database migrations
   - Verify functionality
   - Deploy to production
3. **Post-deployment**:
   - Smoke testing
   - Monitor error logs
   - Verify backups
   - User notification

### 12.4 Rollback Procedure
- **Code Rollback**: Git-based rollback to previous version
- **Database Rollback**: Migration rollback scripts
- **Backup Restoration**: Restore from backup if needed
- **Communication**: Notify users of rollback

### 12.5 Monitoring and Maintenance
- **Application Monitoring**: Error tracking, performance monitoring
- **Server Monitoring**: CPU, memory, disk usage
- **Database Monitoring**: Query performance, connection pool
- **Uptime Monitoring**: External uptime monitoring service
- **Log Aggregation**: Centralized log management

---

## 13. TRAINING AND DOCUMENTATION

### 13.1 User Training
- **Training Materials**: User manuals, video tutorials
- **Training Sessions**: Role-based training sessions
- **Training Duration**: 2-4 hours per role
- **Training Format**: In-person or online
- **Follow-up**: Support for 30 days post-deployment

### 13.2 Administrator Training
- **System Administration**: 8-16 hours training
- **Topics**: User management, system configuration, backups, troubleshooting
- **Documentation**: Administrator manual

### 13.3 Documentation Requirements
- **User Manual**: Comprehensive user guide for each role
- **Administrator Manual**: System administration guide
- **API Documentation**: OpenAPI/Swagger documentation
- **Technical Documentation**: Architecture, database schema, deployment guide
- **Video Tutorials**: Step-by-step video guides for common tasks

### 13.4 Help System
- **In-App Help**: Contextual help, tooltips
- **FAQ**: Frequently asked questions
- **Support Portal**: Ticket-based support system
- **Knowledge Base**: Searchable knowledge base

---

## 14. APPENDICES

### 14.1 Glossary

| **Term** | **Definition** |
|----------|----------------|
| **Academic Session** | A period of academic study, typically one year |
| **Admit Card** | Document issued to students for exam entry |
| **Chart of Accounts** | List of all accounts used in accounting |
| **Contra Voucher** | Voucher for cash-bank or bank-bank transfers |
| **EIIN** | Educational Institution Identification Number |
| **GPA** | Grade Point Average |
| **GRN** | Goods Receive Note - document for received goods |
| **Journal Voucher** | Accounting voucher for adjustments |
| **Merit List** | Ranked list of students based on performance |
| **Payment Voucher** | Accounting voucher for payments |
| **Purchase Order** | Document issued to supplier for goods |
| **Receipt Voucher** | Accounting voucher for receipts |
| **RBAC** | Role-Based Access Control |
| **TC** | Transfer Certificate - document for student transfer |
| **Timetable** | Schedule of classes and subjects |

### 14.2 Acronyms
- **API**: Application Programming Interface
- **CSRF**: Cross-Site Request Forgery
- **GDPR**: General Data Protection Regulation
- **GPA**: Grade Point Average
- **HR**: Human Resources
- **LMS**: Learning Management System
- **MCQ**: Multiple Choice Question
- **POS**: Point of Sale
- **RBAC**: Role-Based Access Control
- **SMS**: School Management System (also Short Message Service)
- **TC**: Transfer Certificate
- **UI**: User Interface
- **UX**: User Experience
- **WCAG**: Web Content Accessibility Guidelines
- **XSS**: Cross-Site Scripting

### 14.3 Use Case Diagrams (Provided as separate deliverables)
Use case diagrams will be maintained as separate artifacts linked from the project documentation set.

### 14.4 Entity Relationship Diagram (Provided as separate deliverables)
The ERD will be maintained as a separate artifact linked from the project documentation set.

### 14.5 Data Flow Diagrams (Provided as separate deliverables)
Data flow diagrams will be maintained as separate artifacts linked from the project documentation set.

### 14.6 Sequence Diagrams (Provided as separate deliverables)
Sequence diagrams will be maintained as separate artifacts linked from the project documentation set.

### 14.7 Screen Mockups (Provided as separate deliverables)
Screen mockups will be maintained as separate artifacts linked from the project documentation set.

### 14.8 Original Workflow Document (Reference)

This section contains the original workflow document that served as the basis for this SRS. It is included for reference and traceability.

---

#### Original Master Workflow Document

**School Management System**

Below is a final, standard "complete School Management System (SMS/ERP)" workflow including all commonly expected modules (Academics + Fees + Accounting + HR/Payroll + Inventory/Assets + Library/Transport/Hostel + Communication + Security + Alumni + Reports + Year closing).

You can use this as your final master workflow for SRS + development.

---

**A) MASTER WORKFLOW (End-to-End)**

**0) First Time Setup (Super Admin / System Admin)**

**0.1 Organization & System Setup**
1. Create School/Institute Profile (name, code/EIIN, logo, address, contacts).
2. Define campuses/branches (if multi-branch).
3. Set timezone, currency, language, numbering formats.
4. Configure:
   - Email server / SMS gateway / WhatsApp provider (optional)
   - Payment gateway (SSLCommerz/bKash/Nagad/card)
   - Biometric/attendance device integration (optional)
5. Create role-based access control (RBAC):
   - Super Admin, Principal, Academic Admin, Exam Controller, HR, Accountant, Cashier, Librarian, Transport, Hostel, Front Desk, Security, Teacher, Student, Parent
6. Configure audit logs + approval workflows + data retention.
7. Setup backups (daily DB, weekly full, offsite optional).

---

**B) ACADEMIC OPERATIONS WORKFLOW**

**1) Academic Year / Session Setup (Academic Admin)**
1. Create Academic Session (e.g., 2026).
2. Setup academic structure:
   - Class/Grade -> Section -> Group/Stream
3. Setup subjects:
   - compulsory/optional, components (CQ/MCQ/Practical), marks rules, pass marks
4. Setup departments (Science/Arts etc. + staff departments).
5. Setup grading system (marks to grade/GPA).
6. Setup calendar: holidays, events, working days, bell schedule.

---

**2) Admissions & Enrollment (Front Desk + Academic Admin + Accounts)**

**2.1 Admission Setup**
1. Create admission circular (classes, seats, fee, dates, requirements).
2. Configure application form fields (online/offline).
3. Set admission test/interview rules (optional).

**2.2 Application -> Verification**
1. Applicant submits form + documents.
2. System generates Application ID.
3. Officer verifies documents + eligibility checklist.

**2.3 Admission Test/Interview (Optional)**
1. Create schedule, generate admit cards.
2. Conduct test, enter marks, publish merit/wait list.

**2.4 Final Admission & Student Profile Creation**
1. Approve student.
2. Assign Class/Section/Group/Optional subject.
3. Generate Student ID + parent accounts.
4. Assign roll number rules (auto/manual).

**2.5 Admission Fees & Enrollment Confirmation**
1. System generates admission invoice.
2. Payment accepted (cash/bank/online).
3. Receipt generated + ledger updated.
4. Student status becomes "Active".

---

**3) Student Lifecycle Management (Academic Admin + Front Desk)**
1. Student status lifecycle:
   - Applicant -> Enrolled -> Active -> Promoted/Repeat -> Transfer/Withdraw -> Alumni
2. Transfer/Withdraw workflow:
   - TC request -> clearance checks (fees/library/hostel/transport) -> approvals -> TC issued -> status changed
3. Re-admission workflow (if returning).

---

**4) Timetable & Daily Academic Execution (Academic Admin + Teachers)**

**4.1 Timetable Setup**
1. Define periods, breaks, rooms, teacher availability.
2. Create class routine + teacher routine + room routine.
3. Publish timetable.

**4.2 Substitute Teacher Workflow (Standard)**
1. Teacher marks leave/unavailability.
2. System suggests available substitute teachers.
3. Admin assigns substitute -> routine updates for that day.

**4.3 Class Diary / Lesson Delivered (Standard)**
1. Teacher logs daily lesson delivered (chapter/topic).
2. Attach materials / homework reference.
3. Class teacher/principal can review.

---

**5) Attendance Management (Teachers + HR + Parents)**

**5.1 Student Attendance**
1. Daily or period-wise attendance taken.
2. Late/leave/absent rules applied.
3. Automatic notifications to parents (optional).
4. Attendance reports (daily/monthly/term).

**5.2 Staff Attendance**
1. Attendance captured (manual/biometric).
2. Late/overtime rules processed.
3. Attendance feeds Payroll (later).

---

**6) Homework, Assignment, LMS-lite (Teachers)**
1. Teacher posts:
   - Homework/Assignment, due date, marks, attachments
2. Student submits (online) or teacher marks offline.
3. Teacher reviews, grades, feedback.
4. Parents see progress.
5. (Optional) Quiz/online test module:
   - MCQ quiz -> auto grade -> report.

---

**7) Discipline, Counseling & Student Support (Class Teacher + Admin)**
1. Discipline record:
   - incident type, description, evidence
2. Actions:
   - warning, guardian call, counseling, suspension (if policy)
3. Sensitive records access control.
4. Parent notifications (optional).

**7.1 Health/Medical (Standard in many)**
1. Store blood group, allergy, medical notes.
2. Clinic log (date, issue, action).

---

**C) EXAMS & RESULTS WORKFLOW**

**8) Exam Planning (Exam Controller)**
1. Create exam term (CT/Mid/Final).
2. Define marks distribution rules per subject.
3. Create exam routine + room/seat plan.
4. Assign invigilators + duties.
5. Publish schedule to portal.

**9) Marks Entry & Verification (Teachers + Exam Controller)**
1. Teacher enters marks (component-wise).
2. Submit marks -> lock after submission.
3. Controller checks missing/invalid entries.
4. Recheck/approval process (optional).

**10) Result Processing & Publishing (Exam Controller + Principal)**
1. Run result generation:
   - total, grade, GPA, optional subject rules
2. Produce:
   - report cards, merit list, fail list, analytics
3. Publish to student/parent portal.
4. Print report cards + transcripts.

**11) Promotion & Academic Year Transition (Academic Admin)**
1. Apply promotion rules:
   - pass criteria, compulsory subject rules
2. Promote to next class OR mark repeat/retake.
3. Prepare next session enrollment.

---

**D) FEES + FINANCE + FULL ACCOUNTING (ERP STANDARD)**

**12) Fee Management (Accounts)**

**12.1 Fee Setup**
1. Setup fee heads (tuition, exam, admission, transport, hostel, etc.).
2. Setup class-wise and category-wise fees.
3. Setup scholarship/waiver rules.
4. Define fine rules and installment plan.

**12.2 Billing & Invoicing**
1. System generates monthly/term invoices automatically.
2. Applies:
   - previous dues, waivers, fines
3. Notifies parents (optional).

**12.3 Payment Collection (Cashier/Online)**
1. Payment methods:
   - Cash, Bank, Card, Mobile banking, Online gateway
2. Partial/full payment supported.
3. Generate receipt + update student ledger.
4. Refund workflow (standard):
   - refund request -> approval -> payment out -> ledger adjustment

**12.4 Dues Management**
1. Due list by class/section/month.
2. Reminder SMS/email.
3. Defaulter rules (optional):
   - exam admit restriction or portal restriction (policy-based)

---

**13) Full Accounting Module (Standard ERP Level)**

**13.1 Accounting Setup (Accountant)**
1. Create Chart of Accounts (COA):
   - Assets, Liabilities, Income, Expense, Equity
2. Setup:
   - Cash accounts
   - Bank accounts
   - Fee income accounts
   - Expense categories

**13.2 Voucher Workflow**
1. Journal Voucher (JV) - adjustments
2. Payment Voucher (PV) - payments/expenses
3. Receipt Voucher (RV) - receipts other than fees
4. Contra Voucher (CV) - bank<->cash transfer
5. Approval workflow (optional).

**13.3 Bank Management**
1. Bank deposit slip generation.
2. Bank reconciliation (match statement).
3. Cheque management (optional).

**13.4 Financial Reports**
- Trial Balance
- Profit & Loss
- Balance Sheet
- Cash Flow (optional)
- Fee collection vs expenses

---

**E) HR + PAYROLL (STANDARD)**

**14) HR Setup & Staff Management (HR/Admin)**
1. Add staff profiles, contracts, documents.
2. Assign role + departments.
3. Maintain staff history (promotion, transfer).

**15) Leave Management (HR)**
1. Leave types & balance rules.
2. Apply leave -> approval -> update attendance.

**16) Payroll Processing (HR + Accounts)**
1. Salary structure setup:
   - Basic + allowances + deductions
2. Payroll cycle:
   - Pull attendance/late/overtime
   - Apply deductions/bonus
3. Generate payslips.
4. Salary disbursement record:
   - cash/bank transfer
5. Payroll reports.

---

**F) PROCUREMENT + INVENTORY + ASSET MANAGEMENT (STANDARD)**

**17) Procurement Workflow (Store/Accounts/Admin)**
1. Purchase Requisition (PR) raised by department.
2. Approval workflow.
3. Purchase Order (PO) to supplier.
4. Goods Receive Note (GRN) on delivery.
5. Stock update + invoice entry.
6. Supplier payment (accounts voucher).

**18) Inventory/Store Management**
1. Item master setup (stationery, lab supplies).
2. Stock in/out, minimum stock alert.
3. Issue items to departments (issue slip).
4. Stock audit + adjustments.

**19) Asset Management (IT/Admin)**
1. Asset register (computers, projector, furniture).
2. Assign asset to room/staff.
3. Maintenance schedule + service logs.
4. Depreciation (optional).
5. Asset disposal workflow.

---

**G) AUXILIARY MODULES (STANDARD IN MOST FULL SMS)**

**20) Library Management (Librarian)**
1. Catalog books, barcode, copies.
2. Issue/return/renew.
3. Fine management (integrate with fees).
4. Reports: overdue, inventory.

**21) Transport Management (Transport Manager)**
1. Vehicles, drivers, docs, routes, stops.
2. Student route allocation.
3. Transport fee auto-billing.
4. Driver attendance/logs (optional).

**22) Hostel Management (Hostel Manager)**
1. Rooms/beds allocation.
2. Hostel fee auto-billing.
3. Visitor log + discipline.
4. Meal plan (optional).

**23) Canteen / POS (Optional but common)**
1. Item setup, pricing.
2. Student wallet/card (optional).
3. Sales reports.

---

**H) COMMUNICATION + SECURITY + FRONT DESK**

**24) Notice & Messaging (Admin/Principal/Teacher)**
1. Publish notices (targeted by class/role).
2. SMS/email/WhatsApp broadcast (optional).
3. Two-way messaging (teacher<->parent) with logs.

**25) Front Desk & Gate Security (Standard in many)**
1. Visitor management:
   - visitor details, purpose, in/out time, ID proof
2. Gate pass:
   - early leave pass, who collected, time
3. Dispatch/receiving register (courier/logbook).

**26) Events, Clubs & Activities (Standard)**
1. Create events, schedule, participants.
2. Clubs membership & activity logs.
3. Student achievements & certificates.

---

**I) DOCUMENTS & CERTIFICATE MANAGEMENT**

**27) Certificate & ID Management (Admin)**
1. Templates: TC, testimonial, bonafide, character, transcript.
2. Generate with unique certificate number.
3. QR verification (optional but modern standard).
4. Approval + print + archive.

---

**J) REPORTS, DASHBOARDS, COMPLIANCE**

**28) Role-based Dashboards**
- Principal: performance, attendance, finance summary
- Academic Admin: timetable, exam progress, promotions
- Accounts: collection, dues, daily cashbook, P&L
- HR: attendance, leave, payroll
- Teacher: classes, attendance pending, assignment grading
- Parent/Student: attendance, fees, homework, results, notices

**29) Reports & Exports (Standard)**
- Attendance reports
- Exam analytics (subject-wise pass rate)
- Fee collection & defaulter
- Accounting statements
- Payroll reports
- Inventory/asset reports
- Student strength reports

**30) Security & Compliance**
1. RBAC permissions strictly enforced.
2. Audit trail for:
   - marks edits, fee edits, certificates, user changes
3. Backup + restore test.
4. Data privacy for minors:
   - restricted access to health/counseling records

---

**K) YEAR-END / SESSION CLOSING (FINAL STANDARD)**

**31) Academic Closing**
1. Lock results and reports for the session.
2. Promote/retain students.
3. Generate annual transcripts + certificates.
4. Graduates moved to Alumni.

**32) Finance Closing**
1. Close fee cycle, freeze old invoices (or carry forward dues).
2. Close accounting period:
   - adjustments, final vouchers
3. Generate final financial statements.
4. Start new financial year (if separate from academic year).

**33) System Archival**
1. Archive logs, backup final snapshot.
2. Reset sequences where required (optional).

---

**Final "Standard Modules List" (Complete)**
1. Setup & Settings
2. RBAC + Users
3. Academic session/class/subject
4. Admissions & enrollment
5. Student lifecycle (TC/withdraw/alumni)
6. Timetable + substitute + class diary
7. Attendance (student & staff)
8. Homework/Assignments/LMS-lite
9. Discipline + counseling + health
10. Exams + marks + results + promotion
11. Fees + invoicing + payment gateway + refunds
12. Full Accounting (COA/GL/Vouchers/Bank/Reports)
13. HR + leave + payroll
14. Procurement + suppliers + inventory/store
15. Asset management + maintenance
16. Library
17. Transport
18. Hostel
19. Front desk + visitor/gate pass
20. Communication (notice, SMS/email/WhatsApp)
21. Events/clubs/activities
22. Certificates/document vault
23. Reports & dashboards
24. Security/audit/backup
25. Year/session/financial closing

---

*End of Original Workflow Document*

---

## DOCUMENT APPROVAL

| **Role** | **Name** | **Signature** | **Date** |
|----------|----------|---------------|----------|
| Project Manager | | | |
| Technical Lead | | | |
| Business Analyst | | | |
| Client Representative | | | |

---

**Document End**

---

*This SRS document is a living document and will be updated as requirements evolve. All changes must be approved through the change management process.*
