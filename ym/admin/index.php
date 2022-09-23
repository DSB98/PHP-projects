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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Dashboard</title>
</head>

<body>
    <?php
    include "partials/_dbconnect.php";
    include "partials/_dashboard.php";
    
    ?>
    
    <?php
$sql="SELECT count(*) as totalusers FROM `user`;";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo' 
<div class="main" style="color:red; padding-right:50px;">
<marquee><b>“Bring a life back to power. Make blood donation your responsibility”</b></marquee>
</div>';
include "partials/_requirementForm.php";






echo'

<div class="main">

<div class="row">
<div class="card" style="width: 287px;">
<div class="card-body">
<div style="background-color:red; color:white;">
<center>
    
    <h5> Total Users: '.$row['totalusers'].'</h5>
</center>
</div>
  <table style="font-weight:200;">
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

<div class="card" style="width: 287px; margin-right:5px;">
<div class="card-body">
<div style="background-color:green; color:white;">
<center>
    <h5 class="card-title">Stock</h5>
    
</center>
</div>
  <table >
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



echo'
<div class="card" style="width: 600px; margin-bottom:10px;">
<div id="donutchart" style="height:450px;"></div>

</div>
</div>

<div class="row">

<div class="card" style="width:595px; font-weight:300;">
<div><h3>Orders</h3></div>
';
if(isset($_GET['orderProcessed'])&& $_GET['orderProcessed']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> '.$_GET['alert'].'!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if(isset($_GET['orderProcessed'])&& $_GET['orderProcessed']=="false"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> '.$_GET['error'].'!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
echo'<div class="card-body">

<ul class="nav nav-pills">';
$sql2="SELECT status, count(*) as orders FROM `blood_purchase_online`GROUP BY status ORDER BY status DESC";
    $result2=mysqli_query($conn,$sql2);
    while($row2=mysqli_fetch_assoc($result2)){
    $status=$row2['status'];
    $count=$row2['orders'];
    echo '<li style="border: 2px solid black; border-radius: 25px; margin-right:10px; color:green; text-decoration:none;padding:10px;"><a data-toggle="pill" href="#'.$status.'">'.$status.'<span class="badge badge-light">'.$count.'</span></a></li>';

    }
    echo '
  </ul>
  
  <div class="tab-content">
    <div id="New" class="tab-pane fade show active">
      <h3>New</h3>';
      $sql3="SELECT * FROM `blood_purchase_online` WHERE status='New';";
      $result3=mysqli_query($conn,$sql3);
      while($row3=mysqli_fetch_assoc($result3)){
      $blood_group=$row3['blood_group'];
      $stock=$row3['quantity'];
      $hosp=$row3['hosp_name'];
      $id=$row3['request_id'];
      echo '
      <div class="card">
      <div class="card-body">
      <div class="row orders" style="margin-left:10px;">
      <div><p> Blood Group: <span style="color:red;">'.$blood_group.'<span></p></div>
      <div><p> Quantity: <span style="color:blue;">'.$stock.' Units<span></p></div>
      <p> Hospital: <span style="color:green;">'.$hosp.'<span></p>
      </div>
      <form action="viewOrder.php" method="Post">
      <input type="hidden" name="orderID" value="'.$id.'">
      <button type="submit" class="btn btn-primary viewButton" >View</button>
      </form>
      </div>
      </div>
      
      ';
      }

    echo '</div>
    <div id="Dispatched" class="tab-pane fade">
      <h3>Dispatched</h3>';
      $sql3="SELECT * FROM `blood_purchase_online` WHERE status='Dispatched';";
      $result3=mysqli_query($conn,$sql3);
      while($row3=mysqli_fetch_assoc($result3)){
      $blood_group=$row3['blood_group'];
      $stock=$row3['quantity'];
      $hosp=$row3['hosp_name'];
      $id=$row3['request_id'];
      echo '
      <div class="card">
      <div class="card-body">
      <div class="row orders" style="margin-left:10px;">
      <div><p> Blood Group: <span style="color:red;">'.$blood_group.'<span></p></div>
      <div><p> Quantity: <span style="color:blue;">'.$stock.' Units<span></p></div>
      <p> Hospital: <span style="color:green;">'.$hosp.'<span></p>
      </div>
      <form action="viewOrder.php" method="Post">
      <input type="hidden" name="orderID" value="'.$id.'">
      <button type="submit" class="btn btn-primary viewButton" >View</button>
      </form>
     </div>
      </div>
      ';
      }    
      echo '
      </div>
    <div id="Delivered" class="tab-pane fade">
      <h3>Delivered</h3>';
      $sql3="SELECT * FROM `blood_purchase_online` WHERE status='Delivered';";
      $result3=mysqli_query($conn,$sql3);
      while($row3=mysqli_fetch_assoc($result3)){
      $blood_group=$row3['blood_group'];
      $stock=$row3['quantity'];
      $hosp=$row3['hosp_name'];
      $id=$row3['request_id'];
      echo '
      <div class="card">
      <div class="card-body">
      <div class="row orders" style="margin-left:10px;">
      <div><p> Blood Group: <span style="color:red;">'.$blood_group.'<span></p></div>
      <div><p> Quantity: <span style="color:blue;">'.$stock.' Units<span></p></div>
      <p> Hospital: <span style="color:green;">'.$hosp.'<span></p>
      </div>
      <form action="viewOrder.php" method="Post">
      <input type="hidden" name="orderID" value="'.$id.'">
      <button type="submit" class="btn btn-primary viewButton" >View</button>
      </form>
    </div>
      </div>
      ';
      }        
      echo '</div>
    
  </div>
</div>

</div>




<div class="card" style="width: 600px; font-weight:300;">
<div class="card-body">
<form action="partials/_addTipControl.php" Style="margin-bottom:10px; margin-right:40px" method="POST">';
if(isset($_GET['tipAdded'])&& $_GET['tipAdded']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> '.$_GET['alert'].'!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
  if(isset($_GET['tipAdded'])&& $_GET['tipAdded']=="false"){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> '.$_GET['error'].'!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
            echo' <h4 style="color:red">Add Health Tips</h4>
                <div class="form-group">
                <select class="form-control" name="cat" id="cat" required>
                <option value="">Select Category</option>
                <option value="Balanced Diet">Balanced Diet</option>
                <option value="Cardio (Aerobic) Exercise">Cardio (Aerobic) Exercise</option>
                <option value="Get on the move">Get on the move</option>
                <option value="Hemoglobin Count">Hemoglobin Count</option>
                <option value="Strengthening immune system">Strengthening immune system</option>
                <option value="Yoga">Yoga</option>
            </select>
                </div>
                <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"required placeholder="Title">

            </div>
                <div class="form-group">
                    <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Description" required></textarea>
                    

                </div>
                <button type="submit" class="btn btn-primary" style="float:right;">Add Category</button>
                </form>

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
            
            }
          
          
          ?>
        ]);

        var options = {
            title: 'Blood Stock',
            pieHole: 0.3,
        };
        

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }
    </script>

</body>

</html>