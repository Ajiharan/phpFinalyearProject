<?php
    session_start();
    include('DBConnection.php');

?>


<?php

    try{     
        $name=$_POST['mname'];
     

        $sql1="select * from materials where name=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$name]);
        $tot1=$res1->rowCount();  
        
        if($tot1 > 0){
            echo "sorry material name already exists";
        }else{
            $sql="insert into materials(name) values(?)";
            $res=$con->prepare($sql);
            $res->execute([$name]);        
            echo 200;     
        }
            
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
