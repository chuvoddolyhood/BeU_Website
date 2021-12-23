<?php
class User {
	private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "commercial_web";
    private $userTbl    = 'khachhang';
	
	function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
	
	function checkUser($userData = array()){
        if(!empty($userData)){

            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE googleID = '".$userData['oauth_uid']."'";
            $prevResult = $this->db->query($prevQuery);
            
            if($prevResult->num_rows == 0){
                $sql = "INSERT INTO ".$this->userTbl." SET HoTenKH='".$userData['first_name']." ".$userData['last_name']."', Email='".$userData['email']."', googleID='".$userData['oauth_uid']."'";
                $insert = $this->db->query($sql);
            }
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }
    }
}
?>