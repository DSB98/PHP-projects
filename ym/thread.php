<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="The youth, inspired by the thoughts of Chhatrapati Shivaji Maharaj, came together and started the organization of Yuva Maharashtra. Through Yuva Maharashtra, youth preserve history, culture and do social services And now we are coming forward to help people who needs plasma, beds, medicines, etc.">
    <meta name="keywords" content="Covid19, Yuva Maharashtra, YM Helpline, Corona, Covaccine, Plasma, Plasma donor, blood donor, Support India, ">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/styles.css" class="css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>YM Helpline</title>
</head>

<body>
    <?php
    include "partials/_dbconnect.php";
    include "partials/_menubar.php";
    ?>
    <div style="margin-top:80px;">
        <?php 
    if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){ 
    
    $user=$_SESSION['user_id'];
    }
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `health_tips`WHERE tip_id=$id";
    $result=mysqli_query($conn,$sql);
    $getResult=true;
    while($row=mysqli_fetch_assoc($result)){
        $getResult=false;
        $title=$row['tip_title'];
        $desc=$row['tip_desc'];
        // // $name=$row['thread_user_id'];
        // $thread_user_id=$row['thread_user_id'];
        // $sql2="SELECT user_name FROM `users` WHERE sno='$thread_user_id'";
        // $result2=mysqli_query($conn,$sql2);
        // $row2=mysqli_fetch_assoc($result2);
        }
    ?>

        <?php
        $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            // <!-- insert comments into db -->
            $comment=$_POST['comment'];
            $comment=str_replace("<","&lt;",$comment);
            $comment=str_replace(">","&gt;",$comment);
            $sql="INSERT INTO `tip_comments` (`tip_id`, `comment_desc`, `user_id`, `date`) VALUES ('$id', '$comment', '$user', current_timestamp());";

            // $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `coment_by`, `comment_time`) VALUES ('$comment', '$id', '2', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            // echo $sql;
            if($result){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong> Your comment has been successfully submited.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }

        }
        ?>


        <div class="container my-4 pt-3" style="width:100%">
            <div class=" jumbotron" style="margin-top:auto;background-color:white;">
                <h4 class="" style="font-weight: 600; color:orange;"><?php echo $title;?></h4>
                <p class="lead" style="background-color: rgba(255, 198, 198, 0.733); font-weight: 400;padding:10px;">
                    <?php echo $desc;?></p>
                <hr class="my-4">
                <p><small>posted by:</small> <b style="color:orange;">YM Helpline</b></p>
            </div>
        </div>

        <div class="container">
            <h4>Start Discussion</h4>
            <?php
       
        if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
        echo '<form action="'.$_SERVER['REQUEST_URI'] .'" method="post">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Write your Comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Post Comment</button>
        </form>';
        }
        else{
            echo'<p style="color:red"><b>You are not looged in, Login to start discussion</b></p>';

        }
        ?>
        </div>
        <div class="container my-2">
            <h4>Comments</h4>
            <?php 
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `tip_comments` WHERE tip_id=$id ORDER BY DATE DESC";
    $result=mysqli_query($conn,$sql);
    $getResult=true;
    echo '<div class="card" style="margin-bottom:20px;background-color:white; border-radius:5%;">';
    while($row=mysqli_fetch_assoc($result)){
        $getResult=false;
        $id=$row['tip_id'];
        $content=$row['comment_desc'];
        $comment_time=$row['date'];
        $user_id=$row['user_id'];

        $sql2="SELECT user_name FROM `user` WHERE user_id='$user_id'";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
       

        echo '
        <div class="media py-3">
        <img src="images/male.png" width="34px" class="mr-3" alt="profile">
        <div class="media-body">
        <p class="font-weight-bold my-0">'.$row2['user_name'].'<small style="color:blue;"> at '.$comment_time.'</small></p>
            '.$content.'
        
    </div>
    </div>
    <hr style="width: 100%"/>';

        }
        echo'</div>';
    ?>
        </div>

        <!-- category conatainer starts here -->
        <div class="container my-3 text-center">

        </div>
        <?php
    
    include "partials/_footer.php";
    ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
        </script>
</body>

</html>