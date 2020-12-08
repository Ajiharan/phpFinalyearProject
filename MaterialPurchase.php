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
    <link href="./css/supplier.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    <title>Document</title>
</head>
<body>
    <?php 
     include('./header/UserHeader.php')
    ?>

    <div class="container-fluid userSupplier">
            <div class="row">
                
			<?php  if(isset($_SESSION['uid'])){?>
                    <div class="col-md-4 col-sm-12 col-xs-12"></div>
                    <div class="col-md-4 col-sm-12 col-xs-12 ">
                <?php }else { ?>
                    <div class="col-md-4 col-sm-12 col-xs-12 ">
                <?php } ?>
                    <div class="userSupplier__FormContainer">
                    <h6 class="text-center text-danger" id="log_error"></h6>
                    <h6 class="text-center text-success" id="log_success"></h6>
                         <h5 class="text-primary text-center"> Material Purchase  Details</h5>
                         <form id="frm">

                            <div class="form-group">
                                <label class="text-light">Project name</label>
                                <select  type="text" name="pid" id="pid" class="form-control">
                                <?php

                                    include('./server/DBConnection.php');
                                    $result="<option value=''>select</option>";
                                    echo $result;
                                    try{
                                        $sql="select a.id as ap,t.* from awardedprojects a,tenders t where  a.tenderId=t.id";
                                        $res=$con->prepare($sql);
                                        $res->execute();
                                        $tot=$res->rowCount();
                                        if($tot > 0){
                                            $client=$res->fetchAll();
                                           foreach( $client as $row){ ?>
                                                <option value="<?php echo $row->ap; ?>"><?php echo $row->project?></option>
                                        
                                                
                                         <?php  }
                                         
                                        }else{
                                           
                                        }

                                       
                                    

                                    }catch(PDOException $e){
                                        echo "Error".$e->getMessage();
                                    }

                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Material name</label>
                                <select  type="text" name="mid" id="mid" class="form-control">
                                <?php

                                    include('./server/DBConnection.php');
                                    $result="<option value=''>select</option>";
                                    echo $result;
                                    try{
                                        $sql="select * from materials";
                                        $res=$con->prepare($sql);
                                        $res->execute();
                                        $tot=$res->rowCount();
                                        if($tot > 0){
                                            $client=$res->fetchAll();
                                           foreach( $client as $row){ ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->name?></option>
                                        
                                                
                                         <?php  }
                                         
                                        }else{
                                           
                                        }
                                  

                                    }catch(PDOException $e){
                                        echo "Error".$e->getMessage();
                                    }

                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Unit Price</label>
                                <input type="number" name="price" id="price" class="form-control" placeholder="Enter  Unit price"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Quantity</label>
                                <input type="number" name="qty" id="qty" class="form-control" placeholder="Enter  Quantity"/>
                            </div>
                            <div class="form-group">
                                <label class="text-light ldate">Date</label>
                                <input type="date" name="cdate" id="cdate" class="form-control" placeholder="Enter  Date"/>
                            </div>
                                             
                            <input type="hidden" id="id" name="id" value="0"/>
                            <input type="hidden" id="ndate" name="ndate" />
                            <div class="mybutton">
                                <input type="submit" class="btn btn-dark btn-block m-4 addBtn" value="Add Material Purchase"/>
                                <input type="button" onclick='clearField()' class="btn btn-danger btn-block m-4 hideBtn" value="Cancel"/>
                            </div>
                        </form>
                    </div>
                </div>
                <script>

                    function clearField(){
                       $('#frm')[0].reset();
                       $('#id').val("0");
                       $('#cdate').show();
                         $('.ldate').show();
                        $(".addBtn").addClass("btn-dark");
                        $(".addBtn").val("Add Material Purchase");
                        $(".addBtn").removeClass("btn-success");
                        $('.hideBtn').hide();
                    }
                     function getmaterialData(){
                            $(document).ready(function(){                             
                               $.ajax({
                                   url:"./server/ViewMaterialPurchase.php",
                                   type:"GET",
                                   dataType: "html",               
                                   success:function(d){
                                       $(".user-table").html(d);                             
                                   }
                               });                             
                       });
                      }
                </script>
                <?php  if(isset($_SESSION['aid'])){?>
                    <div class="col-md-8 col-sm-12 ">
                        <div class="user-table table-responsive">
                            <h4 class="text-dark text-center">Material Purchase  Details</h4>
                            <script>
                                getmaterialData();
                            </script>
                        </div>
                    </div>        
			   <?php } ?>   
			    <?php  if(isset($_SESSION['uid'])){?>
                    <div class="col-md-4 col-sm-12 col-xs-12"></div>         
                <?php } ?>
            </div>
        </div>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
   
     function deleteMaterialDetails(id){
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
                            url:"./server/DeleteMaterialPurchase.php",
                            type:"POST",
                            data:{id:id,tid:$('#ndate').val()},            
                            success:function(d){
                                getmaterialData();
                                swal("Poof! Your file  has been deleted!", {icon: "success",});                       
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
        $('#ndate').val(Date.now());
     
      $.validator.setDefaults({
	      	submitHandler: function() {
                  $id=$('#id').val();        
                  if($id=="0"){
                    $('#ndate').val(Date.now());
                    $.ajax({
                        url:"./server/AddMaterialPurchase.php",
                        type:"post",
                        data:$("#frm").serialize(),
                        success:function(d){
                        document.querySelector("#frm").reset();
                        if(d==200){
                            getmaterialData();
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
                            url:"./server/UpdateMaterialPurchase.php",
                            type:"POST",
                            data:$("#frm").serialize(),            
                            success:function(d){
                                getmaterialData();
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
          pid:{
            required:true,        
          },
          mid:{
            required:true,    
          },
          price:{
              required:true,
              digits:true
          },
          qty:{
              required:true,
              digits:true
          },
          cdate:{
            required:true
          }
         
        },
        messages:{
         pid:{
            required:"Field is required.",
          },
          mid:{
              required:"Field is required"
          },
          price:{
              required:"price is required",
              digits:"invalid type"
          },
          qty:{
              required:"quantity is required",
              digits:"invalid type"
          },
          cdate:{
            required:"date is required"
          }

        }
      });
    });
  </script>
  <script>
      function editMaterialDetails(id){
        $("#id").val(id);
        var row=$('.'+id);
        var pid=row.closest("tr").find("td:eq(0)").text();
        var mid=row.closest("tr").find("td:eq(1)").text();
        var price=row.closest("tr").find("td:eq(2)").text();
        var qty=row.closest("tr").find("td:eq(3)").text();
        var tid=row.closest("tr").find("td:eq(9)").text();
        $.ajax({
                url:"./server/getMaterialPurchasePid.php",
                type:"POST",
                data:{pname:pid},                    
                 success:function(d){
                     console.log(d);
                    $("#pid").val(parseInt(d));

                    $.ajax({
                    url:"./server/getMaterial.php",
                    type:"POST",
                    data:{mname:mid},                    
                    success:function(d1){               
                    
                    
                    
                
                        $('#cdate').hide();
                        $('.ldate').hide();
                        $('.hideBtn').show();
                        $("#ndate").val(tid);
                        $("#mid").val(parseInt(d1));
                        $("#price").val(price);
                        $("#qty").val(qty);
                        
                        $('.addBtn').val('Update')
                        $(".addBtn").removeClass("btn-dark");
                        $(".addBtn").addClass("btn-success");  
                    }
                });
                   
                  
               
                   
                }
            });
          

      }
  </script>
</body>
</html>