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

      
        $sql="update  labourpayment set projectId=?, labourId=?, noOfWorkers=?, payment=?,paidOn=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$pid,$lid,$nofw,$payment,$pdate,$id]);
        $tot=$res->rowCount();
        if($tot >0){
            echo "Updated";
        }else{
            echo "No Changes detected";
        }
    }catch(PDOException $e){
        echo "Error".$e->getMessage();
    }
?>
