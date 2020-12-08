<?php
    session_start();
    include('DBConnection.php');

?>


<?php

    try{     
        $pid=$_POST['pid'];
        $lid=$_POST['lid'];
        $nofw=$_POST['nofw'];
        $payment=$_POST['payment'];
        $pdate=$_POST['pdate'];
        $uname=$_SESSION['uname'];
        $ndate=$_POST['ndate'];
        $tot=$nofw*$payment;
        $ndate=$_POST['ndate'];
         $expenseType="Labour Charges";

            $sql="insert into labourpayment(projectId,labourId,noOfWorkers,payment,paidOn,createdBy,ndate) values(?,?,?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$lid,$nofw,$payment,$pdate,$uname,$ndate]);   
            
           
            $sql="insert into expenses(projectId,expenseType,amount,cdate,createdBy,tid) values(?,?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$expenseType,$tot,$pdate,$uname,$ndate]);   
            
            echo 200;     
        
            
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
