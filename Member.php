<?php
namespace VMS;

use \VMS\DataSource;

class Member
{

    private $dbConn;

    private $ds;

    function __construct()
    {
        require_once "DataSource.php";
        $this->ds = new DataSource();
    }

    function getAdminById($adminId)
    {
        $query = "SELECT * FROM admins, staff WHERE admins.staff_id = ?";
        $paramType = "i";
        $paramArray = array($adminId);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        
        return $memberResult;
    }

    public function processAdminLogin($username, $password) {
        $query = "SELECT * FROM admins, staff WHERE admins.username = ? AND staff.password = ?";
        $paramType = "ss";
        $paramArray = array($username, $password);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        if(!empty($memberResult)) {
            $_SESSION["adminId"] = $memberResult[0]["staff_id"];
            return true;
        }
        \setcookie("error", "1");
        \setcookie("username", "$username");
    }

    public function processAdminLogout($adminId) {
        $last_active = $_COOKIE['status'];
        $query = "UPDATE admins SET last_active = '$last_active' WHERE staff_id = ?";
        $paramType = "i";
        $paramArray = array($adminId);
        $conn = $this->ds->getConnection();
        $stmt = $conn->prepare($query);
        $this->ds->bindQueryParams($stmt, $paramType, $paramArray);
        $stmt->execute();
    }
}
?>