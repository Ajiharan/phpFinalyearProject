<?php
    session_start();
    include('DBConnection.php');
?>

<?php

    try{
        $name=$_POST['uname'];
        $pno=$_POST['pno'];  
        $address=$_POST['address'];
        $vno=$_POST['vno'];
        $id=$_POST['id'];

        $sql="update  suppliers set name=?, address=?, phone=?, vehicleNo=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$name,$address,$pno,$vno,$id]);
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
