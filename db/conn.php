<?php
    // $host = 'localhost';
    // $db = 'attendance';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';
    
    $host = 'remotemysql.com';
    $db = 'SmF5vEmfEl';
    $user = 'SmF5vEmfEl';
    $pass = 'ia4BOPwlep';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // echo 'hello Database';
    }catch(PDOException $e){
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';

    $crud = new crud($pdo);


?>