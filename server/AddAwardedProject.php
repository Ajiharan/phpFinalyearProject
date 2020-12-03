<?php
    session_start();
    include('DBConnection.php');

?>


<?php

    try{     
        $tid=$_POST['tid'];
        $eval=$_POST['eval'];  
        $sdate=$_POST['sdate'];
        $edate=$_POST['edate'];
        $ramount=$_POST['ramount'];
        $rdate=$_POST['rdate'];

        $sql1="select * from awardedprojects where tenderId=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$tid]);
        $tot1=$res1->rowCount();  
        
        if($tot1 > 0){
            echo "sorry tender id already  exists";
        }else{
            $sql="insert into awardedprojects(tenderId,estimatedValue,projectStartDate,projectEndDate,retentionAmount,retentionDueDate) values(?,?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$tid,$eval,$sdate,$edate,$ramount,$rdate]); 
            
            $sql3="update tenders set isAwarded=? where id=?";
            $res3=$con->prepare($sql3);
            $res3->execute([1,$tid]);
            
            echo 200;     
        }
            
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
