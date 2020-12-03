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
       
         $expenseType="Labour Charges";

            $sql="insert into labourpayment(projectId,labourId,noOfWorkers,payment,paidOn) values(?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$lid,$nofw,$payment,$pdate]);   
            
           
            $sql="insert into expenses(projectId,expenseType,amount,cdate) values(?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$expenseType,$payment,$pdate]);   
            
            echo 200;     
        
            
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
