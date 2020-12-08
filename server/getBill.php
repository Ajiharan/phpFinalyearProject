<?php
    session_start();
    include('DBConnection.php');
?>


 <?php
                $pname=$_POST['pname'];
                $cid="";
                $sql1="select a.id as ap  from awardedprojects a,tenders t where a.tenderId=t.id and t.project=?";
                $res1=$con->prepare($sql1);
                $res1->execute([$pname]);
                $tot1=$res1->rowCount();
                if($tot1 > 0){
                    $client=$res1->fetch();
                   $cid=$client->ap;
                }

                echo $cid;

     ?>