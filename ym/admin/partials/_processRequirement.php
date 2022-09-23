<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //echo 'reading form data';
    include '_dbconnect.php';
    $id=$_POST['id'];
    $status=$_POST['status'];
    $action=$_POST['action'];
    if($status=="New" && $action=="process"){
        $sql="UPDATE `requirements` SET `status` = 'Processed' WHERE `requirements`.`req_id` = $id;";
        $showAlert="Requirement has been successfully processed!";
    }
    if($status=="New" && $action=="fulfil"){
        $sql="UPDATE `requirements` SET `status` = 'Fulfilled' WHERE `requirements`.`req_id` = $id;";
        $showAlert="Requirement has been successfully Fulfilled!";
    }
    if($status=="Processed"){
        $sql="UPDATE `requirements` SET `status` = 'Fulfilled' WHERE `requirements`.`req_id` = $id;";
        $showAlert="Requirements has been successfully fulfilled";
    }

    $result=mysqli_query($conn,$sql);

    if($result){
                header("location: /admin/index.php?requirementProcessed=true&&alert=$showAlert");
           
              
    }
        else{
            $showError="some error occured while processing requirement!";
      header("location:/admin/index.php?requirementProcessed=false&&error=$showError");

        }
}

?>