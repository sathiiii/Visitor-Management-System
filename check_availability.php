<?php
namespace VMS;

use \VMS\DataSource;
require_once "DataSource.php";
$db_handle = new DataSource();
if (!empty($_POST["username"])) {
    $query = "SELECT * FROM visitors WHERE username='" . $_POST["username"] . "'";
    $user_count = $db_handle->numRows($query);
    if ($user_count > 0) {
        echo json_encode(array("<span class='status-not-available'> Username Not Available.</span>", "0"));
    }
    else {
        echo json_encode(array("<span class='status-available'> Username Available.</span>", "1"));
    }
}
if (!empty($_POST["email"])) {
    $query = "SELECT * FROM visitors WHERE email='" . $_POST["email"] . "'";
    $user_count = $db_handle->numRows($query);
    if ($user_count > 0) {
        echo json_encode(array("<span class='status-not-available'> An account with this email already exists.</span>", "1"));
    }
    else {
        echo json_encode(array("", ""));
    }
}
?>