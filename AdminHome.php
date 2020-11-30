<?php 
session_start();
if(!isset($_SESSION['aid'])){
    
    header("Location:./admin_login.php"); 
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
                         <h5 class="text-primary text-center">Add User Details</h5>
                         <form id="frm">
                            <div class="form-group">
                                <label class="text-light">UserName</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your email id"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Email Id</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email id"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Password</label>
                                <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter your password"/>
                            </div>
                            <input type="submit" class="btn btn-dark btn-block mt-4" value="Add user"/>
                           
                        </form>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 ">
                    <div class="user-table table-responsive">
                        <h4 class="text-dark text-center">Employee leave Details</h4>
                        <script>
                            $(document).ready(function(){
                               
                                    $.ajax({
                                        url:"./server/AdminViewUserDetails.php",
                                        type:"GET",
                                        dataType: "html",               
                                        success:function(d){
                                            $(".user-table").html(d);                             
                                        }
                                    });
                                  
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script>
             function getUserData(){
                $.ajax({
                    url:"./server/AdminViewUserDetails.php",
                        type:"GET",
                        dataType: "html",               
                        success:function(d){
                        $(".user-table").html(d);                             
                    }
                }); 
            }
        </script>
        <script>
            $(document).ready(function(){          
            $.validator.setDefaults({
                    submitHandler: function() {
                    $.ajax({
                        url:"./server/AdminAddUser.php",
                        type:"post",
                        data:$("#frm").serialize(),
                        success:function(d){
                        document.querySelector("#frm").reset();
                        if(d==200){
                            $("#log_error").text("");
                            $("#log_success").text("Sucessfullly Added");   
                            getUserData();
                           
                        }else{
                            $("#log_error").text(d);
                            $("#log_success").text("");          
                                document.querySelector("#frm").reset();
                        }
                        
                        }
                    });
                    
                    }
            });
            $("#frm").validate({
                rules:{ 
                    username:{
                        required:true
                    },
                    email:{
                        required:true,
                        email:true
                    },
                    pass:{
                        required:true
                    }
                
                },
                messages:{
                    username:{
                        required:"UserName is required."
                    },
                    email:{
                        required:"Email id is required",
                        email:"Please Enter valid email address"
                    },
                    pass:{
                        required:"Password is Required"
                    }
                }
            });
            });
          </script>
          <script>
            function updateDetails(id,aid){
                $message="";
                if(aid==1){
                    $message="user account is activated"
                }else{
                    $message="user account is deactivated"
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
            

            function deleteUserDetails(id){
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