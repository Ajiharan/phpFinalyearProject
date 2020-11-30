<?php
    session_start();
    include('DBConnection.php');

?>


<?php

    $name=$_POST['username'];
    $email=$_POST['email'];  
    $pass=$_POST['pass'];

    try{     
            $sql="insert into users(username,emailId,password) values(?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$name,$email,$pass]);        
            echo 200;    
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
