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

        $sql="update  otherTypes set projectId=?, description=?, amount=?, cdate=? where id=?";
        $res=$con->prepare($sql);
        $res->execute([$pid,$desc,$price,$cdate,$id]);
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
