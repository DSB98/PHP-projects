<?php
	/* Database connection settings */
	// $vehicle=$_SESSION['vehicle'];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST['user'];
		$vehicle = $_POST['vehicle'];
		$startTime = $_POST['startTime'];
		$endTime = $_POST['endTime'];
		$journey = $_POST['journey'];
		$start = $_POST['start'];
		$end = $_POST['end'];
	}
include "partials/_dbconnect.php";
$sql ="select * from history where journey_id=$journey;";
$result= mysqli_query($conn, $sql);
$resultRows= mysqli_num_rows($result);

 	$coordinates = array();
 	$latitudes = array();
 	$longitudes = array();

 	while ($row = mysqli_fetch_array($result)) {

		$latitudes[] = $row['latitude'];
		$longitudes[] = $row['longitude'];
		$coordinates[] = 'new google.maps.LatLng(' . $row['latitude'] .','. $row['longitude'] .'),';
	}

	//remove the comaa ',' from last coordinate
	$lastcount = count($coordinates)-1;
	$coordinates[$lastcount] = trim($coordinates[$lastcount], ",");	


	
?>

<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Map | View</title>
		<style>
		
	.form-area{
		float: right;
		display: table-column;
		margin-bottom: 10px;
		color: white;
	}

	.btn-submit {
	    outline: 0;
	    background: #F4BA0F;
	    width: 120px;
	    border: 0;
	    padding: 8px;
	    color: white;
	    font-size: 12px;
	    cursor: pointer;
	}

	.btn-submit:hover, .form button:active{
	    background: #555652;
	}

	

	.outer-scontainer {
		color: #E8E9EB;
		background: #333;
		border: #555652 1px solid;
		padding: 10px;
	}

	.outer-scontainer table {
		/*border-collapse: collapse;*/
		width: 100%;
	}

	.outer-scontainer th {
		border: 1px solid #555652;
		padding: 5px;
		text-align: center;
	}

	.outer-scontainer td {
		border: 1px solid #555652;
		padding: 5px;
		text-align: center;
	}

			</style>
	</head>

	<body>
	   
	<div class="col-md-12 ">

    <div class="row ">
        <div class="col-xl-4 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3" style="padding-top:5px; padding-left:20px;">
                   <h6>Driver Name: <?php echo $name ?></h6>
				   <h6>Vehicle No: <?php echo $vehicle ?></h6>
                    
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-lg-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3" style="padding-top:5px; padding-left:20px;">
				<h6>Start Location: <?php echo $start ?></h6>
				<h6>End Location: <?php echo $end ?></h6>
                    
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3" style="padding-top:5px; padding-left:20px;">
				<h6>Start Time: <?php echo $startTime ?></h6>
				<h6>End Time: <?php echo $endTime ?></h6>
                    
                </div>
            </div>
        </div>

    </div>
	</div>
</div>




		 <div class="outer-scontainer">
	        

		<div id="map" style="width: 100%; height: 80vh;"></div>

		<script>
			function initMap() {
			  var mapOptions = {
			    zoom: 18,
			    center: {<?php echo'lat:'. $latitudes[0] .', lng:'. $longitudes[0] ;?>}, //{lat: --- , lng: ....}
			    mapTypeId: google.maps.MapTypeId.SATELITE
			  };

			  var map = new google.maps.Map(document.getElementById('map'),mapOptions);

			  var RouteCoordinates = [
			  	<?php
			  		$i = 0;
					while ($i < count($coordinates)) {
						echo $coordinates[$i];
						$i++;
					}
			  	?>
			  ];

			  var RoutePath = new google.maps.Polyline({
			    path: RouteCoordinates,
			    geodesic: true,
			    strokeColor: '#1100FF',
			    strokeOpacity: 1.0,
			    strokeWeight: 2
			  });

			  mark = '../images/mark.png';
			  flag = '../images/flag.png';

			  startPoint = {<?php echo'lat:'. $latitudes[0] .', lng:'. $longitudes[0] ;?>};
			  endPoint = {<?php echo'lat:'.$latitudes[$lastcount] .', lng:'. $longitudes[$lastcount] ;?>};

			  var marker = new google.maps.Marker({
			  	position: startPoint,
			  	map: map,
			  	icon: mark,
			  	title:"Start point!",
			  	animation: google.maps.Animation.BOUNCE
			  });

			  var marker = new google.maps.Marker({
			  position: endPoint,
			   map: map,
			   icon: flag,
			   title:"End point!",
			   animation: google.maps.Animation.DROP
			});

			  RoutePath.setMap(map);
			}

			google.maps.event.addDomListener(window, 'load', initialize);
    	</script>

    	<!--remenber to put your google map key-->
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCmOwb-LwKhn1uXdmRKSVaGralKAJPAx_E&callback=initialize"></script>

	</body>
</html>