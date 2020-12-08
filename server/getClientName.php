<?php
    session_start();
    include('DBConnection.php');
?>


 <?php
                $cname=$_POST['cname'];
                $cid="";
                $sql1="select * from clients where name=?";
                $res1=$con->prepare($sql1);
                $res1->execute([$cname]);
                $tot1=$res1->rowCount();
                if($tot1 > 0){
                    $client=$res1->fetch();
                   $cid=$client->id;
                }

                echo $cid;

     ?>