<?php
    session_start();
    include('DBConnection.php');

?>


<?php

    try{     
        $name=$_POST['uname'];
        $pno=$_POST['pno'];  
        $address=$_POST['address'];
        $vno=$_POST['vno'];
        $uname=$_SESSION['uname'];

            $sql="insert into suppliers(name,address,phone,vehicleNo,createdBy) values(?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$name,$address,$pno,$vno,$uname]);        
            echo 200;          
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
