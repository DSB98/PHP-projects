<!DOCTYPE html>
<html lang="en">
<head>
  <title>yM Helpline</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    


<?php
include "partials/_dbconnect.php";

$sql="select * from `user` where ((datediff(SYSDATE(), covidRecDate)))>= 28 AND plasmaDonor='yes' order by address";
$srNo=1;
$res=mysqli_query($conn,$sql);
$html='<table class="table table-bordered  table-striped"><tr><td>Sr. No</td><td>Name</td><td>Blood Group</td><td>Contact Number</td><td>Recovery Date</td><td>City</td></tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr><td>'.$srNo.'</td><td>'.$row['user_name'].'</td><td>'.$row['blood_group'].'</td><td>'.$row['pri_mob_number'].'</td><td>'.$row['covidRecDate'].'</td><td>'.$row['address'].'</td></tr>';
        $srNo=$srNo=1;
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment; filename=plasmaDonors.xls');
echo $html;
?>
</body>
</html>