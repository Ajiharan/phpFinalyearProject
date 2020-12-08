<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<table class='table table-borderless  table-hover table-dark mt-4'>
    <thead class='thead-dark'>
        <tr>    
            <th scope='col'>Project Id</th>
            <th scope='col'>Description</th>
            <th scope='col'>Amount </th>
            <th scope='col'>Date </th>
            <th scope='col'>CreatedDate</th>
            <th scope='col'>ModifiedDate</th>
            <th scope='col'>CreatedBy</th>
            <th scope='col'>ModifiedBy</th>
            <th scope='col'>cid</th>
            <th scope='col'>Edit</th>
            <th scope='col'>Delete</th>
        </tr>
    </thead> 
    <tbody>";
 try{
   
    $sql="select * from otherTypes";
    $res=$con->prepare($sql);
    $res->execute();
    $tot=$res->rowCount();
    if($tot > 0){
        $supplier=$res->fetchAll();
       foreach( $supplier as $row){

        $pname="";
        $sql1="select a.id as ap,t.* from awardedprojects a,tenders t where a.tenderId=t.id and a.id=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$row->projectId]);
        $tot1=$res1->rowCount();
        if($tot1 > 0){
            $client=$res1->fetch();
            $pname=$client->project;
        }
        

        $result.= "<tr>
            <td>".$pname."</td>
            <td>".$row->description."</td>
            <td>".$row->amount."</td>
            <td>".$row->cdate."</td>
            <td>".$row->createdAt."</td>
            <td>".$row->modifiedAt."</td>
            <td>".$row->createdBy."</td>
            <td>".$row->updatedBy."</td>
            <td>".$row->ndate."</td>
            ";
    
             $result.="<td><button class='btn btn-warning ".$row->id."' ' onclick='editotherDetails($row->id)'
               >Edit</button></td>";        
          
            $result.="<td><button class='btn btn-danger' onclick='deleteotherDetails($row->id)' >Delete</button></td>
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