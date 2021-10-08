<?php
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
      $id = $_POST['id'];   
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $dob =   $_POST['dob'];
      $email =   $_POST['email'];
      $contact =  $_POST['phone'];
      $speciality = $_POST['specialty'];
      
      $result = $crud->update($id,$fname, $lname, $dob, $email, $contact, $speciality);
    
        if($result){
            include 'includes/success.php';
            header("Location:  view.php");
        }else{
            include 'includes/error.php';
        }
    }else{
        include 'includes/error.php';
    }
?>