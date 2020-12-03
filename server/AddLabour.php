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

            $sql="insert into labours(name,address,phone,workType) values(?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$name,$address,$pno,$workType]);        
            echo 200;          
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
