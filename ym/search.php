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
     <!-- Search results starts here -->
     <div class="container my-3" id="maincontainer">
       <center> <h1 class="py-3" style="margin-top:80px;">Searhing results for <em>"<?php echo $_GET['search']?>"</em></h1></center>

        <?php
        $noresult=true;
        $query=$_GET["search"];
        $sql="SELECT * FROM `health_tips` WHERE MATCH(`tip_title`,`tip_desc`) AGAINST('$query')";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
        $noresult=false;
        $title=$row['tip_title'];
        $desc=$row['tip_desc'];
        $thread_id=$row['tip_id'];
        $url="thread.php?threadid=".$thread_id;
        echo '<div class="card" style="padding:10px; margin-bottom:10px;">
        <div class="result">
        <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
        <p>'.$desc.'</p>
        </div>
        </div>';
     }
     if($noresult){
         echo'<div class="container my-4 pt-3" style="width:90%">
         <div class=" jumbotron">
             <h1 class="display-4">No result found</h1>
             <p class="lead">Suggestions:
            <ul>
             <li>Make sure that all words are spelled correctly.</li>
             <li>Try different keywords.</li>
             <li>Try more general keywords.</li>
             <li>Try fewer keywords.</li>
             </p>
         </div>
     </div>';
     }
        ?>

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