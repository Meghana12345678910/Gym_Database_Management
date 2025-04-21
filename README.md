# Gym Database Management System 

This is a web-based Gym Management System built using **PHP**, **MySQL**, and **XAMPP**. It allows gym administrators to manage trainers, members, packages, and payments easily through a user-friendly interface.

---

##  Features

-  Login/Register system with `logintb` table
- Manage Trainers (Add/Delete)
-  Manage Members (Add/Delete)
-  Manage Packages (Add/Delete)
-  Payment Handling
  - Auto-status update using MySQL Trigger (`Active` or `Expired`)
  - Handles end-date checks on insert/update
-  View joined data from members, payment, and package
-  Auto-handle trainer deletion by updating related member rows
-  Fully working frontend with Bootstrap and simple navigation buttons

---

##  Technologies Used

- **Frontend**: HTML, CSS (Bootstrap), JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Server**: XAMPP (Apache + MySQL)

---

##  Database Structure

### Tables:

- `logintb (username PRIMARY KEY, password)`
- `trainer (trainer_id PRIMARY KEY, name, contact, etc.)`
- `members (member_id PRIMARY KEY, name, trainer_id (FK), package_id (FK), etc.)`
- `package (package_id PRIMARY KEY, name, duration, cost)`
- `payment (payment_id PRIMARY KEY, member_id (FK), package_id (FK), start_date, end_date, payment_status)`

---

##  Pages

- `index.php`: Login page
- `register.php`: Registration page
- `admin-panel.php`: Dashboard after login
- `trainer.php`: Trainer management
- `members.php`: Member management
- `package.php`: Package management
- `payment.php`: Payment history
- `member_payment_package.php`: Joined data view
- `func.php`: Contains all backend logic and MySQL interactions

---

##  Usage

1. Start Apache and MySQL in XAMPP.
2. Import the provided `.sql` file to create tables and triggers.
3. Access the system via `http://localhost/gym-management/`.
4. Register as a user, login, and begin using the system.

---

##  Notes

- Passwords are stored in **plain text** for simplicity (can be improved with hashing).

---

##  Screenshots (optional)

> Add some screenshots of your UI here if you want!

---

## References 
- ChatGpt
- Bootstrap

