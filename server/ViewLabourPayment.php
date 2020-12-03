<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<table class='table table-borderless  table-hover table-dark mt-4'>
    <thead class='thead-dark'>
        <tr>    
            <th scope='col'>Project Id</th>
            <th scope='col'>Labour Id</th>
            <th scope='col'>No of Workers</th>
            <th scope='col'>Payment</th>
            <th scope='col'>Paid On</th>
            <th scope='col'>Edit</th>
            <th scope='col'>Delete</th>
        </tr>
    </thead> 
    <tbody>";
 try{
   
    $sql="select * from labourpayment";
    $res=$con->prepare($sql);
    $res->execute();
    $tot=$res->rowCount();
    if($tot > 0){
        $supplier=$res->fetchAll();
       foreach( $supplier as $row){
        $result.= "<tr>
            <td>".$row->projectId."</td>
            <td>".$row->labourId."</td>
            <td>".$row->noOfWorkers."</td>
            <td>".$row->payment."</td>
            <td>".$row->paidOn."</td>
            ";
    
             $result.="<td><button class='btn btn-warning ".$row->id."' ' onclick='editLabourDetails($row->id)'
               >Edit</button></td>";        
          
            $result.="<td><button class='btn btn-danger' onclick='deleteLabourDetails($row->id)' >Delete</button></td>
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