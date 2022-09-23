<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="The youth, inspired by the thoughts of Chhatrapati Shivaji Maharaj, came together and started the organization of Yuva Maharashtra. Through Yuva Maharashtra, youth preserve history, culture and do social services And now we are coming forward to help people who needs plasma, beds, medicines, etc.">
    <meta name="keywords" content="Covid19, Yuva Maharashtra, YM Helpline, Corona, Covaccine, Plasma, Plasma donor, blood donor, Support India, ">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/styles.css" class="css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
    body{
        background-color:white;
    }
    </style>
    <title>YM Helpline</title>
</head>

<body>
    <?php
    include "partials/_dbconnect.php";
    include "partials/_menubar.php";
    ?>
    <?php 
    $id=$_GET['catid'];
    $sql="SELECT * FROM `categories`WHERE cat_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $catname=$row['cat_name'];
        $catdesc=$row['cat_desc'];
        }
    ?>
    <?php
        $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            // <!-- insert record/thread into db -->
            $th_title=$_POST['title'];
            $th_desc=$_POST['desc'];
            $th_title=str_replace("<","&lt;", $th_title);
            $th_title=str_replace(">","&gt;", $th_title);
            $th_desc=str_replace("<","&lt;",$th_desc);
            $th_desc=str_replace(">","&gt;",$th_desc);
            $user_id=$_POST['sno'];
            $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title ', '$th_desc', '$id', '$user_id', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong> Your thread has been successfully submited, pleas wait for community to respond.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }

        }
        ?>
    <div class="container my-3" style="width:device-width; margin-top:100px; ">
        <div class=" jumbotron" style="margin-top:80px;background-color:white;">
            <h4 class="" style="font-weight:600; color:orange;"><?php echo $catname;?></h4>
            <p class="lead" style="background-color: rgba(255, 198, 198, 0.733); font-weight: 400;padding:10px;">
                <?php echo $catdesc;?></p>
            <hr class="my-4">

            <!-- <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a> -->
            <p><small>posted by:</small> <b style="color:orange;">YM Helpline</b></p>
        </div>
    </div>

    <div class="container">
        <!-- <?php
  if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){

    echo'  <h5>Start Discussion</h5>
        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
            <div class="form-group">
                <input type="hidden" name="sno" value="'.$_SESSION['user_id'].'">
                <label for="exampleInputEmail1">problem title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Keep you problem titile as short as possible</small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Elaaborate your problem</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>';
    }
    else{
        echo '<h4>Start Discussion</h4>
        <p style="color:red">You are not looged in, Login to start discussion</p>';
    }
    ?> -->
    </div>
    <div class="container my-2">
        <h4>Brows a Tip</h4>
        <?php 
    $id=$_GET['catid'];
    $sql="SELECT * FROM `health_tips` WHERE cat_id=$id";
    $result=mysqli_query($conn,$sql);
    $getResult=true;
    while($row=mysqli_fetch_assoc($result)){
        $getResult=false;
        $id=$row['tip_id'];
        $title=$row['tip_title'];
        $desc=$row['tip_desc'];
        $thread_time=$row['date'];
        // $thread_user_id=$row['thread_user_id'];
        // $sql2="SELECT user_name FROM `users` WHERE sno='$thread_user_id'";
        // $result2=mysqli_query($conn,$sql2);
        // $row2=mysqli_fetch_assoc($result2);


        echo '<div class="card" style="margin-bottom:20px;background-color:white; border-radius:5%;">
        <div class="media py-3">
        <img src="images/male.png" width="34px" class="mr-3" alt="profile">
        <div class="media-body">
        <p class="font-weight-bold my-0">YM Helpline<small style="color:blue"> on '.$thread_time.'</small></p>

            <h5 class="mt-2"  style="color:white; background-color:lightgray; padding:5px;margine:auto;"><a class="text-dark" href="thread.php?threadid='.$id.'">'.$title.'</a></h5>
            '.$desc.'
        </div>
    </div>
    </div>';

        }
    ?>

        <!-- static question list for test -->
        <!-- <div class="media py-3">
            <img src="img/user.png" width="34px" class="mr-3" alt="profile">
            <div class="media-body">
                <h5 class="mt-0">Media heading</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
                odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div> -->

        <?php  if($getResult){

            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="display-6" style="font-weight:400; color:red;">No result found</p>
            </div>
          </div>';
    
        }
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