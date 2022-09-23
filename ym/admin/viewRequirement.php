<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<body>
    <?php
    include "partials/_dbconnect.php";
    include "partials/_dashboard.php";
    
    ?>
    <div class="main">
        <?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //echo 'reading form data';
    include 'partials/_dbconnect.php';
    $id=$_POST['req_id'];
    $viewSQL="SELECT *,DATE_ADD(date, INTERVAL 330 MINUTE) as date2 FROM `requirements` WHERE `req_id` =$id;";
    // $spl2="SELECT user_name FROM `user` WHERE user_id=1;";
    $result=mysqli_query($conn,$viewSQL);

    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['req_id'];
            $patient=$row['pName'];
            $hospital=$row['hName'];
            $mob=$row['contact'];
            $blood_group=$row['bgroup'];
            $date=$row['date2'];
            $status=$row['status'];
            $requirement=$row['requirement'];
            $age=$row['age'];
            $relative=$row['relativeName'];
            $hrct=$row['HRCTscore'];
            $swab=$row['swabCTscore'];
            $o2=$row['oxygenLevel'];
            $city=$row['city'];
            

        }
       echo'
       
  
  <div class="card" style="width:42.5rem;">
  <div class="row orders" style="margin-left:10px;">
  <div><H2>Requirement Details</H2></div>
  </div>
  <form action="partials/_processRequirement.php" method="POST">
  <input type="hidden" name="id" value="'.$id.'">
  <input type="hidden" name="status" value="'.$status.'">
  
  <div class="row orders" style="margin-left:10px; margin-top:10px;">
  
  <div class="card" style="width: 12rem;"><p>Order ID: '.$id.'</p></div>
  <div class="card" style="width: 12rem;"><p>Requirement: '.$requirement.'</p></div>
  <div class="card" style="width: 12rem;"><p>Status: '.$status.'</p></div>
  </div>

  <div class="row orders" style="margin-left:10px; margin-top:10px;">
  <div class="card" style="width: 12rem;"><p>Patient Name: '.$patient.'</p></div>
  <div class="card" style="width: 12rem;"><p>Blood Group: '.$blood_group.'</p></div>
  <div class="card" style="width: 12rem;"><p>Age: '.$age.'</p></div>
  </div>

  <div class="row orders" style="margin-left:10px;">
  <div class="card" style="width: 12rem;"><p>HRCT Score: '.$hrct.'</p></div>
  <div class="card" style="width: 12rem;"><p>Swab CT Score: '.$swab.'</p></div>
  <div class="card" style="width: 12rem;"><p>Oxygen Level: '.$o2.'</p></div>
  </div>

  <div class="row orders" style="margin-left:10px;">
  <div class="card" style="width: 25rem;"><p>Hospital Name: '.$hospital.'</p></div>
  <div class="card" style="width: 12rem;"><p>City: '.$city.'</p></div>
  </div>

  
  <div class="row orders" style="margin-left:10px;">
  <div class="card" style="width: 18.5rem;"><p>Requested By: '.$relative.'</p></div>
  <div class="card" style="width: 18.5rem;"><p>Mobile No: '.$mob.'</p></div>

  
  </div>

  <div class="row orders" style="margin-left:10px;">
  <div class="card" style="width: 18.5rem;"><p>Date: '.$date.'</p></div>

  <div class="row orders" style="margin-left:1px;">
  <select class="card" style="width: 18.5rem; background-color:gray; color:white;" name="action" id="action" required>
  <option value="">Choose Action</option>
  <option value="process">Process Requirement</option>
  <option value="fulfil">Fulfil Requirement</option>
  </select>
  </div>
  </div>

  
  <div class="row orders" style="margin-left:10px;">
  ';
//   if($status=="New"){
//   echo'
//   <div><button type="submit" class="btn btn-primary btn-lg" style=" margin-left:20px; float:right;">Process Requirement</Button></div>
//   <div><button type="submit" class="btn btn-primary btn-lg" style=" margin-left:20px;float:right;">Requirement Fulfilled</Button></div>';

// }
//   if($status=="Processed"){
//     echo'
//     <div><button type="submit" class="btn btn-primary btn-lg" style=" margin-left:20px;float:right;">Requirement Fulfilled</Button></div>';
//     }

  if($status=="Fulfilled"){
    echo'
    <div><button type="submit" class="btn btn-primary btn-lg" style=" margin-left:20px;float:right;" disabled>This Requirement has been successfully fulfilled!</Button></div>';
    }
    else{
      echo'
      <div><button type="submit" class="btn btn-primary btn-lg" style=" margin-left:20px;float:right;">Take Action</Button></div>';
    }
    echo'
  </div>

  
  </form>
  
</div>
  

       ';
            
}

}
   




?>  
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>