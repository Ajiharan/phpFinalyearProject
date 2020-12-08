<?php
    session_start();
    include('DBConnection.php');
    
?>

<?php

    try{
        $name=$_POST['mname'];
        $id=$_POST['id'];
        $uname=$_SESSION['uname'];

        
        $sql1="select * from materials where name=? and id !=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$name,$id]);
        $tot=$res1->rowCount();
        if($tot > 0){
            echo "Name already exists";
        }else{
            $sql="update  materials set name=?,updatedBy=? where id=?";
            $res=$con->prepare($sql);
            $res->execute([$name, $uname,$id]);
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
