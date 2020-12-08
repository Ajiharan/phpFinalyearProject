<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<div class=' text-light'>";
    $currentDate = date('Y-m-d');
 try{
    
    $sql="select * from awardedprojects where projectEndDate >= ?";
    $res=$con->prepare($sql);
    $res->execute([$currentDate]);
    $tot=$res->rowCount();
    if($tot > 0){
        $supplier=$res->fetchAll();
       foreach( $supplier as $row){

        $tname="";
        $sql1="select a.id as ap,t.* from awardedprojects a,tenders t where t.id=a.tenderId and a.tenderId=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$row->tenderId]);
        $tot1=$res1->rowCount();
        if($tot1 > 0){
            $client=$res1->fetch();
            $tname=$client->project;
        }


        $result.= "<div class='card bg-dark mt-4 p-4 mycards'>
                <div class='cardContainers'>
                    <p class='lead bg-danger p-2'>Project name : ".$tname."</p>
                    <p class='lead'>Estimated value : LKR.".$row->estimatedValue."</p>
                </div>             
            </div>";
    
            
       }
      $result.="
      </div>";
       echo  $result;
    }else{
       echo "<h4 class='text-center text-danger'>Records are not available</h4>";
    }

    
}catch(PDOException $e){
    echo "Error".$e->getMessage();
}

?>