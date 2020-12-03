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
        <link href="./css/userHome.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
        <title>Document</title>
    </head>
   
    <body>
        <?php 
            include('./header/UserHeader.php')
        ?>
        <div class="container-fluid useCarousel">
                     
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php
                                echo "<img src='images/img3.jpg' class='userHome__slidder'>"; 
                            ?>
                        </div>
                        <div class="carousel-item">
                        <?php
                                echo "<img src='images/img6.jpg' class='userHome__slidder'>"; 
                            ?>
                        </div>
                        <div class="carousel-item">
                        <?php
                                echo "<img src='images/img4.jpg' class='userHome__slidder'>"; 
                            ?>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                <div class="container mt-4 p-4">
                    <div class="row">
                    
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Suppliers</div>
                                    <div class="card-body text-center">
                                        <a href="./Suppliers.php"><button class="btn btn-danger">Add Awarded Projects</button></a>
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
                                <div class="card-header text-center">Machineries</div>
                                    <div class="card-body text-center">
                                    <button class="btn btn-danger">Add Machineries</button>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Store Items</div>
                                    <div class="card-body text-center">
                                        <button class="btn btn-danger">Add Store Items</button>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Material Purchase</div>
                                    <div class="card-body text-center">
                                        <button class="btn btn-danger">Add Material Purchase</button>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Labour payment</div>
                                    <div class="card-body text-center">
                                    <button class="btn btn-danger">Add Labour payment</button>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center">Machinery Rents</div>
                                    <div class="card-body text-center">
                                        <button class="btn btn-danger">Add Machinery Rents</button>
                                    </div>
                                </div>
                            
                        </div>
                       <div class="cardContainer">
                       
                                <div class="card text-white bg-dark mb-3" style="min-width: 20rem;">
                                    <div class="card-header text-center text-center">Other Expenses</div>
                                        <div class="card-body text-center">
                                            <button class="btn btn-danger">Add other Expenses</button>
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