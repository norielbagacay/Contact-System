<?php
session_start(); 
include '../db/connection.php';

$user_id = $_SESSION['user_id'];
$search = isset($_POST['search']) ? $_POST['search'] : '';
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;


$sql = $conn->prepare("SELECT * FROM contacts WHERE account_id = ? AND (name LIKE ? OR company LIKE ? OR phone LIKE ? OR email LIKE ?) LIMIT ? OFFSET ?");
$searchParam = '%' . $search . '%';
$sql->bind_param('issssi', $user_id, $searchParam, $searchParam, $searchParam, $searchParam, $limit, $offset);
$sql->execute();
$result = $sql->get_result();

$contacts = [];
while ($row = $result->fetch_assoc()) {
    $contacts[] = $row;
}


$table = '';
foreach ($contacts as $contact) {
    $table .= '<tr>';
    $table .= '<td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="' . $contact['id'] . '" /></td>';
    $table .= '<td>' . $contact['name'] . '</td>';
    $table .= '<td>' . $contact['company'] . '</td>';
    $table .= '<td>' . $contact['phone'] . '</td>';
    $table .= '<td>' . $contact['email'] . '</td>';
    $table .= '<td>
        <button class="btn btn-primary editBtn" data-toggle="modal" data-target="#editModal' . $contact['id'] . '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update</button>
        <!-- Include edit modal -->
    </td>';
    $table .= '</tr>';
}


$sqlTotal = $conn->prepare("SELECT COUNT(*) AS total FROM contacts WHERE account_id = ? AND (name LIKE ? OR company LIKE ? OR phone LIKE ? OR email LIKE ?)");
$sqlTotal->bind_param('issss', $user_id, $searchParam, $searchParam, $searchParam, $searchParam);
$sqlTotal->execute();
$totalResult = $sqlTotal->get_result();
$totalRow = $totalResult->fetch_assoc();
$totalRows = $totalRow['total'];
$totalPages = ceil($totalRows / $limit);


$pagination = '';
for ($i = 1; $i <= $totalPages; $i++) {
    $active = $i == $page ? ' active' : '';
    $pagination .= '<li class="page-item' . $active . '"><a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a></li>';
}


$data = [
    "table" => $table,
    "pagination" => $pagination
];

echo json_encode($data);
?>
