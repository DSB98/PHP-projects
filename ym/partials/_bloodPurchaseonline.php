<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  session_start();
  $user_id= $_SESSION["user_id"]; 
    include '_dbconnect.php';
    $blood_grp=$_POST['bgroup'];
    $patient_name=$_POST['patname'];
    $pat_number=$_POST['patno'];
    $hosp_name=$_POST['hospname'];
    $dr_name=$_POST['drname'];
    $amt_of_blood=$_POST['myamt'];
    $address=$_POST['address'];
    $pincode=$_POST['pincode'];
    $alt_mobile_no=$_POST['altno'];

    $availblood="SELECT quantity, price, total_sell FROM blood_stock WHERE blood_group='$blood_grp'";
    $result1=mysqli_query($conn,$availblood);
    if($result1){
        
      $row=mysqli_fetch_assoc($result1);
      $avail_blood=$row['quantity'];
      $sell=$row['total_sell'];
      $price=$row['price'];
      $cost= $amt_of_blood * $price;
    

    if($avail_blood>=$amt_of_blood)
    {   
        

          $avail_blood= $avail_blood-$amt_of_blood;
          $sell=$sell+$amt_of_blood;
          $availblood="UPDATE blood_stock SET quantity='$avail_blood', total_sell=$sell WHERE blood_group='$blood_grp'";
          $result2=mysqli_query($conn,$availblood);

         
       
        //   $update2="UPDATE blood_stock SET total_sell='$amt_of_blood' WHERE blood_group='$blood_group' ";
        //   $result4=mysqli_query($conn,$update2);
          
          $insert="INSERT INTO `blood_purchase_online` ( `user_id`, `blood_group`, `quantity`, `total_cost`, `address`, `pincode`, `alt_mob_number`, `date`, `patient_name`, `pat_contact_details`, `hosp_name`, `Dr_name`,`status`) VALUES ( '$user_id', '$blood_grp', '$amt_of_blood', '$cost', '$address', '$pincode', '$alt_mobile_no', current_timestamp(), ' $patient_name', '$pat_number', '$hosp_name', '$dr_name','New');";
          
          $result5=mysqli_query($conn,$insert);

          if($result5)
          {
           
           $flag="true";
             header("location: /blood_bank/buyBlood.php?buybloodsuccess=$flag");      
          
          }
        }
      
    else
    {
        
     $flag="false";
        echo"entered blood grp is invalid or blood for $blood_grp is out of stock";
    header("location:/blood_bank/buyBlood.php?buybloodsuccess=$flag");
    }
}
}
?>