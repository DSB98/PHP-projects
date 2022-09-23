<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
  </head>
  <body>
    <?php
    include "partials/_menubar.php";
    ?>
    <div class="main">
    <?php
    include "partials/_sidebar.php";
    include "partials/_dbconnect.php";
    
    ?>
        <div class="maincontent">
          
          <div class="mainContaintTopMargin">
          </div> 
        </div>
    </div>
    <div class="main">
<div class="maincontent">
          
          <div class="mainContaintTopMargin">
        <?php
        $vehicle=$_SESSION['vehicle'];
        $sqlJourney = "Select `journey_id`,`vehicle_no`,`user_id`,`start_time`,`end_time` from `journey` where vehicle_no='$vehicle';";
        $result = mysqli_query($conn, $sqlJourney);
        $srNo=1;
        
        ?>
<table class="table table-hover vehicle-table">
          <h2 class="table-heading">History</h2>
          <thead>
            <tr>
            <th scope="col">##</th>
              <th scope="col">User_Name</th>
              <th scope="col">Veh_no</th>
              <!--<th scope="col">Date</th>-->
              <th scope="col">Start_time</th>
              <th scope="col">End_time</th>
              <th scope="col">Start_loc</th>
              <th scope="col">Dest_loc</th>
              <th scope="col">Action</th>
              
            </tr>
          </thead>
          <tbody>
          
            <?php while ($row = mysqli_fetch_assoc($result)) { 
              
              $journeyID=$row['journey_id'];
              
              $sql3 = "SELECT latitude, longitude from history WHERE journey_id=$journeyID  order by time ASC LIMIT 1;";
              $sql4 = "SELECT latitude, longitude, time from history WHERE journey_id=$journeyID order by time DESC LIMIT 1;";
              $result1 = mysqli_query($conn, $sql3);
              $result2 = mysqli_query($conn, $sql4);
              $rowStart=mysqli_fetch_assoc($result1);
              $rowEnd=mysqli_fetch_assoc($result2);
              $sql4="select user_name from user where user_id =$row[user_id];";
              $resultUser=mysqli_query($conn, $sql4);
              $userRow= mysqli_fetch_assoc($resultUser);
             
              
              ?>
              
              <tr>
                <th scope="row"> <?php  echo $srNo; $srNo=$srNo+1; ?></th>
                <td><?php echo $userRow['user_name']; ?></td>
                <td><?php echo $row['vehicle_no']; ?></td>
               <!-- <td><?php //echo $row['date']; ?></td>-->
                <td ><?php echo $row['start_time']; ?></td>
                <td><?php echo $rowEnd['time']; ?></td>
                <td><?php echo $rowStart['latitude'].' , '.$rowStart['longitude'];?></td>
                <td><?php echo $rowEnd['latitude'].' , '.$rowEnd['longitude'];?></td>
                <td>
                  <form action="historyMap.php" method="post">
                    <?php echo'
                  <input type="hidden" name="user" value="' . $userRow['user_name'] . '" >
                  <input type="hidden" name="vehicle" value="' . $row['vehicle_no'] . '" >
                  <input type="hidden" name="startTime" value="' . $row['start_time'] . '" >
                  <input type="hidden" name="endTime" value="' . $rowEnd['time'] . '" >
                  <input type="hidden" name="journey" value="' . $row['journey_id'] . '" >
                  <input type="hidden" name="start" value="' . $rowStart['latitude'] . ','.$rowStart['longitude'].'" >
                  <input type="hidden" name="end" value="' . $rowEnd['latitude'] . ','.$rowEnd['longitude'].'" >
                  
                  ';?>
                    
                    <button type="submit" class="btn btn-primary">View</button>
                  </form>
                </td>
                
              </tr>
            <?php
              
            } ?>
          </tbody>
        </table> 
        </div> 
        </div>
    </div> 
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>