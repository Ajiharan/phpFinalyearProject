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
        <link href="./css/userHome.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
        <title>Document</title>
    </head>
   
    <body>
        <?php 
            include('./header/UserHeader.php')
        ?>
    
               
                <div class="container mt-4 p-4">
                    <div class="row">
                    
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Suppliers</div>
                                    <div class="card-body text-center">
                                        <a href="./Suppliers.php"><button class="btn btn-danger">Add Suppliers</button></a>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Materials</div>
                                    <div class="card-body text-center">
                                    <a href="./Material.php"><button class="btn btn-danger">Add Materials</button></a>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Clients</div>
                                    <div class="card-body text-center">
                                    <a href="./Client.php"> <button class="btn btn-danger">Add Clients</button></a>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Tenders</div>
                                    <div class="card-body text-center">
                                    <a href="./Tenders.php"><button class="btn btn-danger">Add Tenders</button></a>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Awarded Projects</div>
                                    <div class="card-body text-center">
                                    <a href="./AwardedProject.php"><button class="btn btn-danger">Add projects</button></a>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Bills</div>
                                    <div class="card-body text-center">
                                    <a href="./Bills.php"><button class="btn btn-danger">Add Labours</button></a>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Labours</div>
                                    <div class="card-body text-center">
                                    <a href="./Labours.php"><button class="btn btn-danger">Add Labours</button></a>
                                    </div>
                                </div>
                            
                        </div>
                       
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Material Purchase</div>
                                    <div class="card-body text-center">
                                    <a href="./MaterialPurchase.php"><button class="btn btn-danger">Add Material Purchase</button></a>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Labour payment</div>
                                    <div class="card-body text-center">
                                    <a href="./LabourPayment.php"><button class="btn btn-danger">Add Labour payment</button></a>
                                    </div>
                                </div>
                            
                        </div>
                       
                       <div class="cardContainer">
                            
                                    <div class="card text-white bg-dark mb-3" style="min-width: 25rem;">
                                        <div class="card-header text-center">Machinery Rents</div>
                                            <div class="card-body text-center">
                                            <a href="./MachineryRent.php"><button class="btn btn-danger">Add Machinery Rents</button></a>
                                            </div>
                                        </div>
                                    
                              
                       
                                <div class="card text-white bg-dark mb-3" style="min-width: 25rem;">
                                    <div class="card-header text-center text-center">Other Expenses</div>
                                        <div class="card-body text-center">
                                        <a href="./Other.php"><button class="btn btn-danger">Add other Expenses</button></a>
                                        </div>
                                    </div>                      

                       </div>
                        
                    </div>
                </div>
            
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/jquery.validate.js"></script>
      
      
    </body>
    </html>