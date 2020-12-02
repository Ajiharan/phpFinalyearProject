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

        $sql="update  clients set name=?, address=?, phone=?, email=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$name,$address,$pno,$email,$id]);
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
