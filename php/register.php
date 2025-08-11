<?php

// Include our database connection file
require_once 'db_connect.php';

// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data and trim whitespace
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

    // --- SERVER-SIDE VALIDATION ---
    // 1. Check if passwords match
    if ($password !== $confirmPassword) {
        die("Error: Passwords do not match.");
    }

    // 2. Check if email already exists
    // Use a prepared statement to prevent SQL injection
    $sql_check = "SELECT id FROM users WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();
    
    if ($stmt_check->num_rows > 0) {
        die("Error: An account with this email already exists.");
    }
    $stmt_check->close();

    // --- PASSWORD HASHING (CRITICAL SECURITY STEP) ---
    // Never store plain-text passwords!
    // password_hash() creates a strong, secure hash.
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // --- INSERT NEW USER INTO DATABASE ---

    $sql_insert = "INSERT INTO users (name, surname, email, password) VALUES (?, ?, ?, ?)";
    
    $stmt_insert = $conn->prepare($sql_insert);
    // "ssss" means we are binding four string parameters
    $stmt_insert->bind_param("ssss", $name, $surname, $email, $hashed_password);

    // Execute the statement and check for success
    if ($stmt_insert->execute()) {
    echo "
    <div id='popup' style='
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #e6ffed;
        color: #2f9e44;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
        text-align: center;
        z-index: 9999;
    '>
        <h2>🎉 Registration Successful!</h2>
        <p>Redirecting to login...</p>
    </div>

    <script>
        setTimeout(function(){
            window.location.href = '../login.html';
        }, 2000);
    </script>
    ";
}

    // Close the statement
    $stmt_insert->close();
}

// Close the database connection
$conn->close();
?>