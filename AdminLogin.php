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
      <h5 class="text-center text-info">Admin Sign-in Form</h5>
      <form>
        <div class="form-group">
          <label>Email Id</label>
          <input type="text" class="form-control" placeholder="Enter your email id"/>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" placeholder="Enter your password"/>
        </div>
        <input type="submit" class="btn btn-dark btn-block mt-4" value="Signin"/>
        <p class="text-light text-center mt-2"><a class="link-page" href="#">Login as User</a> </p>
        <p> <a class="link-page" href="#">Conditions of Use and Privacy Notice</a></p> 
      </form>
    </div>
  </div>
</body>
</html>