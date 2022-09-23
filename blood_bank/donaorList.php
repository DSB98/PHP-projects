<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/styles.css" class="css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

   
    <title>Blood Bank</title>
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  padding: 5%;
  margin-top: 5%
}

#customers td, #customers th {
  border: 1px solid #f2f2f2;
  padding: 8px;
}

/* #customers tr:nth-child(even){background-color: #f2f2f2;} */

#customers tr:hover {background-color: #f2f2f2;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
.donor{
padding-top: 10px;

text-align: center;
}

</style>
</head>

<body>
    <?php
    include "partials/_dbconnect.php";
    ?>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $pincode=$_POST['location'];
    $blood_group=$_POST['bgroup'];
    // $dob=$_POST['dob'];
    $existsql="select * from `user` where ((datediff(SYSDATE(), dob))/365)>= 18 and blood_group='$blood_group' and pincode='$pincode'";
    $result=mysqli_query($conn,$existsql);
    
    echo"
    <div class='container'>
    <table border='1' id='customers' style='background-color: #ddd;'>
            <h3 class='donor'>Available Donors </h3>
            <tr>
                <th>Serial number</th>
                <th>Name</th>
				<th>Phone no</th>
				<th>Gender</th>
				<th>Address</th>
                <th>Pincode</th>
                <th>Blood Group</th>
            </tr>
            </div>";

$srno=1;
while($row=mysqli_fetch_array($result)){
    // $blood_group=$row['blood_group'];
    // $pincode=$row['pincode'];

    echo "<tr>
                 <td>$srno</td>   
				<td>".$row['user_name']."</td>
				<td>".$row['pri_mob_number']."</td>
				<td>".$row['gender']."</td>
				<td>".$row['address']."</td>
                <td>".$row['pincode']."</td>
                <td>".$row['blood_group']."</td>			
		</tr>";
        $srno=$srno+1;
    }}
    
?>

</body>

</html>