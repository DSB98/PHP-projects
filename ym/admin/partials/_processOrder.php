<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //echo 'reading form data';
    include '_dbconnect.php';
    $id=$_POST['id'];
    $status=$_POST['status'];
    if($status=="New"){
        $sql="UPDATE `blood_purchase_online` SET `status` = 'Dispatched' WHERE `blood_purchase_online`.`request_id` = $id;";
        $showAlert="Order has been successfully dispatched!";
    }
    if($status=="Dispatched"){
        $sql="UPDATE `blood_purchase_online` SET `status` = 'Delivered' WHERE `blood_purchase_online`.`request_id` = $id;";
        $showAlert="Order has been successfully delivered";
    }

    $result=mysqli_query($conn,$sql);

    if($result){
                header("location: /admin/index.php?orderProcessed=true&&alert=$showAlert");
           
              
    }
        else{
            $showError="some error occured while processing order!";
      header("location: /admin/index.php?orderProcessed=false&&error=$showError");

        }
}

?>