<?php
$vehicle = $_SESSION['vehicle'];
include "_dbconnect.php";
include "_pop_ups.php";
// Journey details
$journeySQL = "select * from journey where vehicle_no='$vehicle' order by start_time desc limit 1;";
$result = mysqli_query($conn, $journeySQL);
$numRows = mysqli_num_rows($result);
if ($numRows > 0) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['user_id'];
    $user=$_SESSION['license_no'];
} else {
    $id = $_SESSION['user_id'];
    $user=$_SESSION['license_no'];
}

// Driver details
$driverSQL = "select * from user where user_id='$id';";
$driverResult = mysqli_query($conn, $driverSQL);
$driverRow = mysqli_fetch_assoc($driverResult);

$vehicleSql = "select * from vehicle where vehicle_no='$vehicle';";
$vehicleSqlResult = mysqli_query($conn, $vehicleSql);
$vehicleRow = mysqli_fetch_assoc($vehicleSqlResult);

$totalVehicle="SELECT count(*) as total FROM `vehicle` WHERE license_no='$user';";
$countResult=mysqli_query($conn, $totalVehicle);
$countRow = mysqli_fetch_assoc($countResult);

$userCount="Select count(*) as total from user where vehicle_no='$vehicle';";
$userCount=mysqli_query($conn, $userCount);
$userCountRow=mysqli_fetch_assoc($userCount);



?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />


<div class="col-md-12 ">
    <div class="row ">
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3" style="padding-top:20px; padding-left:20px;">
                    <div class="card-icon card-icon-large"><i class="fas fa-car"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0 ">Vehicle Details</h5>
                        <h6 class="details">Total Vehicles: <?php echo $countRow['total']; ?></h6>

                        <a class="userdetails" href="vehicles.php">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3" style="padding-top:20px; padding-left:20px;">
                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">User Details</h5>
                        <h6 class="details">Total Users: <?php echo $userCountRow['total']; ?></h6>
                        <!-- <h6 class="details">Driver: <?php echo $driverRow['user_name']; ?></h6>
                        <h6 class="details">License No: <?php echo $driverRow['license_no']; ?> </h6>
                        <h6 class="d-flex align-items-center mb-0">Contact: <?php echo $driverRow['mobile_no']; ?></h6> -->
                        <a class="userdetails" href="users.php">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3" style="padding-top:20px; padding-left:20px;">
                    <div class="card-icon card-icon-large"><i class="fas fa-bell"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Warnings</h5>
                        <h6 class="details">Over Speed: 7</h6>
                        <!-- <h6 class="details">License No: <?php echo $driverRow['license_no']; ?> </h6>
                        <h6 class="d-flex align-items-center mb-0">Contact: <?php echo $driverRow['mobile_no']; ?></h6> -->
                        <a class="userdetails" href="">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3" style="padding-top:20px; padding-left:20px;">
                    <div class="card-icon card-icon-large"><i class="fas fa-tachometer-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Speed Limit</h5>
                        <h6 class="details">Speed Limit: <?php echo $vehicleRow['speed']; ?> KM/HR</h6>
                        <!-- <h6 class="details">License No: <?php echo $driverRow['license_no']; ?> </h6>
                        <h6 class="d-flex align-items-center mb-0">Contact: <?php echo $driverRow['mobile_no']; ?></h6> -->
                        <a class="userdetails" href="" data-toggle="modal" data-target="#speedForm">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 ">
    <div class="row ">
        <div class=" col-lg-9">
            <div class="card ">
                <div class="card-statistic-3 p-1">
                    <div id="map-container-google-1" class="z-depth-1-half map-container">
                        <!-- <iframe src="https://maps.google.com/maps?q=pimpri&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe> -->

                        <?php
                        include "partials/_map.php";
                        include "partials/_speedLimit.php";
                        $vehicle=$_SESSION['vehicle'];
                        $sql = "select * from history where journey_id=(select journey_id from journey where vehicle_no='$vehicle' order by journey_id DESC limit 1) order by time DESC limit 1;";
                        $result = mysqli_query($conn, $sql);
                        $resultRows = mysqli_num_rows($result);
                        $row = mysqli_fetch_assoc($result);
                        if ($resultRows > 0) {
                            $latitude = $row['latitude'];
                            $longitude = $row['longitude'];
                        } else {
                            $latitude = 18.6215708333;
                            $longitude = 73.818913;
                        }
                        
                        $sql2 = "select * from history where journey_id=(select journey_id from journey where vehicle_no='$vehicle' order by journey_id DESC limit 1) order by time ASC limit 1;";
                        $result2 = mysqli_query($conn, $sql2);
                        $resultRows2 = mysqli_num_rows($result2);
                        $row2 = mysqli_fetch_assoc($result2);
                        if ($resultRows2 > 0) {
                            $latitude2 = $row2['latitude'];
                            $longitude2 = $row2['longitude'];
                            $time = $row2['time'];
                        } else {
                            $latitude2 = 18.6215708333;
                            $longitude2 = 73.818913;
                            $time = date("Y:m:d  h:ia");
                        }

                        ?>
                    </div>

                </div>
            </div>
        </div>
        <div class=" col-lg-3">
            <div class="card ">
                <div class="card-statistic-3 p-4" style="height: 500px;">
                    <div class="card speedometer">
                        <div class="speed">
                            <h3 class="speed-hr">0</h3><span>km/hr</span>
                        </div>
                    </div>

                    <div class="speddometer-details">
                        <div class="speedo-separator">
                            <small>Vehicle Details</small></br>
                            <strong><?php echo $vehicle ?></strong>
                        </div>
                    </div>

                    <div class="speddometer-details">
                        <div class="speedo-separator">
                            <small>Driver Details</small></br>
                            <strong><?php echo $driverRow['user_name']; ?></strong>
                        </div>
                    </div>
                    <div class="speddometer-details">
                        <div class="speedo-separator">
                            <small>Current Location</small></br>
                            <strong> <small style="font-size: small;" class="current-location"></small><?php echo $latitude; ?></strong><br>
                            <strong> <small style="font-size: small;" class="current-location1"></small><?php echo $longitude; ?></strong><br>

                        </div>
                    </div>

                    <div class="speddometer-details">
                        <div class="speedo-separator">
                            <small>Vehicle started at</small></br>
                            <strong> <small style="font-size: small;" class="current-location"></small><?php echo $latitude2; ?></strong><br>
                            <strong> <small style="font-size: small;" class="current-location1"></small><?php echo $longitude2; ?></strong><br>

                        </div>
                    </div>

                    <div class="speddometer-details">
                        <div class="speedo-separator">
                            <small>Started Date & Time</small></br>
                            <strong><?php echo $time; ?></strong>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>