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
        $uname=$_SESSION['uname'];

        $sql1="select * from clients where name=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$name]);
        $tot1=$res1->rowCount();  
        
        if($tot1 > 0){
            echo "sorry name already exists";
        }else{
            $sql="insert into clients(name,address,phone,email,createdBy) values(?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$name,$address,$pno,$email,$uname]);        
            echo 200;     
        }
            
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
