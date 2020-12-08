<?php
    session_start();
    include('DBConnection.php');
?>


 <?php
                $mname=$_POST['mname'];
                $mid="";
                $sql1="select * from materials where name=?";
                $res1=$con->prepare($sql1);
                $res1->execute([$mname]);
                $tot1=$res1->rowCount();
                if($tot1 > 0){
                    $client=$res1->fetch();
                   $mid=$client->id;
                }

                echo $mid;

     ?>