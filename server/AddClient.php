<?php
    session_start();
    include('DBConnection.php');

?>


<?php

    try{     
        $name=$_POST['uname'];
        $pno=$_POST['pno'];  
        $address=$_POST['address'];
        $email=$_POST['email'];

            $sql="insert into clients(name,address,phone,email) values(?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$name,$address,$pno,$email]);        
            echo 200;          
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
