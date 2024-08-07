<?php
include 'db/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $contact_id = $_POST['contact_id'];
    $name = $_POST['edit_name'];
    $company = $_POST['edit_company'];
    $phone = $_POST['edit_phone']; 
    $email = $_POST['edit_email'];

    // Update task in the database with status
    $sql = "UPDATE contacts SET name='$name', company='$company', phone='$phone', email='$email' WHERE id='$contact_id'";
    
    if ($conn->query($sql) === TRUE) {
        // Task updated successfully
        header("Location: ?pg=contacts"); // Redirect back to the task list
        exit();
    } else {
        // Error updating task
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
