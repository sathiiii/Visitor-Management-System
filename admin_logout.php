<?php
    namespace VMS;

    use \VMS\Member;

    session_start();
    require_once "Member.php";
    $admin = new Member();
    $admin->processAdminLogout($_SESSION["adminId"]);
    $_SESSION["adminId"] = "";
    // unset admin cookies
    $past = time() - 3600;
    foreach ($_COOKIE as $key => $value)
    {
        setcookie($key, $value, $past, '/');
    }
    session_destroy();
    header("Location: login_admin.html");
?>