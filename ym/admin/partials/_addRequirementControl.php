<?php
session_start();
 if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){ 
    
    $user=$_SESSION['user_id'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
 
    include '_dbconnect.php';
    $blood_group=$_POST['bgroup'];
    $requirement=$_POST['requirement'];
    $p_name=$_POST['patient'];
    $age=$_POST['age'];
    $hospital=$_POST['hospital'];
    $hrct=$_POST['hrct'];
    $swab=$_POST['swab'];
    $o2=$_POST['o2'];
    $relative=$_POST['relative'];
    $contact=$_POST['contact'];
    $status=$_POST['status'];
    $city=$_POST['city'];

    $sql="select * from requirements where bgroup='$blood_group' AND requirement='$requirement' AND pName='$p_name' AND age=$age;";
    $result=mysqli_query($conn,$sql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0){
      header("location:/admin/index.php?checkdetailsiscalled=true&&record=found");

    }
    else{
    
    $insertSql="INSERT INTO `requirements` (`req_id`, `bgroup`, `requirement`, `pName`, `age`, `hName`,`city`, `HRCTscore`, `swabCTscore`, `oxygenLevel`, `relativeName`, `contact`, `date`, `status`, `user_id`) VALUES (NULL, '$blood_group', '$requirement', '$p_name', '$age', '$hospital','$city', '$hrct', '$swab', '$o2', '$relative', '$contact', current_timestamp(), '$status', '$user');";
    //to check email is alreadyy exists or not

            $result=mysqli_query($conn,$insertSql);
            if($result){
                $showAlert="Requirement has been successfully added!";
               header("location:/admin/index.php?requirementAddedSuccessfully=true&&alert=$showAlert");
            //    echo $showAlert;
            }


        
        else{
            $showError="Some error occured";
            // echo $showError;
           header("location: /admin/index.php?requirementAddedSuccessfully=false&&error=$showError");

        }
    }
    
}
}
?>