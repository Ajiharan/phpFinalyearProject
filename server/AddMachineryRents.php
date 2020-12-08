<?php
    session_start();
    include('DBConnection.php');

?>


<?php

    try{     
        $pid=$_POST['pid'];
        $mid=$_POST['mid'];
        $nofh=$_POST['nofh'];
        $payment=$_POST['payment'];
        $pdate=$_POST['pdate'];
        $tot=$nofh*$payment;
        $uname=$_SESSION['uname'];
        $ndate=$_POST['ndate'];
       
         $expenseType="Machinery Rent";

            $sql="insert into machineryrents(projectId,machineryId,hourlyPayment,noOfHrs,payment,createdBy,ndate) values(?,?,?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$mid,$payment,$nofh,$tot,$uname,$ndate]);   
            
           
            $sql="insert into expenses(projectId,expenseType,amount,cdate,createdBy,tid) values(?,?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$expenseType,$tot,$pdate,$uname,$ndate]);   
            
            echo 200;     
        
            
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
