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
        $tot=$price*$qty;
      
        
        $sql="update  materialpurchase set projectId=?,materialId=?,unitprice=?,qty=?,totalAmount=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$pid,$mid,$price,$qty,$tot,$id]);
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
