<?php
include '../db/connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $name = $_POST['name'];
    $company= $_POST['company'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
    // Assuming you have a session variable storing the logged-in user's ID

    $user_id = $_SESSION['user_id'];

    // Insert new contact into the database, associating it with the logged-in user
    $sql = "INSERT INTO contacts (name, company, phone, email, account_id) VALUES ('$name', '$company', '$phone', '$email', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the main page after adding contact
        header("Location:?pg=contacts");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
    