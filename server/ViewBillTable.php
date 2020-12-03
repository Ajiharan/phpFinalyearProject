<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<table class='table table-borderless  table-hover table-dark mt-4'>
    <thead class='thead-dark'>
        <tr>    
            <th scope='col'>Project id</th>
            <th scope='col'>Bill Number</th>
            <th scope='col'>Received Amount</th>
            <th scope='col'>Received Date</th> 
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
        $result.= "<tr>
            <td>".$row->projectId."</td>
            <td>".$row->billNo."</td>
            <td>".$row->receivedAmount."</td>
            <td>".$row->receivedDate."</td>";
          
    
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