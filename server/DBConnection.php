<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="cms";
    $con="";
    $str="mysql:host=".$host.";dbname=".$db;

    try{
        $con=new PDO($str,$user,$pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        echo "connected sucessfully";
       
    }
    catch(PDOException $e){
        echo "Connection Error".$e->getMessage();
    }
?>