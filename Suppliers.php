<?php 
session_start();
if(!isset($_SESSION['aid'])){
    
    header("Location:./userLogin.php"); 
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
                         <h5 class="text-primary text-center">Add Supplier Details</h5>
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
                                <label class="text-light">Vehicle no</label>
                                <input type="text" name="vno" id="vno" class="form-control" placeholder="Enter Vehicle no"/>
                            </div>
                            <input type="submit" class="btn btn-dark btn-block mt-4" value="Add Supplier"/>
                           
                        </form>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 ">
                    <div class="user-table table-responsive">
                        <h4 class="text-dark text-center">Supplier  Details</h4>
                       
                    </div>
                </div>
            </div>
        </div>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
    $(document).ready(function(){
     
      $.validator.setDefaults({
	      	submitHandler: function() {
            $.ajax({
                url:"./server/AddSupplier.php",
                type:"post",
                data:$("#frm").serialize(),
                success:function(d){
                  document.querySelector("#frm").reset();
                  if(d==200){
                    $("#log_error").text("");
                    $("#log_success").text("Sucessfullly Added");   
                    
                  }else{
                  $("#log_error").text(d);
                  $("#log_success").text("");   
                    
                  }
                 
                }
              });
            
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
          vno:{
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
          vno:{
              required:"Vehicle number is required."
          }
        }
      });
    });
  </script>
</body>
</html>