<?php
    session_start();
    include('DBConnection.php');
?>

<?php

    try{
        $id=$_POST['id'];
        $pid=$_POST['pid'];
        $billNo=$_POST['billNo'];  
        $amountReceived=$_POST['amountReceived'];
        $receivedDate=$_POST['receivedDate'];
        $uname=$_SESSION['uname'];

        $sql="update  bills set projectId =?,  billNo=?, receivedAmount=?, receivedDate=?,updatedBy=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$pid,$billNo,$amountReceived,$receivedDate,$uname,$id]);
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
