<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/styles.css" class="css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Blood Bank</title>
</head>

<body>
    <?php
    include "partials/_dbconnect.php";
    include "partials/_menubar.php";
    ?>
    <div class="brand">
    <h3>Every Drop Counts!!!</h3>
    </div>
    <div class="buyBlood">
        <form action="buyBlood.php">
        <button type="submit"class="search-btn-edc">Buy Blood From EDC Blood Bank</button>
        </form>
    </div>
    <div class="search-form">
        <form action="donaorList.php" method="post">
            <img src="https://media1.giphy.com/media/igWE2v3i6Q1xgKWdTB/giphy.gif?cid=ecf05e473802fbf4c284636fdc5afa143a673124ea47da2a&rid=giphy.gif" style="height:75px; width:75px" alt="">
        <label for="bgroup">Find Donor In Your Area</label>
        <img src="https://media0.giphy.com/media/Xfnpzut3hM1Uqb7J6z/giphy.gif" style="height:75px; width:75px" alt="">

        <div> <select name="bgroup" id="bgroup"required style=" height:40px; border-radius:25px; border: 2px solid blue;"></div>
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
        <input type="text" class="search-field"name="location" id="location" placeholder="Enter Pincode"required>
        <br>
        <button type="submit"class="search-btn-edc">Search</button>
        </form>
    </div>
        


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