<?php
session_start();

if (isset($_SESSION['user_id'])) {
    include '../db/connection.php';

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT  name FROM account WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $full_name = $row['name'];
    } else {
        $full_name = "Unknown";
    }
} else {
    $full_name = "Guest";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact System</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/template.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<header>
    <div class="menu-toggle" onclick="toggleSidebar()">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <h3>Contact System</h3>

    <div class="user-logout">
    <div class="user-info" onclick="toggleUserOptions()">
        <i class="fas fa-user"></i>&nbsp;&nbsp;<?php echo $full_name; ?>&nbsp;<i class="fas fa-caret-down"></i>
    </div>
    <div class="user-options" id="userOptions">
        <a href="?pg=logout">Logout</a>
        <a href=#>Edit Profile</a>
    </div>
</div>

    
</header>


<div class="sidebar" id="sidebar">
    <div class="user-name">
        <p>Hi, <?php echo $full_name; ?></p>
    </div>
   
    <a href="?pg=contacts"><i class="fas fa-users"></i> Contact</a>
    <a href="?pg=logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
</div>

<div class="content">
<?php
        if(isset($_GET['pg'])) {
            $pg = $_GET['pg'];
            switch($pg){
                case "contacts":
                    include "../page/contact/contact.php";
                    break;


                case "add_task":
                    include "../page/contact/add_contact.php";						
                    break;

                case "edit_task":
                    include "../page/contact/edit_contact.php";						
                    break;

                case "delete_task":
                    include "../page/contact/delete_contact.php";						
                    break;

                    case "login":
                        include "page/login/login.php";						
                        break;

                        case "logout":
                            include "../page/login/logout.php";						
                            break;


                        case "delete_task":
                            include "../page/task/delete_task.php";						
                            break;
        

                default:
                    include "../inc/dash_display.php";						
            }
        }
    ?>
</div>

<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        var content = document.querySelector(".content");

        if (sidebar.style.left === "-250px") {
            sidebar.style.left = "0";
            content.style.marginLeft = "250px"; 
        } else {
            sidebar.style.left = "-250px";
            content.style.marginLeft = "0"; 
        }
    }

    function toggleUserOptions() {
    var userOptions = document.getElementById("userOptions");
    if (userOptions.style.display === "block") {
        userOptions.style.display = "none";
    } else {
        userOptions.style.display = "block";
    }
}

</script>


</body>
</html>
