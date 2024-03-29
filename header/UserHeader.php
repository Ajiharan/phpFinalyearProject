<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./css/userHeader.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    <title>Document</title>
</head>
<body>
    

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
  <?php
   echo "<img src='images/logo.png' class='header__logo'>"; 
?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../../phpFinalYearProject/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if(isset($_SESSION['uname'])) { ?>
        <li class="nav-item">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menus</a>
          <div class="dropdown-menu drp" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="../../phpFinalYearProject/Suppliers.php"> Suppliers</a>
            <a class="dropdown-item" href="../../phpFinalYearProject/Material.php">Materials</a>
            <a class="dropdown-item" href="../../phpFinalYearProject/Client.php">Clients</a>
            <a class="dropdown-item" href="../../phpFinalYearProject/Tenders.php">Tenders</a>
            <a class="dropdown-item" href="../../phpFinalYearProject/AwardedProject.php">projects</a>
           
            <a class="dropdown-item" href="../../phpFinalYearProject/Labours.php">Labours</a>

         
           
        </div>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="../../phpFinalYearProject/Bills.php">
            Bills
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Expenses</a>
        <div class="dropdown-menu " aria-labelledby="dropdownMenuButton1" id="drp1">
           
            <a class="dropdown-item" href="../../phpFinalYearProject/MaterialPurchase.php">Material Purchase</a>
            <a class="dropdown-item" href="../../phpFinalYearProject/LabourPayment.php">Labour payment</a>
            <a class="dropdown-item" href="../../phpFinalYearProject/MachineryRent.php">Machinery Rents</a>
            <a class="dropdown-item" href="../../phpFinalYearProject/Other.php">Other Expenses</a>
        </div>
        </li>
      <?php } ?>
      <?php if(isset($_SESSION['aid'])) { ?>
        <li class="nav-item">
            <a class="nav-link"  href="../../phpFinalYearProject/ExpenseReport.php">
              Expense report
            </a>
        </li>
      <?php } ?>
    </ul>
    <ul class="navbar-nav">
 
    <?php
     if(isset($_SESSION['uname'])) { ?>
     <a class="nav-link" href="#">
        Hi 
     <?php echo $_SESSION['uname'];
    } ?>
    </a></li>
      <li class="nav-item">
        <?php if(isset($_SESSION['uname'])){ ?><a class="nav-link" href="../phpFinalYearProject/server/logout.php" tabindex="-1">Logout</a>  <?php }else{?> <a class="nav-link" href="./AdminLogin.php" tabindex="-1">SignIn</a><?php }?>
      </li>    
    <ul>
  </div>
</nav>
          

       
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>