<?php
function protect($role, $redirect = "/login.php")
{
    if ($_SESSION['role'] !== $role) {
        header("location: $redirect");
    }
}

?>