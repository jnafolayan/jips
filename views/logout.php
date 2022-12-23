<?php

session_start();

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    session_destroy();
    $redirect = $role === 'admin' ? '/views/admin/admin-login.php' : '/views/lecturer/lecturer-signin.php';
    header("location: $redirect");
}

?>