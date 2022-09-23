<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <script type="text/javascript" src="checkDetails.js"></script> -->

</head>

<body>

    <div class="main">
        <div class="row">
            <div class="card" style="width: 600px; font-weight:300;">
                <div class="card-body">
                    <?php
if(isset($_GET['requirementAddedSuccessfully'])&& $_GET['requirementAddedSuccessfully']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> '.$_GET['alert'].'!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if(isset($_GET['requirementAddedSuccessfully'])&& $_GET['requirementAddedSuccessfully']=="false"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> '.$_GET['error'].'!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

if(isset($_GET['checkdetailsiscalled'])&& $_GET['checkdetailsiscalled']=="true"&&$_GET['record']=="found"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> The reacord is already present!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
                    <form action="partials/_addRequirementControl.php" Style="margin-bottom:10px; margin-right:10px"
                        method="POST">

                        <h4 style="color:red">Add New Requirement</h4>
                        <div class="form-group">
                            <select class="form-control" name="bgroup" id="bgroup" required onchange="getBloodGroup()">
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>

                        <div class="form-group">

                            <select class="form-control" name="requirement" id="requirement" onchange="getRequirement()"
                                required>
                                <option value="">Select Requirement</option>
                                <option value="Blood">Blood</option>
                                <option value="Plasma">Plasma</option>
                                <option value="Remdesivir">Remdesivir</option>
                                <option value="Oxygen Bed">Oxygen Bed</option>
                                <option value="Ventilater">Ventilator</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="patient" name="patient"
                                aria-describedby="emailHelp" required placeholder="Patient Name"
                                onchange="getPatientName()">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="age" name="age" aria-describedby="emailHelp"
                                placeholder="Age" onchange="getAge()">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="hospital" name="hospital"
                                aria-describedby="emailHelp" placeholder="Enter Hospital Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp"
                                placeholder="Enter City Name">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="hrct" name="hrct" aria-describedby="emailHelp"
                                placeholder="HRCT Score">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="swab" name="swab" aria-describedby="emailHelp"
                                placeholder="Swab CT Score">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="o2" name="o2" aria-describedby="emailHelp"
                                placeholder="Oxygen Level">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="relative" name="relative"
                                aria-describedby="emailHelp" required placeholder="Relatives Name">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="contact" name="contact"
                                aria-describedby="emailHelp" required placeholder="Cantact Number" minlength="10">
                        </div>
                        <div class="form-group">

                            <select class="form-control" name="status" id="status">
                                <option value="">Select Requirement Status</option>
                                <option value="New">New</option>
                                <option value="Processed">Processed</option>
                                <option value="Fulfilled">Fulfilled</option>
                            </select>
                        </div>
                        <div class="form-group">
                        </div>
                        <button type="submit" class="btn btn-primary" style="float:right;">Add Requirement</button>
                    </form>

                </div>
            </div>



            <?php
echo'

<div class="card" style="width: 600px; font-weight:300;">
<div class="card-body">
<div style=" color:red;"><h3>Requirements</h3></div>
';
if(isset($_GET['requirementProcessed'])&& $_GET['requirementProcessed']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> '.$_GET['alert'].'!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if(isset($_GET['requirementProcessed'])&& $_GET['requirementProcessed']=="false"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> '.$_GET['error'].'!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
echo'<div class="card-body">

<ul class="nav nav-pills">';
$sql2="SELECT status, count(*) as orders FROM `requirements` GROUP BY status ORDER BY status DESC ";
    $result2=mysqli_query($conn,$sql2);
    while($row2=mysqli_fetch_assoc($result2)){
    $status=$row2['status'];
    $count=$row2['orders'];
    echo '<li style="border: 2px solid black; border-radius: 25px; margin-right:10px; color:green; text-decoration:none;padding:10px;"><a data-toggle="pill" href="#'.$status.' ">'.$status.'<span class="badge badge-light">'.$count.'</span></a></li>';

    }
    echo '
  </ul>
  
  <div class="tab-content">
    <div id="New" class="tab-pane fade show active">
      <h3>New</h3>';
      $sql3="SELECT * FROM `requirements` WHERE status='New' ORDER BY date DESC LIMIT 3;";
      $result3=mysqli_query($conn,$sql3);
      while($row3=mysqli_fetch_assoc($result3)){
      $pName=$row3['pName'];
      $blood_group=$row3['bgroup'];
      $req=$row3['requirement'];
      $hosp=$row3['hName'];
      $id=$row3['req_id'];
      $status2=$row3['status'];
      echo '
      <div class="card">
      <div class="card-body">
      <div class="row orders" style="margin-left:10px;">
      <div><p> Patient Name: <span style="color:green; font-weight: bold;">'.$pName.'<span></p></div>
      <div><p> Blood Group: <span style="color:red; font-weight: bold;">'.$blood_group.'<span></p></div>
      <div><p> Requirement: <span style="color:blue; font-weight: bold;">'.$req.'<span></p></div>
      <p> Hospital: <span style="color:green; font-weight: bold;">'.$hosp.'<span></p>
      
      <form action="viewRequirement.php" method="Post">
      <input type="hidden" name="req_id" value="'.$id.'">
      <button type="submit" class="btn btn-primary viewButton" >View</button>
      </form>
      </div>
      </div>
      </div>
    
      
      
      
      ';
      }

    echo '</div>
    <div id="Processed" class="tab-pane fade">
      <h3>Processed</h3>';
      $sql3="SELECT * FROM `requirements` WHERE status='Processed' ORDER BY date DESC LIMIT 3;";
      $result3=mysqli_query($conn,$sql3);
      while($row3=mysqli_fetch_assoc($result3)){
        $pName=$row3['pName'];
        $blood_group=$row3['bgroup'];
        $req=$row3['requirement'];
        $hosp=$row3['hName'];
        $id=$row3['req_id'];
        $status2=$row3['status'];
      echo '
      <div class="card">
      <div class="card-body">
      <div class="row orders" style="margin-left:10px;">
      <div><p> Patient Name: <span style="color:green; font-weight: bold;">'.$pName.'<span></p></div>

      <div><p> Blood Group: <span style="color:red; font-weight: bold;">'.$blood_group.'<span></p></div>
      <div><p> Requirement: <span style="color:blue; font-weight: bold;">'.$req.'<span></p></div>
      <p> Hospital: <span style="color:green; font-weight: bold;">'.$hosp.'<span></p>
      </div>
      <form action="viewRequirement.php" method="Post">
      <input type="hidden" name="req_id" value="'.$id.'">
      <button type="submit" class="btn btn-primary viewButton" >View</button>
      </form>
     </div>
      </div>
      ';
      }    
      echo '
      </div>
    <div id="Fulfilled" class="tab-pane fade">
      <h3>Fulfilled</h3>';
      $sql3="SELECT * FROM `requirements` WHERE status='Fulfilled' ORDER BY date DESC LIMIT 3;";
      $result3=mysqli_query($conn,$sql3);
      while($row3=mysqli_fetch_assoc($result3)){
        $pName=$row3['pName'];
        $blood_group=$row3['bgroup'];
        $req=$row3['requirement'];
        $hosp=$row3['hName'];
        $id=$row3['req_id'];
        $status2=$row3['status'];
      echo '
      <div class="card">
      <div class="card-body">
      <div class="row orders" style="margin-left:10px;">
      <div><p> Patient Name: <span style="color:green; font-weight: bold;">'.$pName.'<span></p></div>

      <div><p> Blood Group: <span style="color:red; font-weight: bold;">'.$blood_group.'<span></p></div>
      <div><p> Requirement: <span style="color:blue; font-weight: bold;">'.$req.'<span></p></div>
      <p> Hospital: <span style="color:green; font-weight: bold;">'.$hosp.'<span></p>
      </div>
      <form action="viewRequirement.php" method="Post">
      <input type="hidden" name="req_id" value="'.$id.'">
      <button type="submit" class="btn btn-primary viewButton" >View</button>
      </form>
    </div>
      </div>
      ';
      }        
      echo '</div>
    
  </div>
</div>

<form action="viewAllRequirements.php" method="POST" >
<!--<input type="hidden" id="status" name="status" value="'.$status.'">-->
<button type="submit" class="btn btn-primary" style="float:right;">View All Requirements</button>
</form>
';
?>
        </div>
    </div>
    </div>
    </div>
      
</body>

</html>