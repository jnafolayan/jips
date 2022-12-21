<?php

require_once(__DIR__ . '/../db.php');

class Auth
{
    public static function adminSignIn($username, $password)
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT * FROM admin WHERE username='$username' AND passwordHash='$password'");
        if ($res->num_rows > 0) {
            $admin = $res->fetch_assoc();
            $role = "admin";
            return array(
                "user" => $admin,
                "role" => $role,
            );
        }

        return null;
    }

    public static function lecturerSignIn($employeeID, $password)
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT * FROM lecturer WHERE employeeID='$employeeID' AND passwordHash='$password'");
        if ($res->num_rows > 0) {
            $lecturer = $res->fetch_assoc();
            $role = "lecturer";
            return array(
                "user" => $lecturer,
                "role" => $role,
            );
        }

        return null;
    }

    public static function lecturerSignUp($employeeID, $password, $firstName, $lastName, $email)
    {
        $passwordHash = $password;

        $conn = DB::getConnection();
        $res = $conn->query("INSERT INTO lecturer (employeeID, passwordHash, firstName, lastName, email) 
        VALUES ('$employeeID', '$passwordHash', '$firstName', '$lastName', '$email')");

        if ($res->num_rows > 0) {
            $lecturer = $res->fetch_assoc();
            $role = "lecturer";
            return array(
                "user" => $lecturer,
                "role" => $role,
            );
        }

        return null;
    }
}

?>