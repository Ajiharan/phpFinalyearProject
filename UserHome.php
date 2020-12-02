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
                                <div class="card-header">Suppliers</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Dark card title</h5>
                                        <button class="btn btn-danger">Add Materials</button>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Materials</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Dark card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Clients</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Dark card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Tenders</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Dark card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Awarded Projects</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Dark card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Bills</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Dark card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Labours</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Dark card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Machineries</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Dark card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Store Items</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Dark card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Material Purchase</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Dark card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Labour payment</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Dark card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Machinery Rents</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Dark card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Other Expenses</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Dark card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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