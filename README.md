# Messo-web
Peer-to-Peer Mess Booking and Student Service Platform. 
<br>
Author - Md.Backtiar Abir
# Messo — Student Accommodation Platform

**Simplifying Student Living, One Room at a Time.**

Messo is a student-focused accommodation platform designed to make finding and managing student mess accommodation easier in Bangladesh.

The platform aims to connect students with suitable accommodation options while providing a digital system for managing rooms, users, and accommodation-related information.

---

## About the Project

Finding reliable and suitable accommodation is a common challenge for university students in Bangladesh. Traditional mess-hunting often involves visiting multiple locations, contacting owners individually, and relying on scattered information.

Messo aims to address this challenge through a centralized digital platform that makes accommodation information more accessible and management more organized.

This project represents an ongoing effort to build a practical technology solution for student accommodation.

## Key Features

- **User Authentication:** User registration, login, and logout functionality.
- **User Management:** User-related information and profile management.
- **Room Management:** Room-related pages and accommodation information.
- **Admin Panel:** Administrative interfaces and management processes.
- **Database Integration:** MySQL database integration for application data.
- **Responsive Web Interface:** Frontend built with HTML, CSS, and JavaScript.

*Feature availability may vary depending on the current implementation.*

## Technology Stack

| Technology | Purpose |
|---|---|
| PHP | Backend development |
| MySQL | Database management |
| HTML5 | Web structure |
| CSS3 | Styling and layout |
| JavaScript | Client-side interactions |
| Git & GitHub | Version control and collaboration |

## Project Structure

```text
Messo-Web/
│
├── CSS/
│   ├── about_us.css
│   ├── Admin.css
│   ├── form.css
│   └── ...
│
├── partials/
│
├── public/
│
├── scripts/
│   ├── create_admin.php
│   └── ...
│
├── .gitignore
│
├── index.html
├── index.php
├── Login.html
├── Signup.html
├── Admin.html
├── Room.html
├── user_profile.html
│
├── auth.php
├── db_connect.php
├── admin_process.php
├── admin_logout.php
├── login_proses.php
├── signup_proses.php
├── logout.php
│
├── messodb.sql
├── messodb_improved.sql
│
└── README.md
```

*The structure above is an overview of the current project files and may evolve as development continues.*

## Getting Started

Follow these instructions to set up the project locally.

### Prerequisites

Make sure you have installed:

- PHP 8.0 or later (recommended)
- MySQL
- Apache Server
- XAMPP or an equivalent local development environment
- Git

### 1. Clone the Repository

```bash
git clone https://github.com/backtiarabir/Messo-Web.git
```

### 2. Move the Project

Move the project folder into your XAMPP `htdocs` directory.

Example:

```text
C:\xampp\htdocs\Messo-Web
```

### 3. Set Up the Database

1. Start Apache and MySQL from XAMPP Control Panel.
2. Open phpMyAdmin.
3. Create a database for Messo.
4. Import the appropriate SQL file from the project:
   - `messodb_improved.sql`
   - `messodb.sql`

Import only the SQL version compatible with your application code. Do not import both unless their schemas are designed to work together.

### 4. Configure Database Connection

Configure your database connection in `db_connect.php`.

Use your local database settings and keep credentials outside version control.

For example:

```php
<?php

$host = "localhost";
$dbname = "your_database_name";
$username = "your_database_user";
$password = "your_database_password";

$conn = new mysqli(
    $host,
    $username,
    $password,
    $dbname
);

if ($conn->connect_error) {
    die("Database connection failed.");
}
?>
```

This is an illustrative configuration. Adapt it to the existing connection logic in your project.

Never commit production credentials, API keys, or passwords.

### 5. Run the Application

Open your browser and visit:

```text
http://localhost/Messo-Web/
```

Make sure Apache and MySQL are running before accessing the application.

---

## Project Goals

Messo aims to:

- Simplify the student accommodation discovery process.
- Make accommodation information more accessible.
- Improve the organization of room and user management.
- Build a reliable digital platform for student housing.
- Explore opportunities to improve the student living experience in Bangladesh.

## Future Development

Potential improvements include:

- Advanced accommodation search and filtering.
- Detailed mess and room listings.
- Online booking and reservation workflows.
- Online payment integration.
- Improved admin dashboard.
- Better user experience and responsive design.
- Enhanced security and authentication.
- Student support and communication features.

## Project Status

**Development Status:** Ongoing

Messo is being developed iteratively. Features, architecture, and functionality may evolve as the project progresses.

## Contributing

Contributions, suggestions, and feedback are welcome.

If you would like to contribute:

1. Fork the repository.
2. Create a feature branch.
3. Make your changes.
4. Commit your changes with a meaningful message.
5. Open a Pull Request.

## License

No open-source license has currently been specified.

Please contact the project owner before reusing or distributing this project's code.

## Author

**Md. Backtiar Abir**

Founder & Developer of Messo

- GitHub: https://github.com/backtiarabir

---

**Messo — Making Student Accommodation Simpler.**