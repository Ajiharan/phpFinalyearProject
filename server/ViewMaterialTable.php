<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<table class='table table-borderless  table-hover table-dark mt-4'>
    <thead class='thead-dark'>
        <tr>    
            <th scope='col'>Name</th>
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
   
    $sql="select * from materials";
    $res=$con->prepare($sql);
    $res->execute();
    $tot=$res->rowCount();
    if($tot > 0){
        $supplier=$res->fetchAll();
       foreach( $supplier as $row){
        $result.= "<tr>
            <td>".$row->name."</td>
            <td>".$row->createdAt."</td>
            <td>".$row->modifiedAt."</td>
            <td>".$row->createdBy."</td>
            <td>".$row->updatedBy."</td>";
    
             $result.="<td><button class='btn btn-warning ".$row->id."' ' onclick='editmaterialDetails($row->id)'
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