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
    <link href="./css/supplier.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    <title>Document</title>
</head>
<body>
    <?php 
     include('./header/UserHeader.php')
    ?>

    <div class="container-fluid userSupplier">
            <div class="row">
                <div class="col-md-4 col-sm-12 ">
                    <div class="userSupplier__FormContainer">
                    <h6 class="text-center text-danger" id="log_error"></h6>
                    <h6 class="text-center text-success" id="log_success"></h6>
                         <h5 class="text-primary text-center"> Awarded Projects Form</h5>
                         <form id="frm">
                            <div class="form-group">
                                <label class="text-light">tender id</label>
                                <select name="tid" id="tid" class="form-control">
                                <?php
                                        include('./server/DBConnection.php');
                                        $result="<option value=''>select</option>";
                                       
                                        try{
                                            $sql="select * from tenders";
                                            $res=$con->prepare($sql);
                                            $res->execute();
                                            $tot=$res->rowCount();
                                            if($tot > 0){
                                                $client=$res->fetchAll();
                                            foreach( $client as $row){ ?>
                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->project?></option>
                                            
                                                    
                                            <?php  }
                                            
                                            }else{
                                                echo $result;
                                            }

                                        }catch(PDOException $e){
                                            echo "Error".$e->getMessage();
                                        }

                                        ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-light">estimated value</label>
                                <input type="text" name="eval" id="eval" class="form-control" placeholder="Enter Estimated value"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Project start date</label>
                                <input type="date" name="sdate" id="sdate" class="form-control" placeholder="Enter  start date"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">project end date</label>
                                <input type="date" name="edate" id="edate" class="form-control" placeholder="Enter end date"/>
                            </div>
                            
                            <div class="form-group">
                                <label class="text-light">retention Amount</label>
                                <input type="text" name="ramount" id="ramount" class="form-control" placeholder="Enter retention Amount"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">retention Due Date</label>
                                <input type="date" name="rdate" id="rdate" class="form-control" placeholder="Enter retention Due Date"/>
                            </div>
                           
                            <input type="hidden" id="id" name="id" value="0"/>
                                <div class="mybutton">
                                    <input type="submit" class="btn btn-dark btn-block m-4 addBtn" value="Add project"/>
                                    <input type="button" onclick='clearField()' class="btn btn-danger btn-block m-4 hideBtn" value="Cancel"/>
                                </div>
                        </form>
                    </div>
                </div>
                <script>

                    function clearField(){
                       $('#frm')[0].reset();
                       $('#id').val("0")
                        $(".addBtn").addClass("btn-dark");
                        $(".addBtn").val("Add Project");
                        $(".addBtn").removeClass("btn-success");
                        $('.hideBtn').hide();
                    }
                     function getAwardedprojectData(){
                            $(document).ready(function(){           
                               $.ajax({
                                   url:"./server/ViewAwardedProject.php",
                                   type:"GET",
                                   dataType: "html",               
                                   success:function(d){
                                       $(".user-table").html(d);                             
                                   }
                               });
                             
                       });
                      }
                </script>
                <div class="col-md-8 col-sm-12 ">
                    <div class="user-table table-responsive">
                        <h4 class="text-dark text-center">Supplier  Details</h4>
                        <script>
                            getAwardedprojectData();
                        </script>
                    </div>
                </div>
            </div>
        </div>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
   
     function deleteProjectDetails(id,tid){
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
                            url:"./server/deleteAwardedproject.php",
                            type:"POST",
                            data:{id:id,tid:tid},            
                            success:function(d){
                                getAwardedprojectData();
                                swal("Poof! Your imaginary file has been deleted!", {icon: "success",});                       
                            }
                        });
                      
                    } else {
                        swal("Your user data is safe!");
                    }
                });              
        }

</script>

<script>
    $(document).ready(function(){
        $('.hideBtn').hide();
     
      $.validator.setDefaults({
	      	submitHandler: function() {
                  $id=$('#id').val();
                  if($id=="0"){
                    $.ajax({
                        url:"./server/AddAwardedProject.php",
                        type:"post",
                        data:$("#frm").serialize(),
                        success:function(d){
                        document.querySelector("#frm").reset();
                        if(d==200){
                            getAwardedprojectData();
                            $("#log_error").text("");
                            $("#log_success").text("Sucessfullly Added");   
                            
                        }else{
                            $("#log_error").text(d);
                            $("#log_success").text("");   
                            
                        }
                        
                        }
                    });
                    }else{
                        $.ajax({
                            url:"./server/UpdateAwardedProject.php",
                            type:"POST",
                            data:$("#frm").serialize(),            
                            success:function(d){
                                getAwardedprojectData();
                                clearField();
                                swal({
                                    title: d,
                                    text: "updated",
                                    icon: "success",
                                    button: "ok",
                                });
                                                
                            }
                        });


                    }
          
            
            }
      });
      $("#frm").validate({
        rules:{ 
          tid:{
            required:true,        
          },
          eval:{
            required:true,
            number:true
          },
          sdate:{
              required:true       
          },
          edate:{
              required:true
          },ramount:{
              required:true,
              number:true
          },rdate:{
              required:true
          }

         
        },
        messages:{
            tid:{
            required:"Tender name is required.",
          },
          eval:{
            required:"Field is  required.",
            digits:"Invalid phone number"
          },
          sdate:{
              required:"date is  required."
          },
          edate:{
              required:"date is  required."
          },ramount:{
                required:"retention amount is  required."
          },rdate:{
            required:"date is  required." 
          }
        }
      });
    });
  </script>
  <script>
      function editProjectDetails(id){

            var row=$('.'+id);
            $("#id").val(id);
            var tid=row.closest("tr").find("td:eq(0)").text();
            var eval=row.closest("tr").find("td:eq(1)").text();
            var psdate=row.closest("tr").find("td:eq(2)").text();
            var pedate=row.closest("tr").find("td:eq(3)").text();
            var ramount=row.closest("tr").find("td:eq(4)").text();
            var rdueDate=row.closest("tr").find("td:eq(5)").text();
            $('.hideBtn').show();
           $("#tid").val(tid);
           $("#eval").val(eval);
           $("#sdate").val(psdate);
           $('#edate').val(pedate);
           $('#ramount').val(ramount);
           $('#rdate').val(rdueDate);

           $('.addBtn').val('Update')
           $(".addBtn").removeClass("btn-dark");
           $(".addBtn").addClass("btn-success")

      }
  </script>
</body>
</html>