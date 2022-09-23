<?php
include 'partials/_menubar.php';
// session_start();
$user=$_SESSION['user_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $oldPass=$_REQUEST['currentPass'];
    $newPass=$_REQUEST['newPass'];
    $cPass=$_REQUEST['confirmPass'];
    $sql="select * from `user` where user_id=$user";
    $result=mysqli_query($conn,$sql);
    $numRows=mysqli_num_rows($result);
    if($numRows==1){
        $row=mysqli_fetch_assoc($result);
        if(password_verify($oldPass,$row['password'])){

            if($newPass==$cPass){
            $hash=password_hash($newPass,PASSWORD_DEFAULT);
            $passSql="UPDATE user SET password='$hash' WHERE user_id=$user;";
            $result=mysqli_query($conn,$passSql);
            if($result){
                // header("location:profile.php?passwordChanged=true");
                echo '<script type="text/javascript">';
        echo 'window.location.href="profile.php?passwordChanged=true";';
        echo '</script>';
            }
            }
        }
        else{
            $wrongPass=true;
        }
}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>YM Helpline- Change Password</title>
    <style>
    .pass_show {
        position: relative
    }

    .pass_show .ptxt {

        position: absolute;

        top: 50%;

        right: 10px;

        z-index: 1;

        color: #f36c01;

        margin-top: -10px;

        cursor: pointer;

        transition: .3s ease all;

    }

    .pass_show .ptxt:hover {
        color: #333333;
    }
    </style>
</head>

<body>
    <div class="container" style="margin-top:60px; margin-bottom:30px;">
        <div class="row">
            <div class="col-sm-4" style="margin:auto;margin-top:30px; border:1px solid lightgray; padding:10px;">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <label>Current Password</label>
                    <div class="form-group pass_show">
                        <input type="password" class="form-control" id="currentPass" name="currentPass"
                            placeholder="Current Password">
                             </div>
                             <div>
                    <small class="form-group" style="color:red;"><?php if(isset($wrongPass)&& $wrongPass==true){echo "Current Password is wrong";}?></small>

                    </div>

                    
                   
                    <label>New Password</label>
                    <div class="form-group pass_show">
                        <input type="password" class="form-control" id="newPass" name="newPass"
                            placeholder="New Password">
                    </div>
                    <label>Confirm Password</label>
                    <div class="form-group pass_show">
                        <input type="password" class="form-control" id="confirmPass" name="confirmPass"
                            placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit" name="submit">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include "partials/_footer.php";
    ?>
    <script>
    $(document).ready(function() {
        $('.pass_show').append('<span class="ptxt">Show</span>');
    });


    $(document).on('click', '.pass_show .ptxt', function() {

        $(this).text($(this).text() == "Show" ? "Hide" : "Show");

        $(this).prev().attr('type', function(index, attr) {
            return attr == 'password' ? 'text' : 'password';
        });

    });
    </script>

</body>

</html>