<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<table class='table table-borderless  table-hover table-dark mt-4'>
    <thead class='thead-dark'>
        <tr>    
            <th scope='col'>Name</th>
            <th scope='col'>Address</th>
            <th scope='col'>Phone</th>
            <th scope='col'>Email id</th>
            <th scope='col'>Edit</th>
            <th scope='col'>Delete</th>
        </tr>
    </thead> 
    <tbody>";
 try{
     $active=1;
     $deactive=0;
    $sql="select * from clients";
    $res=$con->prepare($sql);
    $res->execute();
    $tot=$res->rowCount();
    if($tot > 0){
        $supplier=$res->fetchAll();
       foreach( $supplier as $row){
        $result.= "<tr>
            <td>".$row->name."</td>
            <td>".$row->address."</td>
            <td>".$row->phone."</td>
            <td>".$row->email."</td>";
    
             $result.="<td><button class='btn btn-warning ".$row->id."' ' onclick='editSupplierDetails($row->id)'
               >Edit</button></td>";        
          
            $result.="<td><button class='btn btn-danger' onclick='deleteSupplierDetails($row->id)' >Delete</button></td>
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