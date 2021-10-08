<?php
class crud{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
        
    }

    public function insert($fname, $lname, $dob, $email, $contact, $speciality){

        try {
            $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth, email, contactnumber, specialty_id) VALUES (:fname,:lname,:dob,:email,:contact,:speciality)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':speciality', $speciality);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }
    
    public function get(){
        try {

            $sql = "SELECT * FROM attendee a 
            inner join specialites b on b.specialty_id = a.specialty_id
            order by a.attende_id desc";
            $result = $this->db->query($sql);
            
            //var_dump($result->fetch(PDO::FETCH_ASSOC));
            //die();
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
       
        
    }

    public function getspc(){
        $sql = "SELECT * FROM specialites";
        $result = $this->db->query($sql);
        //var_dump($result->fetch(PDO::FETCH_ASSOC));
        //print_r($result->fetchALL(PDO::FETCH_ASSOC));

        //die();
        return $result;
    }

    public function getdet($id){
        $sql = "SELECT * FROM attendee a 
        inner join specialites b on b.specialty_id = a.specialty_id where attende_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        //print_r($stmt->fetchALL(PDO::FETCH_ASSOC));
        
        return $result;
    }

    public function update($id,$fname, $lname, $dob, $email, $contact, $speciality){

        try{
            $sql= "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,
            `dateofbirth`=:dob,`email`=:email,`contactnumber`=:contact,`specialty_id`=:speciality
            WHERE attende_id = :id";
             $stmt = $this->db->prepare($sql);
             $stmt->bindparam(':id',$id);
             $stmt->bindparam(':fname', $fname);
             $stmt->bindparam(':lname', $lname);
             $stmt->bindparam(':dob', $dob);
             $stmt->bindparam(':email', $email);
             $stmt->bindparam(':contact', $contact);
             $stmt->bindparam(':speciality', $speciality);
             $stmt->execute();
             return true;
            
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
       
    }

    public function delete($id){
        try{
            $sql = "DELETE FROM `attendee` WHERE attende_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}

?>