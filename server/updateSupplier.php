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
        $uname=$_SESSION['uname'];

        $sql1="select * from suppliers where name=? and id !=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$name, $id]);
        $tot=$res1->rowCount();
        if($tot > 0){
            echo "Name already exists";
        }else{
            $sql="update  suppliers set name=?, address=?, phone=?, vehicleNo=?, updatedBy=? where id=?";
            $res=$con->prepare($sql);
            $res->execute([$name,$address,$pno,$vno,$uname,$id]);
            $tot=$res->rowCount();
            if($tot >0){
                echo "Updated";
            }else{
                echo "No Changes detected";
            }
        }


       
    }catch(PDOException $e){
        echo "Error".$e->getMessage();
    }
?>
