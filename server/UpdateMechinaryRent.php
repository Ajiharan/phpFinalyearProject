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
        $total=$nofh*$payment;
        $uname=$_SESSION['uname'];
        $ndate=$_POST['ndate'];
        
        $sql="update  machineryrents set projectId=?,machineryId=?,hourlyPayment=?,noOfHrs=?,payment=?,updatedBy=?,ndate=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$pid,$mid,$payment,$nofh,$total,$uname,$ndate,$id]);
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
