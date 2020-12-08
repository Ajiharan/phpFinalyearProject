<?php
    session_start();
    include('DBConnection.php');
?>

<?php

    try{
        
        $id=$_POST['id'];
        $cid=$_POST['uname'];
        $project=$_POST['project'];  
        $pval=$_POST['pval'];
        $dur=$_POST['dur'];
        $fee=$_POST['fee'];
        $uname=$_SESSION['uname'];
        $sql="update  tenders set clientId=?, project=?, projectValue=?, duration=?, security_fee=? ,updatedBy=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([ $cid,$project,$pval,$dur,$fee,$uname,$id]);
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
