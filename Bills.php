<?php 
session_start();
if(!isset($_SESSION['aid']) && !isset($_SESSION['uid'])){
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
               
			<?php  if(isset($_SESSION['uid'])){?>
                    <div class="col-md-4 col-sm-12 col-xs-12"></div>
                    <div class="col-md-4 col-sm-12 col-xs-12 ">
                <?php }else { ?>
                    <div class="col-md-4 col-sm-12 col-xs-12 ">
                <?php } ?>
                    <div class="userSupplier__FormContainer">
                    <h6 class="text-center text-danger" id="log_error"></h6>
                    <h6 class="text-center text-success" id="log_success"></h6>
                         <h5 class="text-primary text-center">Bill Details</h5>
                         <form id="frm">
                            <div class="form-group">
                                <label class="text-light">Project Id</label>
                                <select  type="text" name="pid" id="pid" class="form-control">
                                <?php

                                    include('./server/DBConnection.php');
                                    $result="<option value=''>select</option>";
                                    echo $result;
                                    try{
                                        $sql="select a.id as ap,t.* from awardedprojects a,tenders t where  a.tenderId=t.id";
                                        $res=$con->prepare($sql);
                                        $res->execute();
                                        $tot=$res->rowCount();
                                        if($tot > 0){
                                            $client=$res->fetchAll();
                                           foreach( $client as $row){ ?>
                                                <option value="<?php echo $row->ap; ?>"><?php echo $row->project?></option>
                                        
                                                
                                         <?php  }
                                         
                                        }else{
                                           
                                        }

                                       
                                    

                                    }catch(PDOException $e){
                                        echo "Error".$e->getMessage();
                                    }

                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Bill No</label>
                                <input type="number" name="billNo" id="billNo" class="form-control" placeholder="Enter Bill No"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Received Amount</label>
                                <input type="text" name="amountReceived" id="amountReceived" class="form-control" placeholder="Enter Received Amount"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Received Date</label>
                                <input type="date" name="receivedDate" id="receivedDate" class="form-control" placeholder="Enter  Received Date"/>
                            </div>
                            
                           
                            <input type="hidden" id="id" name="id" value="0"/>
                            <div class="mybutton">
                                <input type="submit" class="btn btn-dark btn-block m-4 addBtn" value="Add Bills"/>
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
                        $(".addBtn").val("Add Bills");
                        $(".addBtn").removeClass("btn-success");
                        $('.hideBtn').hide();
                    }
                     function getBillDetails(){
                            $(document).ready(function(){             
                               $.ajax({
                                   url:"./server/ViewBillTable.php",
                                   type:"GET",
                                   dataType: "html",               
                                   success:function(d){
                                       $(".user-table").html(d);                             
                                   }
                               });
                             
                       });
                      }
                </script>
                 <?php  if(isset($_SESSION['aid'])){?>
                <div class="col-md-8 col-sm-12 ">
                    <div class="user-table table-responsive">
                        <h4 class="text-dark text-center">Tender  Details</h4>
                        <script>
                            getBillDetails();
                        </script>
                    </div>
                </div>
                <?php } ?>
                <?php  if(isset($_SESSION['uid'])){?>
                    <div class="col-md-4 col-sm-12 col-xs-12"></div>         
                <?php } ?>
            </div>
        </div>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
   
     function deleteBillDetails(id){
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
                            url:"./server/DeleteBill.php",
                            type:"POST",
                            data:{id:id},            
                            success:function(d){
                                getBillDetails();
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
                            url:"./server/AddBill.php",
                            type:"post",
                            data:$("#frm").serialize(),
                            success:function(d){
                                document.querySelector("#frm").reset();
                                if(d==200){
                                    getBillDetails();
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
                            url:"./server/UpdateBill.php",
                            type:"POST",
                            data:$("#frm").serialize(),            
                            success:function(d){     
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
                    getBillDetails();
            
            }
      });
      $("#frm").validate({
        rules:{ 
          pid:{
            required:true,        
          },
          billNo:{
              required:true
          },
          amountReceived:{
            required:true,
            number:true
          },
          receivedDate:{
              required:true       
          },
         
         
        },
        messages:{
        pid:{
            required:"Field is required.",
          },
          billNo:{
            required:"Bill number is required.",
            number:"Invalid type"
          },
          amountReceived:{
              required:"Amount is required"
          },
          receivedDate:{
              required:"Date is required.",
             
          }
        }
      });
    });
  </script>
  <script>
      function editBillDetails(id){
            var row=$('.'+id);
            $("#id").val(id);
            var pname=row.closest("tr").find("td:eq(0)").text();
            var billNo=row.closest("tr").find("td:eq(1)").text();
            var receivedAmount=row.closest("tr").find("td:eq(2)").text();
            var receivedDate=row.closest("tr").find("td:eq(3)").text();
           
          
            $.ajax({
                url:"./server/getBill.php",
                type:"POST",
                data:{pname:pname},                    
                 success:function(d){  
                     console.log(d)             
                   
                     $('.hideBtn').show();
                    $("#pid").val(parseInt(d));
                    $("#billNo").val(billNo);
                    $("#amountReceived").val(receivedAmount);
                    $('#receivedDate').val(receivedDate);
                    

                    $('.addBtn').val('Update')
                    $(".addBtn").removeClass("btn-dark");
                    $(".addBtn").addClass("btn-success")       
                }
            });
          

          

      }
  </script>
</body>
</html>