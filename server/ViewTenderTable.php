<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<table class='table table-borderless  table-hover table-dark mt-4'>
    <thead class='thead-dark'>
        <tr>    
            <th scope='col'>ClientId</th>
            <th scope='col'>project</th>
            <th scope='col'>project Value</th>
            <th scope='col'>duration</th>
            <th scope='col'>security fee</th>
            <th scope='col'>Edit</th>
            <th scope='col'>Delete</th>
        </tr>
    </thead> 
    <tbody>";
 try{
     $active=1;
     $deactive=0;
    $sql="select * from tenders";
    $res=$con->prepare($sql);
    $res->execute();
    $tot=$res->rowCount();
    if($tot > 0){
        $supplier=$res->fetchAll();
       foreach( $supplier as $row){
        $result.= "<tr>
            <td>".$row->clientId."</td>
            <td>".$row->project."</td>
            <td>".$row->projectValue."</td>
            <td>".$row->duration."</td>
            <td>".$row->security_fee."</td>
            ";
    
             $result.="<td><button class='btn btn-warning ".$row->id."' ' onclick='editTenderDetails($row->id)'
               >Edit</button></td>";        
          
            $result.="<td><button class='btn btn-danger' onclick='deleteTenderDetails($row->id)' >Delete</button></td>
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