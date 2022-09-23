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

    <title>Dashboard</title>
</head>

<body >
    <?php
    include "partials/_dbconnect.php";
    include "partials/_dashboard.php";
    
    ?>
    
    <?php
$sql="SELECT count(*) as totalusers FROM `user`;";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);


echo'
<div class="main">
<div class="row">
<div class="card" style="width: 18rem;">
<div class="card-body">
<div style="background-color:red; color:white;">
<center>
    
    <h5> Total Users: '.$row['totalusers'].'</h5>
</center>
</div>
  <table>
        <tr>
        <th>Blood group</th>
        <th>Total User</th> 
        </tr>';


    $sql2="SELECT blood_group,count(*) as usercount FROM `user`GROUP BY blood_group";
    $result2=mysqli_query($conn,$sql2);
    while($row2=mysqli_fetch_assoc($result2)){
    $blood_group=$row2['blood_group'];
    $user_count=$row2['usercount'];
    echo '
        <tr>
       
        <td><strong>'.$blood_group.'</strong></td>
        <td><strong>'.$user_count.'</strong></td>
        
        </tr>';
    }
echo '
</table>
</div>
</div>


<div class="card" style="width: 18rem;">
<div class="card-body">
<div style="background-color:green; color:white;">
<center>
    <h5 class="card-title">Stock</h5>
    
</center>
</div>
  <table>
        <tr>
        <th>Blood group</th>
        <th>Stock (UTs)</th> 
        </tr>';


    $sql2="SELECT blood_group,quantity FROM `blood_stock`GROUP BY blood_group";
    $result2=mysqli_query($conn,$sql2);
    while($row2=mysqli_fetch_assoc($result2)){
    $blood_group=$row2['blood_group'];
    $stock=$row2['quantity'];
    echo '
        <tr>
       
        <td><strong>'.$blood_group.'</strong></td>
        <td><strong>'.$stock.'</strong></td>
        
        </tr>';
    }
echo '
</table>
</div>
</div>';


// <div class="card" style="width: 18rem;">
// <div class="card-body">

// <div class="card">
// <div class="card-body">

// </div>
// </div>

// <div class="card" >
// <div class="card-body">

// </div>
// </div>

// <div class="card">
// <div class="card-body">

// </div>
// </div>

// <div class="card" >
// <div class="card-body">

// </div>
// </div>

// </div>
// </div>

echo'
<div id="donutchart" style="width: 700px; height: 500px;"></div>

<div class="row">

<div class="card" style="margin-right:50px;margin-left:10px;">
<div class="card-body">
<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem aliquid, est eum architecto vitae facere quisquam, laudantium odit eligendi delectus eos labore doloribus. Rerum, atque? Tempora excepturi eius totam doloribus distinctio recusandae, deserunt sunt!</p>
</div>
</div>
</div>
</div>';

?>
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
            // echo "
            // ['".$blood_group."'"," ".$stock."],";
            }
          
          
          ?>

            //   ['A+',  4],
            //   ['A-',  2],
            //   ['AB+', 4],
            //   ['AB-', 5],
            //   ['B+',  7],
            //   ['B-', 12],
            //   ['O+',  7],
            //   ['O-',  3]
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