<?php
    session_start();
    include('DBConnection.php');
?>

<?php

    try{
        $name=$_POST['mname'];
        $id=$_POST['id'];

        $sql="update  materials set name=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$name,$id]);
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
