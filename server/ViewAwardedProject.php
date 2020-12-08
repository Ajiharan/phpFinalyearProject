<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<table class='table table-borderless  table-hover table-dark mt-4'>
    <thead class='thead-dark'>
        <tr>    
            <th scope='col'>Tender id</th>
            <th scope='col'>Estimated Value</th>
            <th scope='col'>Project Start Date</th>
            <th scope='col'>Project End Date</th>
            <th scope='col'>retention Amount</th>
            <th scope='col'>retention Due Date</th>
            <th scope='col'>CreatedDate</th>
            <th scope='col'>ModifiedDate</th>
            <th scope='col'>CreatedBy</th>
            <th scope='col'>ModifiedBy</th>
            <th scope='col'>Edit</th>
            <th scope='col'>Delete</th>
        </tr>
    </thead> 
    <tbody>";
 try{
    
    $sql="select * from awardedprojects";
    $res=$con->prepare($sql);
    $res->execute();
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


        $result.= "<tr>
            <td>".$tname."</td>
            <td>".$row->estimatedValue."</td>
            <td>".$row->projectStartDate."</td>
            <td>".$row->projectEndDate."</td>
            <td>".$row->retentionAmount."</td>
            <td>".$row->retentionDueDate."</td>
            <td>".$row->createdAt."</td>
            <td>".$row->modifiedAt."</td>
            <td>".$row->createdBy."</td>
            <td>".$row->updatedBy."</td>
            ";
    
             $result.="<td><button class='btn btn-warning ".$row->id."' ' onclick='editProjectDetails($row->id)'
               >Edit</button></td>";        
          
            $result.="<td><button class='btn btn-danger' onclick='deleteProjectDetails($row->id,$row->tenderId)' >Delete</button></td>
            <tr/>";   
       }
      $result.="
       </tbody></table>";
       echo  $result;
    }else{
       echo "<h4 class='text-center text-danger'>Records are not available</h4>";
    }

    
}catch(PDOException $e){
    echo "Error".$e->getMessage();
}

?>