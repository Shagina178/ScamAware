# The project is still in its early stages and will be further developed.

# ScamAware
This is a full-stack web application designed to educate bank users about common financial scams and provide them with tools to stay safe. This project was built from the ground up to demonstrate proficiency in core web technologies and backend development practices.

## Features

**Public-Facing Educational Content:** Openly accessible pages for "Types of Scamming" and "Prevention Tips" built with a modern, responsive design.
**User Authentication System:** Secure user registration and login functionality. Passwords are securely hashed using PHP's `password_hash()` function.
**Dynamic Session Management:** The navigation bar and user experience change based on the user's login status, managed via PHP sessions.
**Interactive UI Components:** Features a JavaScript-powered accordion for displaying information and a functional contact form.
**Secure Backend:** Utilizes prepared statements in PHP with MySQLi to prevent SQL injection vulnerabilities.

## Technologies Used

**Front-End:** HTML5, CSS3, JavaScript
**Back-End:** PHP
**Database:** MySQL
**Local Development Environment:** XAMPP

## How to Run Locally

1.  Ensure you have XAMPP installed and running (Apache & MySQL).
2.  Clone this repository into your `htdocs` folder.
3.  Using phpMyAdmin, create a database named `scam_aware`.
4.  Import the `scam_aware.sql` file (included in this repo) to set up the `users` table.
5.  Navigate to `http://localhost/YourProjectFolderName/` in your browser.

## Screenshots

Visit this link to see screenshots of the web application (`https://imgur.com/a/szZpvDM`)
