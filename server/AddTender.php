<?php
    session_start();
    include('DBConnection.php');

?>


<?php

    try{     
        $cid=$_POST['uname'];
        $project=$_POST['project'];  
        $pval=$_POST['pval'];
        $dur=$_POST['dur'];
        $fee=$_POST['fee'];

            $sql="insert into tenders(clientId,project,projectValue,duration,security_fee) values(?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$cid,$project,$pval,$dur,$fee]);        
            echo 200;          
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
