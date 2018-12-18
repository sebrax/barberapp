<?php
session_start();
include('connection.php');

if(empty($_POST['user']) || empty($_POST['password'])) {
    header('Location: index.php');
    exit();
}

$user = mysqli_real_escape_string($connection, $_POST['user']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

if ($_POST['type'] == 'A') {
    $query = "SELECT * from tb_admin WHERE ADMIN_login = '{$user}' and ADMIN_password = '{$password}'";
} elseif ($_POST['type'] == 'C') {
    $query = "SELECT * from tb_client WHERE CLIENT_email = '{$user}' and CLIENT_password = '{$password}'";
} elseif ($_POST['type'] == 'O') {
    $query = "SELECT * from tb_owner WHERE OWNER_email = '{$user}' and OWNER_password = '{$password}'";
}


$result = mysqli_query($connection, $query);

$row = mysqli_num_rows($result);

if ($row == 1 && $_POST['type'] == 'C') {
    $_SESSION['user'] = $user;
    header('Location: user-dashboard.php');
}

elseif ($row == 1 && $_POST['type'] == 'A') {
    $_SESSION['user'] = $user;
    header('Location: admin-dashboard.php');
}

elseif ($row == 1 && $_POST['type'] == 'O') {
    $_SESSION['user'] = $user;
    header('Location: owner-dashboard.php');
}

else {
    $_SESSION['not_authenticated'] = true;
    header('Location: index.php');
    exit();
}