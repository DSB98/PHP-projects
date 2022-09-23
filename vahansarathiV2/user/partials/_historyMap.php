<!doctype html>
<html>

<head>
  <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.19.0.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="map.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    #map-canvas {
      width: 100%;
      height: 90%;
      margin-left: -20px;

      position: absolute;
      /* border: 6px solid #056af7;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
    }
  </style>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

<?php 
$vehicle=$_SESSION['vehicle'];
include "partials/_dbconnect.php";
$sql ="select * from history where journey_id=2 limit 1;";
$result= mysqli_query($conn, $sql);
$resultRows= mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result)){
 
    
  $latitude = $row['latitude'];
  $longitude = $row['longitude'];
echo $latitude;
 
  
//   echo "         <script type='text/javascript'>newPoint();</script>\n";
echo'
<input type="hidden" id="lat12" value="'. $row['latitude'].'">
<input type="hidden" id="lng12" value="'. $row['longitude'].'"onchange="newPoint()">
';
}
?>
  

  <div class="bg-others"  style="height: 100vh;">
    <div class="container" >

      <div class="col-md-12 ">
        <div class="row ">
          <div class="col-md-1 col-lg-1">
            <div class="map-speed" >
              <div class="speed">
               <center> <h3 style=" width:auto;"class="speed-hr">0</h3><span style="margin-top: -5px; margin-left:-5px;">km/hr</span></center>
              </div>
            </div>
          </div>
          <div class="col-xl-11 col-lg-11">
            <center><button class="btn btn-success map-btn " id="action" >Start Tracking</button></center>
          </div>
        </div>
      </div>
      <br>
      <center>
      
        <div id="map-canvas" style="margin-top: -20px;"></div>
      </center>
    </div>
  </div>

  <script>
    
    window.lat = <?php echo $latitude ?>;
    window.lng = <?php echo $longitude ?>;
    
    window.lat1 = 18.6215708333;
    window.lng1 = 79.818913;

    var map;
    var mark;
    var lineCoords = [];

    var initialize = function() {
      map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: {
          lat: lat,
          lng: lng
        },
        zoom: 20
      });
      mark = new google.maps.Marker({
        position: {
          lat: lat,
          lng: lng
        },
        map: map
      });
    };

    window.initialize = initialize;

    var redraw = function(payload) {
      if (payload.message.lat) {
        lat = payload.message.lat;
        lng = payload.message.lng;
        $.ajax({
            type: "POST",
            url: "partials/_speed.php",
            data: {
                "lat":lat,
                "lng":lng,
                "lat1":window.lat,
                "lng1":window.lng1,
            },

            success: function (response) {
                $('.speed-hr').text(response);
                $('.current-location').text(lat);
                $('.current-location1').text(lng);
                
            }
        });
        window.lat1 = lat;
        window.lng1 = lng;

        map.setCenter({
          lat: lat,
          lng: lng,
          alt: 0
        });
        mark.setPosition({
          lat: lat,
          lng: lng,
          alt: 0
        });

        lineCoords.push(new google.maps.LatLng(lat, lng));

        var lineCoordinatesPath = new google.maps.Polyline({
          path: lineCoords,
          geodesic: true,
          strokeColor: '#2E10FF'
        });

        lineCoordinatesPath.setMap(map);
      }

      // Spedd
      
      

    };

    var pnChannel = "raspi-tracker";

    var pubnub = new PubNub({
      publishKey: 'pub-c-983bb714-3504-4842-881b-6e1ae14b3c1f',
      subscribeKey: 'sub-c-f8e5ab1a-61bb-11ec-8e07-d6dcb445abf2'
    });

    document.querySelector('#action').addEventListener('click', function() {
      var text = document.getElementById("action").textContent;
      if (text == "Start Tracking") {
        pubnub.subscribe({
          channels: [pnChannel]
        });
        pubnub.addListener({
          message: redraw
        });
        document.getElementById("action").classList.add('btn-danger');
        document.getElementById("action").classList.remove('btn-success');
        document.getElementById("action").textContent = 'Stop Tracking';
      } else {
        pubnub.unsubscribe({
          channels: [pnChannel]
        });
        document.getElementById("action").classList.remove('btn-danger');
        document.getElementById("action").classList.add('btn-success');
        document.getElementById("action").textContent = 'Start Tracking';
      }
    });

    function newPoint(time) {
        var radius = 0.0001;
        var x = Math.random() * radius;
        var y = Math.random() * radius;
      
        window.lat1 = document.getElementById("lat12").value();
        alert(window.lat1);
        window.lng1 = document.getElementById("lng12").value();
        return {lat:window.lat, lng:window.lng};
            }
        setInterval(function() {
        pubnub.publish({channel:pnChannel, message:newPoint()});
        }, 500);
    
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCmOwb-LwKhn1uXdmRKSVaGralKAJPAx_E&callback=initialize"></script>
</body>

</html>