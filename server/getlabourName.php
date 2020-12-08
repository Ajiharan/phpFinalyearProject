<?php
    session_start();
    include('DBConnection.php');
?>


 <?php
                $lname=$_POST['lname'];
                $cid="";
                $sql1="select * from labours where name=?";
                $res1=$con->prepare($sql1);
                $res1->execute([$lname]);
                $tot1=$res1->rowCount();
                if($tot1 > 0){
                    $client=$res1->fetch();
                   $cid=$client->id;
                }

                echo $cid;

     ?>