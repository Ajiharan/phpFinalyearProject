<?php
    session_start();
    include('DBConnection.php');
?>

<?php

    try{
        $name=$_POST['uname'];
        $pno=$_POST['pno'];  
        $address=$_POST['address'];
        $workType=$_POST['workType'];
        $id=$_POST['id'];
        $uname=$_SESSION['uname'];

        $sql="update  labours set name=?, address=?, phone=?, workType=?,updatedBy=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$name,$address,$pno,$workType,$uname,$id]);
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
