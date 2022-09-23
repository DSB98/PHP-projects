<?php
$latitudeFrom=$_POST['lat'];
$longitudeFrom=$_POST['lng'];
$latitudeTo=$_POST['lat1'];
$longitudeTo=$_POST['lng1'];

print_r(twopoints_on_earth( $latitudeFrom, $longitudeFrom,
					$latitudeTo, $longitudeTo));		
	function twopoints_on_earth($latitudeFrom, $longitudeFrom,
									$latitudeTo, $longitudeTo)
	{
		$long1 = deg2rad($longitudeFrom);
		$long2 = deg2rad($longitudeTo);
		$lat1 = deg2rad($latitudeFrom);
		$lat2 = deg2rad($latitudeTo);
			
		//Haversine Formula
		$dlong = $long2 - $long1;
		$dlati = $lat2 - $lat1;
			
		$val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2);
			
		$res = 2 * asin(sqrt($val));
			
		$radius = 3958.756;
			
        $result=($res*$radius*1.60934)/0.0001388889;
		$speed=(int)$result;
		session_start();
		$vehicle=$_SESSION['vehicle'];
		include '_dbconnect.php';
		$speedQuery="select speed, license_no from vehicle where vehicle_no='$vehicle';";
		$speedResult = mysqli_query($conn, $speedQuery);
		$speedLimit=10;
		$license='1234';
		// if($speedResult){
			$row=mysqli_fetch_assoc($speedResult);
			$speedLimit=$row['speed'];
			$license=$row['license_no'];
		// }
		
		if($speed>$speedLimit){
			

			$userQuery="select email from user where license_no=$license;";
			$userResult=mysqli_query($conn,$userQuery);
			$row2=mysqli_fetch_assoc($userResult);
			$email=$row2['email'];
			
				$to_email = "$email";
				$subject = "Speed Limit Warning!";
				$body = "Dear user, </br>";
				$body .= "<div>Your vehicle No: $vehicle has exceeded the speed limt, bellow are the details:</br></div>";
				$body .= "<div>Location Details:</br></div>";
				$body .= "<div>Lattitude: $latitudeTo</br></div>";
				$body .= "<div>Longitude: $longitudeTo</br></div>";
				$body .= "<div>Vehicle Speed: $speed</br></div>";
				$body .= file_get_contents("template.html");
				// Set content-type for sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: contact@vahansarathi.in";
	
				if (mail($to_email, $subject, $body, $headers)) {
					
				} else {
					
				}
		
	}
		return (int)$result;      
	}
?>