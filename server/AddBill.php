<?php
    session_start();
    include('DBConnection.php');

?>


<?php

    try{     
        $pid=$_POST['pid'];
        $billNo=$_POST['billNo'];  
        $amountReceived=$_POST['amountReceived'];
        $receivedDate=$_POST['receivedDate'];
        $uname=$_SESSION['uname'];

        $sql1="select * from bills where billNo=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$billNo]);
        $tot1=$res1->rowCount();  
        
        if($tot1 > 0){
            echo "sorry bill No already exists";
        }else{
            $sql="insert into bills(projectId,billNo,receivedAmount,receivedDate,createdBy) values(?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$billNo,$amountReceived,$receivedDate,$uname]);        
            echo 200;     
        }
            
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
