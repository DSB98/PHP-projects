<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $speed=$_POST['speed'];
    $vehicle= $_POST['vehicle'];
    $sql="UPDATE `vehicle` SET `speed` = '$speed' WHERE `vehicle`.`vehicle_no` = '$vehicle';";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location: ../index.php?speedLimitSet=Suceesfull"); 
    }
    else{
       header("location: ../index.php?errorOccured");
    }
}
else{
    header("location: ../index.php?abc");
}
?>