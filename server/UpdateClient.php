<?php
    session_start();
    include('DBConnection.php');
?>

<?php

    try{
        $name=$_POST['uname'];
        $pno=$_POST['pno'];  
        $address=$_POST['address'];
        $email=$_POST['email'];
        $id=$_POST['id'];
        $uname=$_SESSION['uname'];

        $sql1="select * from clients where name=? and id !=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$name,$id]);
        $tot1=$res1->rowCount();  
        
        if($tot1 > 0){
            echo "sorry name already exists";
        }else{

            $sql="update  clients set name=?, address=?, phone=?, email=?,updatedBy=? where id=?";
            $res=$con->prepare($sql);
            $res->execute([$name,$address,$pno,$email,$uname,$id]);
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
