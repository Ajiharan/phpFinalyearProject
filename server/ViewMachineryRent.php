<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<table class='table table-borderless  table-hover table-dark mt-4'>
    <thead class='thead-dark'>
        <tr>    
            <th scope='col'>projectId</th>
            <th scope='col'>machineryId</th>
            <th scope='col'>hourlyPayment</th>
            <th scope='col'>No of hours</th>
            <th scope='col'>Total payment</th>
            <th scope='col'>Edit</th>
            <th scope='col'>Delete</th>
        </tr>
    </thead> 
    <tbody>";
 try{
   
    $sql="select * from machineryrents";
    $res=$con->prepare($sql);
    $res->execute();
    $tot=$res->rowCount();
    if($tot > 0){
        $labour=$res->fetchAll();
       foreach( $labour as $row){
        $result.= "<tr>
            <td>".$row->projectId."</td>
            <td>".$row->machineryId."</td>
            <td>".$row->hourlyPayment."</td>
            <td>".$row->noOfHrs."</td>
            <td>".$row->payment."</td>";
    
             $result.="<td><button class='btn btn-warning ".$row->id."' ' onclick='editMachineryRent($row->id)'
               >Edit</button></td>";        
          
            $result.="<td><button class='btn btn-danger' onclick='deleteMachineryRentDetails($row->id)' >Delete</button></td>
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