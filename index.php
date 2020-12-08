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
    
               
               
                    <script>
                        function getAwardedprojectData(){
                            $(document).ready(function(){           
                                $.ajax({
                                    url:"./server/projectList.php",
                                    type:"GET",
                                    dataType: "html",               
                                    success:function(d){
                                    $(".home-list").html(d);                             
                                    }
                                });
                                    
                            });
                        }
                    </script>
                   <div class="tableTop">   
                   <h4 class='text-center text-info'>Ongoing projects</h4>
                        <div class="home-list">
                           
                                <script>
                                    getAwardedprojectData();
                                </script>
                        </div>
                   </div>
                        
                
                
        <script src="js/jquery.js"></script>
        <script src="js/jquery.validate.js"></script>
      
      
    </body>
    </html>