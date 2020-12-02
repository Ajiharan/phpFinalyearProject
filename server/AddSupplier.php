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

            $sql="insert into suppliers(name,address,phone,vehicleNo) values(?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$name,$address,$pno,$vno]);        
            echo 200;          
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
