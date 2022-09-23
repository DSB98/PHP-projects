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
    $id=$_POST['orderID'];
    $viewSQL="SELECT * FROM `blood_purchase_online` WHERE `request_id` =$id;";
    // $spl2="SELECT user_name FROM `user` WHERE user_id=1;";
    $result=mysqli_query($conn,$viewSQL);

    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['request_id'];
            $user=$row['user_id'];
            $patient=$row['patient_name'];
            $hospital=$row['hosp_name'];
            $doctor=$row['Dr_name'];
            $mob=$row['alt_mob_number'];
            $alt_mob=$row['pat_contact_details'];
            $pincode=$row['pincode'];
            $address=$row['address'];
            $cost=$row['total_cost'];
            $blood_group=$row['blood_group'];
            $quantity=$row['quantity'];
            $date=$row['date'];
            $status=$row['status'];
            // $status="Delivered";
            
            $result2=mysqli_query($conn,"SELECT user_name FROM `user` WHERE user_id=$user;");
            if($result2){
                while($row2=mysqli_fetch_assoc($result2)){
                    $username=$row2['user_name'];
                }
            }

        }
       echo'
       
  
  <div class="card" style="width:42.5rem;">
  <div class="row orders" style="margin-left:10px;">
  <div class="card"><button class="btn btn-primary btn-lg" style="width:38.5rem; margin-left:20px;">Order Details</Button></div>
  </div>
  <form action="partials/_processOrder.php" method="POST">
  <input type="hidden" name="id" value="'.$id.'">
  <input type="hidden" name="status" value="'.$status.'">
  
  <div class="row orders" style="margin-left:10px; margin-top:10px;">
  
  <div class="card" style="width: 12rem;"><p>Order ID: '.$id.'</p></div>
  <div class="card" style="width: 12rem;"><p>Order Cost: '.$cost.'</p></div>
  <div class="card" style="width: 12rem;"><p>Status: '.$status.'</p></div>
  </div>

  <div class="row orders" style="margin-left:10px; margin-top:10px;">
  <div class="card" style="width: 12rem;"><p>Patient Name: '.$patient.'</p></div>
  <div class="card" style="width: 12rem;"><p>Blood Group: '.$blood_group.'</p></div>
  <div class="card" style="width: 12rem;"><p>Quantity: '.$quantity.' Units</p></div>
  </div>

  <div class="row orders" style="margin-left:10px;">
  <div class="card" style="width: 25rem;"><p>Hospital Name: '.$hospital.'</p></div>
  <div class="card" style="width: 12rem;"><p>Dr. Name: '.$doctor.'</p></div>
  </div>

  <div class="row orders" style="margin-left:10px;">
  <div class="card" style="width: 25rem;"><p>Address: '.$address.'</p></div>
  <div class="card" style="width: 12rem;"><p>Pincode: '.$pincode.'</p></div>
  </div>

  
  <div class="row orders" style="margin-left:10px;">
  <div class="card" style="width: 18.5rem;"><p>Requested By: '.$username.'</p></div>
  <div class="card" style="width: 18.5rem;"><p>Date: '.$date.'</p></div>
  </div>

  <div class="row orders" style="margin-left:10px;">
  <div class="card" style="width: 18.5rem;"><p>Mobile No: '.$mob.'</p></div>
  <div class="card" style="width: 18.5rem;"><p>Alt Mobile No: '.$alt_mob.'</p></div>
  </div>

  <div class="row orders" style="margin-left:10px;">
  ';
  if($status=="New"){
  echo'
  <div><button type="submit" class="btn btn-primary btn-lg" style="width:38.5rem; margin-left:20px;">Dispatch</Button></div>';
  }
  if($status=="Dispatched"){
    echo'
    <div><button type="submit" class="btn btn-primary btn-lg" style="width:38.5rem; margin-left:20px;">Deliver</Button></div>';
    }
    
  if($status=="Delivered"){
    echo'
    <div><button type="submit" class="btn btn-primary btn-lg" style="width:38.5rem; margin-left:20px;" disabled>Order has been successfully delivered!</Button></div>';
    }
    echo'
  </div>

  
  </form>
  
</div>
  
</div>
       ';
            
        }
              
    }
        else{
            $showError="Record added sucessfully";
      header("location: /blood_bank/admin/index.php?recordcreated=false&&error=$showError");

        }


?>


    </div>





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