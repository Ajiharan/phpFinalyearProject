<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<table class='table table-borderless  table-hover table-dark mt-4'>
    <thead class='thead-dark'>
        <tr>    
            <th scope='col'>userName</th>
            <th scope='col'>Email</th>
            <th scope='col'>Password</th>
            <th scope='col'>isActive</th>
            <th scope='col'>Delete</th>
        </tr>
    </thead> 
    <tbody>";
 try{
     $active=1;
     $deactive=0;
    $sql="select * from Users where userType=?";
    $res=$con->prepare($sql);
    $res->execute([1]);
    $tot=$res->rowCount();
    if($tot > 0){
        $login_users=$res->fetchAll();
       foreach( $login_users as $row){
        $result.= "<tr>
            <td>".$row->username."</td>
            <td>".$row->emailId."</td>
            <td>".$row->password."</td>";
    
            if($row->isActive==1){
                $result.="<td><button class='btn btn-danger' 
                onclick='updateDetails($row->id,$deactive)'>DeActive</button></td>";
               
           
            }else if($row->isActive==0){
                $result.="
                <td><button class='btn btn-success' onclick='updateDetails($row->id,$active)'>Active</button></td>";
            }
            $result.="<td><button class='btn btn-danger' onclick='deleteUserDetails($row->id)'>Delete</button></td>
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