<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="description" content="The youth, inspired by the thoughts of Chhatrapati Shivaji Maharaj, came together and started the organization of Yuva Maharashtra. Through Yuva Maharashtra, youth preserve history, culture and do social services And now we are coming forward to help people who needs plasma, beds, medicines, etc.">
    <meta name="keywords" content="Covid19, Yuva Maharashtra, YM Helpline, Corona, Covaccine, Plasma, Plasma donor, blood donor">
    <link rel="stylesheet" href="css/styles.css" class="css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <title>YM Helpline</title>
    <style>
    table{
        
    }
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: auto;
        padding: 5%;
        margin-top: 5%
        margin-right:10px;
        padding-right:10px;
       
    }

    #customers td,
    #customers th {
        border: 1px solid #f2f2f2;
        padding: 8px;
    }

    /* #customers tr:nth-child(even){background-color: #f2f2f2;} */

    #customers tr:hover {
        background-color: #f2f2f2;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

    .donor {
        padding-top: 10px;

        text-align: center;
    }
    </style>
</head>

<body>
    <?php
    include "partials/_dbconnect.php";
    include "partials/_menubar.php";
    ?>
    <br><br><br><br>
    <?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $pincode=$_POST['pincode'];
    $blood_group=$_POST['bgroup'];
    $req=$_POST['req'];
    // $dob=$_POST['dob'];
    if($req=="Blood"){
    $existsql="select * from `user` where ((datediff(SYSDATE(), dob))/365)>= 18 and blood_group='$blood_group' AND bloodDonor='yes' and (pincode='$pincode' OR address LIKE '%$pincode%')";
    }
    elseif($req=="Plasma"){
    $existsql="select * from `user` where ((datediff(SYSDATE(), covidRecDate)))>= 28 and blood_group='$blood_group' AND plasmaDonor='yes' and (pincode='$pincode' OR address LIKE '%$pincode%')";

    }
    $result=mysqli_query($conn,$existsql);
    
    echo"
    <div class='container'>
    <table border='1' id='customers' style='background-color: #ddd;'>
            <h4 class='donor'>Available Donors </h4>
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
$count=0;
while($row=mysqli_fetch_array($result)){
    // $blood_group=$row['blood_group'];
    // $pincode=$row['pincode'];
    $address=str_replace("%"," ",str_replace("_",",",$row['address']));

    echo "<tr>
                 <td>$srno</td>   
				<td>".$row['user_name']."</td>
				<td>".$row['pri_mob_number']."</td>
				<td>".$row['gender']."</td>
				<td>".$address."</td>
                <td>".$row['pincode']."</td>
                <td>".$row['blood_group']."</td>			
		</tr>";
        $srno=$srno+1;
        $count=$count+1;
    }
echo 'Total Donors Available: '.$count;
}

        
            echo'

        </div>
    </div>';
   
   
    
   
    
?>
<?php
 if($count==0){
    echo'<h2>no records found</h2>';
}
?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>