<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="The youth, inspired by the thoughts of Chhatrapati Shivaji Maharaj, came together and started the organization of Yuva Maharashtra. Through Yuva Maharashtra, youth preserve history, culture and do social services And now we are coming forward to help people who needs plasma, beds, medicines, etc.">
    <meta name="keywords" content="Covid19, Yuva Maharashtra, YM Helpline, Corona, Covaccine, Plasma, Plasma donor, blood donor, Support India, ">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="en-MR" />

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
    include "partials/_alerts.php";
    include "partials/_addRequirement.php";
    ?>
    <div class="homeBg">
        <br>
         
        <?php
        if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
        }
        else{
       echo' <div class="blinking center">
            <a data-toggle="modal" data-target="#signupModal" style="padding: 10px;">Click Here To Sign Up</a>
        </div>';
        }
        ?>
        <div class="brand">
            <h3>YM Helpline</h3>

        </div>
        <center>
            <?php
        if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
            echo'<div class="blinking center2">
            <a data-toggle="modal" data-target="#requirementModal" style="padding: 10px;">Click Here To Submit Your Requiremnt</a>
        </div>';
        }
        else{
            echo'<div class="blinking center2">
            <a data-toggle="modal" data-target="#loginModal" style="padding: 10px;">Login to submit your requirements</a>
        </div>';
        }
        ?>
            <div class="search-form card" style="max-width:400px;background-color:rgb(235, 244, 247);">
                <form action="donaorList.php" method="post">
                    <!-- <img src="https://media1.giphy.com/media/igWE2v3i6Q1xgKWdTB/giphy.gif?cid=ecf05e473802fbf4c284636fdc5afa143a673124ea47da2a&rid=giphy.gif"
                    style="height:75px; width:75px" alt=""> -->
                    <label for="bgroup">Find Donor In Your Area</label>
                    <!-- <img src="https://media0.giphy.com/media/Xfnpzut3hM1Uqb7J6z/giphy.gif" style="height:75px; width:75px"
                    alt=""> -->

                    <div class="form-group">
                        <div> <select name="bgroup" id="bgroup" required
                                style=" height:40px; border-radius:25px; border: 2px solid blue; margin-bottom:10px;">
                        </div>
                        <option value="">Select Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div> <select name="req" id="req" required
                                style=" height:40px; border-radius:25px; border: 2px solid blue; margin-bottom:10px;">
                        </div>
                        <option value="">Select Requirement</option>
                        <option value="Blood">Blood</option>
                        <option value="Plasma">Plasma</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="search-field" name="pincode" id="pincode"
                            placeholder="Enter Pincode or city" required>
                        <br>
                        <?php
        if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
       echo' <button type="submit"class="search-btn-edc">Search</button>';
        }
        // else{
        //     echo'<button class="btn btn-outline-success search-btn-edc ml-2" data-toggle="modal" data-target="#loginModal">Login to enable search</button>';
        //     // echo'<button type="reset" class="search-btn-edc" disabled>Login to enable search</button>';
        // }
        ?>
                    </div>

               </form>
               <?php
                if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){}
            else{
                echo'
                <div class="blinking">
                <a data-toggle="modal" data-target="#loginModal">Login To Enable Search</a>
                </div>';
            }
            ?>
            </div>

    </div>
    </div>


    <!-- category conatainer starts here -->
    <div class="container" style="color:red; padding-right:10px; padding-left:10px; margin-top:10px;">
        <marquee><b>“Bring a life back to power. Make blood donation your responsibility”</b></marquee>
    </div>
    <div class="container cat_container my-3 text-center"
        style="margin-top:50px;padding-top:20px; background-color:rgb(246, 252, 216);">
        <h2>Health Categories</h2>
        <div class="row">
            <!-- fetch all the categories and use loop to iterate through categories -->
            <?php 
            $sql="SELECT * FROM `categories` GROUP BY cat_name ASC";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                // echo $row['category_id'];
                // echo $row['category_name'];
                $id=$row['cat_id'];
                $cat=$row['cat_name'];
                $desc=$row['cat_desc'];
                echo '<div class="col md-4 my-2">
                <div class="card" style="min-width: 18rem;max-width:device-width">
                    <img src="https://source.unsplash.com/500x400/?'.$cat.',health" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h5>
                        <p class="card-text">'.substr($desc,0,60).'...</p>
                        <a href="threadlist.php?catid='.$id.'" class="btn btn-light btn-outline-dark sm">View threads</a>
                    </div>
                </div>
            </div>';
            }
            ?>
            <!-- use for loop -->

        </div>
    </div>

    <?php
    
    include "partials/_footer.php";
    ?>
    <center>


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