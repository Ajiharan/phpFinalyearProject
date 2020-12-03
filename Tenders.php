<?php 
session_start();
if(!isset($_SESSION['aid'])){
    
    header("Location:./UserLogin.php"); 
    exit();
} 
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/supplier.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    <title>Document</title>
</head>
<body>
    <?php 
     include('./header/UserHeader.php')
    ?>

    <div class="container-fluid userSupplier">
            <div class="row">
                <div class="col-md-4 col-sm-12 ">
                    <div class="userSupplier__FormContainer">
                    <h6 class="text-center text-danger" id="log_error"></h6>
                    <h6 class="text-center text-success" id="log_success"></h6>
                         <h5 class="text-primary text-center">Add Tenders Details</h5>
                         <form id="frm">
                            <div class="form-group">
                                <label class="text-light">Client Name</label>
                                <select  type="text" name="uname" id="uname" class="form-control">
                                <?php

                                    include('./server/DBConnection.php');
                                    $result="<option value=''>select</option>";
                                   
                                    try{
                                        $sql="select * from clients";
                                        $res=$con->prepare($sql);
                                        $res->execute();
                                        $tot=$res->rowCount();
                                        if($tot > 0){
                                            $client=$res->fetchAll();
                                           foreach( $client as $row){ ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->name?></option>
                                        
                                                
                                         <?php  }
                                         
                                        }else{
                                           echo $result;
                                        }

                                       
                                    

                                    }catch(PDOException $e){
                                        echo "Error".$e->getMessage();
                                    }

                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Project</label>
                                <input type="text" name="project" id="project" class="form-control" placeholder="Enter Project name"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Project Value</label>
                                <input type="text" name="pval" id="pval" class="form-control" placeholder="Enter Project value"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">duration</label>
                                <input type="text" name="dur" id="dur" class="form-control" placeholder="Enter duration"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">security fee</label>
                                <input type="text" name="fee" id="fee" class="form-control" placeholder="Enter Security fees"/>
                            </div>
                           
                            <input type="hidden" id="id" name="id" value="0"/>
                            <div class="mybutton">
                                <input type="submit" class="btn btn-dark btn-block m-4 addBtn" value="Add Client"/>
                                <input type="button" onclick='clearField()' class="btn btn-danger btn-block m-4 hideBtn" value="Cancel"/>

                            </div>
                        </form>
                    </div>
                </div>
                <script>

                    function clearField(){
                       $('#frm')[0].reset();
                       $('#id').val("0")
                        $(".addBtn").addClass("btn-dark");
                        $(".addBtn").val("Add Client");
                        $(".addBtn").removeClass("btn-success");
                        $('.hideBtn').hide();
                    }
                     function getTendersData(){
                            $(document).ready(function(){
                               
                               $.ajax({
                                   url:"./server/ViewTenderTable.php",
                                   type:"GET",
                                   dataType: "html",               
                                   success:function(d){
                                       $(".user-table").html(d);                             
                                   }
                               });
                             
                       });
                      }
                </script>
                <div class="col-md-8 col-sm-12 ">
                    <div class="user-table table-responsive">
                        <h4 class="text-dark text-center">Tender  Details</h4>
                        <script>
                            getTendersData();
                        </script>
                    </div>
                </div>
            </div>
        </div>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
   
     function deleteTenderDetails(id){
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this user data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url:"./server/DeleteTender.php",
                            type:"POST",
                            data:{id:id},            
                            success:function(d){
                                getTendersData();
                                swal("Poof! Your data has been deleted!", {icon: "success",});                       
                            }
                        });
                      
                    } else {
                        swal("Your  data is safe!");
                    }
                });              
        }

</script>

<script>
    $(document).ready(function(){
        $('.hideBtn').hide();
     
      $.validator.setDefaults({
	      	submitHandler: function() {
                  $id=$('#id').val();
                  if($id=="0"){
                        $.ajax({
                            url:"./server/AddTender.php",
                            type:"post",
                            data:$("#frm").serialize(),
                            success:function(d){
                                document.querySelector("#frm").reset();
                                if(d==200){
                                    getTendersData();
                                    $("#log_error").text("");
                                    $("#log_success").text("Sucessfullly Added");   
                                    
                                }else{
                                    $("#log_error").text(d);
                                    $("#log_success").text("");   
                                    
                                }
                            
                            }
                        });
                    }else{
                        $.ajax({
                            url:"./server/UpdateTender.php",
                            type:"POST",
                            data:$("#frm").serialize(),            
                            success:function(d){
                               getTendersData();
                                clearField();
                                swal({
                                    title: d,
                                    text: "updated",
                                    icon: "success",
                                    button: "ok",
                                });
                                                
                            }
                        });


                    }
                    getTendersData();
            
            }
      });
      $("#frm").validate({
        rules:{ 
          uname:{
            required:true,        
          },
          project:{
              required:true
          },
          pval:{
            required:true,
            number:true
          },
          dur:{
              required:true       
          },
          fee:{
              required:true,
              number:true
          }
         
        },
        messages:{
          uname:{
            required:"Field is required.",
          },
          pval:{
            required:"Project value is required.",
            number:"Invalid type"
          },
          dur:{
              required:"duration is required"
          },
          fee:{
              required:"Fees is required.",
              number:"Invalid"
          }
        }
      });
    });
  </script>
  <script>
      function editTenderDetails(id){
            var row=$('.'+id);
            $("#id").val(id);
            var cid=row.closest("tr").find("td:eq(0)").text();
            var project=row.closest("tr").find("td:eq(1)").text();
            var projectValue=row.closest("tr").find("td:eq(2)").text();
            var duration=row.closest("tr").find("td:eq(3)").text();
            var securityFee=row.closest("tr").find("td:eq(4)").text();
          
            $('.hideBtn').show();
           $("#uname").val(cid);
           $("#project").val(project);
           $("#pval").val(projectValue);
           $('#dur').val(duration);
           $('#fee').val(securityFee);

           $('.addBtn').val('Update')
           $(".addBtn").removeClass("btn-dark");
           $(".addBtn").addClass("btn-success")

      }
  </script>
</body>
</html>