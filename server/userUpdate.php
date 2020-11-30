<?php
    session_start();
    include('DBConnection.php');
?>

<?php

    try{
        $id=$_POST['id'];
        $aid=$_POST['aid'];
        $sql="update  Users set isActive=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$aid,$id]);
        $tot=$res->rowCount();
        if($tot >0){
            echo "Updated";
        }else{
            echo "cannot update";
        }
    }catch(PDOException $e){
        echo "Error".$e->getMessage();
    }
?>
