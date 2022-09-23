<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Dashboard</title>
    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: device-width;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

    table {
        margin-right:10px;
    }
    </style>
</head>

<body>
    <?php
    include "partials/_dbconnect.php";
    include "partials/_dashboard.php";
    
    ?>
    <div class="conatiner main" style="margin-right: 50px;">
        <table id="customers">
            <h2>All Requirements</h2>
            <form action="viewAllRequirements.php" method="GET">
                Filter BY:
                <select id="status" name="status" onchange="submit()">
                    <option value="">Select Requirement Status</option>
                    <option value="All">All Requirements</option>
                    <option value="New">New Requirements</option>
                    <option value="Processed">Processed Requirements</option>
                    <option value="Fulfilled">Fulfilled Requirements</option>
                </select>
            </form>
            <tr>
                <th>Sr. No</th>
                <th>Patient Name</th>
                <th>Blood Group</th>
                <th>Requirement</th>
                <th>HRCT score</th>
                <th>SWAB score</th>
                <th>Oxygen Level</th>
                <th>Hopspital Name</th>
                <th>City</th>
                <th>Relatives</th>
                <th>Contact</th>
                <th>Status</th>
                <th>View</th>
                <th>Action</th>
            </tr>
            <?php
      if($_SERVER["REQUEST_METHOD"]=="GET"){
        $status=$_GET['status'];
        if($status!="All"){
        $existsql="select * from requirements where status='$status'";
        }
        else{
          $existsql="select * from requirements";
        }
      }
      
      else{
        $existsql="select * from requirements";
      }
            
      
      $result=mysqli_query($conn,$existsql);
      $srno=1;
      $count=0;
      while($row=mysqli_fetch_array($result)){
      
          echo'<tr>
              <td>'.$srno.'</td>   
              <td>'.$row['pName'].'</td>
              <td>'.$row['bgroup'].'</td>
              <td>'.$row['requirement'].'</td>
              <td>'.$row['HRCTscore'].'</td>
              <td>'.$row['swabCTscore'].'</td>
              <td>'.$row['oxygenLevel'].'</td>	
              <td>'.$row['hName'].'</td>	
              <td>'.$row['city'].'</td>
              <td>'.$row['relativeName'].'</td>
              <td>'.$row['contact'].'</td>
              <td>'.$row['status'].'</td>
             <td> 
             <form action="viewRequirement.php" method="POST">
             <input type="hidden" name="req_id" value="'.$row['req_id'].'">
             <button type="submit" class="btn btn-info btn-sm viewButton" >View</button>
             </form>
             <td>
             <form action="viewAllRequirements.php" method="OPST">';
             if($row['status']=="New"){
              echo'
              <input type="hidden" name="status" value="'.$row['status'].'">
              <input type="hidden" name="id" value="'.$row['req_id'].'">
              <div><button type="submit" class="btn btn-success btn-sm" >Process </Button></div>';
              }
              if($row['status']=="Processed"){
                echo'
                <input type="hidden" name="status" value="'.$row['status'].'">
                <input type="hidden" name="id" value="'.$row['req_id'].'">
                <div><button type="submit" class="btn btn-success btn-sm"; >Fulfil req</Button></div>';
                }
                
              if($row['status']=="Fulfilled"){
                echo'
                <div><button type="submit" class="btn btn-success btn-sm" disabled>Fulfilled!</Button></div>';
                }
             echo'</form>
              </tr>';
              $srno=$srno+1;
              $count=$count+1;
          }
 ?>
            <?php
// if($_SERVER["REQUEST_METHOD"]=="POST"){
//     //echo 'reading form data';
//     include '_dbconnect.php';
//     $id=$_POST['id'];
//     $status=$_POST['status'];
//     if($status=="New"){
//         $sql="UPDATE `blood_purchase_online` SET `status` = 'Dispatched' WHERE `blood_purchase_online`.`request_id` = $id;";
//         $showAlert="Order has been successfully dispatched!";
//     }
//     if($status=="Dispatched"){
//         $sql="UPDATE `blood_purchase_online` SET `status` = 'Delivered' WHERE `blood_purchase_online`.`request_id` = $id;";
//         $showAlert="Order has been successfully delivered";
//     }

//     $result=mysqli_query($conn,$sql);

//     if($result){
//                 header("location: /blood_bank/admin/viewAllRequirements.php?orderProcessed=true&&alert=$showAlert");
           
              
//     }
//         else{
//             $showError="some error occured while processing order!";
//       header("location: /blood_bank/admin/viewAllRequirements.php?orderProcessed=false&&error=$showError");

//         }
// }

?>
        </table>
    </div>

    <script>
    function changeStatus() {
        alert("status changes");
        var myDiv = document.getElementById("status");
        var status = myDiv.value;
        <?php $statusfilter?> = "select * from requirements where status="
        status "";

    }
    </script>

</body>

</html>