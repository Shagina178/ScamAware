<?php
// php/login.php

// ALWAYS start the session first
session_start();

// Include our database connection
require_once 'db_connect.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // --- FIND THE USER BY EMAIL ---
    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT id, name, password FROM users WHERE email = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if exactly one user was found
    if ($result->num_rows === 1) {
        
        $user = $result->fetch_assoc();

        // --- VERIFY THE PASSWORD ---
        // Use password_verify() to compare the submitted password with the stored hash
        if (password_verify($password, $user['password'])) {
            
            // --- LOGIN SUCCESSFUL: CREATE SESSION ---
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            // Redirect the user to the homepage
            header("Location: ../home.html");
            exit; 

        } else {
            // Password is not valid
            echo "Invalid email or password.";
        }
    } else {
        // No user found with that email
        echo "Invalid email or password.";
    }

    $stmt->close();
}

$conn->close();
?>