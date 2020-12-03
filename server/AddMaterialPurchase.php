<?php
    session_start();
    include('DBConnection.php');

?>


<?php

    try{     
        $pid=$_POST['pid'];
        $mid=$_POST['mid'];
        $price=$_POST['price'];
        $qty=$_POST['qty'];
        $cdate=$_POST['cdate'];
        $tot=$price*$qty;
         $expenseType="Material Purchase";

            $sql="insert into materialpurchase(projectId,materialId,unitprice,qty,totalAmount) values(?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$mid,$price,$qty,$tot]);   
            
           
            $sql="insert into expenses(projectId,expenseType,amount,cdate) values(?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$expenseType,$tot,$cdate]);   
            
            echo 200;     
        
            
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
