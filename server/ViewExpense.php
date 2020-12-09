<?php
    session_start();
    include('DBConnection.php');

?>

<?php 
   
    $result="<table class='table   table-hover table-dark mt-4'>
    <thead class='thead-dark'>
        <tr>    
            <th scope='col'>project Name</th>
            <th scope='col'>expenseType</th>
            <th scope='col'>Amount</th>
            <th scope='col'>Date</th>         
			<th scope='col'>CreatedDate</th>
            <th scope='col'>ModifiedDate</th>
            <th scope='col'>CreatedBy</th>
            <th scope='col'>ModifiedBy</th>
            
        </tr>
    </thead> 
    <tbody>";
 try{
   
    $sql="select * from expenses";
    $res=$con->prepare($sql);
    $res->execute();
    $tot=$res->rowCount();
    if($tot > 0){
        $supplier=$res->fetchAll();
       foreach( $supplier as $row){

      $projectname="";

        $sql1="select a.id as ap,t.* from awardedprojects a,tenders t where  a.id=?";
        $res1=$con->prepare($sql1);
        $res1->execute([$row->projectId]);
        $tot1=$res1->rowCount();
        if($tot1 > 0){
            $award=$res1->fetchAll();
            foreach( $award as $row1){
                $projectname= $row1->project;
            }
        }
        

        $res=$con->prepare($sql);
        $res->execute();

        $result.= "<tr>
            <td>".$projectname."</td>
            <td>".$row->expenseType."</td>
            <td>".$row->amount."</td>
            <td>".$row->cdate."</td>
            <td>".$row->createdAt."</td>
            <td>".$row->modifiedAt."</td>
            <td>".$row->createdBy."</td>
            <td>".$row->updatedBy."</td>"  ;
    
            
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