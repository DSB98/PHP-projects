


<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <title>YM Helpline</title>
</head>

<body>
    <?php
include "partials/_dbconnect.php";
include "partials/_dashboard.php";
$sql="select * from `user` where ((datediff(SYSDATE(), covidRecDate)))>= 28 AND plasmaDonor='yes'";
$res=mysqli_query($conn,$sql);
?>
    <div class="main " style="margin-right:20px;">
<div class="container ">
<center><h3>Plasma Donors</h3></center>
  <a href="export.php"><button type="button" class="btn btn-primary">Export</button></a>
  <table class="table table-bordered  table-striped">
    <thead>
      <tr>
        <th>Sr.No</th>
        <th>Name</th>
        <th>Blood Group</th>
        <th>Contact Number</th>
        <th>Recovery Date</th>
        <th>City</th>
        

      </tr>
    </thead>
    <tbody>
	 <?php 
     $srNo=1;
     while($row=mysqli_fetch_assoc($res)){	
  
    $address=str_replace("%"," ",str_replace("_",",",$row['address']));?>
	 <tr>
        <td><?php echo $srNo?></td>
        <td><?php echo $row['user_name']?></td>
        <td><?php echo $row['blood_group']?></td>
        <td><?php echo $row['pri_mob_number']?></td>
        <td><?php echo $row['covidRecDate']?></td>
        <td><?php echo $address?></td>
      </tr>
      <?php $srNo=$srNo+1; } ?>
    </tbody>
  </table>
</div>
</div>
<style>
.btn{
	float: right;
    margin-bottom: 20px;
    margin-top: 20px;
}
</style>
</body>
</html>
