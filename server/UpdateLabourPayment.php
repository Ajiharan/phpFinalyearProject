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
        $id=$_POST['id'];
        $uname=$_SESSION['uname'];
        $ndate=$_POST['ndate'];
        $total=$nofw*$payment;
      
        $sql="update  labourpayment set projectId=?, labourId=?, noOfWorkers=?, payment=?,paidOn=?,updatedBy=? where id=?";

        $res=$con->prepare($sql);
        $res->execute([$pid,$lid,$nofw,$payment,$pdate,$uname,$id]);
        $tot=$res->rowCount();
        if($tot >0){  
            $sql1="update  expenses set projectId=?,amount=?,updatedBy=? where tid=?";
            $res1=$con->prepare($sql1);
            $res1->execute([$pid,$total,$uname,$ndate]);
            $tot1=$res1->rowCount();
            if($tot1 >0){
                echo "Updated";
            }else{
                echo "No Changes detected";
            }

        }else{
            echo "No Changes detected";
        }
    }catch(PDOException $e){
        echo "Error".$e->getMessage();
    }
?>
