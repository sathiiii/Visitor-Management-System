<?php
    function alertFunc($message) {  
        echo "<script>alert('$message');</script>"; 
    } 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $NIC = $_POST['NIC'];
    $address = $_POST['address'];
    $tel_no = $_POST['tel_no'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "vms";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connection Failed : ' .$conn->connect_error);
    } else {
        $SELECT = "SELECT email From visitors Where email = ? Limit 1";
        $INSERT = "INSERT Into visitors (first_name, last_name, NIC, address, email, tel_no, password) values(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
    if ($rnum==0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssssss", $first_name, $last_name, $NIC, $address, $email, $tel_no, $password);
        $stmt->execute();
        $conn->close();
        alertFunc("New Record enterd :-)");
        header("location: signup.html");
    } else {
        alertFunc("Email Already Exists!");
        header("location: signup.html");
        }
        $stmt->close();
    }
?>