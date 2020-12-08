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
        $ndate=$_POST['ndate'];

        $tot=$price*$qty;
        $uname=$_SESSION['uname'];
         $expenseType="Material Purchase";

            $sql="insert into materialpurchase(projectId,materialId,unitprice,qty,totalAmount,createdBy,ndate) values(?,?,?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$mid,$price,$qty,$tot, $uname, $ndate]);   
            
           
            $sql="insert into expenses(projectId,expenseType,amount,cdate,createdBy,tid) values(?,?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$expenseType,$tot,$cdate,$uname,$ndate]);   
            
            echo 200;     
        
            
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
