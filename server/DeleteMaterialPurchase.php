<?php
    session_start();
    include('DBConnection.php');
?>

<?php

    try{
        $id=$_POST['id'];
        $tid=$_POST['tid'];
        $sql="delete from materialpurchase where id=?";
        $res=$con->prepare($sql);
        $res->execute([$id]);
        $tot=$res->rowCount();
        if($tot >0){
            $sql1="delete from expenses where tid=?";
            $res1=$con->prepare($sql1);
            $res1->execute([$tid]);
            $tot1=$res1->rowCount();
            if($tot1 >0){
                echo "Deleted";
            }else{
                echo "cannot delete";
            }
           
        }else{
            echo "cannot delete";
        }
    }catch(PDOException $e){
        echo "Error".$e->getMessage();
    }
?>
