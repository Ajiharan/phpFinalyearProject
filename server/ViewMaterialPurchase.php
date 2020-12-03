<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<table class='table table-borderless  table-hover table-dark mt-4'>
    <thead class='thead-dark'>
        <tr>    
            <th scope='col'>Project Id</th>
            <th scope='col'>Material Id</th>
            <th scope='col'>Unit Price</th>
            <th scope='col'>Quantity</th>
            <th scope='col'>Total</th>
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
        $result.= "<tr>
            <td>".$row->projectId."</td>
            <td>".$row->materialId."</td>
            <td>".$row->unitPrice."</td>
            <td>".$row->qty."</td>
            <td>".$row->totalAmount."</td>
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