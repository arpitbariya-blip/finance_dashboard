# 💰 Finance Dashboard

A role-based financial management web application built with **PHP**, **MySQL**, **Vanilla JS**, and **Tailwind CSS**. Developed as an assignment submission for a company selection process.

---

## 📸 Preview

> Login → Dashboard → Records → User Management

The application features a clean **"Candy Finance"** theme with warm rose/pink tones, smooth micro-animations, and a fully responsive layout powered by Material Symbols icons and DM Sans typography.

---

## 🚀 Features Implemented

### ✅ Authentication
- Email + Role-based login (no password — role verification against DB)
- PHP session management with `session_regenerate_id()` for security
- Session-protected routes — unauthenticated users are redirected to login
- Logout clears session completely

### ✅ Role-Based Access Control (RBAC)
Three user roles with different permission levels:

| Role     | Dashboard | Records | Add Transaction | User Management |
|----------|-----------|---------|-----------------|-----------------|
| Admin    | ✅        | ✅      | ✅              | ✅              |
| Analyst  | ✅        | ✅      | ❌              | ❌              |
| Viewer   | ✅        | ❌      | ❌              | ❌              |

- Sidebar navigation links are conditionally rendered based on session role
- "Add Transaction" button visible **only to Admins**
- Role check middleware (`middleware/role_check.php`) for API protection

### ✅ Dashboard (`dashboard.php`)
- Summary cards: **Total Income**, **Total Expenses**, **Net Profit**
- Recent transactions table (last 5 entries)
- Admins/Analysts see all transactions; Viewers see only their own
- Data fetched asynchronously via `api/dashboard.php`

### ✅ Financial Records (`record.php`)
- Full transaction listing from the `records` table
- **Filter by Date**: All / Last 30 Days / Last Quarter / This Year
- **Filter by Category**: Supplies / Sales / Marketing / Payroll
- Color-coded income (teal) vs expense (rose) entries
- **Add Transaction modal** (Admin only) — fields: Date, Amount, Category, Type, Notes
- Summary cards (Income / Expenses / Net Profit) fetched from `api/get-record.php`

### ✅ User Management (`users.php`) — Admin Only
- Lists all registered users with email, name, role, and status
- **Inline Role Editing** — change a user's role via dropdown → auto-saves via `api/updaterole.php`
- **Inline Status Editing** — toggle Active/Inactive via dropdown → auto-saves via `api/updateuser.php`
- **Add New User modal** — fields: Full Name, Email, Role, Status
- Active user count displayed in the stats card

### ✅ User Registration (`register.html`)
- Standalone registration page
- Fields: Full Name, Email, Role, Status
- Submits to `api/create.php` with duplicate email check

### ✅ REST-like JSON API Endpoints

| Endpoint                  | Method | Description                          |
|---------------------------|--------|--------------------------------------|
| `api/log_api.php`         | POST   | Authenticate user, create session    |
| `api/create.php`          | POST   | Register a new user                  |
| `api/dashboard.php`       | GET    | Fetch income, expense, profit + transactions |
| `api/get-record.php`      | GET    | Fetch summary totals for records page |
| `api/addtrans.php`        | POST   | Add a new financial transaction      |
| `api/load_user_data.php`  | GET    | Load all users + active count        |
| `api/updaterole.php`      | POST   | Update a user's role                 |
| `api/updateuser.php`      | POST   | Update a user's status               |

---

## ⚠️ Known Limitations / Missing Features

> These features were part of the requirements but could not be fully completed within the timeframe:

- **Password-based authentication** — Currently login uses Email + Role selection only (no hashed passwords)
- **Dashboard summary cards not dynamically updating** — Values on `dashboard.php` cards are fetched but the percentage badges (+12.4%, -4.2%) are hardcoded
- **Pagination** — Pagination UI is present on Records and Users pages but is **not yet functional** (no backend paging logic)
- **Transaction editing/deletion** — No edit or delete functionality for records
- **Charts/Analytics** — No visual graphs or charts are implemented
- **Search functionality** — No search bar for filtering records or users by name/keyword
- **Mobile sidebar** — The sidebar is hidden on mobile; FAB (floating action button) is present but not linked to a mobile nav drawer

---

## 🛠️ Tech Stack

| Layer      | Technology                          |
|------------|-------------------------------------|
| Backend    | PHP 8.2 (procedural + OOP mysqli)   |
| Database   | MySQL / MariaDB 10.4                |
| Frontend   | HTML5, Vanilla JavaScript (ES6+)    |
| Styling    | Tailwind CSS (CDN), Custom CSS      |
| Icons      | Google Material Symbols Outlined    |
| Fonts      | DM Sans (Google Fonts)              |
| Server     | Apache via XAMPP                    |

---

## 🗄️ Database Schema

**Database name:** `finance_dashboard`

### `users`
| Column       | Type         | Notes                        |
|--------------|--------------|------------------------------|
| id           | INT (PK, AI) |                              |
| full_name    | VARCHAR(100) |                              |
| email        | VARCHAR(100) | Unique identifier for login  |
| role         | VARCHAR(50)  | Admin / Analyst / Viewer     |
| status       | VARCHAR(50)  | Active / Inactive            |
| created_at   | TIMESTAMP    | Auto set on insert           |

### `transactions`
| Column     | Type              | Notes                        |
|------------|-------------------|------------------------------|
| id         | INT (PK, AI)      |                              |
| user_id    | INT (FK → users)  |                              |
| title      | VARCHAR(255)      |                              |
| category   | VARCHAR(50)       |                              |
| amount     | DECIMAL(10,2)     |                              |
| type       | ENUM(income, expense) |                          |
| created_at | DATE              |                              |

### `records`
| Column   | Type          | Notes                              |
|----------|---------------|------------------------------------|
| id       | INT (PK, AI)  |                                    |
| user_id  | INT           |                                    |
| amount   | DECIMAL(10,2) |                                    |
| type     | VARCHAR(10)   | income / expense                   |
| category | VARCHAR(100)  | Supplies / Sales / Marketing / Payroll |
| date     | DATE          |                                    |
| notes    | TEXT          |                                    |

### `online_users`
| Column        | Type      | Notes                             |
|---------------|-----------|-----------------------------------|
| id            | INT (PK)  |                                   |
| full_name     | VARCHAR   |                                   |
| last_activity | TIMESTAMP | Auto-updated on activity          |

---

## ⚙️ Installation & Setup

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) (PHP 8.x + Apache + MySQL)
- Git

### Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/finance_dashboard.git
   ```

2. **Move to XAMPP's `htdocs` directory**
   ```
   C:\xampp\htdocs\finance_dashboard\
   ```

3. **Start XAMPP** — Start **Apache** and **MySQL** from the XAMPP Control Panel.

4. **Import the database**
   - Open [phpMyAdmin](http://localhost/phpmyadmin)
   - Create a new database named `finance_dashboard`
   - Click **Import** → select `database/finance_dashboard.sql`
   - Click **Go**

5. **Configure DB connection** *(if needed)*
   
   Open `api/connect.php` and update credentials if yours differ:
   ```php
   $conn = mysqli_connect("localhost", "root", "", "finance_dashboard");
   ```

6. **Open in browser**
   ```
   http://localhost/finance_dashboard/login.php
   ```

### Default Test Accounts

| Email           | Role     | Status |
|-----------------|----------|--------|
| ak@gmail.com    | Admin    | Active |
| none@gmail.com  | Analyst  | Active |
| Guest@gmail.com | Analyst  | Active |

> **Note:** On the login page, enter the email and select the **matching role** from the dropdown.

---

## 📁 Project Structure

```
finance_dashboard/
├── api/
│   ├── connect.php          # Database connection
│   ├── log_api.php          # Login / session creation
│   ├── create.php           # Register new user
│   ├── dashboard.php        # Dashboard summary data
│   ├── get-record.php       # Records page summary
│   ├── addtrans.php         # Add new transaction
│   ├── load_user_data.php   # Load user list
│   ├── updaterole.php       # Update user role
│   └── updateuser.php       # Update user status
├── css/
│   └── style.css            # Global custom styles
├── database/
│   └── finance_dashboard.sql  # Full DB dump
├── includes/
│   ├── sidebar.php          # Shared sidebar + HTML head
│   └── header.php           # Shared header/topbar
├── JS/
│   └── index.js             # Add user form + online activity ping
├── middleware/
│   └── role_check.php       # Role-based API access guard
├── dashboard.php            # Main dashboard page
├── record.php               # Financial records page
├── users.php                # User management page (Admin only)
├── login.php                # Login page
├── register.html            # User registration page
└── logout.php               # Session destroy + redirect
```

---

## 🔒 Security Notes

- Prepared statements (`bind_param`) used in login to prevent SQL injection
- `session_regenerate_id(true)` called on login to prevent session fixation
- Role is stored server-side in `$_SESSION` — not trusted from client
- Unauthenticated requests to protected pages redirect to `login.php`

---

## 👤 Author

**Arpit Bariya**  
Built as part of a company selection process assignment.

---

## 📄 License

This project is for **assignment/evaluation purposes only**.
