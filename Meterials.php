<?php 
session_start();
if(!isset($_SESSION['aid'])){
    
    header("Location:./AdminLogin.php"); 
    exit();
} 
  
?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./css/adminHome.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
        <title>Document</title>
    </head>
   
    <body>
        <?php 
            include('./header/AdminHeader.php')
        ?>
        <div class="container-fluid adminHome">
            <div class="row">
                <div class="col-md-4 col-sm-12 ">
                    <div class="adminHome__FormContainer">
                    <h6 class="text-center text-danger" id="log_error"></h6>
                    <h6 class="text-center text-success" id="log_success"></h6>
                         <h5 class="text-primary text-center">Add Meterial Name</h5>
                         <form id="frm">
                            <div class="form-group">
                                <label class="text-light">Name</label>
                                <input type="text" name="meterialname" id="meterialname" class="form-control" placeholder="Enter meterial name"/>
                            </div>
                            
                            <input type="submit" class="btn btn-dark btn-block mt-4" value="Add meterial"/>
                           
                        </form>
                    </div>
                </div>
                  <script>
                            function getMeterialsData(){ 
                            $(document).ready(function(){
                               
                                    $.ajax({
                                        url:"./server/ViewMeterialDetails.php",
                                        type:"GET",
                                        dataType: "html",               
                                        success:function(d){
                                            $(".meterials-table").html(d);                             
                                        }
                                    });
                                  
                            });
                            }
                        </script>
                         <div class="col-md-8 col-sm-12 ">
                    <div class="user-table table-responsive">
                         <h4 class="text-dark text-center">Meterial Details</h4> 
                     <script>getMeterialsData()</script>
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
                        url:"./server/AddMeterial.php",
                        type:"post",
                        data:$("#frm").serialize(),
                        success:function(d){
                        document.querySelector("#frm").reset();
                            if(d==200){
                                $("#log_error").text("");
                                $("#log_success").text("Sucessfullly Added");   
                                getUserData();
                            
                            }else if(d==403){
                                $("#log_error").text("Meterial name already exists");
                                $("#log_success").text("");      
                            }
                            else{
                                $("#log_error").text(d);
                                $("#log_success").text("");          
                                
                            }
                        
                        }
                    });
                    
                    }
            });
            $("#frm").validate({
                rules:{ 
                    meterialname:{
                        required:true
                    },
                messages:{
                    meterialname:{
                        required:"meterial Name is required."
                    }
                }
            });
            });
          </script>
          <script>
            function updateDetails(id,aid){
                $message="";
                if(aid==1){
                    $message="Meterial name updated"
                }else{
                    $message="Meterial name deleted"
                }
            $.ajax({
                url:"./server/userUpdate.php",
                type:"POST",
                data:{id:id,aid:aid},            
                success:function(d){
                    getUserData();
                     swal({
                        title: d,
                        text: $message,
                        icon: "success",
                        button: "ok",
                    });
                                    
                }
                });
            }
            

            function deleteMeterialDetails(id){
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Meterial Details!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url:"./server/deleteUser.php",
                            type:"POST",
                            data:{id:id},            
                            success:function(d){
                                getUserData();
                                swal("Poof! Your imaginary file has been deleted!", {icon: "success",});                       
                            }
                        });
                      
                    } else {
                        swal("Your user data is safe!");
                    }
                });              
            }
         </script>
    </body>
    </html>