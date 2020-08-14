<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_directory = "img/profile/visitor/";
    $file_name = basename($_FILES["profile-upload"]["name"]);
    $targetFilePath = $target_directory . $file_name;
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $NIC = $_POST['nic'];
    $address = $_POST['address'];
    $tel_no = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $host = "localhost:3306";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "vms";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connection Failed : ' .$conn->connect_error);
    }
    else {
        move_uploaded_file($_FILES["profile-upload"]["tmp_name"], $targetFilePath . time());
        $INSERT = "INSERT INTO visitors (username, first_name, last_name, NIC, address, tel_no, email, password, profile_pic) VALUES ('$username', '$first_name', '$last_name', '$NIC', '$address', '$tel_no', '$email', '$password', '$file_name')";
        $stmt = $conn->prepare($INSERT);
        $stmt->execute();
        header("Location: login_guest.html");
    }
}
?>
