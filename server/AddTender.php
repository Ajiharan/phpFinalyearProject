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
        $uname=$_SESSION['uname'];

        $sql1="select * from tenders where project=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$project]);
        $tot1=$res1->rowCount();  
        if($tot1 > 0){
            echo "Project name already exists";
        }else{
            $sql="insert into tenders(clientId,project,projectValue,duration,security_fee,createdBy) values(?,?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$cid,$project,$pval,$dur,$fee,$uname]);        
            echo 200;         
          
        }

            
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
