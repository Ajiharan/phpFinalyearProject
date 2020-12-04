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
      
    
       
         $expenseType="Other Expenses";

            $sql="insert into othertypes(projectId,description,amount,cdate) values(?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$desc,$price,$cdate]);   
            
           
            $sql="insert into expenses(projectId,expenseType,amount,cdate) values(?,?,?,?)";
            $res=$con->prepare($sql);
            $res->execute([$pid,$expenseType,$price,$cdate]);   
            
            echo 200;     
        
            
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
