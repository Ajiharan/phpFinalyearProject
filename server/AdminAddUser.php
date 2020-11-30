<?php
    session_start();
    include('DBConnection.php');

?>


<?php

    $name=$_POST['username'];
    $email=$_POST['email'];  
    $pass=$_POST['pass'];

    try{     
        $sql1="select * from Users where emailId=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$email]);
        $tot=$res1->rowCount();
        if($tot > 0){
            echo 403;
        }else{
            $sql="insert into users(username,emailId,password) values(?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$name,$email,$pass]);        
            echo 200;    
        }
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
