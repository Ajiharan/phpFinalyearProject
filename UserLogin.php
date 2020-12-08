<?php 
session_start();
if(isset($_SESSION['aid'])){
    
    header("Location:./AdminHome.php"); 
    exit();
}elseif(isset($_SESSION['uid'])){
  header("Location:./index.php"); 
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
    include('./header/userHeader.php')
  ?>   
  <div class="login__container">
    <div class="login__form">
      <h5 class="text-center text-info"> Signin form</h5>
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
                  if(d==201){
                    $("#log_error").text("");     
                     window.location.replace("./AdminHome.php");
                  }else if(d==200){
                    $("#log_error").text("");     
                     window.location.replace("./index.php");
                  }else if(d==403){
                    $("#log_error").text("Your account is currently deactivated");
                    document.querySelector("#frm").reset();
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