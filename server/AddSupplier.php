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

        $sql1="select * from suppliers where name=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$name]);
        $tot=$res1->rowCount();
        if($tot > 0){
            echo "Name already exists";
        }else{

            $sql="insert into suppliers(name,address,phone,vehicleNo,createdBy) values(?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$name,$address,$pno,$vno,$uname]);        
            echo 200;          
           
        }


    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
