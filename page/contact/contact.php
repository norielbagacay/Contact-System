<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: ../page/login/login.php");
    exit();
}

include '../db/connection.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM contacts WHERE account_id = $user_id";
$result = $conn->query($sql);

$contact = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $contact[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/template.css">
    <style>
        @media (max-width: 600px) {
            table.dataTable thead th {
                font-size: 12px;
            }

            table.dataTable tbody td {
                font-size: 12px;
                padding: 5px;
            }

            .btn {
                font-size: 14px;
                padding: 6px 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="task-title">
            <!-- Task title content -->
        </div>

        <?php include "../page/contact/addModal.php"; ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTaskModal">
            Add Contact
        </button>
        <?php include "../page/contact/deleteModal.php"; ?>
        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
        </button>

        <br><br>

        <div class="table-responsive">
            <table id="contactTable" class="table table-bordered mt-3">
                <!-- Table Header -->
                <thead>
                    <tr>
                        <th style="width: 20px !important;">
                            <input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" />
                        </th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody>
                    <?php foreach ($contact as $contact): ?>
                        <tr>
                            <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="<?php echo $contact['id']; ?>" /></td>
                            <td><?php echo $contact['name']; ?></td>
                            <td><?php echo $contact['company']; ?></td>
                            <td><?php echo $contact['phone']; ?></td>
                            <td><?php echo $contact['email']; ?></td>
                            <td>
                                <button class="btn btn-primary editBtn" data-toggle="modal" data-target="#editModal<?php echo $contact['id']; ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update
                                </button>
                                <?php include "../page/contact/editModal.php"; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

    <form id="deleteForm" action="?pg=delete_task" method="post">
        <input type="hidden" name="contactToDelete" id="contactToDelete">
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize DataTables plugin
            $('#contactTable').DataTable();
        });

        function checkMain(x) {
            var checked = $(x).prop('checked');
            $('.cbxMain').prop('checked', checked);
            $('.chk_delete').prop('checked', checked);
        }

        $(document).ready(function() {
            $('.chk_delete').click(function () {
                if ($('.chk_delete:checked').length === $('.chk_delete').length) {
                    $('.cbxMain').prop('checked', true);
                } else {
                    $('.cbxMain').prop('checked', false);
                }
            });

            $('#confirmDeleteBtn').click(function() {
                var selectedTasks = [];
                $('.chk_delete:checked').each(function() {
                    selectedTasks.push($(this).val());
                });
                $('#contactToDelete').val(selectedTasks.join(','));
                $('#deleteForm').submit();
            });
        });
    </script>
</body>
</html>
