<?php 
session_start();
if(isset($_SESSION['aid'])){
    
    header("Location:./UserHome.php"); 
    exit();
} 
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/adminLogin.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    <title>Document</title>
</head>
<body>
<?php 
    include('./header/AdminHeader.php')
  ?>   
  <div class="login__container">
    <div class="login__form">
      <h5 class="text-center text-info">User Sign-in Form</h5>
      <h6 class="text-center text-danger" id="log_error"></h6>
      <form id="frm">
        <div class="form-group">
          <label>Email Id</label>
          <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email id"/>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter your password"/>
        </div>
        <input type="submit" class="btn btn-dark btn-block mt-4" value="Signin"/>
        <p class="text-light text-center mt-2"><a class="link-page" href="./adminLogin.php">Login as Admin</a> </p>
        <p> <a class="link-page" href="#">Conditions of Use and Privacy Notice</a></p> 
      </form>
    </div>
  </div>
  <script src="js/jquery.js"></script>
    <script src="js/jquery.validate.js"></script>
  <script>
    $(document).ready(function(){
     
      $.validator.setDefaults({
	      	submitHandler: function() {
            $.ajax({
                url:"./server/userLogin.php",
                type:"post",
                data:$("#frm").serialize(),
                success:function(d){
                  document.querySelector("#frm").reset();
                  if(d==200){
                    $("#log_error").text("");     
                     window.location.replace("./UserHome.php");
                  }else{
                  $("#log_error").text("!!Invalid email_id or password");
                    document.querySelector("#frm").reset();
                  }
                 
                }
              });
            
            }
      });
      $("#frm").validate({
        rules:{ 
          email:{
            required:true,
            email:true
          },
          pass:{
            required:true

          }
         
        },
        messages:{
          email:{
            required:"Please Enter your email address",
            email:"Please Enter valid email address"
          },
          pass:{
            required:"Password is Required"
          }
        }
      });
    });
  </script>
</body>
</html>