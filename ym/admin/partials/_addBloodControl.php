<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //echo 'reading form data';
    include '_dbconnect.php';
    $name=$_POST['username'];
    $pri_mob_number=$_POST['pri_num'];
    $blood_group=$_POST['bgroup'];
    $units=$_POST['units'];

    $insertSQL="INSERT INTO `blood_donation_offline` (`donor_name`, `mob_number`, `blood_group`, `quantity`, `date`) VALUES ('$name', '$pri_mob_number', '$blood_group', '$units', current_timestamp());";
    $result=mysqli_query($conn,$insertSQL);

    if($result){
        $showAlert="Record added sucessfully";
        $sql="SELECT quantity FROM `blood_stock` WHERE blood_group='$blood_group';";
        $result=mysqli_query($conn,$sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){      
                $quantity=$row['quantity'];
                $quantity_updated=$quantity+$units;
                $sqlUpdate="UPDATE blood_stock SET quantity=$quantity_updated WHERE blood_group='$blood_group'";
                $result2=mysqli_query($conn,$sqlUpdate);
                header("location: /admin/add_blood.php?recordcreated=true&&stock=$quantity_updated&&alert=$showAlert");
            }
            
        }
              
    }
        else{
            $showError="Record added sucessfully";
      header("location: /admin/add_blood.php?recordcreated=false&&error=$showError");

        }
}

?>