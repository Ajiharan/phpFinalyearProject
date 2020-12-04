<?php
    session_start();
    include('DBConnection.php');
?>

<?php

    try{
      
        $id=$_POST['id'];
        $pid=$_POST['pid'];
        $mid=$_POST['mid'];
        $nofh=$_POST['nofh'];
        $payment=$_POST['payment'];
        $pdate=$_POST['pdate'];
        $tot=$nofh*$payment;
        
        $sql="update  machineryrents set projectId=?,machineryId=?,hourlyPayment=?,noOfHrs=?,payment=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$pid,$mid,$payment,$nofh,$tot,$id]);
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
