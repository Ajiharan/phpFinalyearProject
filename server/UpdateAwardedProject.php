<?php
    session_start();
    include('DBConnection.php');
?>

<?php

    try{
        $id=$_POST['id'];
        $tid=$_POST['tid'];
        $eval=$_POST['eval'];  
        $sdate=$_POST['sdate'];
        $edate=$_POST['edate'];
        $ramount=$_POST['ramount'];
        $rdate=$_POST['rdate'];

        $sql="update  awardedprojects set tenderId=?, estimatedValue=?, projectStartDate=?, projectEndDate=?,retentionAmount=?,retentionDueDate=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$tid,$eval,$sdate,$edate,$ramount,$rdate,$id]);
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
