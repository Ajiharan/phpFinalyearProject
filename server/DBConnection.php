<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="cms";
    $con="";
    $port="3306";
    $str="mysql:host=".$host.";port=".$port.";dbname=".$db;

    try{
        $con=new PDO($str,$user,$pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
       
       
    }
    catch(PDOException $e){
        echo "Connection Error".$e->getMessage();
    }
?>