<?php
    session_start();
    include('DBConnection.php');

?>

<?php
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    try{
        $sql="select * from users where emailId=? and password=? and UserType=?";
        $res=$con->prepare($sql);
        $res->execute([$email,$pass,1]);
        $tot=$res->rowCount();
        if($tot > 0){
            $login_user=$res->fetch();
            if($login_user->isActive==1){
                $_SESSION['aid']=$login_user->id;
                $_SESSION['uname']=$login_user->username;
                echo 200;
            }else{
                echo 403;
            }
           
           
        }else{
           echo 400;
        }

    }catch(PDOException $e){
        echo "Error".$e->getMessage();
    }

?>
