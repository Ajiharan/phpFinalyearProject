<?php
    session_start();
    include('DBConnection.php');
?>


 <?php
                $tname=$_POST['tname'];
                $cid="";
                $sql1="select * from tenders where project=?";
                $res1=$con->prepare($sql1);
                $res1->execute([$tname]);
                $tot1=$res1->rowCount();
                if($tot1 > 0){
                    $client=$res1->fetch();
                   $cid=$client->id;
                }

                echo $cid;

     ?>