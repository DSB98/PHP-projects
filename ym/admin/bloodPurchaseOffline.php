<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Blood Purchase</title>
</head>

<body>
    <?php
    include "partials/_dbconnect.php";
    include "partials/_dashboard.php";
    
    ?>

    <div class="main">
        <div class="row">
            <div div class="card">
            <form action="partials/_bloodPurchase.php"  Style="width: 25rem; margin-bottom:20px; margin-top:20px; margin-right:10px; margin-left:10px" method="POST">
            <h4 style="color:red">Add Blood Purchase Record</h4>
            <?php
            if(isset($_GET['recordupdated'])&& $_GET['recordupdated']=="true"){
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> Blood purchase record added successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      if(isset($_GET['stockError'])&& $_GET['stockError']=="true"){
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error!</strong> Requested quantity is outoff stock.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Name of acceptor</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="signupEmail">Mobile Number</label>
                    <input type="tel" class="form-control" id="pri_num" name="pri_num" aria-describedby="emailHelp"
                        required>

                </div>

                <div class="form-group">
                    <label for="bgroup">Select Your Blood Group:</label>

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
                <div class="form-group">
                    <label for="signupEmail">Units/Quantity</label>
                    <input type="number" class="form-control" id="units" name="units" aria-describedby="emailHelp"
                        required>
                        <small>Kindly note that 1 unit= 525ml</small>

                </div>
                <div class="form-group">
                    <label for="patient">Patient Name</label>
                    <input type="text" class="form-control" id="patient" name="patient" required>
                </div>
                <div class="form-group">
                    <label for="doctor">Doctor Name</label>
                    <input type="text" class="form-control" id="doctor" name="doctor" required>
                </div>
                <div class="form-group">
                    <label for="hospital">Hospital Name</label>
                    <input type="text" class="form-control" id="hospital" name="hospital" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Entry</button>
            </form>
            </div>
            
  <div class="card-body">
  <div id="donutchart" style="width: 700px; height: 500px;"></div>
  </div>


        </div>
    </div>
    




    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Blood Group', 'Stock'],

            <?php  
          
          $sql3="SELECT blood_group,quantity FROM `blood_stock`GROUP BY blood_group";
            $result3=mysqli_query($conn,$sql3);
            while($row=mysqli_fetch_assoc($result3)){
             $blood_group=$row['blood_group'];
             $stock=$row['quantity'];
             echo "
             ['".$row['blood_group']."',".$row['quantity']."],
             ";
            
            }
          
          
          ?>
        ]);

        var options = {
            title: 'Blood Stock',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }
    </script>
</body>

</html>