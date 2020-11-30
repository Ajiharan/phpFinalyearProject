<?php
    session_start();
    include('DBConnection.php');
?>

<?php

    try{
        $id=$_POST['id'];
        $sql="delete from Users where id=?";
        $res=$con->prepare($sql);
        $res->execute([$id]);
        $tot=$res->rowCount();
        if($tot >0){
            echo "Deleted";
        }else{
            echo "cannot delete";
        }
    }catch(PDOException $e){
        echo "Error".$e->getMessage();
    }
?>
