<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<table class='table table-borderless  table-hover table-dark mt-4'>
    <thead class='thead-dark'>
        <tr>    
            <th scope='col'>Project name</th>
            <th scope='col'>Material name</th>
            <th scope='col'>Unit price</th>
            <th scope='col'>Quantity</th>
            <th scope='col'>Total</th>
            <th scope='col'>CreatedDate</th>
            <th scope='col'>ModifiedDate</th>
            <th scope='col'>CreatedBy</th>
            <th scope='col'>ModifiedBy</th>
            <th scope='col'>tid</th>
            <th scope='col'>Edit</th>
            <th scope='col'>Delete</th>
        </tr>
    </thead> 
    <tbody>";
 try{
   
    $sql="select * from materialpurchase ";
    $res=$con->prepare($sql);
    $res->execute();
    $tot=$res->rowCount();
    if($tot > 0){
        $supplier=$res->fetchAll();
       foreach( $supplier as $row){
        $pname="";
        $mname="";
        $sql1="select a.id as ap,t.* from awardedprojects a,tenders t where a.tenderId=t.id and a.id=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$row->projectId]);
        $tot1=$res1->rowCount();
        if($tot1 > 0){
            $client=$res1->fetch();
            $pname=$client->project;
        }
        

        $sql2="select * from materials where id=?";
        $res2=$con->prepare($sql2);
        $res2->execute([$row->materialId]);
        $tot2=$res2->rowCount();
        if($tot2 > 0){
            $client=$res2->fetch();
            $mname=$client->name;;
        }


        $result.= "<tr>
            <td>".$pname."</td>
            <td>".$mname."</td>
            <td>".$row->unitPrice."</td>
            <td>".$row->qty."</td>
            <td>".$row->totalAmount."</td>
            <td>".$row->createdAt."</td>
            <td>".$row->modifiedAt."</td>
            <td>".$row->createdBy."</td>
            <td>".$row->updatedBy."</td>
            <td>".$row->ndate."</td>
            ";
    
             $result.="<td><button class='btn btn-warning ".$row->id."' ' onclick='editMaterialDetails($row->id)'
               >Edit</button></td>";        
          
            $result.="<td><button class='btn btn-danger' onclick='deleteMaterialDetails($row->id)' >Delete</button></td>
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