<?php
  $con = new mysqli("localhost","root","root","myfavoriteplaces");
  if(isset($_POST['keyword']) and $_POST['keyword']!='')
  {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM myFavoritePlaces WHERE description LIKE '%$keyword%'";
    $_POST = '';
  }
  else
  {
    $sql = "SELECT * FROM myFavoritePlaces";
  }
  $result = mysqli_query($con, $sql);

  $emparray = array();
  while($row = mysqli_fetch_assoc($result))
  {
    $emparray[] = $row;
  }

  echo json_encode($emparray);
  mysqli_close($con);

  $length = count($emparray);
  echo $length;
?>
<html>
  <head>
    <meta charset="UTF-8">
		<!-- Bootstrap MaxCDN -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/myFavoritePlaces/css/style.css">
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCT2hpnHS-9uutIKMPKW9MolhDGqCU04NE"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD9DEz4zv2NRZjDOkLACx0LK4uhiIeq_8k"></script>
    <script type="text/javascript" src="/myFavoritePlaces/scripts/gmaps.js"></script>
  </head>
  <body>
    <div class = "container">
      <form class="form-horizontal" action="sqltojson.php" method="post">

				<div class="form-group">
					<label class="control-label col-sm-2" for="keyword" style="text-align: left;">Keyword search:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="keyword" name="keyword">
					</div>
				</div>

        <div class="col-sm-12" style="text-align:right;">
          <p style="color: red;">Press Submit with nothing in keyword search to display all markers!  </p>
					<button type="submit" class="btn btn-default" style="margin-bottom: 10px;">Submit</button> <!-- button to submit form -->
				</div>

      </form>
      <div id="map" style="width: 100%; height:30%"></div>
      <a href="index.php" style="margin: 0 auto;">Insert more markers</a>
    </div>
    <script type="text/javascript"> //map specific javascript
      $(document).ready(function(){
        map = new GMaps({
          div: '#map',
          lat: 34.3,
          lng: -94.14,
          zoom: 3,
        });

      <?php

        for($x=0; $x< $length; $x++)
        {
            echo "map.addMarker({\n";
            echo "lat:".$emparray[$x]['lat'].",\n";
            echo "lng:".$emparray[$x]['lng'].",\n";
            echo "title: '".$emparray[$x]['name']."',\n";
            echo "infoWindow: {\n";
              echo "content: '<p>".$emparray[$x]['name']."<br>".$emparray[$x]['description']." </p>' }\n";
            echo "});\n";
        }

      ?>

      });
    </script> <!-- end of map specific javascript -->

    <!-- Scripts that shouldnt effect page load go right before the closing body tag -->
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
