<?php
    session_start();
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