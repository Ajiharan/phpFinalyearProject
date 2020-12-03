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
            <th scope='col'>Edit</th>
            <th scope='col'>Delete</th>
        </tr>
    </thead> 
    <tbody>";
 try{
     $active=1;
     $deactive=0;
    $sql="select * from awardedprojects";
    $res=$con->prepare($sql);
    $res->execute();
    $tot=$res->rowCount();
    if($tot > 0){
        $supplier=$res->fetchAll();
       foreach( $supplier as $row){
        $result.= "<tr>
            <td>".$row->tenderId."</td>
            <td>".$row->estimatedValue."</td>
            <td>".$row->projectStartDate."</td>
            <td>".$row->projectEndDate."</td>
            <td>".$row->retentionAmount."</td>
            <td>".$row->retentionDueDate."</td>";
    
             $result.="<td><button class='btn btn-warning ".$row->id."' ' onclick='editProjectDetails($row->id)'
               >Edit</button></td>";        
          
            $result.="<td><button class='btn btn-danger' onclick='deleteProjectDetails($row->id)' >Delete</button></td>
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