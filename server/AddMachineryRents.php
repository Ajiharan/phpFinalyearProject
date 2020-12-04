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
       
         $expenseType="Machinery Rent";

            $sql="insert into machineryrents(projectId,machineryId,hourlyPayment,noOfHrs,payment) values(?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$mid,$payment,$nofh,$tot]);   
            
           
            $sql="insert into expenses(projectId,expenseType,amount,cdate) values(?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$expenseType,$tot,$pdate]);   
            
            echo 200;     
        
            
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
