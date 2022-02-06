<?php 
class user{

    private $db;
    
    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insert($usrnm, $pass){
        try{
            $result = $this->getByUsername($usrnm);
            if($result['num'] > 0){
                return false;
            }else{
                $new_pass = md5($pass.$usrnm);
                $sql = "INSERT INTO users (username, password) VALUES (:usrnm,:pass)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':usrnm', $usrnm);
                $stmt->bindparam(':pass', $new_pass);
                $stmt->execute();
                return true;
            }

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }    
    }
 
    public function getUser($usrnm, $pass){
        try{
            $sql = "SELECT * from users WHERE `username`=:usrnm and `password`=:pass";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':usrnm', $usrnm);
            $stmt->bindparam(':pass', $pass);
            $stmt->execute();
            $result = $stmt->fetch();
            
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }
    public function getByUsername($usrnm){
        try{
            $sql = "SELECT count(*) as num from users WHERE `username`=:usrnm";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':usrnm', $usrnm);
            $stmt->execute();
            $result = $stmt->fetch();
            
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }

}
?>