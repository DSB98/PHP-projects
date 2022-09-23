<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $user=$_POST['username'];
    $pass=$_POST['password'];
   
    $sql="select * from `teacher` where email='$user'";
    $result=mysqli_query($conn,$sql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0){
        $row=mysqli_fetch_assoc($result);
        if($pass==$row['password']){
            session_start();
            $_SESSION['user_id']=$row['id'];
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$row['username'];
            $_SESSION['role']=$row['role'];
           
           
            header("location:../admin/index.php?loggedin=true");
            exit();
           }
           else{
           header("location:../login.php?loggedin=false&&wrongCredentials");
           exit();
           }

        }
        else{
            header("location:../login.php?loggedin=false&&wrongUserName");
        }
        
    }
    else{
        header("location:../login.php?login");
    }

?>