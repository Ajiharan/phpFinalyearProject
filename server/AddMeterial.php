<?php
    session_start();
    include('DBConnection.php');

?>


<?php

    $name=$_POST['meterialname'];
    
    try{     
        $sql1="select * from meterial";  //
        $res1=$con->prepare($sql1);
        $res1->execute([$meterialname]);
        $tot=$res1->rowCount();
        if($tot > 0){
            echo 403;
        }else{
            $sql="insert into meterials(meterialname) values(?)";
            $res=$con->prepare($sql);
            $res->execute([$name]);        
            echo 200;    
        }
           
    }catch(PDOException $e){
        
        echo "Error".$e->getMessage();
    }

?>
