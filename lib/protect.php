<?php
function protect($role)
{
    $redirect = $role === 'admin' ? '/views/admin/admin-login.php' : '/views/lecturer/lecturer-signin.php';

    if (!isset($_SESSION['role'])) {
        header("location: $redirect");
    }

    $is_allowed = false;
    if (is_array($role)) {
        $is_allowed = in_array($_SESSION['role'], $role);
    } else {
        $is_allowed = $_SESSION['role'] === $role;
    }

    if (!$is_allowed) {
        header("location: $redirect");
    }
}

?>