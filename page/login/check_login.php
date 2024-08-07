<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../db/connection.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Check if the user is a regular user
    $user_sql = "SELECT * FROM account WHERE email = '$email'";
    $user_result = $conn->query($user_sql);
    
    if ($user_result->num_rows > 0) {
        $user = $user_result->fetch_assoc();
        // Verify the password against the hashed password in the database
        if (password_verify($password, $user['pass'])) {
            // Regular user login successful
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header("Location: ../dashboard.php?pg=contacts");
            exit();
        } else {
            $error = "Invalid username or password!";
            header("Location: login.php?error=$error");
            exit();
        }
    } else {
        $error = "Invalid username or password!";
        header("Location: login.php?error=$error");
        exit();
    }
}
?>
