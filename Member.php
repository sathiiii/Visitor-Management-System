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

    function getMemberById($memberId, $tablename, $idName)
    {
        $query = "SELECT * FROM $tablename WHERE $idName = ?";
        $paramType = "i";
        $paramArray = array($memberId);
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
}
?>