<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $email=$_POST['loginEmail'];
  
   //$email="dpkbrvkr@gmail.com";
    //echo $email;
    $pass=$_POST['loginPass'];
   //$pass="deeps98";
   //echo $pass;
    $sql="select * from `user` where email='$email'";
    $result=mysqli_query($conn,$sql);
    $numRows=mysqli_num_rows($result);
    if($numRows==1){
        $row=mysqli_fetch_assoc($result);
        if(password_verify($pass,$row['password'])){
            session_start();
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['loggedin']=true;
            $_SESSION['useremail']=$email;
            $_SESSION['username']=$row['user_name'];
            // $_SESSION['user_id']=$row['user_id'];
            $_SESSION['user_role']=$row['role'];
            $_SESSION['loggedin']=true;
           // echo "logged in".$email;
           if($_SESSION['user_role']=='admin'){
            header("location:../admin/index.php?loggedin=true");
            exit();
           }
           else{
           header("location:../index.php?loggedin=true");
           exit();
           }

        }
        $ShowPasswordError="Incorrect Password";
        if($_SESSION['user_role']=='admin'){
            header("location:../admin/index.php?loginPassError=false&&error=$ShowPasswordError");
            exit();
           }
           else{ 
        header("location:../index.php?loginPassError=false&&error=$ShowPasswordError");
        exit();
    }
           
        }
        else{       
        $ShowEmailError="Email is not registered";
        if($_SESSION['user_role']=='admin'){
            header("location:../admin/index.php?loginEmailError=false&&error=$ShowEmailError");
            exit();
           }
           else{
        header("location:../index.php?loginEmailError=false&&error=$ShowEmailError");
           }
        }
    }

?>