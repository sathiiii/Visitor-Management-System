<?php
    $profile_path = $_POST['profile-upload'];
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
        $INSERT = "INSERT INTO visitors (username, first_name, last_name, NIC, address, tel_no, email, password) VALUES ('$username', '$first_name', '$last_name', '$NIC', '$address', '$tel_no', '$email', '$password')";
        $stmt = $conn->prepare($INSERT);
        $stmt->execute();
        header("Location: login_guest.html");
    }
?>