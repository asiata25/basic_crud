# 📘 PHP Basic Programming Project

	🚀 A hands-on educational project designed to teach college students the fundamentals of programming with PHP, focusing on Clean Architecture, Object-Oriented Programming (OOP), MVC design pattern, basic authentication, CRUD operations, and database management.

## 🎯 Project Objectives

This project is aimed at helping students to:
- 🔑 Understand basic programming concepts in PHP.
- 🧩 Learn how to apply Object-Oriented Programming (OOP) principles.
- 📚 Implement the Model-View-Controller (MVC) design pattern.
- 🔐 Build and integrate basic authentication systems.
- ✏️ Create, Read, Update, and Delete (CRUD) operations effectively.
- 💾 Understand and use databases effectively (MySQL).
- 🚀 Structure projects using Clean Architecture for scalability and maintainability.

## 🚦 Features

- ✅ Beginner-friendly structure with modular codebase.
- ✅ Pre-configured auth, CRUD templates, and database setup.
- ✅ Comprehensive folder structure for MVC.
- ✅ Examples of Clean Architecture in action.
- ✅ Step-by-step guidance to build and extend functionality.

## 📂 Project Structure

```
.
├── app/
│   ├── Controllers/
│   ├── Models/
│   ├── Views/
│   ├── Services/
│   └── Repositories/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── schema.sql
├── public/
│   └── index.php
├── config/
│   └── database.php
├── routes/
│   └── web.php
├── tests/
└── README.md
```

## 🛠️ Setup & Installation

Follow these steps to set up the project locally:
1.	Clone the repository:
    ```
    git clone https://github.com/your-username/your-repo-name.git
    cd your-repo-name
    ```

2.	Start the server:
    ```
    php -S localhost:8000 -t public
    ```

3.	Open your browser at http://localhost:8000.

## 📘 Usage Guide

🚀 Key Concepts

	•	OOP in PHP:
	•	Classes, objects, inheritance, polymorphism.
	•	MVC Design Pattern:
	•	Separation of concerns for maintainable code.
	•	CRUD Operations:
	•	Manage resources like users, posts, and more.
	•	Database Management:
	•	Database schema creation and migrations.
	•	Query building and seeding.

🧩 Example Code

Database Migration Example:
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('users');
    }
}
```
Controller Example:
```
<?php

namespace App\Controllers;

class UserController {
    public function index() {
        return view('users.index', ['users' => User::all()]);
    }
}
```
## 📋 Learning Resources

	•	PHP Documentation
	•	MySQL Documentation
	•	Clean Architecture by Uncle Bob
	•	MVC Pattern in PHP