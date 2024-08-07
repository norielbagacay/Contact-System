<?php

include 'db/connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['contactToDelete']) && !empty($_POST['contactToDelete'])) {
        $accountIds = explode(',', $_POST['contactToDelete']);
        $sql = "DELETE FROM contacts WHERE id IN (";
        foreach ($accountIds as $accountId) {
            $sql .= $accountId . ",";
        }
        $sql = rtrim($sql, ",") . ")";

        if ($conn->query($sql) === TRUE) {
            echo "Contact deleted successfully.";
        } else {
            // Error deleting tasks
            echo "Error deleting contact: " . $conn->error;
        }
    } else {
        echo "No contact to delete provided.";
    }
} else {

    echo "Invalid request method.";
}
$conn->close();

// Redirect back to task.php
echo '<script>window.location.href = "?pg=contacts";</script>';
?>
