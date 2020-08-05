<?php
    namespace VMS;

    use \VMS\Member;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        require_once "Member.php";
        $admin = new Member();
        $loginSuccessful = $admin->processAdminLogin($username, $password);
        if (!$loginSuccessful) {
            header("Location: ./login_admin.html");
        }
        else {
            // if (isset($_COOKIE['remcheck']) && $_COOKIE['remcheck'] == "1") {
            //     $cookie_expiration_time = date("Y-m-d H:i:s", time()) + (48 * 60 * 60);  // for 48 hours
            //     \setcookie("uid", $username, $cookie_expiration_time);
            //     \setcookie("upw", \password_hash($password, PASSWORD_DEFAULT), $cookie_expiration_time);
            // }
            header("Location: ./index.php");
        }
        exit();
    }
?>