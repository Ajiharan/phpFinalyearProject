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
                         <h5 class="text-primary text-center">Add Labour Details</h5>
                         <form id="frm">
                            <div class="form-group">
                                <label class="text-light">name</label>
                                <input type="text" name="uname" id="uname" class="form-control" placeholder="Enter  name"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Phone No</label>
                                <input type="text" name="pno" id="pno" class="form-control" placeholder="Enter   phone no"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter  Address"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Work Type</label>
                                <select type="text" name="workType" id="workType" class="form-control">
                                    <option value="">select</option>
                                    <option value="masan work">masan work</option>
                                    <option value="plumber">plumber</option>
                                    <option value="makkadam road work">makkadam road work</option>
                                    <option value="painter">painter</option>
                                </select>
                            </div>
                           
                            <input type="hidden" id="id" name="id" value="0"/>
                            <div class="mybutton">
                                <input type="submit" class="btn btn-dark btn-block m-4 addBtn" value="Add Labour"/>
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
                        $(".addBtn").val("Add Labours");
                        $(".addBtn").removeClass("btn-success");
                        $('.hideBtn').hide();
                    }
                     function getLaboursData(){
                            $(document).ready(function(){
                               
                               $.ajax({
                                   url:"./server/ViewLaboursTable.php",
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
                        <h4 class="text-dark text-center">Supplier  Details</h4>
                        <script>
                            getLaboursData();
                        </script>
                    </div>
                </div>
            </div>
        </div>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
   
     function deleteLabourDetails(id){
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
                            url:"./server/deleteLabour.php",
                            type:"POST",
                            data:{id:id},            
                            success:function(d){
                                getLaboursData();
                                swal("Poof! Your imaginary file has been deleted!", {icon: "success",});                       
                            }
                        });
                      
                    } else {
                        swal("Your user data is safe!");
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
                        url:"./server/AddLabour.php",
                        type:"post",
                        data:$("#frm").serialize(),
                        success:function(d){
                        document.querySelector("#frm").reset();
                        if(d==200){
                            getLaboursData();
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
                            url:"./server/updateLabour.php",
                            type:"POST",
                            data:$("#frm").serialize(),            
                            success:function(d){
                                getLaboursData();
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
          
            
            }
      });
      $("#frm").validate({
        rules:{ 
          uname:{
            required:true,        
          },
          pno:{
            required:true,
            digits:true
          },
          address:{
              required:true       
          },
          workType:{
              required:true
          }
         
        },
        messages:{
          uname:{
            required:"Name is required.",
          },
          pno:{
            required:"Phone number is required.",
            digits:"Invalid phone number"
          },
          address:{
              required:"Address is required."
          },
          workType:{
              required:"Field is required."
          }
        }
      });
    });
  </script>
  <script>
      function editLabourDetails(id){
            var row=$('.'+id);
            $("#id").val(id);
            var name=row.closest("tr").find("td:eq(0)").text();
            var address=row.closest("tr").find("td:eq(1)").text();
            var phone=row.closest("tr").find("td:eq(2)").text();
            var workType=row.closest("tr").find("td:eq(3)").text();
            $('.hideBtn').show();
           $("#uname").val(name);
           $("#pno").val(phone);
           $("#address").val(address);
           $('#workType').val(workType);
           $('.addBtn').val('Update')
           $(".addBtn").removeClass("btn-dark");
           $(".addBtn").addClass("btn-success")

      }
  </script>
</body>
</html>