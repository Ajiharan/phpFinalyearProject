<?php
    session_start();
    include('DBConnection.php');
?>

<?php

    try{
        $id=$_POST['id'];
        $tid=$_POST['tid'];
        $sql="delete from awardedprojects where id=?";
        $res=$con->prepare($sql);
        $res->execute([$id]);
        $tot=$res->rowCount();
        if($tot >0){
            echo "Deleted";
            $sql2="update tenders set isAwarded=? where id=?";
            $res2=$con->prepare($sql2);
            $res2->execute([0,$tid]);
            $tot=$res2->rowCount();
        }else{
            echo "cannot delete";
        }
    }catch(PDOException $e){
        echo "Error".$e->getMessage();
    }
?>
