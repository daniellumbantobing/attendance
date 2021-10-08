<?php
    require_once 'db/conn.php';

    if(isset($_GET['id'])){
      $id = $_GET['id'];   
     
      
       $result = $crud->delete($id);
    
        if($result){
          
            header("Location:  view.php");
        }else{
            include 'includes/error.php';
        }
    }else{
        include 'includes/error.php';
        header("Location:  view.php");
    }
?>