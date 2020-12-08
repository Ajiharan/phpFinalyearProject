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
        $uname=$_SESSION['uname'];
        $ndate=$_POST['ndate'];
    
       
         $expenseType="Other Expenses";

            $sql="insert into othertypes(projectId,description,amount,cdate,createdBy,ndate) values(?,?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$desc,$price,$cdate,$uname,$ndate]);   
            
           
            $sql="insert into expenses(projectId,expenseType,amount,cdate,createdBy,tid) values(?,?,?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$expenseType,$price,$cdate,$uname,$ndate]);   
            
            echo 200;     
        
            
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
