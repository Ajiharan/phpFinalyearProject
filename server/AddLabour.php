<?php
    session_start();
    include('DBConnection.php');

?>


<?php

    try{     
        $name=$_POST['uname'];
        $pno=$_POST['pno'];  
        $address=$_POST['address'];
        $workType=$_POST['workType'];
        $uname=$_SESSION['uname'];

            $sql="insert into labours(name,address,phone,workType,createdBy) values(?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$name,$address,$pno,$workType,$uname]);        
            echo 200;          
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
