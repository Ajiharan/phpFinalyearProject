<?php
    session_start();
    include('DBConnection.php');
?>

<?php

    try{
      
        $id=$_POST['id'];
        $pid=$_POST['pid'];
        $mid=$_POST['mid'];
        $price=$_POST['price'];
        $qty=$_POST['qty'];
        $cdate=$_POST['cdate'];
        $total=$price*$qty;
        $uname=$_SESSION['uname'];
        $ndate=$_POST['ndate'];
        
        $sql="update  materialpurchase set projectId=?,materialId=?,unitprice=?,qty=?,totalAmount=?,updatedBy=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$pid,$mid,$price,$qty,$total, $uname,$id]);
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
