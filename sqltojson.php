<?php
  $con = new mysqli("localhost","root","root","myfavoriteplaces");

  $sql = "SELECT * FROM myFavoritePlaces";
  $result = mysqli_query($con, $sql);

  $emparray = array();
  while($row = mysqli_fetch_assoc($result))
  {
    $emparray[] = $row;
  }

  echo json_encode($emparray);
  mysqli_close($con);

  echo $emparray[0]['lat'];
?>
<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD9DEz4zv2NRZjDOkLACx0LK4uhiIeq_8k"></script>
<script type="text/javascript" src="/myFavoritePlaces/scripts/gmaps.js"></script>
</head>
<body>
<p>Basic Map</p>
<div id="map" style="width: 600px; height:200px"></div>

<script type="text/javascript">
  $(document).ready(function(){
    map = new GMaps({
      div: '#map',
      lat: 34.3,
      lng: -118.14,
      zoom: 3,
    })
  })
</script>
</body>
</html>
