<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="The youth, inspired by the thoughts of Chhatrapati Shivaji Maharaj, came together and started the organization of Yuva Maharashtra. Through Yuva Maharashtra, youth preserve history, culture and do social services And now we are coming forward to help people who needs plasma, beds, medicines, etc.">
    <meta name="keywords" content="Covid19, Yuva Maharashtra, YM Helpline, Corona, Covaccine, Plasma, Plasma donor, blood donor, Support India, ">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/buybloodstyles.css" class="css">
    <link rel="stylesheet" href="css/styles.css" class="css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>YM Helpline</title></title>
</head>

<body>
    <?php
    include "partials/_dbconnect.php";
    include "partials/_menubar.php";
   
   ?>

    </div>
    <div class="content">

        <form action="/partials/_bloodPurchaseonline.php" method="POST">
            <center>
                <h2 style="margin-bottom:50px;">Request Blood</h2>
            </center>

            <?php
 
 if(isset($_GET['buybloodsuccess'])&&$_GET['buybloodsuccess']=="true")
 {
     echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
     <strong>Success!</strong> You blood purchase order has been successfully placed on EDC Blood Bank.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
 }
 
 if(isset($_GET['buybloodsuccess'])&&$_GET['buybloodsuccess']=="false")
 {
     echo '<div class="alert alert-danger alert-dismissible fade show my-0 " role="alert">
     <strong>Error !</strong> Some error occured! Please try again/ Contact us/ find donor in your area.
     </div>';
 }
?>

            <div class="form-group">
                <label for="bgroup">Select Blood Group:</label>

                <select class="form-control" name="bgroup" id="bgroup" required>
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

            <label for="patname">Enter Patients Name:</label>
            <div>
                <input type="text" name="patname" id="patname">
            </div>

            <label for="patno">Enter contact details of patient:</label>
            <div>
                <input type="number" name="patno" id="patno">
            </div>

            <label for="hospname">Enter hospital name:</label>
            <div>
                <input type="text" name="hospname" id="hospname">
            </div>

            <label for="drname">Enter doctor''s name:</label>
            <div>
                <input type="text" name="drname" id="drname">
            </div>

            <label for="myamt">Enter the amt of blood in litres:</label>
            <div>
                <input type="number" name="myamt" id="myamt">
            </div>

            <label for="address">Enter address:</label>
            <div>
                <input type="text" name="address" id="address">
            </div>

            <label for="pincode">Enter the pincode:</label>
            <div>
                <input type="number" name="pincode" id="pincode">
            </div>

            <label for="altno">Enter the alternate mobile number:</label>
            <div>
                <input type="number" name="altno" id="altno">
            </div>
            <br>
            <div>
                <input type="submit" value="Buy Blood">
                <input type="reset" value="Reset Values">
            </div>
        </form>
    </div>
    <div class="container cat_container my-3 text-center" style="margin-top:50px;">
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
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/500x400/?'.$cat.',health" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h5>
                        <p class="card-text">'.substr($desc,0,60).'...</p>
                        <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View threads</a>
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