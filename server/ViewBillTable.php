<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<table class='table table-borderless  table-hover table-dark mt-4'>
    <thead class='thead-dark'>
        <tr>    
            <th scope='col'>Project name</th>
            <th scope='col'>Bill Number</th>
            <th scope='col'>Received Amount</th>
            <th scope='col'>Received Date</th> 
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
    
    $sql="select * from bills";
    $res=$con->prepare($sql);
    $res->execute();
    $tot=$res->rowCount();
    if($tot > 0){
        $supplier=$res->fetchAll();
       foreach( $supplier as $row){

        $tname="";
        $sql1="select a.id as ap,t.* from awardedprojects a,tenders t where a.tenderId=t.id and a.id=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$row->projectId]);
        $tot1=$res1->rowCount();
        if($tot1 > 0){
            $client=$res1->fetch();
            $tname=$client->project;
        }



        $result.= "<tr>
            <td>".$tname."</td>
            <td>".$row->billNo."</td>
            <td>".$row->receivedAmount."</td>
            <td>".$row->receivedDate."</td>
            <td>".$row->createdAt."</td>
            <td>".$row->modifiedAt."</td>
            <td>".$row->createdBy."</td>
            <td>".$row->updatedBy."</td>
            ";
          
    
             $result.="<td><button class='btn btn-warning ".$row->id."' ' onclick='editBillDetails($row->id)'
               >Edit</button></td>";        
          
            $result.="<td><button class='btn btn-danger' onclick='deleteBillDetails($row->id)' >Delete</button></td>
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