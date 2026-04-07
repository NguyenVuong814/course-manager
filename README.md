# 🎓 Course Manager System  
**A Web-based Course Management System for Student Enrollment and Administration**

This repository provides a **web application** for managing courses, students, and enrollments, designed with a focus on:

- ✅ Simplicity and usability  
- ✅ Clear data organization  
- ✅ CRUD operations for core entities  
- ✅ Educational and project-based development  

---

## 🔍 Background & Motivation

Managing courses and student enrollments manually can be inefficient and error-prone.  
This system provides a **centralized platform** to:

- Organize course information  
- Manage student data  
- Track enrollments efficiently  

It is designed as a **learning project** to practice:

- Backend development  
- Database design  
- MVC architecture  

---

## ✨ Key Features

- 📚 Course Management (Create, Edit, Delete)  
- 👨‍🎓 Student Management  
- 📝 Enrollment System  
- ♻️ Soft Delete (Trash / Restore)  
- 🧩 MVC structure (Laravel-style)  
- 🗄️ Database integration  

---

## 🧠 System Overview

### Architecture

```text
User (Browser)
   ↓
Web Interface (Blade Views)
   ↓
Controller (Logic Handling)
   ↓
Model (Database Interaction)
   ↓
Database (MySQL)

// tree
course-manager/
│
├── app/
│   ├── Http/Controllers/    # Controllers (logic)
│
├── resources/
│   ├── views/               # Blade templates (UI)
│       ├── courses/
│       ├── enrollments/
│       └── layouts/
│
├── routes/
│   ├── web.php              # Web routes
│   ├── api.php
│
├── database/                # Migrations / seeders
├── public/                  # Public assets
├── storage/                 # Logs & cache
│
├── .env.example
├── composer.json
├── package.json
└── README.md

⚙️ Technologies Used
🟢 PHP (Laravel Framework)
🟡 MySQL Database
🔵 HTML / CSS / Blade Template
⚙️ XAMPP (Local server)
▶️ How to Run
1. Clone repository
git clone https://github.com/NguyenVuong814/course-manager.git
cd course-manager
2. Install dependencies
composer install
npm install
3. Setup environment
cp .env.example .env
php artisan key:generate
4. Configure database
Open .env
Set DB name, user, password
5. Run migrations
php artisan migrate
6. Start server
php artisan serve

👉 Open: http://127.0.0.1:8000

🧪 Main Functionalities
📚 Courses
Add new courses
Edit course information
Delete / restore courses
👨‍🎓 Students
Manage student data
📝 Enrollments
Register students into courses
View enrollment list
📊 Database Design (ERD Overview)

Entities:

students
courses
enrollments

Relationships:

1 Student → N Enrollments
1 Course → N Enrollments
🚧 Limitations
No authentication system yet
Basic UI (not optimized)
No API integration
Single-user environment
🔮 Future Improvements
🔐 Login / Register system (JWT/Auth)
👑 Role-based access (Admin/User)
🎨 Improve UI/UX
🌐 RESTful API
📊 Dashboard statistics
📜 License

This project is for educational purposes.

🎓 Academic Use

This project is suitable for:

Web development practice
Database design learning
Course management system demos
University assignments / mini projects
👨‍💻 Author

Nguyen Vuong
GitHub: https://github.com/NguyenVuong814


---

# 🔥 Cách dùng ngay

1. Tạo file:

README.md


2. Dán toàn bộ nội dung trên vào  

3. Push lên:
```bash
git add README.md
git commit -m "update README"
git push