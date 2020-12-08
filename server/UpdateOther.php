<?php
    session_start();
    include('DBConnection.php');
?>

<?php


 
    try{
        $pid=$_POST['pid'];
        $price=$_POST['price'];  
        $desc=$_POST['desc'];
        $cdate=$_POST['cdate'];
        $id=$_POST['id'];
        $uname=$_SESSION['uname'];
         $ndate=$_POST['ndate'];

        $sql="update  otherTypes set projectId=?, description=?, amount=?, cdate=?,updatedBy=?,ndate=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$pid,$desc,$price,$cdate,$uname,$ndate,$id]);
        $tot=$res->rowCount();
        if($tot >0){
            $sql1="update  expenses set projectId=?,amount=?,updatedBy=? where tid=?";
            $res1=$con->prepare($sql1);
            $res1->execute([$pid,$price,$uname,$ndate]);
            $tot1=$res1->rowCount();
            if($tot1 >0){
                echo "Updated";
            }else{
                echo "No Changes detected";
            }
        }else{
            echo "No Changes detected";
        }
    }catch(PDOException $e){
        echo "Error".$e->getMessage();
    }
?>
